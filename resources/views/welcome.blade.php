@extends('layouts.app')

@section('content')

<!-- <main class="w-full relative min-h-screen" 
      style="background-image: linear-gradient(#F3EEE5 1px, transparent 1px), linear-gradient(90deg, #F3EEE5 1px, transparent 1px); background-size: 40px 40px; background-position: center top;">
    
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-10 pb-28 relative">
        
        <span class="text-[0.7rem] tracking-[0.25em] uppercase font-medium text-[#8B6914] block mb-6" style="font-family: 'Jost', sans-serif;">
            A Community & Podcast
        </span>
        <div class="flex justify-center mb-10">
            <img src="{{ asset('images/logo.jpg') }}" class="h-30 w-auto object-contain" alt="Logo">
        </div>

        
        <h1 class="font-serif text-6xl md:text-8xl text-[#4A1517] font-light leading-none tracking-wide mb-8" style="font-family: 'Cormorant Garamond', Georgia, serif;">
    The Knotted <br>
    <span class="italic text-[#8B6914] font-normal inline-block mt-2">Circle</span>
   </h1>
        
        <p class="font-serif text-lg md:text-xl italic text-[#4A2E1A] max-w-2xl mx-auto mb-8 leading-relaxed" style="font-family: 'EB Garamond', serif;">
            "Where threads of faith, relationship, and becoming are held together — not in spite of tension, but because of it."
        </p>

        <div class="text-[10px] tracking-[0.2em] uppercase font-semibold text-[#BC9A5F] mb-12 flex justify-center items-center gap-3" style="font-family: 'Montserrat', sans-serif;">
            <span>Proverbs 27:17</span>
            <span class="text-xs text-[#E5DCD0]">•</span>
            <span>Iron Sharpens Iron</span>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 max-w-md mx-auto">
            <a href="/join" class="w-full sm:w-1/2 px-8 py-4 bg-[#4A1517] text-white text-[11px] tracking-widest uppercase font-semibold hover:bg-[#340E10] transition-colors duration-200 text-center shadow-sm rounded-none">
                Join the Circle
            </a>
            <a href="/podcast" class="w-full sm:w-1/2 px-8 py-4 border border-[#4A1517] text-[#4A1517] text-[11px] tracking-widest uppercase font-semibold bg-[#FAF6F0]/80 hover:bg-[#4A1517] hover:text-white transition-colors duration-200 text-center rounded-none">
                Listen to the Podcast
            </a>
        </div>

        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 text-xs text-[#BC9A5F]">
            ✦
        </div>
    </section>


</main> -->

<main
    class="w-full relative min-h-screen overflow-hidden"
>
    {{-- Grid Overlay --}}
    <div
        class="absolute inset-0 pointer-events-none"
        style="
            background-image:
                linear-gradient(#E4D9C9 1px, transparent 1px),
                linear-gradient(90deg, #E4D9C9 1px, transparent 1px);
            background-size: 40px 40px;
            background-position: center top;

            mask-image: linear-gradient(
                to bottom,
                transparent 0px,
                transparent 100px,
                rgba(0,0,0,0.2) 140px,
                rgba(0,0,0,0.5) 180px,
                black 240px
            );

            -webkit-mask-image: linear-gradient(
                to bottom,
                transparent 0px,
                transparent 100px,
                rgba(0,0,0,0.2) 140px,
                rgba(0,0,0,0.5) 180px,
                black 240px
            );
        "
    ></div>
    
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-10 pb-28 relative">
        
        <span class="text-[0.7rem] tracking-[0.25em] uppercase font-medium text-[#8B6914] block mb-6" style="font-family: 'Jost', sans-serif;">
            A Community & Podcast
        </span>
        <div class="flex justify-center mb-10">
            <img src="{{ asset('images/logo.jpg') }}" class="h-30 w-auto object-contain" alt="Logo">
        </div>

        
        <h1 class="text-6xl md:text-8xl text-[#4A1517] font-light leading-none tracking-wide mb-8" style="font-family: 'Cormorant Garamond', Georgia, serif;">
            The Knotted <br>
            <span class="italic text-[#8B6914] font-normal inline-block mt-2">Circle</span>
        </h1>
        
        <p class="font-serif text-lg md:text-xl italic text-[#4A2E1A] max-w-2xl mx-auto mb-8 leading-relaxed" style="font-family: 'EB Garamond', serif;">
            "Where threads of faith, relationship, and becoming are held together — not in spite of tension, but because of it."
        </p>

        <div class="text-[10px] tracking-[0.2em] uppercase font-semibold text-[#BC9A5F] mb-12 flex justify-center items-center gap-3" style="font-family: 'Montserrat', sans-serif;">
            <span>Proverbs 27:17</span>
            <span class="text-xs text-[#E5DCD0]">•</span>
            <span>Iron Sharpens Iron</span>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 max-w-md mx-auto">
            <a href="/join" class="w-full sm:w-1/2 px-8 py-4 bg-[#4A1517] text-white text-[11px] tracking-widest uppercase font-semibold hover:bg-[#340E10] transition-colors duration-200 text-center shadow-sm rounded-none">
                Join the Circle
            </a>
            <a href="/podcast" class="w-full sm:w-1/2 px-8 py-4 border border-[#4A1517] text-[#4A1517] text-[11px] tracking-widest uppercase font-semibold bg-[#FAF6F0]/80 hover:bg-[#4A1517] hover:text-white transition-colors duration-200 text-center rounded-none">
                Listen to the Podcast
            </a>
        </div>

        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 text-xs text-[#BC9A5F]">
            ✦
        </div>
    </section>


</main>

{{-- ================= ABOUT ================= --}}
<section class="py-28">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <span class="uppercase tracking-[0.3em] text-[#8B6914] text-xs font-semibold">
            About The Circle
        </span>

        <h2 class="mt-6 text-4xl md:text-6xl text-[#4A1517] leading-tight"
            style="font-family: 'Cormorant Garamond', serif;">
            A Community Built Around
            Faith, Relationships & Becoming
        </h2>

        <p class="mt-10 text-[#5A4032] leading-9 text-lg max-w-3xl mx-auto">
            The Knotted Circle exists for people navigating faith,
            identity, relationships and purpose in seasons that rarely
            unfold in straight lines.
        </p>

        <p class="mt-6 text-[#5A4032] leading-9 text-lg max-w-3xl mx-auto">
            We believe growth happens in community and that some of life's
            deepest lessons are discovered in the spaces between certainty
            and becoming.
        </p>

        <a href="/about"
           class="inline-block mt-12 border border-[#4A1517] text-[#4A1517]
                  px-8 py-4 uppercase tracking-[0.2em] text-xs
                  hover:bg-[#4A1517] hover:text-white transition">
            Learn More
        </a>

    </div>
</section>


{{-- ================= COMMUNITY PILLARS ================= --}}
<section class="bg-[#4A1517] py-32 text-[#FDFBF7]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-24">
            <span class="uppercase tracking-[0.3em] text-[#BC9A5F] text-xs font-semibold font-sans">
                What We Explore
            </span>
            <h2 class="mt-6 text-4xl md:text-6xl font-light tracking-wide style="font-family: 'EB Garamond', serif;">
                Conversations Worth <span class="italic text-[#BC9A5F]">Staying For</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 text-left">
            <div class="border-t border-[#6D3032] pt-8 group">
                <div class="text-[#BC9A5F] text-lg mb-4 transition-transform duration-300 group-hover:scale-120">♠</div>
                <h3 class="text-white text-2xl font-serif font-normal mb-4">Faith</h3>
                <p class="text-[#DCCEBE] font-sans font-light text-sm leading-7">
                    Honest conversations about belief, growth, and grace in modern structures.
                </p>
            </div>

            <div class="border-t border-[#6D3032] pt-8 group">
                <div class="text-[#BC9A5F] text-lg mb-4 transition-transform duration-300 group-hover:scale-120">♥</div>
                <h3 class="text-white text-2xl font-serif font-normal mb-4">Relationships</h3>
                <p class="text-[#DCCEBE] font-sans font-light text-sm leading-7">
                    Sustained stories of modern friendship, intentional love, and authentic connections.
                </p>
            </div>

            <div class="border-t border-[#6D3032] pt-8 group">
                <div class="text-[#BC9A5F] text-lg mb-4 transition-transform duration-300 group-hover:scale-120">♦</div>
                <h3 class="text-white text-2xl font-serif font-normal mb-4">Purpose</h3>
                <p class="text-[#DCCEBE] font-sans font-light text-sm leading-7">
                    Uncovering alignment and professional mapping paradigms across changing intervals.
                </p>
            </div>

            <div class="border-t border-[#6D3032] pt-8 group">
                <div class="text-[#BC9A5F] text-lg mb-4 transition-transform duration-300 group-hover:scale-120">♣</div>
                <h3 class="text-white text-2xl font-serif font-normal mb-4">Community</h3>
                <p class="text-[#DCCEBE] font-sans font-light text-sm leading-7">
                    Walking alongside partners who appreciate complex paths without demand for compliance.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- ================= FEATURED PODCAST ================= --}}
<section class="py-28">
    <div class="max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

        <div class="bg-[#4A1517] p-16 aspect-square flex flex-col justify-center items-center text-center">

            <img src="{{ asset('images/logo.jpg') }}"
                 class="w-24 mb-8 opacity-90"
                 alt="Podcast">

            <h3 class="text-4xl text-white mb-4"
                style="font-family: 'Cormorant Garamond', serif;">
                The Knotted Circle Podcast
            </h3>

            <p class="text-[#DCCEBE]">
                Conversations that stay with you long after they end.
            </p>

        </div>

        <div>

            <span class="uppercase tracking-[0.3em] text-[#8B6914] text-xs">
                Featured Podcast
            </span>

            <h2 class="mt-6 text-5xl text-[#4A1517]"
                style="font-family: 'Cormorant Garamond', serif;">
                Stories For The In-Between Seasons
            </h2>

            <p class="mt-8 text-[#5A4032] text-lg leading-9">
                Weekly conversations about relationships, purpose,
                faith and becoming with people who have learned to
                carry tension without losing themselves in it.
            </p>

            <a href="/podcast"
               class="inline-block mt-10 px-8 py-4 bg-[#4A1517]
                      text-white uppercase tracking-widest text-xs
                      hover:bg-[#340E10] transition">
                Explore Episodes
            </a>

        </div>

    </div>
</section>


{{-- ================= TESTIMONIALS ================= --}}
<section class="py-28 overflow-visible">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-20">
            <span class="uppercase tracking-[0.3em] text-[#8B6914] text-xs">
                Community Voices
            </span>

            <h2 class="mt-6 text-5xl text-[#4A1517]"
                style="font-family:'Cormorant Garamond', serif;">
                What People Are Saying
            </h2>
        </div>

       <div class="swiper testimonialSwiper ">

            <div class="swiper-wrapper">

                <!-- Card 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-card bg-white p-10 border border-[#E7DED1]">

                        <div class="text-[#BC9A5F] text-5xl mb-6">“</div>

                        <p class="italic text-[#5A4032] leading-8 text-lg flex-grow">
                            The conversations here gave me language for things
                            I had been carrying for years.
                        </p>

                        <div class="mt-auto pt-6 border-t border-[#EFE6DA]">
                            <p class="uppercase tracking-[0.2em] text-xs text-[#8B6914]">
                                Community Member
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Card 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-card bg-white p-10 border border-[#E7DED1]">

                        <div class="text-[#BC9A5F] text-5xl mb-6">“</div>

                        <p class="italic text-[#5A4032] leading-8 text-lg flex-grow">
                            It feels less like content and more like a place
                            where people genuinely belong.
                        </p>

                        <div class="mt-auto pt-6 border-t border-[#EFE6DA]">
                            <p class="uppercase tracking-[0.2em] text-xs text-[#8B6914]">
                                Podcast Listener
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Card 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-card bg-white p-10 border border-[#E7DED1]">

                        <div class="text-[#BC9A5F] text-5xl mb-6">“</div>

                        <p class="italic text-[#5A4032] leading-8 text-lg flex-grow">
                            The Knotted Circle reminded me that growth doesn't
                            have to happen alone.
                        </p>

                        <div class="mt-auto pt-6 border-t border-[#EFE6DA]">
                            <p class="uppercase tracking-[0.2em] text-xs text-[#8B6914]">
                                Newsletter Subscriber
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Card 4 -->
                <div class="swiper-slide">
                    <div class="testimonial-card bg-white p-10 border border-[#E7DED1]">

                        <div class="text-[#BC9A5F] text-5xl mb-6">“</div>

                        <p class="italic text-[#5A4032] leading-8 text-lg flex-grow">
                            Every episode feels like sitting with friends who
                            understand exactly where you are.
                        </p>

                        <div class="mt-auto pt-6 border-t border-[#EFE6DA]">
                            <p class="uppercase tracking-[0.2em] text-xs text-[#8B6914]">
                                Listener
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Card 5 -->
                <div class="swiper-slide">
                    <div class="testimonial-card bg-white p-10 border border-[#E7DED1]">

                        <div class="text-[#BC9A5F] text-5xl mb-6">“</div>

                        <p class="italic text-[#5A4032] leading-8 text-lg flex-grow">
                            This community helped me realize that uncertainty
                            is not failure. It's part of becoming.
                        </p>

                        <div class="mt-auto pt-6 border-t border-[#EFE6DA]">
                            <p class="uppercase tracking-[0.2em] text-xs text-[#8B6914]">
                                Circle Member
                            </p>
                        </div>

                    </div>
                </div>

            </div>

            <div class="swiper-pagination mt-10 relative"></div>

        </div>

    </div>
</section>


{{-- ================= NEWSLETTER ================= --}}
<section class="py-28">
    <div class="max-w-3xl mx-auto px-6 text-center">

        <span class="uppercase tracking-[0.3em] text-[#8B6914] text-xs">
            Stay Connected
        </span>

        <h2 class="mt-6 text-5xl text-[#4A1517]"
            style="font-family: 'Cormorant Garamond', serif;">
            Join The Woven Letter
        </h2>

        <p class="mt-8 text-[#5A4032] text-lg leading-8">
            Reflections, updates and conversations delivered directly
            to your inbox.
        </p>

        <div class="mt-12 flex flex-col sm:flex-row gap-4 max-w-2xl mx-auto">

            <input
                type="email"
                placeholder="Your email address"
                class="flex-1 px-6 py-4 border border-[#D8CDBF]
                       bg-white focus:outline-none
                       focus:border-[#8B6914]"
            >

            <button class="px-10 py-4 bg-[#4A1517] text-white
                           uppercase tracking-[0.2em] text-xs
                           hover:bg-[#340E10] transition">
                Subscribe
            </button>

        </div>

    </div>
</section>


{{-- ================= FINAL CTA ================= --}}
<section class="bg-[#4A1517] py-28 text-center">
    <div class="max-w-4xl mx-auto px-6">

        <h2 class="text-white text-5xl leading-tight"
            style="font-family: 'Cormorant Garamond', serif;">
            You Don't Have To Navigate Becoming Alone
        </h2>

        <p class="mt-8 text-[#DCCEBE] text-lg leading-8">
            Join a growing community committed to meaningful
            conversations and authentic connection.
        </p>

        <div class="mt-12 flex flex-col sm:flex-row justify-center gap-5">

            <a href="/join"
               class="px-10 py-4 bg-[#BC9A5F] text-white
                      uppercase tracking-[0.2em] text-xs">
                Join The Circle
            </a>

            <a href="/podcast"
               class="px-10 py-4 border border-[#BC9A5F]
                      text-[#BC9A5F]
                      uppercase tracking-[0.2em] text-xs
                      hover:bg-[#BC9A5F]
                      hover:text-white transition">
                Listen To The Podcast
            </a>

        </div>

    </div>
</section>

@endsection