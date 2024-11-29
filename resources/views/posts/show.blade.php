<x-head></x-head>
    <x-menu></x-menu>

    <div class="flex flex-col">
        <div class="bg-gray-200 py-8">
            <div class="container mx-auto px-4">
                <span class="text-4xl font-bold text-gray-800 ml-20 mb-2"><Blog class="underline decoration-blue-600 underline-offset-4">{{ $post->title }}</span></h1>
                <p class="ml-20 text-gray-600">Description: {{ $post->description }} </p>
            </div>
        </div>
        <div class="bg-white py-8">
            <div class="container mx-auto px-4 flex flex-col md:flex-row">
                <div class="w-full md:w-3/4 px-4 px-10" style="white-space: pre-wrap;">{{$post->text}}
                </div>
                <div class="w-full md:w-1/4 px-4">
                    <div class="bg-sky-100 p-4 shadow-xl">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Posts</h2>
                        <ul class="list-none">
                            @foreach($recents as $recent)
                            <li class="mb-2">
                                <a href="/posts/{{$recent->id}}" class="text-gray-700 hover:text-gray-900">{{$recent->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-sky-100 p-4 mt-4 shadow-xl">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Forcast for tomorrow (PM 10)</h2>
                        <ul class="list-none">
                            <li class="mb-2">
                                <a href="#" class="text-gray-700 hover:text-gray-900">00:00 
                                    <span class="dot" style="height: 5px; width: 5px; background-color: #ff0000; border-radius: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%); display: inline-block;"></span></a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-gray-700 hover:text-gray-900">01:00 <span class="dot" style="height: 5px; width: 5px; background-color: #ff0000; border-radius: 50%; -ms-transform: translateY(-50%); transform: translateY(-50%); display: inline-block;"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    
        </div>
        @auth
                @if(Auth::user()['id'] == $post->author->id)
                    <form method="POST" class="ml-10">
                        @csrf
                        @method('delete')
                        <button type="Submit" class="bg-white text-red-900 font-semibold px-8 py-3 rounded-full hover:bg-red-100 transition duration-300 text-center">Delete</button>
                    </form>
                @endif

                @endauth
    </div>
<x-bottom></x-bottom>