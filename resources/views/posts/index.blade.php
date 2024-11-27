<x-head></x-head>
    <h1>Eco Blog/All posts</h1>

    <x-menu></x-menu>

    @foreach($posts as $post)
    <div style="margin-left:20px; padding:15px; border:solid; display:inline-block">
        <a href="/posts/{{ $post['id'] }}"><h2>{{ $post['title'] }}</h2></a>
        <p>{{ $post['description'] }}</p>
    </div>
    @endforeach
<x-bottom></x-bottom>