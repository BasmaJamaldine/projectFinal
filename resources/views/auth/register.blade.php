<x-guest-layout>
    {{-- <div class="min-h-screen flex flex-col sm:flex-row bg-gray-100"> --}}
        <!-- Left side - Image -->
        {{-- <div class="sm:w-1/2 bg-[#FFD789] flex items-center justify-center p-8">
            <img src="{{ asset('images/register-illustration.svg') }}" alt="Registration illustration" class="max-w-full h-auto">
        </div> --}}

        <!-- Right side - Form -->
        <div class="overflow-x-hidden flex items-center justify-center p-8">
            <div class="w-full max-w-md">
                <h2 class="text-3xl font-medium font-clash text-[gray-900] mb-6">Create Your Account</h2>

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div>
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="tel" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Gender -->
                    <div>
                        <x-input-label for="gender" :value="__('Gender')" />
                        <select name="gender" id="gender" required class="w-full mt-1 rounded-md shadow-sm border-[#f9c365] focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    {{-- <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div> --}}

                    <!-- Profile Image -->
                    <div>
                        <x-input-label for="profile_image" :value="__('Profile Image')" class="pb-2" />
                        <input id="profile_image" type="file" name="profile_image" class="block mt-1 w-full text-sm text-black file:mr-4 file:py-2 file:px-5 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#f9c365] file:text-black  hover:file:bg-[#1d1d1d] hover:file:text-[#f9c365]" accept="image/*" required />
                        <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <a class="text-md text-black " href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button>
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        
    {{-- </div> --}}
</x-guest-layout>