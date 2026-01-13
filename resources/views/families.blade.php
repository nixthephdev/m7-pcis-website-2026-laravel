@extends('layouts.app')

@section('title', 'International Families - PCIS')

@section('content')

<!-- HERO -->
<div class="relative bg-brand-green py-24 text-center text-white overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/world-map.png')] opacity-20"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <h1 class="text-5xl md:text-7xl font-header font-bold mb-6">Welcome Home</h1>
        <p class="text-xl text-green-100 font-light max-w-3xl mx-auto leading-relaxed">
            Moving to a new country is a big step. We are here to make your transition to the Philippines smooth, safe, and successful.
        </p>
    </div>
</div>

<!-- SERVICES GRID -->
<div class="py-24 bg-white">
    <div class="max-w-[1400px] mx-auto px-4">
        
        <div class="text-center mb-20">
            <h2 class="text-4xl font-header font-bold text-brand-dark mb-4">Dedicated Support for Expats</h2>
            <p class="text-gray-600">PCIS is home to students from over 15 different nationalities.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Service 1 -->
            <div class="bg-gray-50 p-10 rounded-3xl border border-gray-100 hover:shadow-xl transition duration-300 group">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition">
                    <span class="text-4xl">🛂</span>
                </div>
                <h3 class="font-bold text-xl text-brand-blue mb-3">Visa Assistance</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Our Registrar assists with Student Visa (9f) and Special Study Permit (SSP) documentation, ensuring full compliance with Philippine immigration laws.
                </p>
            </div>

            <!-- Service 2 -->
            <div class="bg-gray-50 p-10 rounded-3xl border border-gray-100 hover:shadow-xl transition duration-300 group">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition">
                    <span class="text-4xl">🗣️</span>
                </div>
                <h3 class="font-bold text-xl text-brand-gold mb-3">ESL Support</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    We offer dedicated English as a Second Language (ESL) classes to help non-native speakers confidently participate in the Cambridge curriculum.
                </p>
            </div>

            <!-- Service 3 -->
            <div class="bg-gray-50 p-10 rounded-3xl border border-gray-100 hover:shadow-xl transition duration-300 group">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 shadow-md group-hover:scale-110 transition">
                    <span class="text-4xl">🏡</span>
                </div>
                <h3 class="font-bold text-xl text-brand-red mb-3">Settling In Guide</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    From finding family-friendly housing in Imus to recommending pediatricians, our Parent Community is here to guide you.
                </p>
            </div>

        </div>
    </div>
</div>

<!-- CTA -->
<div class="bg-brand-dark py-20 text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-header font-bold text-white mb-8">Have questions about moving to Cavite?</h2>
        <a href="mailto:admissions@pcis.edu.ph" class="inline-block bg-brand-green text-white px-10 py-4 rounded-full shadow-lg hover:bg-green-700 transition font-bold text-lg tracking-wide border-2 border-brand-green">
            Contact our International Liaison
        </a>
    </div>
</div>

@endsection