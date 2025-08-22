@section('title', 'Confirm your password')

<div x-data="{ loading: false }" x-on:submit="loading = true">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Confirm your password
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            Please confirm your password before continuing
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="confirm" x-on:submit="loading = true">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input 
                            wire:model.lazy="password" 
                            id="password" 
                            name="password" 
                            type="password" 
                            required 
                            autofocus 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red-500 @enderror" 
                            :disabled="loading"
                        />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600" id="password-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-6">
                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button 
                            type="submit" 
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 active:bg-indigo-700 transition duration-150 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed" 
                            :disabled="loading"
                        >
                            <svg x-show="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span x-show="!loading">Confirm password</span>
                            <span x-show="loading">Confirming...</span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
