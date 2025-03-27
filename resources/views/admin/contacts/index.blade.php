@extends('admin.layouts.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Contact Messages</h2>
                </div>

                <!-- Contacts Table -->
                <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">#</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">Name</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">Email</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">Phone</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">Date</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($contacts as $contact)
                                <tr class="hover:bg-gray-50 cursor-pointer contact-row" data-id="{{ $contact->id }}">
                                    <td class="py-3 px-4 text-gray-700">{{ $contact->id }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $contact->nom }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $contact->email }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $contact->phone }}</td>
                                    <td class="py-3 px-4 text-gray-700">{{ $contact->created_at->format('M d, Y') }}</td>
                                    <td class="py-3 px-4">
                                        <button type="button" 
                                                class="view-contact inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                data-id="{{ $contact->id }}"
                                                data-nom="{{ $contact->nom }}"
                                                data-email="{{ $contact->email }}"
                                                data-phone="{{ $contact->phone }}"
                                                data-message="{{ $contact->message }}"
                                                data-created="{{ $contact->created_at->format('M d, Y h:i A') }}">
                                            <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            View
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-4 px-4 text-center text-gray-500">No contact messages found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Details Modal -->
<div id="contactModal" class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="relative mx-auto p-5 border w-full max-w-3xl shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center border-b pb-3">
            <h3 class="text-xl font-semibold text-gray-700">Contact Details</h3>
            <button type="button" class="modal-close text-gray-400 hover:text-gray-500">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="mt-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="text-sm text-gray-500">Name</p>
                    <p class="font-medium text-gray-800" id="contact-nom"></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-medium text-gray-800" id="contact-email"></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Phone</p>
                    <p class="font-medium text-gray-800" id="contact-phone"></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Date Submitted</p>
                    <p class="font-medium text-gray-800" id="contact-created"></p>
                </div>
            </div>
            <div>
                <p class="text-sm text-gray-500">Message</p>
                <div class="mt-2 p-4 bg-gray-50 rounded-lg" id="contact-message" style="white-space: pre-line;"></div>
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="button" class="modal-close inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Close
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('contactModal');
        const viewButtons = document.querySelectorAll('.view-contact');
        const closeButtons = document.querySelectorAll('.modal-close');

        // Open modal function
        const openModal = (element) => {
            document.getElementById('contact-nom').textContent = element.dataset.nom;
            document.getElementById('contact-email').textContent = element.dataset.email;
            document.getElementById('contact-phone').textContent = element.dataset.phone;
            document.getElementById('contact-message').textContent = element.dataset.message;
            document.getElementById('contact-created').textContent = element.dataset.created;
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        };

        // Close modal function
        const closeModal = () => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        };

        // View button event listeners
        viewButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                openModal(button);
            });
        });

        // Close button event listeners
        closeButtons.forEach(button => {
            button.addEventListener('click', closeModal);
        });

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        // Close modal on ESC key press
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        // Row click handler
        document.querySelectorAll('.contact-row').forEach(row => {
            row.addEventListener('click', (e) => {
                if (!e.target.closest('.view-contact')) {
                    const button = row.querySelector('.view-contact');
                    openModal(button);
                }
            });
        });
    });
</script>
@endpush