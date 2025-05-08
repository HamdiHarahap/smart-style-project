<x-layout title="SmartStyle | Recommendation">
    <section class="px-6 pt-32 pb-20 max-w-7xl mx-auto">
        <div class="bg-white shadow-xl rounded-2xl p-10 max-sm:p-4 max-sm:pb-10">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-10 tracking-wide max-sm:text-3xl">Hairstyle Recommendations</h1>

            @if (empty($nama) || empty($email) || empty($hair_style))
                <div class="text-center text-lg text-gray-700">
                    <p>No recommendations found. Please complete the form first.</p>
                </div>
            @else
                <div class="mb-10 space-y-2 text-center text-lg text-gray-700">
                    <p><span class="font-semibold text-gray-800">Name:</span> {{ $nama }}</p>
                    <p><span class="font-semibold text-gray-800">Email:</span> {{ $email }}</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                    @foreach ($hair_style as $item)
                        <div class="bg-gray-50 shadow-md rounded-xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
                            <img src="{{ asset('/storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-64 object-cover">
                            <div class="p-5 text-center">
                                <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $item->nama }}</h2>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-12 text-center">
                <a href="/" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-full shadow-md transition duration-300">
                    Back to Home
                </a>
            </div>
        </div>
    </section>
</x-layout>

<x-btn_navigation />
