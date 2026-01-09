@extends('layouts.app')

@section('title', 'Academics - M7 Philippine Cambridge School')

@section('content')

<!-- Header -->
<div class="bg-brand-blue py-24 text-center text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <h1 class="text-5xl md:text-6xl font-serif font-bold mb-6">Academic Excellence</h1>
        <p class="text-xl text-blue-100 font-light leading-relaxed">
            A seamless educational journey from early years to university preparation, grounded in the Cambridge Pathway.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-24">

    <!-- Preschool (Yellow Theme) -->
    <div class="flex flex-col md:flex-row items-center gap-16 mb-32">
        <div class="md:w-1/2 relative group">
            <div class="absolute -inset-4 bg-brand-yellow/20 rounded-2xl transform rotate-2 group-hover:rotate-0 transition duration-500"></div>
            <img src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="rounded-2xl shadow-2xl relative z-10 w-full border-4 border-white" alt="Preschool">
        </div>
        <div class="md:w-1/2">
            <span class="text-brand-yellow font-bold tracking-widest uppercase text-xs mb-2 block font-sans">The Foundation</span>
            <h2 class="text-4xl font-serif font-bold text-brand-blue mb-6">Early Years</h2>
            <p class="text-gray-600 leading-relaxed mb-8 text-lg font-light">
                Sparking curiosity through play. Our <strong class="text-brand-yellow">Early Years</strong> program focuses on social-emotional development, creativity, and the joy of discovery. We build the confidence needed for lifelong learning.
            </p>
            <ul class="space-y-3 mb-8 font-medium text-gray-700">
                <li class="flex items-center"><span class="w-2 h-2 bg-brand-yellow rounded-full mr-3"></span> Play-based Learning</li>
                <li class="flex items-center"><span class="w-2 h-2 bg-brand-yellow rounded-full mr-3"></span> Social Skills Development</li>
                <li class="flex items-center"><span class="w-2 h-2 bg-brand-yellow rounded-full mr-3"></span> Basic Numeracy & Literacy</li>
            </ul>
            <a href="{{ route('apply.form') }}" class="inline-block border-b-2 border-brand-yellow text-brand-dark font-bold hover:text-brand-yellow transition pb-1">Apply for Preschool &rarr;</a>
        </div>
    </div>

    <!-- Grade School (Red Theme) -->
    <div class="flex flex-col md:flex-row-reverse items-center gap-16 mb-32">
        <div class="md:w-1/2 relative group">
            <div class="absolute -inset-4 bg-brand-red/20 rounded-2xl transform -rotate-2 group-hover:rotate-0 transition duration-500"></div>
            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="rounded-2xl shadow-2xl relative z-10 w-full border-4 border-white" alt="Grade School">
        </div>
        <div class="md:w-1/2">
            <span class="text-brand-red font-bold tracking-widest uppercase text-xs mb-2 block font-sans">Building Knowledge</span>
            <h2 class="text-4xl font-serif font-bold text-brand-blue mb-6">Primary School</h2>
            <p class="text-gray-600 leading-relaxed mb-8 text-lg font-light">
                Students engage with the <strong class="text-brand-red">Cambridge Primary</strong> curriculum, developing critical thinking skills in Science, Mathematics, and English that prepare them for the global stage.
            </p>
            <ul class="space-y-3 mb-8 font-medium text-gray-700">
                <li class="flex items-center"><span class="w-2 h-2 bg-brand-red rounded-full mr-3"></span> Cambridge Primary Curriculum</li>
                <li class="flex items-center"><span class="w-2 h-2 bg-brand-red rounded-full mr-3"></span> Global Perspectives</li>
                <li class="flex items-center"><span class="w-2 h-2 bg-brand-red rounded-full mr-3"></span> ICT & Digital Literacy</li>
            </ul>
            <a href="{{ route('apply.form') }}" class="inline-block border-b-2 border-brand-red text-brand-dark font-bold hover:text-brand-red transition pb-1">Apply for Grade School &rarr;</a>
        </div>
    </div>

    <!-- High School (Blue Theme) -->
    <div class="flex flex-col md:flex-row items-center gap-16">
        <div class="md:w-1/2 relative group">
            <div class="absolute -inset-4 bg-brand-blue/20 rounded-2xl transform rotate-2 group-hover:rotate-0 transition duration-500"></div>
            <img src="https://images.unsplash.com/photo-1529390003361-841c781e22fb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="rounded-2xl shadow-2xl relative z-10 w-full border-4 border-white" alt="High School">
        </div>
        <div class="md:w-1/2">
            <span class="text-brand-blue font-bold tracking-widest uppercase text-xs mb-2 block font-sans">Future Leaders</span>
            <h2 class="text-4xl font-serif font-bold text-brand-blue mb-6">High School</h2>
            <p class="text-gray-600 leading-relaxed mb-8 text-lg font-light">
                Preparing for university and beyond. Our <strong class="text-brand-blue">Senior High School</strong> program offers specialized tracks and leadership training aligned with top university standards.
            </p>
            <ul class="space-y-3 mb-8 font-medium text-gray-700">
                <li class="flex items-center"><span class="w-2 h-2 bg-brand-blue rounded-full mr-3"></span> College Preparatory Tracks</li>
                <li class="flex items-center"><span class="w-2 h-2 bg-brand-blue rounded-full mr-3"></span> Leadership Development</li>
                <li class="flex items-center"><span class="w-2 h-2 bg-brand-blue rounded-full mr-3"></span> Career Guidance</li>
            </ul>
            <a href="{{ route('apply.form') }}" class="inline-block border-b-2 border-brand-blue text-brand-dark font-bold hover:text-brand-blue transition pb-1">Apply for High School &rarr;</a>
        </div>
    </div>

</div>
@endsection