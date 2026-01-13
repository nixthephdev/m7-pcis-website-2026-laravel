@extends('layouts.app')

@section('title', 'Admissions Process - M7 PCIS')

@section('content')

<!-- HERO: Split Layout (New Working Image) -->
<div class="relative min-h-[85vh] flex items-center bg-gray-50 overflow-hidden">
    
    <!-- Background Image (Left Side Focus) -->
    <div class="absolute top-0 left-0 w-full lg:w-2/3 h-full">
        <!-- New Image: Mother and Child Walking -->
        <img src="https://images.unsplash.com/photo-1764816650080-7eb359f0afc5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8c21pbGluZyUyMGtpZCUyMGFuZCUyMGElMjBwYXJlbnR8ZW58MHx8MHx8fDA%3D" 
             class="w-full h-full object-cover" 
             alt="Parent and Child Journey">
        <!-- Gradient Fade to White on the right -->
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-transparent to-white/90 lg:to-transparent"></div>
    </div>

    <!-- Right Side Content Card -->
    <div class="relative z-10 w-full max-w-[1400px] mx-auto px-4 flex justify-end">
        <div class="lg:w-1/2 bg-white/95 backdrop-blur-sm p-12 md:p-16 rounded-[3rem] shadow-2xl border border-white mt-20 lg:mt-0 relative">
            
            <!-- Headline -->
            <h1 class="font-header font-bold text-5xl md:text-6xl text-brand-blue leading-tight mb-6">
                Your Child’s Journey To A <br> 
                <span class="text-brand-gold">Global Education</span>
            </h1>
            
            <!-- Subtext -->
            <p class="text-gray-600 text-lg leading-relaxed mb-10 font-light">
                From your first inquiry to your child's first day at PCIS, we make the journey simple, supportive, and inspiring.
            </p>
            
            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#" class="bg-brand-blue text-white px-8 py-4 rounded-full shadow-lg hover:bg-[#003f75] transition font-bold text-center">
                    Book a Campus Tour
                </a>
                <a href="{{ route('apply.form') }}" class="bg-[#8b5cf6] text-white px-8 py-4 rounded-full shadow-lg hover:bg-[#7c3aed] transition font-bold text-center">
                    Start Application
                </a>
            </div>

        </div>
    </div>
</div>
<!-- SECTION 2: ADMISSIONS PROCESS (Chevron Style) -->
<div class="py-24 bg-white">
    <div class="max-w-[1400px] mx-auto px-4 text-center">
        
        <h2 class="text-5xl font-header font-bold text-brand-blue mb-16 uppercase tracking-wider">Admissions</h2>

        <!-- CHEVRON CONTAINER -->
        <div class="flex flex-col md:flex-row justify-center items-stretch gap-1 md:gap-0 mb-12 filter drop-shadow-xl">
            
            <!-- Step 1: Inquiry (Blue) -->
            <div class="relative flex-1 bg-blue-600 text-white p-6 flex items-center justify-center md:clip-chevron-start z-50">
                <span class="font-bold text-lg">Inquiry</span>
            </div>

            <!-- Step 2: Campus Tour (Green) -->
            <div class="relative flex-1 bg-green-600 text-white p-6 flex items-center justify-center md:clip-chevron md:-ml-4 z-40">
                <span class="font-bold text-lg">Campus Tour</span>
            </div>

            <!-- Step 3: Application Form (Orange) -->
            <div class="relative flex-1 bg-orange-500 text-white p-6 flex items-center justify-center md:clip-chevron md:-ml-4 z-30">
                <span class="font-bold text-lg">Application Form</span>
            </div>

            <!-- Step 4: Assessment (Red) -->
            <div class="relative flex-1 bg-red-600 text-white p-6 flex items-center justify-center md:clip-chevron md:-ml-4 z-20">
                <span class="font-bold text-lg">Assessment</span>
            </div>

            <!-- Step 5: Welcome (Navy - Fixed Shape) -->
            <div class="relative flex-1 bg-[#0a1a4a] text-white p-6 flex items-center justify-center md:clip-chevron-final md:-ml-4 z-10 shadow-lg">
                <span class="font-bold text-sm leading-tight text-center">
                    Welcome to the PCIS<br>Family
                </span>
            </div>

        </div>

        <!-- Subtext Row -->
        <div class="hidden md:grid grid-cols-5 text-center text-xs text-gray-500 font-medium uppercase tracking-wide mb-16 px-4">
            <div>Start your child's journey</div>
            <div>See the future in action</div>
            <div>Secure your slot</div>
            <div>Showcase potential</div>
            <div>Your future begins here</div>
        </div>

        <!-- CTA Button -->
        <a href="{{ route('apply.form') }}" class="inline-block bg-brand-red text-white px-12 py-4 rounded-full shadow-lg hover:bg-[#b01b2e] transition transform hover:-translate-y-1 font-bold text-lg tracking-wide border-4 border-white ring-4 ring-brand-red/20">
            Secure Your Slot Today
        </a>

    </div>
</div>

<!-- CSS for Chevrons (Add this inside the <head> or at the bottom of the file) -->
<style>
    @media (min-width: 768px) {
        .md\:clip-chevron {
            clip-path: polygon(0% 0%, 90% 0%, 100% 50%, 90% 100%, 0% 100%, 10% 50%);
        }
        .md\:clip-chevron-start {
            clip-path: polygon(0% 0%, 90% 0%, 100% 50%, 90% 100%, 0% 100%); /* Flat Left, Arrow Right */
        }
        /* ADD THIS NEW CLASS FOR THE LAST ITEM */
        .md\:clip-chevron-end {
            clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%, 10% 50%); /* Arrow Left, Flat Right */
        }
        /* Arrow on Left, Flat on Right */
        .md\:clip-chevron-final {
            clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%, 10% 50%);
        }
    }
</style>

<!-- SECTION 3: WHY CHOOSE PCIS (Centered List) -->
<div class="py-24 bg-bg-secondary">
    <div class="max-w-4xl mx-auto px-4 text-center">
        
        <!-- Headline -->
        <h2 class="text-4xl md:text-5xl font-header font-bold text-brand-blue mb-12 drop-shadow-sm">
            Why families choose PCIS over others.
        </h2>

        <!-- Centered Bullet List -->
        <div class="inline-block text-left mb-16">
            <ul class="space-y-6 text-lg md:text-xl text-brand-blue font-medium">
                <li class="flex items-center">
                    <span class="text-2xl mr-4 text-brand-blue">•</span> Global pathways
                </li>
                <li class="flex items-center">
                    <span class="text-2xl mr-4 text-brand-blue">•</span> Low student-teacher ratio
                </li>
                <li class="flex items-center">
                    <span class="text-2xl mr-4 text-brand-blue">•</span> IB-ready curriculum
                </li>
                <li class="flex items-center">
                    <span class="text-2xl mr-4 text-brand-blue">•</span> Safe, family-like campus culture
                </li>
                <li class="flex items-center">
                    <span class="text-2xl mr-4 text-brand-blue">•</span> International + Filipino student mix
                </li>
            </ul>
        </div>

        <!-- CTA Button -->
        <div>
            <a href="{{ route('apply.form') }}" class="inline-block bg-[#004080] text-white px-10 py-4 rounded-full shadow-lg hover:bg-[#003366] transition transform hover:-translate-y-1 font-bold text-sm tracking-wide border-2 border-[#004080]">
                Secure Your Slot Today
            </a>
        </div>

    </div>
</div>
        </div>
    </div>
</div>

@endsection