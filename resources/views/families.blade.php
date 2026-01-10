@extends('layouts.app')

@section('title', 'International Families - PCIS')

@section('content')

<!-- HERO -->
<div class="relative bg-brand-green py-24 text-center text-white overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/world-map.png')] opacity-20"></div>
    <div class="relative z-10 max-w-[1400px] mx-auto px-4">
        <h1 class="text-5xl md:text-7xl font-header font-bold mb-6">Welcome Home</h1>
        <p class="text-xl text-green-100 font-light max-w-3xl mx-auto">
            Moving to a new country is a big step. We are here to make your transition to the Philippines smooth, safe, and successful.
        </p>
    </div>
</div>

<div class="py-24 bg-white">
    <div class="max-w-[1400px] mx-auto px-4">
        
        <!-- INTRO -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-24">
            <div>
                <h2 class="text-4xl font-header font-bold text-brand-dark mb-6">A Global Community in Cavite</h2>
                <p class="text-gray-600 leading-relaxed mb-6 text-lg font-light">
                    PCIS is home to students from over 15 different nationalities. Our International Families Hub provides resources, networking events, and dedicated support services to help you settle in.
                </p>
                <div class="flex gap-4">
                    <span class="px-4 py-2 bg-green-50 text-brand-green rounded-full font-bold text-sm">15+ Nationalities</span>
                    <span class="px-4 py-2 bg-green-50 text-brand-green rounded-full font-bold text-sm">ESL Support</span>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-brand-gold/20 rounded-3xl transform rotate-2"></div>
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" class="relative rounded-3xl shadow-2xl border-4 border-white" alt="International Students">
            </div>
        </div>

        <!-- SERVICES GRID (Premium Icons) -->
        <h3 class="text-3xl font-header font-bold text-center text-brand-blue mb-12">How We Support You</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Visa -->
            <div class="bg-white p-10 rounded-2xl shadow-lg border-t-8 border-brand-blue hover:-translate-y-2 transition duration-300">
                <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                </div>
                <h4 class="font-bold text-xl text-brand-dark mb-2">Visa Assistance</h4>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Our Registrar assists with Student Visa (9f) and Special Study Permit (SSP) documentation and processing.
                </p>
            </div>

            <!-- Language -->
            <div class="bg-white p-10 rounded-2xl shadow-lg border-t-8 border-brand-gold hover:-translate-y-2 transition duration-300">
                <div class="w-16 h-16 bg-yellow-50 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                </div>
                <h4 class="font-bold text-xl text-brand-dark mb-2">ESL Programs</h4>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Dedicated English as a Second Language classes to ensure your child can confidently participate in the curriculum.
                </p>
            </div>

            <!-- Housing -->
            <div class="bg-white p-10 rounded-2xl shadow-lg border-t-8 border-brand-red hover:-translate-y-2 transition duration-300">
                <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                <h4 class="font-bold text-xl text-brand-dark mb-2">Settling In</h4>
                <p class="text-gray-600 text-sm leading-relaxed">
                    We provide guides on family-friendly housing in Imus, transport options, and connect you with other expat families.
                </p>
            </div>

        </div>

    </div>
</div>
@endsection