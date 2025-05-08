<footer class="bg-zinc-900 px-24 text-white pt-20 pb-10 flex flex-col gap-16 max-lg:px-10">
    <div class="flex flex-col md:flex-row justify-between gap-12 w-full">
        <div class="flex flex-col gap-3 max-w-md">
            <h3 class="text-2xl font-bold tracking-widest text-orange-400">SmartStyle</h3>
            <p class="text-gray-300 text-sm leading-relaxed">
                SmartStyle is a smart hairstyle recommendation system that helps you discover the best hairstyle based on your unique characteristics and preferences. We aim to provide reliable and easy-to-access suggestions to help you feel confident every day.
            </p>
        </div>
        <div class="flex flex-col gap-3">
            <h3 class="text-lg font-semibold text-white">Contact Us</h3>
            <div class="flex flex-col gap-2 text-sm text-gray-300">
                <a href="wa.me" class="flex items-center gap-3 hover:text-orange-400 transition">
                    <img src="{{ asset('/assets/icons/whatsapp.svg') }}" alt="WhatsApp" class="w-5">
                    +62 812 6036 6275
                </a>
                <a href="mailto:" class="flex items-center gap-3 hover:text-orange-400 transition">
                    <img src="{{ asset('/assets/icons/gmail.svg') }}" alt="Gmail" class="w-5">
                    smartsyle@gmail.com
                </a>
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <h3 class="text-lg font-semibold text-white">Quick Links</h3>
            <ul class="text-sm text-gray-300 space-y-1">
                <li><a href="/" class="hover:text-orange-400 transition">Home</a></li>
                <li><a href="/hair-style" class="hover:text-orange-400 transition">Hair Style</a></li>
                <li><a href="/#about-us" class="hover:text-orange-400 transition">About Us</a></li>
            </ul>
        </div>
        <div class="flex flex-col gap-3">
            <h3 class="text-lg font-semibold text-white">Follow Us</h3>
            <div class="flex gap-4">
                @foreach (['instagram', 'twitter', 'youtube', 'tiktok'] as $icon)
                    <div class="border border-gray-400 rounded-full p-2 hover:bg-orange-500 hover:border-orange-500 transition-all cursor-pointer">
                        <img src="{{ asset("/assets/icons/{$icon}.svg") }}" alt="" class="w-4 h-4">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="text-center text-sm text-gray-400 border-t border-gray-700 pt-6">
        &copy; 2025 SmartStyle. All rights reserved.
    </div>
</footer>
