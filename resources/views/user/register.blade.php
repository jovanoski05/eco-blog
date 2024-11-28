<x-head></x-head>
    <x-menu></x-menu>

    <div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div class="bg-white shadow-md rounded-md p-6">

            <img class="mx-auto h-12 w-auto" src="/images/logo_dark.png" alt="" />

            <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">
                Register
            </h2>


            <form class="space-y-6" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        <input name="name" type="name" required
                            class="px-2 py-3 mt-1 block w-full rounded-md border border-sky-700 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm bg-gray-100" />
                    </div>
                    @error('name')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input name="email" type="email" autocomplete="email" required
                            class="px-2 py-3 mt-1 block w-full rounded-md border border-sky-700 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm bg-gray-100" />
                    </div>
                    @error('email')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input name="password" type="password" required
                            class="px-2 py-3 mt-1 block w-full rounded-md border border-sky-700 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm bg-gray-100" />
                    </div>
                    @error('password')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="mt-1">
                        <input name="password_confirmation" type="password" required
                            class="px-2 py-3 mt-1 block w-full rounded-md border border-sky-700 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm bg-gray-100" />
                    </div>
                    @error('password_confirmation')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="flex w-100 mx-auto justify-center rounded-md border border-transparent bg-sky-600 py-2 px-10 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<x-bottom></x-bottom>