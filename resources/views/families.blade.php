@extends('layouts.app')

@section('title', 'International Families - PCIS')

@section('content')

<div class="relative bg-brand-green py-24 text-center text-white overflow-hidden">
    <!-- Pattern Overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/world-map.png')] opacity-10"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <h1 class="text-5xl font-serif font-bold mb-6">International Families Hub</h1>
        <p class="text-xl text-green-100 font-light">Welcome to the Philippines. We are here to make your transition smooth and successful.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-24">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-24">
        <div>
            <h2 class="text-4xl font-serif font-bold text-brand-dark mb-6">A Home Away From Home</h2>
            <p class="text-gray-600 leading-relaxed mb-6 text-lg font-light">
                PCIS is home to students from over 15 different nationalities. We understand the challenges of moving to a new country. Our Hub provides resources and support services to help you settle in Cavite.
            </p>
            <ul class="space-y-4">
                <li class="flex items-center text-gray-700 font-medium"><span class="w-2 h-2 bg-brand-green rounded-full mr-4"></span> Visa & Study Permit Assistance</li>
                <li class="flex items-center text-gray-700 font-medium"><span class="w-2 h-2 bg-brand-green rounded-full mr-4"></span> English as a Second Language (ESL)</li>
                <li class="flex items-center text-gray-700 font-medium"><span class="w-2 h-2 bg-brand-green rounded-full mr-4"></span> Parent Community Events</li>
            </ul>
        </div>
        <div>
            <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" class="rounded-3xl shadow-2xl border-4 border-white transform rotate-2 hover:rotate-0 transition duration-500">
        </div>
    </div>
</div>
@endsection