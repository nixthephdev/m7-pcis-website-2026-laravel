@extends('layouts.app')

@section('title', 'Life at PCIS')

@section('content')

<!-- HERO -->
<div class="bg-brand-gold py-24 text-center text-brand-dark relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diagonal-stripes.png')] opacity-10"></div>
    <div class="relative z-10 max-w-[1400px] mx-auto px-4">
        <h1 class="text-5xl md:text-7xl font-header font-bold mb-6">More Than Just a Classroom</h1>
        <p class="text-xl md:text-2xl font-light">Sports, Arts, Leadership, and a community that feels like family.</p>
    </div>
</div>

<!-- BENTO GRID GALLERY -->
<div class="py-24 bg-white">
    <div class="max-w-[1400px] mx-auto px-4">
        
        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-6 h-[800px] md:h-[600px]">
            
            <!-- Large Item (Sports) -->
            <div class="md:col-span-2 md:row-span-2 relative group overflow-hidden rounded-3xl shadow-lg cursor-pointer">
                <img src="https://images.unsplash.com/photo-1564419434663-c49967363849?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-blue/90 to-transparent flex flex-col justify-end p-8">
                    <h3 class="text-white font-header font-bold text-3xl mb-2">Varsity Sports</h3>
                    <p class="text-blue-100 text-sm opacity-0 group-hover:opacity-100 transition duration-300 transform translate-y-4 group-hover:translate-y-0">Football, Basketball, Volleyball, and Swimming.</p>
                </div>
            </div>

            <!-- Wide Item (Arts) -->
            <div class="md:col-span-2 relative group overflow-hidden rounded-3xl shadow-lg cursor-pointer">
                <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-red/90 to-transparent flex flex-col justify-end p-8">
                    <h3 class="text-white font-header font-bold text-2xl">Creative Arts</h3>
                </div>
            </div>

            <!-- Small Item (Robotics) -->
            <div class="relative group overflow-hidden rounded-3xl shadow-lg cursor-pointer">
                <img src="https://images.unsplash.com/photo-1581092921461-eab62e97a782?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-teal/90 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-white font-header font-bold text-xl">Robotics</h3>
                </div>
            </div>

            <!-- Small Item (Community) -->
            <div class="relative group overflow-hidden rounded-3xl shadow-lg cursor-pointer">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-gold/90 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-white font-header font-bold text-xl">Community</h3>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- CLUBS LIST -->
<div class="py-20 bg-bg-secondary">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-header font-bold text-brand-blue mb-12">Student Organizations</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition flex flex-col items-center">
                <span class="text-4xl mb-3">🗣️</span>
                <span class="font-bold text-gray-700">Debate Team</span>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition flex flex-col items-center">
                <span class="text-4xl mb-3">🌱</span>
                <span class="font-bold text-gray-700">Eco-Warriors</span>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition flex flex-col items-center">
                <span class="text-4xl mb-3">🎵</span>
                <span class="font-bold text-gray-700">Glee Club</span>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition flex flex-col items-center">
                <span class="text-4xl mb-3">♟️</span>
                <span class="font-bold text-gray-700">Chess Club</span>
            </div>
        </div>
    </div>
</div>
@endsection