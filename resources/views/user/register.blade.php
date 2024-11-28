<x-head></x-head>
    <h1>Eco Blog/All posts</h1>

    <x-menu></x-menu>

    <h1>Register user</h1>

    <form method="POST">
        @csrf
        <div style="margin:20px">
            <label for="email">Email</label>
            <input id="email" name="email" type="email">
            @error('email')
                <x-error-message>{{ $message }}</x-error-message>
            @enderror
        </div>

        <div style="margin:20px">
            <label for="name">Name</label>
            <input id="name" name="name" type="text">
            @error('username')
                <x-error-message>{{ $message }}</x-error-message>
            @enderror
        </div>

        <div style="margin:20px">
            <label for="password">Password</label>
            <input id="password" name="password" type="password">
            @error('password')
                <x-error-message>{{ $message }}</x-error-message>
            @enderror
        </div>

        <div style="margin:20px">
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password">
            @error('password_confirmation')
                <x-error-message>{{ $message }}</x-error-message>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>
<x-bottom></x-bottom>