<x-head></x-head>
    <h1>Eco Blog/All posts</h1>

    <x-menu></x-menu>

    <div style="margin:20px; padding:15px">
        <h1 style="text-align:center">{{ $post['title'] }}</h1>
        <h3>{{ $post['description'] }}</h3>
        <p>{{ $post['text'] }}</p>
    </div>
<x-bottom></x-bottom>