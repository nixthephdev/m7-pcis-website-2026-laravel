@extends('layouts.app')

@section('title', 'Life at PCIS')

@section('content')

<div class="bg-brand-yellow py-24 text-center text-brand-dark">
    <h1 class="text-5xl font-serif font-bold mb-6">Life at PCIS</h1>
    <p class="text-xl font-light">Beyond the classroom: Sports, Arts, and Community.</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-24">
    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20">
        <div class="h-80 relative group overflow-hidden rounded-2xl shadow-lg">
            <img src="https://images.unsplash.com/photo-1564419434663-c49967363849?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute inset-0 bg-brand-blue/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                <span class="text-white font-royal font-bold text-2xl">Sports</span>
            </div>
        </div>
        <div class="h-80 relative group overflow-hidden rounded-2xl shadow-lg mt-0 md:-mt-10"> <!-- Staggered Effect -->
            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute inset-0 bg-brand-red/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                <span class="text-white font-royal font-bold text-2xl">Community</span>
            </div>
        </div>
        <div class="h-80 relative group overflow-hidden rounded-2xl shadow-lg">
            <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute inset-0 bg-brand-yellow/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                <span class="text-brand-dark font-royal font-bold text-2xl">Arts & Music</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div>
            <h2 class="text-4xl font-serif font-bold text-brand-dark mb-6">Holistic Development</h2>
            <p class="text-gray-600 leading-relaxed mb-6 text-lg font-light">
                We believe that a happy child learns best. Our campus life is vibrant, inclusive, and designed to help students discover their passions.
            </p>
            <a href="{{ route('apply.form') }}" class="text-brand-blue font-bold hover:underline">Join our community &rarr;</a>
        </div>
        <div class="bg-gray-50 p-10 rounded-3xl border-l-8 border-brand-yellow shadow-lg">
            <h3 class="font-royal font-bold text-2xl mb-6 text-brand-dark">Student Clubs</h3>
            <ul class="grid grid-cols-2 gap-4 text-sm text-gray-700 font-medium">
                <li>🤖 Robotics Club</li>
                <li>🗣️ Debate Team</li>
                <li>🎵 Glee Club</li>
                <li>⚽ Football Varsity</li>
                <li>⚖️ Student Council</li>
                <li>🌱 Eco-Warriors</li>
            </ul>
        </div>
    </div>
</div>
@endsection