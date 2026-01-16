@extends('layouts.app')

@section('title', 'Home - M7 Philippine Cambridge International School')

@section('content')

<!-- HERO SECTION: Full Screen Video/Image Style -->
<div class="relative h-screen flex items-center justify-center overflow-hidden bg-gray-900">
    
    <!-- Background Image (Students in Lab - Matches your screenshot vibe) -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1564951434112-64d74cc2a2d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
             class="w-full h-full object-cover" 
             alt="Future Ready Students">
        
        <!-- HIMAY Rule: Overlay to ensure text readability against busy background -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/70"></div>
    </div>
    
    <!-- Content Center -->
    <div class="relative z-10 max-w-6xl mx-auto px-4 w-full text-center mt-16">
        
        <!-- Headline: Warm Gold (#F4A300) per HIMAY for Optimism/Prestige -->
        <h1 class="font-header font-bold text-4xl md:text-6xl lg:text-7xl text-brand-gold uppercase tracking-wide leading-tight mb-6 drop-shadow-2xl">
            Future-Ready Education <br> With Global Standard
        </h1>
        
        <!-- Subheadline: Lato (Sans-serif) for high legibility -->
        <p class="text-lg md:text-2xl text-white/90 mb-10 font-light max-w-4xl mx-auto leading-relaxed">
            Offering IB Programmes (PYP, MYP, DP) + Senior High Options for Global Success.
            <span class="block mt-2 text-white/70 text-base">Empowering minds through Unity, Integrity, and Growth.</span>
        </p>
        
        <!-- CTA Container -->
        <div class="flex flex-col items-center gap-4">
            
            <!-- Primary CTA: Deep Blue (#00539C) for Trust/Authority -->
            <!-- Shape: Rounded-Full (Pill) to match screenshot -->
            <a href="{{ route('register') }}" class="bg-brand-blue text-white px-10 py-4 rounded-full shadow-soft hover:bg-[#003f75] hover:scale-105 transition transform duration-300 font-sub font-bold text-lg tracking-wide border-2 border-brand-blue">
                Discover PCIS — Unlock Your Child’s Potential
            </a>
            
            <!-- Microcopy: Low friction (HIMAY Trigger) -->
            <p class="text-white/60 text-sm italic font-light">
                Discover at your own pace, no strings attached.
            </p>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce text-white/50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7-7-7"></path></svg>
    </div>
</div>



<!-- SECTION 2A: AUTHORITY & ACCREDITATION -->
<div class="bg-white pt-24 pb-16">
    <div class="max-w-[1400px] mx-auto px-4 text-center">
        
        <p class="text-brand-blue font-sub font-medium text-xl mb-16">
            Every parent wants their child to thrive in a changing world...
        </p>

        <!-- LOGOS ROW (Big & Bold) -->
        <div class="flex flex-wrap md:flex-nowrap justify-center items-center gap-12 grayscale hover:grayscale-0 transition duration-500 w-full">
            
            <!-- PYP Logo -->
            <div class="group shrink-0">
                <img src="{{ asset('images/candidacy-logo/ib-candidacy-pyp.png') }}" 
                     alt="IB Primary Years Programme" 
                     class="h-24 md:h-32 w-auto object-contain transform group-hover:scale-110 transition duration-300">
            </div>

            <!-- Divider (Taller) -->
            <div class="hidden md:block w-px h-24 bg-gray-300 shrink-0"></div>

            <!-- MYP Logo -->
            <div class="group shrink-0">
                <img src="{{ asset('images/candidacy-logo/ib-candidacy-myp.png') }}" 
                     alt="IB Middle Years Programme" 
                     class="h-24 md:h-32 w-auto object-contain transform group-hover:scale-110 transition duration-300">
            </div>

            <!-- Divider -->
            <div class="hidden md:block w-px h-24 bg-gray-300 shrink-0"></div>

            <!-- DP Logo -->
            <div class="group shrink-0">
                <img src="{{ asset('images/candidacy-logo/ib-candidacy-dp.png') }}" 
                     alt="IB Diploma Programme" 
                     class="h-24 md:h-32 w-auto object-contain transform group-hover:scale-110 transition duration-300">
            </div>

        </div>
    </div>
</div>

<!-- SECTION 2B: SOCIAL PROOF & CTA (Distinct Background) -->
<div class="bg-bg-primary py-20 border-t border-gray-100"> <!-- Subtle Off-White Background -->
    <div class="max-w-4xl mx-auto px-4 text-center">
        
        <!-- THE QUOTE -->
        <h2 class="font-header font-bold text-3xl md:text-5xl text-brand-blue leading-tight mb-10 drop-shadow-sm">
            "Trusted by 200 families who want their children future-ready — <br class="hidden md:block">
            growing towards 300 leaders by 2026."
        </h2>

        <!-- CTA BUTTON -->
        <div class="flex flex-col items-center gap-3">
            <a href="{{ route('register') }}" class="bg-brand-red text-white px-12 py-4 rounded-full shadow-soft hover:bg-[#b01b2e] hover:shadow-lg transition transform hover:-translate-y-1 font-sub font-bold text-lg tracking-wide border-2 border-white ring-4 ring-brand-red/20">
                Book a Campus Tour – Only 12 Slots for 2025
            </a>
            <p class="text-gray-400 text-sm italic font-light mt-2">
                Flexible scheduling to match your family's time.
            </p>
        </div>

    </div>
</div>

<!-- SECTION 3: TESTIMONIALS & OUTCOMES (HIMAY: Social Validation) -->
<div class="py-24 bg-bg-secondary">
    <div class="max-w-7xl mx-auto px-4">
        
        <!-- Header Text -->
        <div class="text-center max-w-5xl mx-auto mb-16">
            <p class="text-brand-blue font-sans text-xl md:text-2xl leading-relaxed font-light">
                Every child deserves to thrive in a world that's constantly changing. At PCIS, we nurture 
                <strong class="font-bold">confidence, curiosity, and compassion</strong>—equipping your child for 
                top universities and global opportunities.
            </p>
        </div>

        <!-- CARDS GRID -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Card 1: Academic Confidence -->
            <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden hover:-translate-y-2 transition duration-300 flex flex-col">
                <!-- Image -->
                <div class="h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Classroom Learning" 
                         class="w-full h-full object-cover transform hover:scale-110 transition duration-700">
                </div>
                <!-- Content -->
                <div class="p-8 flex-grow flex flex-col justify-between">
                    <p class="text-brand-blue font-header italic text-lg leading-relaxed mb-8">
                        "Since joining PCIS, my child's <strong class="not-italic text-brand-teal">confidence</strong> in problem-solving and <strong class="not-italic text-brand-teal">creativity</strong> has soared. The <strong class="not-italic">Cambridge program</strong> truly prepares them for <strong class="not-italic">real-world challenges</strong>."
                    </p>
                    <div>
                        <a href="{{ route('programmes') }}" class="block w-full bg-brand-blue text-white text-center py-3 rounded-full font-bold text-sm shadow-md hover:bg-[#003f75] transition transform hover:-translate-y-0.5">
                            See How PCIS Can Shape Your Child's Future
                        </a>
                        <p class="text-center text-xs text-gray-400 mt-3 italic font-light">Explore freely — we're here to guide, not to pressure.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Creativity & Fun (Gold Highlight) -->
            <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden hover:-translate-y-2 transition duration-300 flex flex-col">
                <!-- Image -->
                <div class="h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1516062423079-7ca13cdc7f5a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Student Creativity" 
                         class="w-full h-full object-cover transform hover:scale-110 transition duration-700">
                </div>
                <!-- Content -->
                <div class="p-8 flex-grow flex flex-col justify-between">
                    <p class="text-brand-blue font-header italic text-lg leading-relaxed mb-8">
                        "I love how every single day at PCIS is absolutely full of wonderful <strong class="not-italic text-brand-gold">learning</strong>, endless <strong class="not-italic text-brand-gold">creativity</strong>, and so much <strong class="not-italic text-brand-gold">fun</strong>. I feel completely ready for anything and everything in the future."
                    </p>
                    <div>
                        <a href="{{ route('programmes') }}" class="block w-full bg-brand-gold text-white text-center py-3 rounded-full font-bold text-sm shadow-md hover:bg-[#d99100] transition transform hover:-translate-y-0.5">
                            Explore What's Possible at PCIS
                        </a>
                        <p class="text-center text-xs text-gray-400 mt-3 italic font-light">Explore freely and decide at your own pace.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3: International Welcome -->
            <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden hover:-translate-y-2 transition duration-300 flex flex-col">
                <!-- Image -->
                <div class="h-64 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="International Students" 
                         class="w-full h-full object-cover transform hover:scale-110 transition duration-700">
                </div>
                <!-- Content -->
                <div class="p-8 flex-grow flex flex-col justify-between">
                    <p class="text-brand-blue font-header italic text-lg leading-relaxed mb-8">
                        "We were anxious about moving to a new country, but PCIS welcomed us with <strong class="not-italic text-brand-red">warmth</strong> and <strong class="not-italic text-brand-red">understanding</strong>. Our child felt at home from day one — and so did we."
                    </p>
                    <div>
                        <a href="{{ route('families') }}" class="block w-full bg-brand-blue text-white text-center py-3 rounded-full font-bold text-sm shadow-md hover:bg-[#003f75] transition transform hover:-translate-y-0.5">
                            Speak With Our International Advisor
                        </a>
                        <p class="text-center text-xs text-gray-400 mt-3 italic font-light">Get clear answers about global pathways for your child.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection