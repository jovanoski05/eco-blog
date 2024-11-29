<x-head></x-head>
    <x-menu></x-menu>
    <div class="bg-gray-100 flex h-screen items-center px-4 sm:px-6 lg:px-8">
    <div class="w-full space-y-8">
        <div class="bg-white shadow-md rounded-md p-6 px-20">

            <h2 class="my-3 text-3xl font-bold tracking-tight text-gray-900">
                Create post
            </h2>


            <form class="space-y-6" method="POST">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <div class="mt-1">
                        <input name="title" type="text" required
                            class="px-2 py-3 mt-1 block rounded-md border border-sky-700 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm bg-gray-100" />
                    </div>
                    @error('title')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <div class="mt-1">
                        <textarea name="description" required
                            class="px-2 py-3 mt-1 block w-1/2 resize-none rounded-md border border-sky-700 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm bg-gray-100"></textarea>
                    </div>
                    @error('description')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <div>
                    <label for="text" class="block text-sm font-medium text-gray-700">Content</label>
                    <div class="mt-1">
                        <textarea name="text" required
                            class="px-2 py-3 mt-1 block w-3/4 h-64 resize-none rounded-md border border-sky-700 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm bg-gray-100"></textarea>
                    </div>
                    @error('text')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="flex w-100 mx-auto justify-center rounded-md border border-transparent bg-sky-600 py-2 px-10 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">
                        Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<x-bottom></x-bottom>