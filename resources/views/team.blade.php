@extends('layouts.app')

@section('title', 'Academic Team - PCIS')

@section('content')

<div class="bg-brand-blue py-24 text-center text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-brand-blue to-brand-dark opacity-90"></div>
    <div class="relative z-10">
        <h1 class="text-5xl font-serif font-bold mb-4">Our Academic Team</h1>
        <p class="text-xl text-blue-100 font-light">World-class educators dedicated to your child's growth.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-24">
    <!-- Leadership -->
    <div class="text-center mb-20">
        <h2 class="text-3xl font-royal font-bold text-brand-dark mb-12">School Leadership</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-4xl mx-auto">
            <!-- Person 1 -->
            <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 flex flex-col items-center">
                <div class="w-32 h-32 bg-gray-200 rounded-full mb-6 overflow-hidden border-4 border-brand-gold">
                    <!-- Placeholder Image -->
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                </div>
                <h3 class="font-serif font-bold text-2xl text-brand-blue">Dr. Juan Dela Cruz</h3>
                <p class="text-brand-red font-bold text-xs uppercase tracking-widest mb-4">School Director</p>
                <p class="text-gray-600 text-sm font-light">PhD in Education Management with 20 years of experience in international schooling.</p>
            </div>
            <!-- Person 2 -->
            <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 flex flex-col items-center">
                <div class="w-32 h-32 bg-gray-200 rounded-full mb-6 overflow-hidden border-4 border-brand-blue">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                </div>
                <h3 class="font-serif font-bold text-2xl text-brand-blue">Ms. Maria Santos</h3>
                <p class="text-brand-red font-bold text-xs uppercase tracking-widest mb-4">Deputy Headmaster</p>
                <p class="text-gray-600 text-sm font-light">Specialist in Cambridge Curriculum implementation and student welfare.</p>
            </div>
        </div>
    </div>
</div>
@endsection