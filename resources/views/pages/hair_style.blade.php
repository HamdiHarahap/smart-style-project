<x-layout title="SmartStyle | Hair Style Page">
    <section class="px-44 pt-28 pb-20 max-sm:px-4 max-sm:py-32 max-lg:px-10">
        <div class="text-center mb-16 max-sm:w-full">
            <h1 class="text-5xl font-bold tracking-wide text-gray-900 max-sm:text-4xl">Explore Popular Hairstyles</h1>
            <p class="mt-4 text-zinc-500 text-lg">Find inspiration and choose from a curated list of trendy looks</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($hairstyles as $item)
                <div class="relative group rounded-md overflow-hidden shadow-md cursor-pointer">
                    <img src="{{ asset('/storage/' . $item->gambar) }}"
                         alt="{{ $item->nama }}"
                         class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-110">
                    
                    <div class="absolute inset-0 bg-black flex flex-col justify-center items-center text-center text-white opacity-0 group-hover:opacity-80 transition duration-300 p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $item->nama }}</h2>
                        <p class="text-sm text-zinc-200">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-24 bg-zinc-100 rounded-2xl p-10 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-4">Want to know which hairstyle suits you best?</h3>
            <p class="text-zinc-500 mb-6">Answer a few quick questions to get personalized recommendations based on your hair type, face shape, and daily lifestyle.</p>
            <a href="/question"
               class="inline-block bg-black text-white px-6 py-3 rounded-full font-semibold hover:bg-zinc-800 transition">
                Get My Recommendation
            </a>
        </div>
    </section>
</x-layout>

<x-btn_navigation></x-btn_navigation>