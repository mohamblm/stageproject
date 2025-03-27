@extends('admin.layouts.admin')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Notifications</h2>
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                        {{-- {{ $unread_count }} Unread --}}
                    </span>
                </div>
                
                @if(isset($notifications) && count($notifications) > 0)
                    <div class="space-y-4" id="notifications-container">
                        @foreach($notifications as $notification)
                            <div id="notification-{{ $notification->id }}" 
                                class="p-5 rounded-lg border border-gray-200 shadow-sm transition-all duration-300 {{ $notification->read_at ? 'bg-white' : 'bg-blue-50' }}">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-semibold text-lg text-gray-800">{{ json_decode($notification->data)->title }}</h3>
                                        <p class="mt-2 text-gray-600">{{ json_decode($notification->data)->message }}</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                                        <button onclick="deleteNotification('{{ $notification->id }}')" 
                                            class="ml-2 text-red-500 hover:text-red-700 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                                @if(!$notification->read_at)
                                    <div class="mt-3 flex justify-end">
                                        <button 
                                            onclick="markAsRead('{{ $notification->id }}')" 
                                            id="mark-btn-{{ $notification->id }}"
                                            class="px-3 py-1 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition-colors duration-200">
                                            Mark as read
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    
                    {{-- <div class="mt-8">
                        {{ $notifications->links() }}
                    </div> --}}
                @else
                    <div class="flex flex-col items-center justify-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <p class="mt-4 text-lg text-gray-600">Vous n’avez pas encore de notifications.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function markAsRead(id) {
        // Send AJAX request to mark notification as read
        fetch(`/notifications/${id}/mark-as-read`)
        .then(response => {
            if (response.ok) {
                // Update UI to reflect read status
                const notification = document.getElementById(`notification-${id}`);
                notification.classList.remove('bg-blue-50');
                notification.classList.add('bg-green-50');
                
                // Hide the mark as read button
                const markButton = document.getElementById(`mark-btn-${id}`);
                markButton.style.display = 'none';
                
                // Update unread count
                const unreadCounter = document.querySelector('.bg-blue-100');
                const currentCount = parseInt(unreadCounter.textContent);
                if (currentCount > 0) {
                    unreadCounter.textContent = `${currentCount - 1} Unread`;
                }
                
                // After 2 seconds, change to white background
                setTimeout(() => {
                    notification.classList.remove('bg-green-50');
                    notification.classList.add('bg-white');
                }, 2000);
            }
        })
        .catch(error => console.error('Error marking notification as read:', error));
    }
    
    function deleteNotification(id) {
        if (confirm('Are you sure you want to delete this notification?')) {
            // Send AJAX request to delete notification
            fetch(`/notifications/${id}`)
            .then(response => {
                if (response.ok) {
                    // Remove notification from DOM
                    const notification = document.getElementById(`notification-${id}`);
                    notification.style.opacity = '0';
                    setTimeout(() => {
                        notification.remove();
                        
                        // Check if there are any notifications left
                        const container = document.getElementById('notifications-container');
                        if (container.children.length === 0) {
                            // No notifications left, show empty state
                            container.innerHTML = `
                                <div class="flex flex-col items-center justify-center py-12">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                    <p class="mt-4 text-lg text-gray-600">You don't have any notifications yet.</p>
                                </div>
                            `;
                        }
                    }, 300);
                }
            })
            .catch(error => console.error('Error deleting notification:', error));
        }
    }
</script>
@endsection