@extends('layouts.app')

@section('content')

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

    {{-- HERO --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-10 pb-28 relative">

        <span class="uppercase tracking-[0.3em] text-[#8B6914] text-xs">
            About The Knotted Circle
        </span>

        <h1 class="mt-8 text-6xl md:text-8xl text-[#4A1517] leading-none"
            style="font-family: 'Cormorant Garamond', Georgia, serif;">
            More Than A Podcast.
            <span class="italic text-[#8B6914] block">
                A Place To Become.
            </span>
        </h1>

        <p class="mt-10 max-w-3xl mx-auto text-[#5A4032] text-lg leading-9">
            The Knotted Circle was created for people navigating faith,
            relationships, purpose and identity in seasons that don't fit
            neatly into categories.
        </p>

    </section>

</main>
    {{-- OUR STORY --}}
    <section class="py-24">
        <div class="max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-20 items-center">

            <div>
                <img src="{{ asset('images/founder.jpg') }}"
                     class="w-full object-cover"
                     alt="Founder">
            </div>

            <div>

                <span class="uppercase tracking-[0.3em] text-[#8B6914] text-xs">
                    Our Story
                </span>

                <h2 class="mt-6 text-5xl text-[#4A1517]"
                    style="font-family:'Cormorant Garamond', serif;">
                    Why "Knotted Circle"?
                </h2>

                <div class="mt-8 space-y-6 text-[#5A4032] leading-9 text-lg">

                    <p>
                        Knots are often seen as problems to solve or mistakes
                        to undo.
                    </p>

                    <p>
                        But knots also create strength. They hold things
                        together that would otherwise come apart.
                    </p>

                    <p>
                        The Knotted Circle exists because life rarely unfolds
                        in straight lines. Relationships become complicated.
                        Faith asks difficult questions. Purpose takes longer
                        than expected to reveal itself.
                    </p>

                    <p>
                        We believe those moments are not interruptions to the
                        story — they are the story.
                    </p>

                </div>

            </div>

        </div>
    </section>


    {{-- MISSION --}}
    <section class="bg-[#4A1517] py-28">
        <div class="max-w-5xl mx-auto px-6 text-center">

            <span class="uppercase tracking-[0.3em] text-[#BC9A5F] text-xs">
                Our Mission
            </span>

            <h2 class="mt-6 text-5xl text-white"
                style="font-family:'Cormorant Garamond', serif;">
                Creating Space For Honest Conversations
            </h2>

            <p class="mt-10 text-[#DCCEBE] text-lg leading-9">
                To create a community where people can explore faith,
                relationships, identity and purpose without pretending
                to have everything figured out.
            </p>

        </div>
    </section>


    {{-- VALUES --}}
    <section class="py-28">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-20">

                <span class="uppercase tracking-[0.3em] text-[#8B6914] text-xs">
                    What We Believe
                </span>

                <h2 class="mt-6 text-5xl text-[#4A1517]"
                    style="font-family:'Cormorant Garamond', serif;">
                    The Values That Shape Us
                </h2>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

                <div class="bg-white border border-[#E7DED1] p-10">
                    <h3 class="text-2xl text-[#4A1517] mb-5">Honesty</h3>
                    <p class="text-[#5A4032] leading-8">
                        Real conversations create real growth.
                    </p>
                </div>

                <div class="bg-white border border-[#E7DED1] p-10">
                    <h3 class="text-2xl text-[#4A1517] mb-5">Grace</h3>
                    <p class="text-[#5A4032] leading-8">
                        Growth is rarely linear and perfection isn't required.
                    </p>
                </div>

                <div class="bg-white border border-[#E7DED1] p-10">
                    <h3 class="text-2xl text-[#4A1517] mb-5">Community</h3>
                    <p class="text-[#5A4032] leading-8">
                        Becoming happens better together.
                    </p>
                </div>

                <div class="bg-white border border-[#E7DED1] p-10">
                    <h3 class="text-2xl text-[#4A1517] mb-5">Purpose</h3>
                    <p class="text-[#5A4032] leading-8">
                        Every season carries meaning.
                    </p>
                </div>

            </div>

        </div>
    </section>


    {{-- WHO THIS IS FOR --}}
    <section class="bg-[#F5EFE7] py-28">

        <div class="max-w-5xl mx-auto px-6 text-center">

            <span class="uppercase tracking-[0.3em] text-[#8B6914] text-xs">
                Who This Is For
            </span>

            <h2 class="mt-6 text-5xl text-[#4A1517]"
                style="font-family:'Cormorant Garamond', serif;">
                If You've Ever Felt In Between,
                You're In The Right Place.
            </h2>

            <div class="mt-12 grid md:grid-cols-2 gap-8 text-left">

                <div class="bg-white p-8 border border-[#E7DED1]">
                    ✓ Navigating relationships
                </div>

                <div class="bg-white p-8 border border-[#E7DED1]">
                    ✓ Asking deeper questions about faith
                </div>

                <div class="bg-white p-8 border border-[#E7DED1]">
                    ✓ Rediscovering purpose
                </div>

                <div class="bg-white p-8 border border-[#E7DED1]">
                    ✓ Learning to become who you're meant to be
                </div>

            </div>

        </div>

    </section>


    {{-- FOUNDER --}}
    <section class="py-28">
        <div class="max-w-5xl mx-auto px-6 text-center">

            <span class="uppercase tracking-[0.3em] text-[#8B6914] text-xs">
                Meet The Founder
            </span>

            <h2 class="mt-6 text-5xl text-[#4A1517]"
                style="font-family:'Cormorant Garamond', serif;">
                Your Name Here
            </h2>

            <p class="mt-10 text-[#5A4032] text-lg leading-9 max-w-3xl mx-auto">
                Replace this section with the founder's story, vision,
                experience and why The Knotted Circle matters to her.
            </p>

        </div>
    </section>


    {{-- CTA --}}
    <section class="bg-[#4A1517] py-28 text-center">

        <div class="max-w-4xl mx-auto px-6">

            <h2 class="text-white text-5xl"
                style="font-family:'Cormorant Garamond', serif;">
                Ready To Join The Conversation?
            </h2>

            <div class="mt-12 flex flex-col sm:flex-row justify-center gap-5">

                <a href="/join"
                   class="px-10 py-4 bg-[#BC9A5F] text-white uppercase tracking-widest text-xs">
                    Join The Circle
                </a>

                <a href="/podcast"
                   class="px-10 py-4 border border-[#BC9A5F]
                          text-[#BC9A5F]
                          uppercase tracking-widest text-xs">
                    Listen To The Podcast
                </a>

            </div>

        </div>

    </section>



@endsection