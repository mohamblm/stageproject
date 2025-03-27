<div class="pt-12 pb-40">
       <h4 class="text-primary text-center text-2xl ">edite votre profile</h4>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="lg:pr-35 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="lg:px-40 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="lg:px-40 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
