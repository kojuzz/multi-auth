<section class="bg-gray-50 dark:bg-gray-900">

    {{-- Flash Message --}}
    <x-message/>

    {{-- Theme Toggle --}}
    <div class="fixed right-0 m-2 z-50">
        @livewire('partials.dark-mode-toggle')
    </div>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

        <a wire:navigate href="/" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2 object-cover" src="{{ asset('images/logo_c.png') }}" alt="logo">
            STU<span class="text-gray-300">DIO</span>n<span class="text-gray-300">ine</span>5
        </a>

        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign in to your account
                </h1>
                <form wire:submit.prevent="login" class="space-y-4 md:space-y-6" action="#">

                    {{-- Email --}}
                    <div>
                        <label for="email">Your email</label>
                        <input wire:model="email" type="text" name="email" id="email" placeholder="name@company.com">
                        @error("email")
                            <div class="text-red-500 mt-1 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password">Password</label>
                        <input wire:model="password" type="password" name="password" id="password" placeholder="••••••••">
                        @error("password")
                            <div class="text-red-500 mt-1 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                    wire:model="remember">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                            </div>
                        </div>
                        {{-- <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                            Forgot password?
                        </a> --}}
                    </div>

                    {{-- Sign in --}}
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Sign in
                    </button>

                    {{-- <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account yet?
                        <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign up</a>
                    </p> --}}

                </form>
            </div>
        </div>
    </div>
</section>