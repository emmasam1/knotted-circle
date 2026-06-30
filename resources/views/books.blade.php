@extends('layouts.app')

@section('content')
@php
    // 1. Define 20 dummy books with varying format availability types
    $allBooks = [];
    $titles = ['The Anchored Mind', 'Paths of the Knotted Circle', 'Bridges of Clarity', 'Silent Symphonies', 'Shadows & Starlight', 'The Intentional Framework', 'Echoes of Purpose', 'Threads of Resilience', 'The Art of Unlearning', 'Navigating Chaos'];
    $authors = ['Saina Osifade', 'Elena Vance', 'Marcus Cole', 'Amina Bello'];
    $excerpts = [
        "Chapter 1: The Circle Begins. True clarity isn't the absence of noise, but the quiet center you construct within it. When we tie ourselves to intentional frameworks, the horizon clarifies...",
        "Introduction: The Architecture of Purpose. We spend lifetimes building walls instead of bridges. This volume breaks down the geometric realities of personal and creative boundaries...",
        "Chapter 3: Unlearning the Script. To grow, one must dismantle the structural assumptions inherited from early career design modules. True expansion requires intentional blank slates..."
    ];

    for ($i = 1; $i <= 20; $i++) {
        $title = $titles[($i - 1) % count($titles)] . " (Vol. " . ceil($i / 10) . ")";
        
        // Stagger format availability types
        if ($i % 3 === 0) { $type = 'physical_only'; }
        elseif ($i % 3 === 1) { $type = 'ebook_only'; }
        else { $type = 'both'; }

        $allBooks[] = [
            'id' => $i,
            'title' => $title,
            'author' => $authors[$i % count($authors)],
            'description' => 'An insightful exploration into balancing focus, modern frameworks, and conscious creative direction.',
            'excerpt' => $excerpts[$i % count($excerpts)],
            'type' => $type,
            'physical_price' => 7500 + ($i * 250),
            'ebook_price' => 3500 + ($i * 150),
            'image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=400',
        ];
    }

    // 2. Pagination Configuration
    $perPage = 8;
    $currentPage = request()->get('page', 1);
    $totalBooks = count($allBooks);
    $totalPages = ceil($totalBooks / $perPage);
    $offset = ($currentPage - 1) * $perPage;
    $books = array_slice($allBooks, $offset, $perPage);
@endphp

<div id="page-loader" class="fixed inset-0 bg-[#F8F2E6] z-[9999] flex flex-col items-center justify-center transition-opacity duration-500 ease-in-out">
    <div class="w-12 h-12 border-2 border-[#8B6914]/20 border-t-[#5C1A1A] animate-spin mb-4"></div>
    <p class="text-xs tracking-widest font-serif text-[#5C1A1A] uppercase">Loading Collection</p>
</div>

<div class="h-20"></div>

<div class="bg-[#F8F2E6] min-h-screen pb-10 px-4 sm:px-6 lg:px-8" x-data="{ selectedBook: null, activeFormat: 'physical' }">
    <div class="max-w-7xl mx-auto">
        
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-semibold tracking-widest text-[#D97A5A] uppercase bg-[#D97A5A]/10 px-3 py-1">
                The Literary Collection
            </span>
            <h1 class="text-6xl md:text-8xl text-[#4A1517] font-light leading-none tracking-wide mb-8" style="font-family: 'Cormorant Garamond', Georgia, serif;">
                Curated Bookstore
            </h1>
            <div class="w-12 h-0.5 bg-[#E8DDC6] mx-auto my-4"></div>
            <p class="text-sm text-[#8B6914] font-medium tracking-wide">
                Explore premium prints and instant digital volumes focused on purpose, clarity, and architectural growth frameworks.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">
            @foreach($books as $book)
                <div 
                    class="group flex flex-col justify-between bg-white border border-[#E8DDC6]/60 p-5 transition-all duration-300 hover:shadow-xl cursor-pointer"
                    onclick='openBookDetails(@json($book))'
                >
                    <div>
                        <div class="relative aspect-[3/4] w-full bg-[#2C1A0E]/5 overflow-hidden shadow-sm group-hover:shadow-md transition-all duration-300">
                            <img src="{{ $book['image'] }}" alt="{{ $book['title'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            
                            <div class="absolute top-3 right-3 text-[9px] font-bold tracking-widest text-white px-2.5 py-1 uppercase shadow-sm">
                                @if($book['type'] === 'physical_only')
                                    <span class="bg-[#5C1A1A]">PRINT ONLY</span>
                                @elseif($book['type'] === 'ebook_only')
                                    <span class="bg-[#8B6914]">E-BOOK ONLY</span>
                                @else
                                    <span class="bg-[#2C1A0E]">PRINT & DIGITAL</span>
                                @endif
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="text-[10px] font-bold tracking-widest text-[#8B6914]/80 uppercase">{{ $book['author'] }}</p>
                            <h3 class="text-base font-bold text-[#5C1A1A] mt-1 line-clamp-1 group-hover:text-[#8B6914] transition-colors duration-200" style="font-family: 'EB Garamond', serif;">
                                {{ $book['title'] }}
                            </h3>
                            <p class="text-xs text-[#8B6914]/90 mt-2 line-clamp-2 leading-relaxed">
                                {{ $book['description'] }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-[#E8DDC6]/40 flex items-center justify-between">
                        <span class="text-[10px] font-bold tracking-widest text-[#8B6914]/60 uppercase">From</span>
                        <span class="text-base font-bold text-[#5C1A1A]">
                            ₦{{ number_format($book['type'] === 'ebook_only' ? $book['ebook_price'] : $book['physical_price']) }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        @if($totalPages > 1)
            <div class="mt-20 flex justify-center items-center gap-2 border-t border-[#E8DDC6] pt-8">
                <a href="?page={{ max(1, $currentPage - 1) }}" class="p-2.5 border border-[#E8DDC6] bg-white text-[#8B6914] hover:bg-[#5C1A1A] hover:text-white transition-all duration-200 {{ $currentPage == 1 ? 'pointer-events-none opacity-40' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                @for($p = 1; $p <= $totalPages; $p++)
                    <a href="?page={{ $p }}" class="w-10 h-10 flex items-center justify-center text-xs font-bold tracking-wide border transition-all duration-200 {{ $currentPage == $p ? 'bg-[#5C1A1A] border-[#5C1A1A] text-white shadow-md' : 'bg-white border-[#E8DDC6] text-[#8B6914] hover:border-[#5C1A1A] hover:text-[#5C1A1A]' }}">{{ $p }}</a>
                @endfor
                <a href="?page={{ min($totalPages, $currentPage + 1) }}" class="p-2.5 border border-[#E8DDC6] bg-white text-[#8B6914] hover:bg-[#5C1A1A] hover:text-white transition-all duration-200 {{ $currentPage == $totalPages ? 'pointer-events-none opacity-40' : '' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        @endif
    </div>

    {{-- Sliding Quick View Backdrop Shadow Overlay --}}
    <div id="details-overlay" class="fixed inset-0 bg-black/50 z-50 opacity-0 pointer-events-none transition-opacity duration-500 ease-in-out" onclick="closeBookDetails()"></div>
    
    {{-- Sliding Book Details & Interactive Preview Panel --}}
    <div id="details-drawer" class="fixed top-0 right-0 bottom-0 w-full sm:w-[500px] bg-[#F8F2E6] border-l border-[#E8DDC6] z-50 p-8 shadow-2xl translate-x-full transition-transform duration-500 ease-in-out overflow-y-auto flex flex-col justify-between" style="transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);">
        <div>
            <div class="flex justify-between items-center pb-6 border-b border-[#E8DDC6]">
                <span class="text-xs font-bold tracking-widest text-[#8B6914] uppercase font-serif">Quick Volume Preview</span>
                <button onclick="closeBookDetails()" class="p-2 text-[#D97A5A] hover:text-[#5C1A1A] transition-colors focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row gap-6">
                <img id="drawer-image" src="" alt="Book Cover" class="w-32 aspect-[3/4] object-cover shadow-md border border-[#E8DDC6] mx-auto sm:mx-0">
                <div class="text-center sm:text-left">
                    <p id="drawer-author" class="text-[10px] font-bold tracking-widest text-[#8B6914]/80 uppercase"></p>
                    <h2 id="drawer-title" class="text-2xl font-serif font-bold text-[#5C1A1A] mt-1"></h2>
                    <p id="drawer-description" class="text-xs text-[#8B6914]/90 mt-3 leading-relaxed"></p>
                </div>
            </div>

            <div class="mt-8">
                <label class="text-[10px] font-bold tracking-widest text-[#8B6914] uppercase block mb-3">Select Edition Format</label>
                <div class="grid grid-cols-2 gap-2 bg-[#E8DDC6]/40 p-1 text-xs font-bold tracking-wider">
                    <button id="tab-physical" onclick="setDrawerFormat('physical')" class="py-2 transition-all focus:outline-none">HARDCOVER PRINT</button>
                    <button id="tab-ebook" onclick="setDrawerFormat('ebook')" class="py-2 transition-all focus:outline-none">E-BOOK EDITION</button>
                </div>
            </div>

            <div class="mt-8 bg-white border border-[#E8DDC6] p-5 font-serif italic text-sm text-[#5C1A1A]/80 shadow-inner relative max-h-44 overflow-y-auto">
                <span class="absolute top-2 left-3 font-serif text-3xl text-[#E8DDC6] select-none">“</span>
                <p id="drawer-excerpt" class="pl-4 leading-relaxed"></p>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-[#E8DDC6]">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold text-[#8B6914]/80">Format Pricing Summary</span>
                <span id="drawer-price" class="text-2xl font-bold tracking-tight text-[#5C1A1A]"></span>
            </div>
            <button class="w-full bg-[#5C1A1A] hover:bg-[#8B6914] text-white text-xs font-bold tracking-widest py-4 transition-colors duration-300 flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                ADD SELECTION TO CART
            </button>
        </div>
    </div>
</div>

<script>
    // Page loader dismiss sequence handler
    window.addEventListener('load', () => {
        const loader = document.getElementById('page-loader');
        loader.classList.add('opacity-0', 'pointer-events-none');
    });

    let currentBookData = null;
    let selectedFormat = 'physical';

    function openBookDetails(book) {
        currentBookData = book;
        
        // Match base layout attributes
        document.getElementById('drawer-title').innerText = book.title;
        document.getElementById('drawer-author').innerText = book.author;
        document.getElementById('drawer-description').innerText = book.description;
        document.getElementById('drawer-excerpt').innerText = book.excerpt;
        document.getElementById('drawer-image').src = book.image;

        // Manage tab toggles based on type restrictions
        const physicalTab = document.getElementById('tab-physical');
        const ebookTab = document.getElementById('tab-ebook');

        physicalTab.disabled = (book.type === 'ebook_only');
        ebookTab.disabled = (book.type === 'physical_only');

        // Set default available layout format state fallback
        setDrawerFormat(book.type === 'ebook_only' ? 'ebook' : 'physical');

        // Slide Drawer into Viewport
        document.getElementById('details-overlay').classList.remove('opacity-0', 'pointer-events-none');
        document.getElementById('details-drawer').classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
    }

    function closeBookDetails() {
        document.getElementById('details-overlay').classList.add('opacity-0', 'pointer-events-none');
        document.getElementById('details-drawer').classList.add('translate-x-full');
        document.body.style.overflow = '';
    }

    function setDrawerFormat(format) {
        selectedFormat = format;
        const physicalTab = document.getElementById('tab-physical');
        const ebookTab = document.getElementById('tab-ebook');
        const priceLabel = document.getElementById('drawer-price');

        if(format === 'physical') {
            physicalTab.className = "py-2 transition-all focus:outline-none bg-[#5C1A1A] text-white shadow-xs";
            if(!ebookTab.disabled) ebookTab.className = "py-2 transition-all focus:outline-none text-[#8B6914]/70 hover:text-[#5C1A1A]";
            priceLabel.innerText = '₦' + Number(currentBookData.physical_price).toLocaleString();
        } else {
            ebookTab.className = "py-2 transition-all focus:outline-none bg-[#8B6914] text-white shadow-xs";
            if(!physicalTab.disabled) physicalTab.className = "py-2 transition-all focus:outline-none text-[#8B6914]/70 hover:text-[#5C1A1A]";
            priceLabel.innerText = '₦' + Number(currentBookData.ebook_price).toLocaleString();
        }
    }
</script>
@endsection