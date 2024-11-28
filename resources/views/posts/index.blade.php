<x-head></x-head>
    <x-menu></x-menu>

    <div class="bg-gray-200 py-8">
            <div class="container mx-auto px-4">
                <span class="text-4xl font-bold text-gray-800 ml-20 mb-2"><Blog class="underline decoration-blue-600 underline-offset-4">All Blog Posts</span></h1>
            </div>
        </div>

    @foreach($posts as $post)
    <div class="px-4 mt-16 ml-20">
        <div class="container mx-auto py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden shadow-xl" style="outline: 2px solid rgb(135, 135, 135);">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $post->title}}</h2>
                        <p class="text-gray-600">{{ $post->description }}</p>
                            <p class="mt-5">Author: {{ $post->author->name }}</p>
                    </div>
                    <div class="bg-gray-200 px-6 py-4">
                        <a href="/posts/{{$post->id}}" class="text-blue-600 font-medium hover:text-blue-800">Learn more</a>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    @endforeach
<x-bottom></x-bottom>