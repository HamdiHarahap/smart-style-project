<?php 
    $no = 1;
?>

<x-layout title="SmartStyle | Questions Page">
    <section class="py-24 px-6 max-w-4xl mx-auto max-sm:px-4 max-sm:py-32">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800">Hair Style Recommendation</h1>
            <p class="text-lg text-gray-600 mt-2">Answer the questions below according to your criteria</p>
        </div>
        <form action="{{ route('store') }}" method="POST" class="space-y-10">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="nama" class="font-medium text-gray-700">Name</label>
                    <input type="text" id="nama" name="nama" required class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" placeholder="Your name">
                </div>
                <div>
                    <label for="email" class="font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" placeholder="example@gmail.com">
                </div>
            </div>
            <div id="hair-type-options">
                <p class="font-semibold text-lg mb-3">{{ $no++ }}. What is your hair type?</p>
                <div class="flex flex-wrap gap-4 ml-2">
                    @foreach ($hairTypes as $item)
                        <input type="radio" id="hair-type-{{ $loop->index }}" {{ $loop->first ? 'required' : '' }}  name="hair_type" value="{{ $item->nama }}" class="hidden">
                        <label for="hair-type-{{ $loop->index }}" class="px-6 py-3 bg-white border border-gray-300 rounded-xl shadow-sm cursor-pointer transition hover:bg-orange-100 font-medium text-gray-700">
                            {{ $item->nama }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div id="face-shape-options">
                <p class="font-semibold text-lg mb-3">{{ $no++ }}. What is your face shape?</p>
                <div class="flex flex-wrap gap-4 ml-2">
                    @foreach ($faceShapes as $item)
                        <input type="radio" id="face-shape-{{ $loop->index }}" {{ $loop->first ? 'required' : '' }}  name="face_shape" value="{{ $item->nama }}" class="hidden">
                        <label for="face-shape-{{ $loop->index }}" class="px-6 py-3 bg-white border border-gray-300 rounded-xl shadow-sm cursor-pointer transition hover:bg-orange-100 font-medium text-gray-700">
                            {{ $item->nama }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div id="activity-options">
                <p class="font-semibold text-lg mb-3">{{ $no++ }}. What is your daily activity?</p>
                <div class="flex flex-wrap gap-4 ml-2">
                    @foreach ($activities as $item)
                        <input type="radio" id="activity-{{ $loop->index }}" {{ $loop->first ? 'required' : '' }}  name="activity" value="{{ $item->nama }}" class="hidden">
                        <label for="activity-{{ $loop->index }}" class="px-6 py-3 bg-white border border-gray-300 rounded-xl shadow-sm cursor-pointer transition hover:bg-orange-100 font-medium text-gray-700">
                            {{ $item->nama }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-md shadow transition">
                    Submit
                </button>
            </div>
        </form>
    </section>

    <script>
        function setupRadioHighlight(groupId) {
            const container = document.getElementById(groupId);
            const labels = container.querySelectorAll('label');
            const radios = container.querySelectorAll('input[type="radio"]');

            labels.forEach((label, index) => {
                label.addEventListener('click', () => {
                    labels.forEach(l => {
                        l.classList.remove('bg-orange-500', 'text-white', 'border-orange-500');
                        l.classList.add('bg-white', 'text-gray-700', 'border-gray-300');
                    });

                    setTimeout(() => {
                        radios.forEach((radio, idx) => {
                            if (radio.checked) {
                                labels[idx].classList.add('bg-orange-500', 'text-white', 'border-orange-500');
                                labels[idx].classList.remove('bg-white', 'text-gray-700', 'border-gray-300');
                            }
                        });
                    }, 10);
                });
            });
        }

        setupRadioHighlight('hair-type-options');
        setupRadioHighlight('face-shape-options');
        setupRadioHighlight('activity-options');
    </script>
</x-layout>

<x-btn_navigation></x-btn_navigation>
