@extends('layouts.app')

@section('content')

<style>
    [x-cloak] { display: none !important; }
</style>

<main class="w-full relative min-h-screen" 
      x-data="{ 
        currentTrack: null, 
        currentTitle: '', 
        currentEpisode: '',
        isPlaying: false,
        activeTab: 'all',
        progress: 0,
        volume: 1,
        previousVolume: 1,
        formattedTime: '0:00',
        formattedDuration: '0:00',
        
        playEpisode(audioUrl, title, episodeNum) {
            if (this.currentTrack === audioUrl) {
                if (this.isPlaying) {
                    this.$refs.audioPlayer.pause();
                } else {
                    this.$refs.audioPlayer.play().catch(e => console.log('Playback error:', e));
                }
            } else {
                this.currentTrack = audioUrl;
                this.currentTitle = title;
                this.currentEpisode = episodeNum;
                this.progress = 0;
                this.formattedTime = '0:00';
                
                this.$nextTick(() => {
                    this.$refs.audioPlayer.load();
                    this.$refs.audioPlayer.volume = this.volume;
                    this.$refs.audioPlayer.play().catch(e => console.log('Playback startup error:', e));
                });
            }
        },
        updateProgress() {
            const audio = this.$refs.audioPlayer;
            if (!audio || isNaN(audio.duration) || audio.duration === 0) return;
            this.progress = (audio.currentTime / audio.duration) * 100;
            this.formattedTime = this.formatTime(audio.currentTime);
            this.formattedDuration = this.formatTime(audio.duration);
        },
        seek(e) {
            const audio = this.$refs.audioPlayer;
            if (!audio || isNaN(audio.duration)) return;
            const rect = e.currentTarget.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            audio.currentTime = (clickX / rect.width) * audio.duration;
        },
        formatTime(secs) {
            if (isNaN(secs)) return '0:00';
            const minutes = Math.floor(secs / 60);
            const seconds = Math.floor(secs % 60);
            return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        },
        closeAndStop() {
            const audio = this.$refs.audioPlayer;
            if (audio) {
                audio.pause();
                audio.src = ''; 
            }
            this.currentTrack = null;
            this.isPlaying = false;
            this.progress = 0;
        }
      }">

    {{-- Native HTML5 Player Core --}}
    <audio x-ref="audioPlayer" 
           @timeupdate="updateProgress()" 
           @loadedmetadata="updateProgress()" 
           @playing="isPlaying = true"
           @pause="isPlaying = false"
           :src="currentTrack">
    </audio>

    {{-- ================= PODCAST HEADER ================= --}}
    <section class="max-w-4xl mx-auto px-6 text-center pt-28 pb-16 relative">
        <span class="text-[0.7rem] tracking-[0.3em] uppercase font-semibold text-[#8B6914] block mb-4 font-sans">
            The Audio Archive
        </span>
        <h1 class="text-6xl md:text-8xl text-[#4A1517] font-light leading-none tracking-wide mb-8" style="font-family: 'Cormorant Garamond', Georgia, serif;">
            Stories For The <br>
            <span class="italic text-[#8B6914]">In-Between Seasons</span>
        </h1>
        <p class="font-sans font-light text-[#5A4032] text-base md:text-lg max-w-xl mx-auto leading-relaxed mb-6">
            Weekly conversations about relationships, purpose, faith, and becoming. We invite you to carry the tension without losing yourself in it.
        </p>

        {{-- Minimalist Filter Tabs --}}
        <div class="flex justify-center items-center gap-8 mt-16 border-b border-[#E7DED1] pb-3 max-w-md mx-auto font-sans text-xs tracking-widest uppercase font-medium">
            <button @click="activeTab = 'all'" :class="activeTab === 'all' ? 'text-[#4A1517] font-bold border-b border-[#4A1517] pb-3' : 'text-[#8A7163] hover:text-[#4A1517] pb-3 transition-colors'">All</button>
            <button @click="activeTab = 'faith'" :class="activeTab === 'faith' ? 'text-[#4A1517] font-bold border-b border-[#4A1517] pb-3' : 'text-[#8A7163] hover:text-[#4A1517] pb-3 transition-colors'">Faith</button>
            <button @click="activeTab = 'relationships'" :class="activeTab === 'relationships' ? 'text-[#4A1517] font-bold border-b border-[#4A1517] pb-3' : 'text-[#8A7163] hover:text-[#4A1517] pb-3 transition-colors'">Relationships</button>
            <button @click="activeTab = 'purpose'" :class="activeTab === 'purpose' ? 'text-[#4A1517] font-bold border-b border-[#4A1517] pb-3' : 'text-[#8A7163] hover:text-[#4A1517] pb-3 transition-colors'">Purpose</button>
        </div>
    </section>

    {{-- ================= EDITORIAL EPISODES LIST ================= --}}
    <section class="max-w-5xl mx-auto px-6 pb-20">
        <div class="space-y-20">
            
            {{-- Clean, Consistent Left-to-Right Flow for reliable dynamic ordering --}}
            {{-- Episode 1 --}}
            <article class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-16 items-center border-t border-[#E7DED1] pt-16" x-show="activeTab === 'all' || activeTab === 'relationships'">
                <div class="md:col-span-5 relative group overflow-hidden bg-[#4A1517] aspect-video w-full flex flex-col justify-between p-8 shadow-sm">
                    <span class="text-[#BC9A5F] text-xs font-mono font-semibold tracking-widest z-10">EPISODE 24</span>
                    <button @click="playEpisode('https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3', 'Holding Space for Hard Assumptions in Long-Term Friendships', 'EP 24')" 
                            class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
                        <div class="w-14 h-14 bg-[#FDFBF7] text-[#4A1517] rounded-full cursor-pointer flex items-center justify-center shadow-lg transform scale-90 group-hover:scale-100 transition-transform">
                            <span class="text-[10px] font-bold tracking-widest uppercase ml-0.5" x-text="currentTrack === 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3' && isPlaying ? 'PAUSE' : 'PLAY'">PLAY</span>
                        </div>
                    </button>
                    <div class="flex justify-between items-end text-white/80 text-[11px] tracking-widest uppercase font-sans z-10">
                        <span>Archive Deck</span>
                        <span>Relationships</span>
                    </div>
                </div>
                <div class="md:col-span-7 flex flex-col text-left">
                    <time class="text-xs font-semibold tracking-wider text-[#8B6914] uppercase font-sans">June 24, 2026</time>
                    <h3 @click="playEpisode('https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3', 'Holding Space for Hard Assumptions in Long-Term Friendships', 'EP 24')" 
                        class="mt-3 text-2xl md:text-3xl font-serif text-[#4A1517] font-normal hover:text-[#8B6914] transition-colors cursor-pointer leading-snug">
                        Holding Space for Hard Assumptions in Long-Term Friendships
                    </h3>
                    <p class="mt-4 text-sm text-[#5A4032] font-sans font-light leading-relaxed">
                        How do we adapt when our closest links begin to redefine their horizons? This week we explore structural boundaries inside changing relational dynamics.
                    </p>
                </div>
            </article>

            {{-- Episode 2 --}}
            <article class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-16 items-center border-t border-[#E7DED1] pt-16" x-show="activeTab === 'all' || activeTab === 'faith'">
                <div class="md:col-span-5 relative group overflow-hidden bg-[#2D1B1B] aspect-video w-full flex flex-col justify-between p-8 shadow-sm">
                    <span class="text-[#BC9A5F] text-xs font-mono font-semibold tracking-widest z-10">EPISODE 23</span>
                    <button @click="playEpisode('https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3', 'The Architecture of Doubt: When Faith Loses Its Simple Shapes', 'EP 23')"
                            class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
                        <div class="w-14 h-14 bg-[#FDFBF7] text-[#4A1517] rounded-full flex items-center justify-center cursor-pointer shadow-lg transform scale-90 group-hover:scale-100 transition-transform">
                            <span class="text-[10px] font-bold tracking-widest uppercase ml-0.5" x-text="currentTrack === 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3' && isPlaying ? 'PAUSE' : 'PLAY'">PLAY</span>
                        </div>
                    </button>
                    <div class="flex justify-between items-end text-white/80 text-[11px] tracking-widest uppercase font-sans z-10">
                        <span>Archive Deck</span>
                        <span>Faith</span>
                    </div>
                </div>
                <div class="md:col-span-7 flex flex-col text-left">
                    <time class="text-xs font-semibold tracking-wider text-[#8B6914] uppercase font-sans">June 17, 2026</time>
                    <h3 @click="playEpisode('https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3', 'The Architecture of Doubt: When Faith Loses Its Simple Shapes', 'EP 23')"
                        class="mt-3 text-2xl md:text-3xl font-serif text-[#4A1517] font-normal hover:text-[#8B6914] transition-colors cursor-pointer leading-snug">
                        The Architecture of Doubt: When Faith Loses Its Simple Shapes
                    </h3>
                    <p class="mt-4 text-sm text-[#5A4032] font-sans font-light leading-relaxed">
                        An intentional dialogue about navigating changes in core constructs, handling structural loss, and discovering grace in gray ecosystems.
                    </p>
                </div>
            </article>
        </div>
    </section>

    {{-- Minimal Editorial Pagination Base --}}
    <div class="w-full text-center pb-32">
        <button class="px-8 py-3 border border-[#E7DED1] text-xs uppercase tracking-widest font-medium text-[#4A1517] hover:bg-[#4A1517] hover:text-white hover:border-[#4A1517] transition-all duration-300 rounded-sm cursor-pointer">
            Load Older Conversations
        </button>
    </div>

    {{-- ================= DETACHED FLOATING AUDIO PLAYER CARD ================= --}}
    <div x-show="currentTrack && currentTrack !== null && currentTrack !== ''" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 md:translate-y-0 md:translate-x-12"
         x-transition:enter-end="opacity-100 translate-y-0 md:translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 md:translate-x-0"
         x-transition:leave-end="opacity-0 translate-y-4 md:translate-y-0 md:translate-x-12"
         class="sticky bottom-4 mx-4 md:mx-0 md:fixed md:bottom-auto md:left-auto md:top-1/2 md:right-8 md:-translate-y-1/2 w-auto md:w-72 bg-white/95 backdrop-blur-md border border-[#E7DED1] shadow-2xl z-50 px-4 py-3 md:p-4 md:rounded-lg transition-all">
    
        {{-- Header Row --}}
        <div class="flex justify-between items-center mb-2 pb-1 border-b border-[#F5EFE6]">
            <div class="flex items-center gap-1.5 truncate">
                <div class="w-4 h-4 md:w-5 md:h-5 bg-[#4A1517] rounded flex-shrink-0 flex items-center justify-center text-[#BC9A5F] font-mono text-[8px] font-bold" x-text="currentEpisode"></div>
                <p class="text-[9px] uppercase tracking-wider text-[#8B6914] font-sans font-bold">Now Playing</p>
            </div>
            
            <button @click="closeAndStop()" 
                    class="text-[#8A7163] hover:text-[#4A1517] p-1 rounded transition-colors cursor-pointer"
                    title="Close Player">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Track Title --}}
        <div class="mb-3">
            <h4 class="text-[11px] md:text-xs font-serif text-[#4A1517] font-medium leading-tight truncate md:line-clamp-2" x-text="currentTitle"></h4>
        </div>

        {{-- Controls Assembly Deck --}}
        <div class="space-y-3">
            {{-- Progress Scrub bar --}}
            <div class="w-full space-y-0.5">
                <div @click="seek($event)" class="h-1 bg-[#E7DED1] w-full relative cursor-pointer rounded-full overflow-hidden">
                    <div class="h-full bg-[#4A1517] absolute top-0 left-0 pointer-events-none" :style="`width: ${progress}%`"></div>
                </div>
                <div class="flex justify-between text-[8px] font-mono text-[#8A7163]">
                    <span x-text="formattedTime">0:00</span>
                    <span x-text="formattedDuration">0:00</span>
                </div>
            </div>

            {{-- Unified Balance Horizontal Row Controls --}}
            <div class="flex items-center justify-between gap-4 pt-1 border-t border-[#F5EFE6]">
                
                {{-- Left Core Buttons Stack --}}
                <div class="flex items-center gap-2.5">
                    <button @click="$refs.audioPlayer.currentTime -= 10" class="text-[#8A7163] hover:text-[#4A1517] transition-colors cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.334 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z"/></svg>
                    </button>
                    
                    <button @click="isPlaying ? $refs.audioPlayer.pause() : $refs.audioPlayer.play()" 
                            class="w-7 h-7 bg-[#4A1517] text-white rounded-full flex items-center justify-center shadow-md hover:bg-[#3D1416] transition-colors cursor-pointer">
                        <template x-if="!isPlaying">
                            <svg class="w-2.5 h-2.5 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </template>
                        <template x-if="isPlaying">
                            <svg class="w-2.5 h-2.5 fill-current" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                        </template>
                    </button>

                    <button @click="$refs.audioPlayer.currentTime += 30" class="text-[#8A7163] hover:text-[#4A1517] transition-colors cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.934 12.8a1 1 0 000-1.6l-5.334-4A1 1 0 005 8v8a1 1 0 001.6.8l5.334-4zM19.934 12.8a1 1 0 000-1.6l-5.334-4A1 1 0 0013 8v8a1 1 0 001.6.8l5.334-4z"/></svg>
                    </button>
                </div>

                {{-- Right Inline Volume Controller --}}
                <div class="flex items-center gap-1.5 flex-1 max-w-[110px] md:max-w-[130px]">
                    <button @click="
                                if(volume > 0){
                                    previousVolume = volume;
                                    volume = 0;
                                }else{
                                    volume = previousVolume || 1;
                                }
                                $refs.audioPlayer.volume = volume;
                            "
                            class="text-[#8A7163] hover:text-[#4A1517] transition-colors flex-shrink-0 cursor-pointer">
                        
                        <template x-if="volume == 0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5L6 9H2v6h4l5 4V5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M23 9l-6 6M17 9l6 6"/></svg>
                        </template>
                        <template x-if="volume > 0 && volume < 0.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5L6 9H2v6h4l5 4V5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.5 12a3.5 3.5 0 00-2-3.18"/></svg>
                        </template>
                        <template x-if="volume >= 0.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5L6 9H2v6h4l5 4V5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.5 12a3.5 3.5 0 00-2-3.18M19.07 4.93a10 10 0 010 14.14"/></svg>
                        </template>
                    </button>

                    <input type="range"
                           min="0"
                           max="1"
                           step="0.01"
                           x-model="volume"
                           @input="$refs.audioPlayer.volume = volume"
                           class="w-full h-0.5 rounded-full appearance-none cursor-pointer bg-[#E7DED1] accent-[#4A1517]">
                </div>
            </div>
        </div>
    </div>
</main>

@endsection