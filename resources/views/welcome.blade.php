<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>salim</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <!-- Ensure your Tailwind CSS is linked here -->
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white">
        <div class="container mx-auto px-4">
            <!-- Title for the catalog -->
            <h1 class="text-center mb-4 text-3xl font-extrabold leading-none tracking-tight border-gray-700 sm:text-4xl md:text-5xl lg:text-6xl">
                Vividora Perfumes Catalog
            </h1>

            <!-- Paragraph with smaller text on phones -->
            <p class="mx-4 sm:mx-8 text-base font-normal text-gray-400 lg:text-xl">
                Discover our collection of exquisite perfumes, where technology, innovation, and craftsmanship combine to bring you the best scents.
            </p>
            <hr class="my-4 border-gray-700">

            <!-- Catalog List -->
            <div class="mx-4 sm:mx-8 px-4 sm:px-16">
                <ul role="list" class="divide-y divide-gray-700">
                    @foreach($products as $product)
                    <li class="flex flex-col sm:flex-row justify-between gap-y-4 sm:gap-x-6 py-5">
                        <div class="flex items-center gap-x-4">
                            <!-- Product Image -->
                            <img class="w-20 h-20 flex-none rounded-full bg-gray-50" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold text-white">{{ $product->name }}</p>
                                <p class="text-sm text-gray-400">{{ $product->price }} DH</p>
                            </div>
                        </div>
                        <!-- WhatsApp Order Button -->
                        <a href="https://wa.me/212621531141?text=Bonjour%2C%20je%20veux%20commander%20{{ urlencode($product->name) }}%20pour%20{{ $product->price }}DH"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-400">
                            Commander via WhatsApp
                        </a>
                    </li>
                    @endforeach
                </ul>
                {{ $products->links() }}
            </div>
        </div>
    </body>
</html>
