@extends('layouts.app')

@section('title', 'About Us - M7 PCIS')

@section('content')

<!-- Header -->
<div class="bg-white py-24 text-center">
    <span class="text-brand-blue font-bold tracking-widest uppercase text-sm font-sans">Our Story</span>
    <h1 class="text-5xl md:text-6xl font-serif font-bold text-brand-dark mt-2 mb-6">M7 Philippine Cambridge</h1>
    <div class="w-24 h-1 bg-brand-yellow mx-auto"></div>
</div>

<div class="max-w-4xl mx-auto px-4 pb-24 text-lg text-gray-600 leading-relaxed space-y-8 text-center font-light">
    <p>
        M7 Philippine Cambridge International School, Inc. was established with a vision to bring world-class education to Cavite. We are a non-sectarian, co-educational institution dedicated to academic excellence and character formation.
    </p>
    <p class="text-xl text-brand-blue font-serif font-medium">
        Built on the pillars of Unity, Integrity, and Growth, we strive to mold the next generation of global leaders.
    </p>

    <!-- Mission/Vision Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16 text-left">
        <!-- Mission -->
        <div class="bg-gray-50 p-8 rounded-2xl border-t-4 border-brand-blue shadow-lg hover:-translate-y-1 transition">
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4 text-2xl">🚀</div>
            <h3 class="font-royal font-bold text-brand-dark mb-3 text-xl">Mission</h3>
            <p class="text-sm">To provide a holistic education that empowers students to achieve their full potential through international standards.</p>
        </div>
        <!-- Vision -->
        <div class="bg-gray-50 p-8 rounded-2xl border-t-4 border-brand-red shadow-lg hover:-translate-y-1 transition">
            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-4 text-2xl">👁️</div>
            <h3 class="font-royal font-bold text-brand-dark mb-3 text-xl">Vision</h3>
            <p class="text-sm">To be the premier provider of international education in the region, recognized for academic excellence.</p>
        </div>
        <!-- Values -->
        <div class="bg-gray-50 p-8 rounded-2xl border-t-4 border-brand-green shadow-lg hover:-translate-y-1 transition">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4 text-2xl">💎</div>
            <h3 class="font-royal font-bold text-brand-dark mb-3 text-xl">Core Values</h3>
            <p class="text-sm">Global Competence, Ethical Consciousness, and Lifelong Learning.</p>
        </div>
    </div>
</div>
@endsection