@extends('layouts.app')

@section('title', 'Home - M7 Philippine Cambridge International School')

@section('content')

<!-- HERO SECTION -->
<div class="relative bg-brand-dark h-[85vh] flex items-center overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" class="w-full h-full object-cover opacity-40" alt="School Campus">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-brand-blue via-brand-blue/80 to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 w-full pt-10">
        <!-- Badge -->
        <div class="inline-block mb-8 animate-fade-in-up">
            <span class="bg-brand-yellow text-brand-blue font-extrabold tracking-widest uppercase text-xs py-3 px-6 rounded-full shadow-glow border border-white/20">
                Admissions Open 2024-2025
            </span>
        </div>
        
        <!-- Headline -->
        <h1 class="text-5xl md:text-7xl font-serif font-bold text-white leading-tight mb-8 drop-shadow-2xl">
            Unity. Integrity. <br> 
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-brand-red">Growth.</span>
        </h1>
        
        <!-- Subheadline -->
        <p class="text-lg md:text-xl text-blue-50 mb-12 max-w-2xl font-light leading-relaxed border-l-4 border-brand-green pl-6">
            Join the premier international school in Cavite. We embrace change and empower minds through a world-class Cambridge curriculum.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-5">
            <a href="{{ route('apply.form') }}" class="bg-brand-red text-white px-10 py-4 rounded-full shadow-lg hover:bg-red-700 hover:scale-105 transition font-bold tracking-wide text-center border-2 border-brand-red">
                Start Application
            </a>
            <!-- FIXED LINK BELOW -->
            <a href="{{ route('programmes') }}" class="bg-white/5 backdrop-blur-sm border border-white/30 text-white px-10 py-4 rounded-full hover:bg-white hover:text-brand-blue transition font-bold tracking-wide text-center">
                Explore Programs
            </a>
        </div>
    </div>
</div>

<!-- THE 4 PILLARS -->
<section class="py-24 bg-gray-50 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 -mt-32 relative z-20">
            
            <!-- Blue: Academic -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-b-4 border-brand-blue hover:-translate-y-2 transition duration-300 group">
                <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-brand-blue group-hover:text-white transition">
                    <svg class="w-7 h-7 text-brand-blue group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
                <h3 class="font-serif font-bold text-xl text-brand-dark mb-3">Academic Excellence</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Rigorous Cambridge curriculum designed to challenge and inspire.</p>
            </div>

            <!-- Red: Leadership -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-b-4 border-brand-red hover:-translate-y-2 transition duration-300 group">
                <div class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-brand-red group-hover:text-white transition">
                    <svg class="w-7 h-7 text-brand-red group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path></svg>
                </div>
                <h3 class="font-serif font-bold text-xl text-brand-dark mb-3">Leadership</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Molding students of integrity who lead with passion and purpose.</p>
            </div>

            <!-- Yellow: Community -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-b-4 border-brand-yellow hover:-translate-y-2 transition duration-300 group">
                <div class="w-14 h-14 bg-yellow-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-brand-yellow group-hover:text-white transition">
                    <svg class="w-7 h-7 text-brand-yellow group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="font-serif font-bold text-xl text-brand-dark mb-3">Community</h3>
                <p class="text-sm text-gray-500 leading-relaxed">A diverse, inclusive environment fostering unity among cultures.</p>
            </div>

            <!-- Green: Innovation -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border-b-4 border-brand-green hover:-translate-y-2 transition duration-300 group">
                <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-brand-green group-hover:text-white transition">
                    <svg class="w-7 h-7 text-brand-green group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-serif font-bold text-xl text-brand-dark mb-3">Innovation</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Forward-thinking education for a rapidly changing global landscape.</p>
            </div>

        </div>
    </div>
</section>

<!-- ABOUT SECTION -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div>
            <h4 class="text-brand-green font-bold uppercase tracking-widest text-xs mb-3">Why Choose M7 PCIS?</h4>
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-brand-blue mb-8 leading-tight">Global Competence.<br>Ethical Consciousness.</h2>
            <p class="text-gray-600 mb-8 leading-relaxed text-lg font-light">
                At PCIS, we're built on <strong class="text-brand-blue font-semibold">Unity, Integrity, and Growth</strong>. We don't just teach subjects; we mold character.
            </p>
            <a href="{{ route('programmes') }}" class="inline-flex items-center text-brand-red font-bold hover:text-brand-blue transition group">
                Read Principal's Message 
                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
        <div class="relative">
            <div class="absolute -top-6 -right-6 w-24 h-24 bg-brand-yellow rounded-full opacity-20 blur-xl"></div>
            <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-brand-blue rounded-full opacity-10 blur-xl"></div>
            <img src="https://images.unsplash.com/photo-1577896334614-501d0c85f90e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" class="rounded-2xl shadow-2xl relative z-10 border-4 border-white" alt="Students">
        </div>
    </div>
</section>

@endsection