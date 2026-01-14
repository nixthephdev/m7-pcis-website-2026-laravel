@extends('layouts.app')

@section('title', 'About Us - M7 PCIS')

@section('content')

<!-- SECTION 1: HERO (HIMAY: Fluid Readability) -->
<div class="relative h-[85vh] flex items-center justify-center overflow-hidden bg-gray-900">
    
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
             class="w-full h-full object-cover" 
             alt="Students Collaborating">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    
    <!-- Wider Container -->
    <div class="relative z-10 max-w-[1400px] mx-auto px-4 text-center">
        <!-- No <br> tags. Let the text flow. -->
        <h1 class="font-header font-bold text-4xl md:text-6xl lg:text-7xl text-brand-gold uppercase tracking-wider leading-tight drop-shadow-2xl">
            Shaping Global Citizens Rooted in Values
        </h1>
        
        <p class="mt-6 text-white/90 text-lg md:text-xl font-light max-w-4xl mx-auto tracking-wide">
            A non-sectarian, co-educational institution dedicated to academic excellence and character formation in Cavite.
        </p>
    </div>
</div>



<!-- SECTION 2: STRATEGIC MILESTONES (The Vibrant Roadmap we made) -->
<div class="py-24 bg-bg-primary">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-header font-bold text-brand-blue mb-4">Our Strategic Journey</h2>
            <p class="text-gray-600 font-light max-w-2xl mx-auto">Tracing our path from foundation to becoming a global leader in education.</p>
        </div>
        <div class="relative">
            <div class="hidden md:block absolute top-0 left-0 w-full h-1 bg-gray-200 transform translate-y-8 z-0"></div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10">
                <!-- Milestone 1 -->
                <div class="group">
                    <div class="flex items-center justify-center mb-6 md:justify-start">
                        <div class="w-16 h-16 bg-brand-blue text-white rounded-full flex items-center justify-center shadow-lg shadow-blue-200 group-hover:scale-110 transition duration-300 relative z-10 border-4 border-white">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div class="md:hidden w-full h-1 bg-gray-200 ml-4"></div>
                    </div>
                    <div class="bg-gradient-to-b from-blue-50 to-white p-8 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 h-full border border-blue-100">
                        <span class="text-brand-blue font-bold tracking-widest uppercase text-xs mb-3 block font-sub">April 2024</span>
                        <h3 class="font-header font-bold text-xl text-brand-blue mb-3">Foundation</h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-5 font-light">PCIS established in Imus, Cavite with a vision to provide world-class IB education.</p>
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-brand-blue text-white shadow-sm">✓ Completed</span>
                    </div>
                </div>
                <!-- Milestone 2 -->
                <div class="group">
                    <div class="flex items-center justify-center mb-6 md:justify-start">
                        <div class="w-16 h-16 bg-[#009245] text-white rounded-full flex items-center justify-center shadow-lg shadow-green-200 group-hover:scale-110 transition duration-300 relative z-10 border-4 border-white">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="md:hidden w-full h-1 bg-gray-200 ml-4"></div>
                    </div>
                    <div class="bg-gradient-to-b from-green-50 to-white p-8 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 h-full border border-green-100">
                        <span class="text-[#009245] font-bold tracking-widest uppercase text-xs mb-3 block font-sub">July 2025</span>
                        <h3 class="font-header font-bold text-xl text-[#009245] mb-3">IB Candidacy (DP)</h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-5 font-light">Official application for the Diploma Programme to ensure college readiness.</p>
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-[#009245] text-white shadow-sm">✓ Approved</span>
                    </div>
                </div>
                <!-- Milestone 3 -->
                <div class="group">
                    <div class="flex items-center justify-center mb-6 md:justify-start">
                        <div class="w-16 h-16 bg-brand-gold text-white rounded-full flex items-center justify-center shadow-lg shadow-yellow-200 group-hover:scale-110 transition duration-300 relative z-10 border-4 border-white">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        </div>
                        <div class="md:hidden w-full h-1 bg-gray-200 ml-4"></div>
                    </div>
                    <div class="bg-gradient-to-b from-yellow-50 to-white p-8 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 h-full border border-yellow-100">
                        <span class="text-brand-gold font-bold tracking-widest uppercase text-xs mb-3 block font-sub">October 2025</span>
                        <h3 class="font-header font-bold text-xl text-[#b47800] mb-3">Expansion</h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-5 font-light">Expanding candidacy to include Primary Years (PYP) and Middle Years (MYP).</p>
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-brand-gold text-white shadow-sm">⏳ In Progress</span>
                    </div>
                </div>
                <!-- Milestone 4 -->
                <div class="group">
                    <div class="flex items-center justify-center mb-6 md:justify-start">
                        <div class="w-16 h-16 bg-brand-red text-white rounded-full flex items-center justify-center shadow-lg shadow-red-200 group-hover:scale-110 transition duration-300 relative z-10 border-4 border-white">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        </div>
                        <div class="md:hidden w-full h-1 bg-gray-200 ml-4"></div>
                    </div>
                    <div class="bg-gradient-to-b from-red-50 to-white p-8 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 h-full border border-red-100">
                        <span class="text-brand-red font-bold tracking-widest uppercase text-xs mb-3 block font-sub">August 2026</span>
                        <h3 class="font-header font-bold text-xl text-brand-red mb-3">Authorization</h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-5 font-light">Target date for full International Baccalaureate World School status.</p>
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-brand-red text-white shadow-sm">🎯 Goal</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 3: CORE PILLARS (The Bookmark Design) -->
<div class="py-24 bg-gray-50 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5 pointer-events-none bg-[radial-gradient(#00539C_1px,transparent_1px)] [background-size:20px_20px]"></div>
    <div class="max-w-[1400px] mx-auto px-4 relative z-10">
        <div class="text-center mb-24">
            <h2 class="text-5xl font-header font-bold text-brand-blue mb-4 drop-shadow-sm">Why Families Choose PCIS</h2>
            <div class="w-24 h-1.5 bg-brand-gold mx-auto rounded-full mb-4"></div>
            <p class="text-gray-600 font-light text-lg">Five pillars that define our educational philosophy.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8 mt-12">
            <!-- Card 1 -->
            <div class="relative pt-16 group">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-28 h-28 rounded-full p-1.5 bg-white shadow-2xl z-20 group-hover:-translate-y-2 transition duration-500">
                    <div class="w-full h-full rounded-full border-[6px] border-brand-red bg-gradient-to-br from-brand-blue to-[#003366] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white drop-shadow-md" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l11 6 9-4.91V17h2V9M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/></svg>
                    </div>
                </div>
                <div class="bg-white pt-20 pb-12 px-6 rounded-t-2xl rounded-b-[3.5rem] shadow-lg hover:shadow-2xl hover:shadow-red-900/10 transition duration-500 text-center h-full relative z-10 border-t-8 border-brand-red flex flex-col">
                    <h3 class="font-header font-bold text-brand-blue text-2xl mb-3">Academic Rigor</h3>
                    <div class="w-12 h-1 bg-brand-red mx-auto mb-5 rounded-full opacity-50"></div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">International Standards</p>
                    <p class="text-sm text-gray-600 leading-relaxed font-medium">Your child's education at PCIS holds value wherever life takes them.</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="relative pt-16 group">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-28 h-28 rounded-full p-1.5 bg-white shadow-2xl z-20 group-hover:-translate-y-2 transition duration-500">
                    <div class="w-full h-full rounded-full border-[6px] border-brand-blue bg-gradient-to-br from-brand-blue to-[#003366] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white drop-shadow-md" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-1.07 3.97-2.1 5.39z"/></svg>
                    </div>
                </div>
                <div class="bg-white pt-20 pb-12 px-6 rounded-t-2xl rounded-b-[3.5rem] shadow-lg hover:shadow-2xl hover:shadow-blue-900/10 transition duration-500 text-center h-full relative z-10 border-t-8 border-brand-blue flex flex-col">
                    <h3 class="font-header font-bold text-brand-blue text-2xl mb-3">Multicultural</h3>
                    <div class="w-12 h-1 bg-brand-blue mx-auto mb-5 rounded-full opacity-50"></div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Real-World Readiness</p>
                    <p class="text-sm text-gray-600 leading-relaxed font-medium">Everyday interactions prepare your child for the global stage.</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="relative pt-16 group">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-28 h-28 rounded-full p-1.5 bg-white shadow-2xl z-20 group-hover:-translate-y-2 transition duration-500">
                    <div class="w-full h-full rounded-full border-[6px] border-brand-gold bg-gradient-to-br from-brand-blue to-[#003366] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white drop-shadow-md" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                </div>
                <div class="bg-white pt-20 pb-12 px-6 rounded-t-2xl rounded-b-[3.5rem] shadow-lg hover:shadow-2xl hover:shadow-yellow-900/10 transition duration-500 text-center h-full relative z-10 border-t-8 border-brand-gold flex flex-col">
                    <h3 class="font-header font-bold text-brand-blue text-2xl mb-3">Personalized</h3>
                    <div class="w-12 h-1 bg-brand-gold mx-auto mb-5 rounded-full opacity-50"></div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Small, Attentive, Human</p>
                    <p class="text-sm text-gray-600 leading-relaxed font-medium">Here, every child is seen, guided, and supported.</p>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="relative pt-16 group">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-28 h-28 rounded-full p-1.5 bg-white shadow-2xl z-20 group-hover:-translate-y-2 transition duration-500">
                    <div class="w-full h-full rounded-full border-[6px] border-brand-teal bg-gradient-to-br from-brand-blue to-[#003366] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white drop-shadow-md" fill="currentColor" viewBox="0 0 24 24"><path d="M13.13 22.19L11.5 18.36C13.07 17.78 14.54 17 15.9 16.09L13.13 22.19M5.64 12.5L1.81 10.87L7.91 8.1C7 9.46 6.22 10.93 5.64 12.5M21.61 2.39C21.61 2.39 16.66 .269 11 5.93C8.81 8.12 7.5 10.53 6.65 12.64C6.37 13.39 6.56 14.21 7.11 14.77L9.24 16.89C9.79 17.45 10.61 17.63 11.36 17.35C13.47 16.5 15.88 15.19 18.07 13C23.73 7.34 21.61 2.39 21.61 2.39M14.54 9.46C13.76 8.68 13.76 7.41 14.54 6.63S16.59 5.85 17.37 6.63C18.14 7.41 18.15 8.68 17.37 9.46C16.59 10.24 15.32 10.24 14.54 9.46M8.88 16.53L7.47 15.12L8.88 16.53M6.24 22L9.88 18.36C9.53 18.27 9.21 18.11 8.91 17.91L4.83 22H6.24M2 22H3.41L8.18 17.24L6.76 15.82L2 20.59V22Z"/></svg>
                    </div>
                </div>
                <div class="bg-white pt-20 pb-12 px-6 rounded-t-2xl rounded-b-[3.5rem] shadow-lg hover:shadow-2xl hover:shadow-teal-900/10 transition duration-500 text-center h-full relative z-10 border-t-8 border-brand-teal flex flex-col">
                    <h3 class="font-header font-bold text-brand-blue text-2xl mb-3">Future Ready</h3>
                    <div class="w-12 h-1 bg-brand-teal mx-auto mb-5 rounded-full opacity-50"></div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Skills Beyond Academics</p>
                    <p class="text-sm text-gray-600 leading-relaxed font-medium">Equipping students with the thinking skills and resilience to thrive.</p>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="relative pt-16 group">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-28 h-28 rounded-full p-1.5 bg-white shadow-2xl z-20 group-hover:-translate-y-2 transition duration-500">
                    <div class="w-full h-full rounded-full border-[6px] border-brand-red bg-gradient-to-br from-brand-blue to-[#003366] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white drop-shadow-md" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    </div>
                </div>
                <div class="bg-white pt-20 pb-12 px-6 rounded-t-2xl rounded-b-[3.5rem] shadow-lg hover:shadow-2xl hover:shadow-red-900/10 transition duration-500 text-center h-full relative z-10 border-t-8 border-brand-red flex flex-col">
                    <h3 class="font-header font-bold text-brand-blue text-2xl mb-3">Inclusive</h3>
                    <div class="w-12 h-1 bg-brand-red mx-auto mb-5 rounded-full opacity-50"></div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Belonging for All</p>
                    <p class="text-sm text-gray-600 leading-relaxed font-medium">Families trust PCIS because no child is left behind.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 4: PARENT TESTIMONIAL (The Framed Style) -->
<div class="py-24 bg-white relative">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-header font-bold text-brand-blue mb-12">Voices of our Community</h2>
        <div class="max-w-[400px] mx-auto relative">
            <div class="rounded-[3rem] border-[12px] border-gray-400 bg-white overflow-hidden shadow-2xl">
                <div class="relative h-80 w-full">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/10 to-transparent"></div>
                    <div class="absolute top-6 left-6 text-white/90 drop-shadow-md">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div class="absolute top-6 right-6 text-white/90 drop-shadow-md">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.2h7.6l-6 4.8 2.4 7.2-6-4.8-6 4.8 2.4-7.2-6-4.8h7.6z"/></svg>
                    </div>
                </div>
                <div class="p-8 bg-white text-center">
                    <p class="font-header italic text-lg text-brand-blue leading-relaxed mb-6">“We chose PCIS because we wanted more than academics. My child feels supported, challenged, and excited to go to school every day.”</p>
                    <div class="w-12 h-1 bg-brand-gold mx-auto mb-4 rounded-full"></div>
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wide">Parent of Grade 7 Student</p>
                </div>
            </div>
            <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 w-3/4 h-4 bg-black/20 blur-xl rounded-[100%] -z-10"></div>
        </div>
    </div>
</div>

@endsection