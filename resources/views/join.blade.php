@extends('layouts.app')

@section('content')

<style>
    [x-cloak] { display: none !important; }
</style>

<main class="w-full min-h-screen flex items-center justify-center pt-28 pb-20 px-4 sm:px-6 lg:px-8"
      x-data="{ 
        email: '',
        name: '',
        preferences: ['episodes'],
        isSubmitting: false,
        formSubmitted: false,
        errorMessage: '',

        submitForm() {
            if(!this.email) {
                this.errorMessage = 'Please enter a valid email address.';
                return;
            }
            
            this.isSubmitting = true;
            this.errorMessage = '';

            // Axios or Fetch request payload wrapper example
            // fetch('/podcast/subscribe', {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            //     body: JSON.stringify({ name: this.name, email: this.email, topics: this.preferences })
            // })

            setTimeout(() => {
                this.isSubmitting = false;
                this.formSubmitted = true;
            }, 1200);
        }
      }">

    <div class="max-w-4xl w-full bg-white border border-[#E7DED1] shadow-xl md:grid md:grid-cols-12 rounded-sm overflow-hidden">
        
        {{-- Left Column: Editorial & Context --}}
        <div class="p-8 sm:p-12 md:col-span-5 bg-[#4A1517] text-[#FDFBF7] flex flex-col justify-between relative min-h-[320px] md:min-h-0">
            <div class="space-y-6">
                <span class="text-[0.65rem] tracking-[0.3em] uppercase font-semibold text-[#BC9A5F] block font-sans">
                    The Community Deck
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-light tracking-wide leading-tight">
                    Pull Up a <br>
                    <span class="italic text-[#BC9A5F]">Virtual Chair</span>
                </h2>
                <p class="font-sans font-light text-white/80 text-xs sm:text-sm leading-relaxed max-w-xs">
                    We don't spam, and we don't rush. Receive seasonal reminders, unedited essay components, and early access to live audio recordings.
                </p>
            </div>

            <div class="pt-8 border-t border-white/10 text-[10px] font-mono tracking-widest text-white/50 uppercase">
                Stories for transition.
            </div>
        </div>

        {{-- Right Column: Interactive Join Form --}}
        <div class="p-8 sm:p-12 md:col-span-7 flex flex-col justify-center bg-white relative">
            
            {{-- Success State Notification View --}}
            <div x-show="formSubmitted" 
                 x-cloak 
                 x-transition:enter="transition ease-out duration-300 transform opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="text-center space-y-4 py-8">
                <div class="w-12 h-12 bg-[#F5EFE6] text-[#4A1517] rounded-full flex items-center justify-center mx-auto shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="font-serif text-2xl text-[#4A1517]">You're on the list</h3>
                <p class="font-sans font-light text-sm text-[#5A4032] max-w-sm mx-auto leading-relaxed">
                    Thank you for joining us. We’ve sent a minimal confirmation note to your inbox. Welcome to the workspace.
                </p>
            </div>

            {{-- Standard Initial Interactive State Input Form --}}
            <form x-show="!formSubmitted" @submit.prevent="submitForm()" class="space-y-6 text-left">
                @csrf
                
                <div class="space-y-1">
                    <label for="name" class="block text-[10px] uppercase tracking-wider text-[#8A7163] font-sans font-semibold">Your Name (Optional)</label>
                    <input type="text" 
                           id="name" 
                           x-model="name"
                           placeholder="E.g. Chidi"
                           class="w-full bg-[#FDFBF7] border border-[#E7DED1] rounded-sm px-4 py-2.5 font-sans text-xs text-[#4A1517] focus:outline-none focus:border-[#4A1517] transition-colors placeholder:text-[#8A7163]/40">
                </div>

                <div class="space-y-1">
                    <label for="email" class="block text-[10px] uppercase tracking-wider text-[#8A7163] font-sans font-semibold">Email Address *</label>
                    <input type="email" 
                           id="email" 
                           x-model="email"
                           required
                           placeholder="you@domain.com"
                           class="w-full bg-[#FDFBF7] border border-[#E7DED1] rounded-sm px-4 py-2.5 font-sans text-xs text-[#4A1517] focus:outline-none focus:border-[#4A1517] transition-colors placeholder:text-[#8A7163]/40">
                </div>

                {{-- Granular Preferences Checkboxes --}}
                <div class="space-y-2.5 pt-2">
                    <span class="block text-[10px] uppercase tracking-wider text-[#8A7163] font-sans font-semibold">What would you like to receive?</span>
                    
                    <div class="space-y-2">
                        <label class="flex items-start gap-3 cursor-pointer group">
                            <input type="checkbox" 
                                   value="episodes" 
                                   x-model="preferences"
                                   class="mt-0.5 rounded-sm border-[#E7DED1] text-[#4A1517] focus:ring-0 accent-[#4A1517]">
                            <div class="text-left">
                                <span class="block text-xs font-medium text-[#4A1517] group-hover:text-[#8B6914] transition-colors">New Episodes</span>
                                <span class="block text-[11px] text-[#8A7163] font-light">Direct audio drop links right when they air weekly.</span>
                            </div>
                        </label>

                        <label class="flex items-start gap-3 cursor-pointer group">
                            <input type="checkbox" 
                                   value="essays" 
                                   x-model="preferences"
                                   class="mt-0.5 rounded-sm border-[#E7DED1] text-[#4A1517] focus:ring-0 accent-[#4A1517]">
                            <div class="text-left">
                                <span class="block text-xs font-medium text-[#4A1517] group-hover:text-[#8B6914] transition-colors">Written Reflections</span>
                                <span class="block text-[11px] text-[#8A7163] font-light">Mid-week essays expanding on the themes introduced in the show.</span>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Error Reporting Bar --}}
                <div x-show="errorMessage" x-cloak class="text-red-700 text-[11px] font-sans" x-text="errorMessage"></div>

                {{-- Form Submission Processing Control Trigger Button --}}
                <div class="pt-2">
                    <button type="submit"
                            :disabled="isSubmitting"
                            class="w-full bg-[#4A1517] hover:bg-[#3D1416] text-white text-xs uppercase tracking-widest font-medium py-3 rounded-sm transition-all duration-300 flex items-center justify-center gap-2 disabled:opacity-70 cursor-pointer">
                        <template x-if="!isSubmitting">
                            <span>Subscribe to Archive</span>
                        </template>
                        <template x-if="isSubmitting">
                            <div class="flex items-center gap-2">
                                <svg class="animate-spin h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Securing Your Seat...</span>
                            </div>
                        </template>
                    </button>
                </div>
            </form>

        </div>
    </div>
</main>

@endsection