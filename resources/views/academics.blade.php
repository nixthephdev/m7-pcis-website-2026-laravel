@extends('layouts.app')

@section('title', 'Academics - M7 PCIS')

@section('content')

<!-- HERO: Unbroken Flow -->
<div class="relative h-[80vh] flex items-center justify-center overflow-hidden bg-brand-blue">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1427504746696-ea5abd71a32f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" class="w-full h-full object-cover opacity-30" alt="Library">
        <div class="absolute inset-0 bg-gradient-to-r from-brand-blue to-brand-dark opacity-90"></div>
    </div>
    <div class="relative z-10 max-w-[1400px] mx-auto px-4 text-center">
        <h1 class="font-header font-bold text-5xl md:text-7xl text-white mb-6 drop-shadow-2xl">
            A Seamless Journey of Academic Excellence
        </h1>
        <p class="text-xl text-blue-100 font-light max-w-4xl mx-auto">
            From the curiosity of Early Years to the rigor of Senior High, the Cambridge Pathway prepares students for life.
        </p>
    </div>
</div>

<!-- THE PATHWAY (Z-Pattern Layout) -->
<div class="py-24 bg-white overflow-hidden">
    <div class="max-w-[1400px] mx-auto px-4 space-y-32">

        <!-- 1. EARLY YEARS (Yellow Theme) -->
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 relative group">
                <!-- Decorative Blob -->
                <div class="absolute -top-10 -left-10 w-64 h-64 bg-brand-yellow/20 rounded-full blur-3xl"></div>
                <img src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                     class="relative z-10 rounded-[3rem] shadow-2xl border-8 border-white transform group-hover:rotate-1 transition duration-500" alt="Preschool">
            </div>
            <div class="lg:w-1/2">
                <span class="text-brand-gold font-bold tracking-widest uppercase text-sm mb-2 block font-sub">The Foundation</span>
                <h2 class="text-5xl font-header font-bold text-brand-blue mb-6">Early Years Programme</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-8 font-light">
                    We nurture curiosity through play. Our <strong class="text-brand-gold">Kindergarten</strong> program integrates social-emotional development with basic literacy and numeracy, creating a safe space for discovery.
                </p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-brand-gold font-bold text-xl">1</div>
                        <span class="text-gray-700 font-medium">Play-based Inquiry</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-brand-gold font-bold text-xl">2</div>
                        <span class="text-gray-700 font-medium">Emotional Intelligence</span>
                    </li>
                </ul>
                <a href="{{ route('apply.form') }}" class="text-brand-gold font-bold text-lg hover:underline decoration-4 underline-offset-8">Apply for Kindergarten &rarr;</a>
            </div>
        </div>

        <!-- 2. PRIMARY (Red Theme) -->
        <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
            <div class="lg:w-1/2 relative group">
                <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-brand-red/10 rounded-full blur-3xl"></div>
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                     class="relative z-10 rounded-[3rem] shadow-2xl border-8 border-white transform group-hover:-rotate-1 transition duration-500" alt="Grade School">
            </div>
            <div class="lg:w-1/2">
                <span class="text-brand-red font-bold tracking-widest uppercase text-sm mb-2 block font-sub">Building Blocks</span>
                <h2 class="text-5xl font-header font-bold text-brand-blue mb-6">Primary School</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-8 font-light">
                    Students engage with the <strong class="text-brand-red">Cambridge Primary</strong> curriculum. We focus on English, Math, and Science mastery while encouraging them to ask "Why?" and "How?".
                </p>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-red-50 p-4 rounded-xl border-l-4 border-brand-red">
                        <h4 class="font-bold text-brand-red">Global Perspectives</h4>
                        <p class="text-xs text-gray-600">Understanding the world.</p>
                    </div>
                    <div class="bg-red-50 p-4 rounded-xl border-l-4 border-brand-red">
                        <h4 class="font-bold text-brand-red">Digital Literacy</h4>
                        <p class="text-xs text-gray-600">Future-ready skills.</p>
                    </div>
                </div>
                <a href="{{ route('apply.form') }}" class="text-brand-red font-bold text-lg hover:underline decoration-4 underline-offset-8">Apply for Grades 1-6 &rarr;</a>
            </div>
        </div>

        <!-- 3. HIGH SCHOOL (Blue Theme) -->
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 relative group">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-brand-blue/10 rounded-full blur-3xl"></div>
                <img src="https://images.unsplash.com/photo-1529390003361-841c781e22fb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                     class="relative z-10 rounded-[3rem] shadow-2xl border-8 border-white transform group-hover:scale-105 transition duration-500" alt="High School">
            </div>
            <div class="lg:w-1/2">
                <span class="text-brand-blue font-bold tracking-widest uppercase text-sm mb-2 block font-sub">Future Leaders</span>
                <h2 class="text-5xl font-header font-bold text-brand-blue mb-6">Junior & Senior High</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-8 font-light">
                    The final stage. Our <strong class="text-brand-blue">Senior High School</strong> program offers specialized tracks (STEM, ABM, HUMSS) aligned with top university standards locally and abroad.
                </p>
                <a href="{{ route('apply.form') }}" class="inline-block bg-brand-blue text-white px-10 py-4 rounded-full shadow-lg hover:bg-[#003f75] transition font-bold text-lg tracking-wide">
                    View Senior High Tracks
                </a>
            </div>
        </div>

    </div>
</div>
@endsection