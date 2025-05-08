<x-layout title="SmartStyle | Home Page">
    <section class="bg-zinc-900 pt-24 pb-60 text-white px-44 flex flex-col relative max-sm:px-4 max-sm:pb-28 max-lg:px-10">
        <div class="flex justify-between py-16 max-sm:flex-col max-sm:gap-10">
            <h1 class="text-7xl font-medium tracking-widest max-sm:text-6xl w-[40rem] max-sm:w-[20rem]">
                IT'S COOLER TO BE YOURSELF
            </h1>              
            <div class="flex flex-col gap-6">   
                <p class="text-zinc-400">Get hairstyle recommendations tailored <br> 
                    to your hair type, face shape, and daily routine <br> 
                    to enhance your personal style effortlessly.
                </p>
                <a href="/question"class="px-5 py-2 rounded-md bg-white text-black font-semibold w-fit hover:bg-gray-200 transition">Try it now</a>
            </div>
        </div>
        <div class="absolute left-44 right-44 -bottom-52 max-sm:left-4 max-sm:right-4 max-sm:-bottom-14 max-lg:left-10 max-lg:right-10">
            <img src="{{ asset('/assets/images/hero.jpg') }}" class="rounded-md" alt="">
        </div>
    </section>
    <section id="about-us" class="min-h-screen pt-80 pb-40 px-44 bg-white text-black max-sm:px-4 max-sm:pt-28 max-sm:py-20 max-lg:px-10 max-lg:pb-20">
        <h1 class="text-7xl font-medium tracking-widest mb-12 max-sm:text-6xl">ABOUT US</h1>
        <div class="text-xl leading-relaxed max-w-4xl">
            <p class="mb-6">
                <span class="font-semibold">SmartStyle</span> is a smart expert system designed to help you discover the perfect hairstyle—
                tailored just for you. Whether you have straight or curly hair, a round or square face, or a busy or chill daily routine,
                our system analyzes your unique features to recommend styles that truly fit your vibe.
            </p>
            <p class="mb-6">
                Powered by rule-based logic and backed by hairstyling expertise, SmartStyle takes the guesswork out of grooming.
                It's like having your personal stylist available 24/7—accessible anytime, anywhere.
            </p>
            <p>
                We believe everyone deserves to feel confident and authentic in their appearance. That's why we built SmartStyle: 
                to make it easier for you to express who you are, starting with your hair.
            </p>
        </div>
    </section>
    <section class="px-44 py-32 text-black bg-gray-200 max-sm:px-4 max-sm:py-20 max-lg:px-10">
        <h1 class="text-7xl font-medium tracking-widest mb-16 text-center max-sm:text-6xl">HOW IT WORKS</h1>
        <div class="grid grid-cols-3 gap-12 text-center max-sm:grid-cols-1">
            <div>
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-zinc-900 text-white flex items-center justify-center text-3xl font-bold">1</div>
                <h3 class="text-2xl font-semibold mb-2">Input Your Features</h3>
                <p class="text-zinc-600">Answer simple questions about your hair type, face shape, and daily routine.</p>
            </div>
            <div>
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-zinc-900 text-white flex items-center justify-center text-3xl font-bold">2</div>
                <h3 class="text-2xl font-semibold mb-2">Let the System Analyze</h3>
                <p class="text-zinc-600">Our expert system evaluates your inputs using rule-based logic and hairstyling knowledge.</p>
            </div>
            <div>
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-zinc-900 text-white flex items-center justify-center text-3xl font-bold">3</div>
                <h3 class="text-2xl font-semibold mb-2">Get Your Style</h3>
                <p class="text-zinc-600">Receive personalized hairstyle recommendations that suit your unique vibe and lifestyle.</p>
            </div>
        </div>
    </section>    
    <section class="px-44 py-28 max-sm:px-4 max-sm:py-20 max-lg:px-10">
        <div class="flex items-center gap-6">
            <h1 class="text-7xl font-medium tracking-widest whitespace-nowrap max-sm:text-5xl max-sm:text-wrap">
                GET TO KNOW YOUR
            </h1>
            <div class="h-1 bg-black flex-1 max-sm:hidden max-lg:hidden"></div>
        </div>
        <h1 class="text-7xl font-medium tracking-widest mt-2 max-sm:text-5xl">HAIR TYPE</h1>
        <p class="text-xl text-zinc-600 mt-6 max-w-3xl">
            Understanding your hair type is the first step to finding the most flattering and manageable hairstyle for your everyday life.
        </p>
        <div class="flex justify-between mt-10 max-sm:flex-col">
            <div class="flex flex-col items-center">
                <img src="{{ asset('/assets/images/straight.png') }}" alt="" class="w-64">
                <h3 class="font-bold text-xl">STRAIGHT</h3>
                <p class="font-medium">1A | 1B | 1C</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('/assets/images/wavy.png') }}" alt="" class="w-64">
                <h3 class="font-bold text-xl">WAVY</h3>
                <p class="font-medium">2A | 2B | 2C</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('/assets/images/curly.png') }}" alt="" class="w-64">
                <h3 class="font-bold text-xl">CURLY</h3>
                <p class="font-medium">3A | 3B | 3C</p>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('/assets/images/coily.png') }}" alt="" class="w-64">
                <h3 class="font-bold text-xl">COILY</h3>
                <p class="font-medium">4A | 4B | 4C</p>
            </div>
        </div>
    </section> 
</x-layout>

<x-btn_navigation></x-btn_navigation>