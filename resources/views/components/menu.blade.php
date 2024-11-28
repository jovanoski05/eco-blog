<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/posts">Posts</a></li>

    @guest
        <li><a href="/register">Register</a></li>
        <li><a href="#">Log In</a></li>
    @endguest

    @auth
        <form method="POST" action="/logout">
            @csrf
            <li><button type="submit" href="#">logout</></li>
        </form>
    @endauth
</ul>