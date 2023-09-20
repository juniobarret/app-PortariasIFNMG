<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if (session('message'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded-md text-center">
            {{ session('message') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-500 text-white p-4 mb-4 rounded-md text-center">
            {{ session('error') }}
        </div>
    @endif
</div>