<x-head></x-head>
    <h1>Eco Blog/All posts</h1>

    <x-menu></x-menu>

    <h1>Create post</h1>

    <form method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </div>

        <div>
            <label for="text">Text</label>
            <textarea name="text" id="text"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>


<x-bottom></x-bottom>