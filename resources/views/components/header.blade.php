<header class="navbar px-24 py-5 max-[520px]:px-4 fixed w-full z-40 text-white transition ease-in max-sm:bg-white max-sm:text-black max-lg:px-10 {{ Request::is('question') || Request::is('rekomendasi') || Request::is('hair-style') ? 'bg-white' : '' }}">
    <nav class="flex items-center min-[520px]:justify-between max-sm:flex-col max-sm:gap-10">
        <div class="flex max-sm:w-full justify-between">  
            <a href="/" class="text-3xl font-bold tracking-widest">SmartStyle</a>
            <img src="{{ asset('/assets/icons/menu.svg') }}" alt="" class="w-6 hidden max-[520px]:flex cursor-pointer btn-menu">
        </div>
        <div class="max-sm:mr-auto max-[520px]:hidden menu-list"> 
            <ul class="flex gap-5 font-semibold max-sm:flex-col max-sm:pb-4">
                <li><a href="/" class="hover:text-orange-500 hover:underline">Home</a></li>
                <li><a href="/hair-style" class="hover:text-orange-500 hover:underline">Hair Style</a></li>
                <li><a href="/#about-us" class="hover:text-orange-500 hover:underline">About Us</a></li>
            </ul>
        </div>
    </nav>
</header>
