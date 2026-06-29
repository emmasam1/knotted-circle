<nav class="fixed top-0 left-0 right-0 z-50 bg-[#F8F2E6] border-b border-[#E8DDC6]">
    
    {{-- Main Navigation Container --}}
    <div class="px-4 lg:px-8 max-w-7xl mx-auto">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-3 group z-50">
                <img src="{{ asset('images/logo.jpg') }}" class="h-12 w-auto object-contain" alt="Logo">
                <span class="tracking-widest font-serif text-[#5C1A1A] text-sm font-medium">
                    THE KNOTTED CIRCLE
                </span>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-8 text-xs font-semibold tracking-widest">
                <a href="/about" class="text-[#8B6914] hover:text-[#5C1A1A] transition-colors duration-300 delay-75 ease-in-out">ABOUT</a>
                <a href="/podcast" class="text-[#8B6914] hover:text-[#5C1A1A] transition-colors duration-300 delay-75 ease-in-out">PODCAST</a>
                <a href="/books" class="text-[#8B6914] hover:text-[#5C1A1A] transition-colors duration-300 delay-75 ease-in-out">THE BOOK</a>
                <a href="/join" class="text-[#8B6914] hover:text-[#5C1A1A] transition-colors duration-300 delay-75 ease-in-out">JOIN</a>
                
                {{-- Desktop Cart Icon Button --}}
                <a href="/cart" class="relative p-2 text-[#8B6914] hover:text-[#5C1A1A] transition-colors duration-300 ml-2 group" aria-label="View Cart">
                    <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-105" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    {{-- Cart Item Count Badge --}}
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[9px] font-bold leading-none text-white bg-[#D97A5A] rounded-full transform translate-x-1 -translate-y-0.5 scale-90">
                        0
                    </span>
                </a>
            </div>

            {{-- Right Controls (Cart + Hamburger for Mobile layout) --}}
            <div class="flex items-center gap-2 lg:hidden">
                {{-- Mobile Cart Icon Button --}}
                <a href="/cart" class="relative p-2 text-[#8B6914] hover:text-[#5C1A1A] mr-1" aria-label="View Cart">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[9px] font-bold leading-none text-white bg-[#D97A5A] rounded-full transform translate-x-1 -translate-y-0.5">
                        0
                    </span>
                </a>

                {{-- Hamburger Trigger --}}
                <button
                    onclick="toggleDrawer()"
                    class="p-2 text-[#D97A5A] hover:text-[#5C1A1A] focus:outline-none z-50 relative"
                    aria-label="Toggle Menu"
                    id="menu-toggle-btn"
                >
                    <div class="w-7 h-5 flex flex-col justify-between items-end relative overflow-hidden">
                        <span id="line-1" class="w-7 h-0.5 bg-current transform transition-all duration-300 ease-in-out origin-right"></span>
                        <span id="line-2" class="w-5 h-0.5 bg-current transition-all duration-300 ease-in-out"></span>
                        <span id="line-3" class="w-7 h-0.5 bg-current transform transition-all duration-300 ease-in-out origin-right"></span>
                    </div>
                </button>
            </div>

        </div>
    </div>

    {{-- Sliding Drawer Backdrop Shadow --}}
    <div 
        id="mobile-overlay" 
        class="fixed inset-0 bg-black/40 z-40 opacity-0 pointer-events-none transition-opacity duration-500 ease-in-out"
        onclick="toggleDrawer()"
    ></div>
    
    {{-- High-End Slide-out Drawer Panel --}}
    <div 
        id="mobile-drawer" 
        class="fixed top-0 right-0 bottom-0 w-80 bg-[#F8F2E6] border-l border-[#E8DDC6] z-40 pt-28 px-8 pb-6 shadow-2xl translate-x-full transition-transform duration-500 ease-in-out flex flex-col justify-between"
        style="transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);"
    >
        <div>
            {{-- Synced Navigation Link Routes --}}
            <nav class="flex flex-col space-y-6">
                <a href="/about" class="mobile-link text-sm font-semibold tracking-widest text-[#8B6914] hover:text-[#5C1A1A] py-2 border-b border-[#E8DDC6]/50 opacity-0 translate-x-4 transition-all duration-300">ABOUT</a>
                <a href="/podcast" class="mobile-link text-sm font-semibold tracking-widest text-[#8B6914] hover:text-[#5C1A1A] py-2 border-b border-[#E8DDC6]/50 opacity-0 translate-x-4 transition-all duration-300">PODCAST</a>
                <a href="/books" class="mobile-link text-sm font-semibold tracking-widest text-[#8B6914] hover:text-[#5C1A1A] py-2 border-b border-[#E8DDC6]/50 opacity-0 translate-x-4 transition-all duration-300">THE BOOK</a>
                <a href="/join" class="mobile-link text-sm font-semibold tracking-widest text-[#8B6914] hover:text-[#5C1A1A] py-2 opacity-0 translate-x-4 transition-all duration-300">JOIN</a>
            </nav>
        </div>

        {{-- Premium Drawer Footer Brand Note --}}
        <div class="pt-6 border-t border-[#E8DDC6]">
            <p class="text-[10px] tracking-widest text-[#8B6914]/70 uppercase font-medium">
                &copy; {{ date('Y') }} The Knotted Circle
            </p>
        </div>
    </div>

</nav>

{{-- Hardware Accelerated Side-drawer Animation Controller --}}
<script>
    let isMenuOpen = false;

    function toggleDrawer() {
        isMenuOpen = !isMenuOpen;

        const overlay = document.getElementById('mobile-overlay');
        const drawer = document.getElementById('mobile-drawer');
        
        const l1 = document.getElementById('line-1');
        const l2 = document.getElementById('line-2');
        const l3 = document.getElementById('line-3');
        
        const links = document.querySelectorAll('.mobile-link');

        if (isMenuOpen) {
            overlay.classList.remove('opacity-0', 'pointer-events-none');
            overlay.classList.add('opacity-100');
            drawer.classList.remove('translate-x-full');
            drawer.classList.add('translate-x-0');
            document.body.style.overflow = 'hidden'; 

            l1.classList.add('-rotate-45', 'translate-x-[-2px]', 'translate-y-[1px]');
            l2.classList.add('opacity-0', 'translate-x-4');
            l3.classList.add('rotate-45', 'translate-x-[-2px]', '-translate-y-[1px]');

            links.forEach((link, index) => {
                setTimeout(() => {
                    link.classList.remove('opacity-0', 'translate-x-4');
                    link.classList.add('opacity-100', 'translate-x-0');
                }, 150 + (index * 75));
            });

        } else {
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0', 'pointer-events-none');
            drawer.classList.remove('translate-x-0');
            drawer.classList.add('translate-x-full');
            document.body.style.overflow = ''; 

            l1.classList.remove('-rotate-45', 'translate-x-[-2px]', 'translate-y-[1px]');
            l2.classList.remove('opacity-0', 'translate-x-4');
            l3.classList.remove('rotate-45', 'translate-x-[-2px]', '-translate-y-[1px]');

            links.forEach((link) => {
                link.classList.remove('opacity-100', 'translate-x-0');
                link.classList.add('opacity-0', 'translate-x-4');
            });
        }
    }
</script>