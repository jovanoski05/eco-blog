<x-head></x-head>
    <x-menu></x-menu>
    <div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div class="bg-white shadow-md rounded-md p-6">

            <img class="mx-auto h-12 w-auto" src="/images/logo_dark.png" alt="" />

            <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">
                API Key
            </h2>

            <p class="my-3 text-center text-2xl font-bold tracking-tight text-gray-900">
                Your API key is: {{$key}}
            </p>
        </div>
    </div>
</div>
<x-bottom></x-bottom>