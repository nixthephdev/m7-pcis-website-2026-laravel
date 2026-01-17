@extends('layouts.app')

@section('title', 'Academic Team - PCIS')

@section('content')

<!-- SECTION 1: HERO (HIMAY: Uninterrupted Flow) -->
<div class="relative h-[85vh] flex items-center justify-center overflow-hidden bg-brand-dark">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
             class="w-full h-full object-cover" 
             alt="PCIS Academic Team">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    
    <!-- Wider Container -->
    <div class="relative z-10 max-w-[1400px] mx-auto px-4 text-center">
        <!-- Removed manual breaks -->
        <h1 class="font-header font-bold text-4xl md:text-6xl lg:text-7xl text-brand-gold uppercase tracking-wide leading-tight mb-6 drop-shadow-2xl">
            Meet the Educators Guiding Tomorrow's Global Citizens
        </h1>
        
        <p class="font-sans text-lg md:text-2xl text-yellow-100/90 font-light tracking-wide max-w-4xl mx-auto">
            Behind every academic milestone is a teacher who believed in your child first.
        </p>
    </div>
</div>
<!-- SECTION 2: MEET THE HEADMASTER (Video Intro Style) -->
<div class="py-24 bg-bg-primary">
    <div class="max-w-7xl mx-auto px-4">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Left: Typography -->
            <div class="text-center lg:text-left">
                <span class="text-brand-red font-bold tracking-widest uppercase text-sm mb-4 block font-sub">Leadership Message</span>
                <h2 class="font-header font-bold text-5xl md:text-7xl text-brand-blue leading-tight mb-6">
                    Meet Our <br>
                    <span class="italic text-brand-gold">Headmaster</span>
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed font-light mb-8 max-w-md mx-auto lg:mx-0">
                    "Education is not just about filling a bucket, but lighting a fire. At PCIS, we ignite the passion for lifelong learning in every student."
                </p>
                
                <!-- Signature / Name -->
                <div class="flex flex-col items-center lg:items-start">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e4/Signature_sample.svg" class="h-12 opacity-60 mb-2" alt="Signature">
                    <p class="font-bold text-brand-dark">Dr. Juan Dela Cruz</p>
                    <p class="text-sm text-gray-500">School Director</p>
                </div>
            </div>

            <!-- Right: Video Thumbnail -->
            <div class="relative group cursor-pointer">
                <!-- Decorative Backdrop -->
                <div class="absolute -inset-4 bg-brand-blue/5 rounded-3xl transform rotate-3 group-hover:rotate-0 transition duration-500"></div>
                
                <!-- Image Container -->
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Headmaster Video" 
                         class="w-full h-[500px] object-cover transform group-hover:scale-105 transition duration-700">
                    
                    <!-- Dark Overlay -->
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition duration-300"></div>

                    <!-- Play Button -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-20 h-20 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-glow group-hover:scale-110 transition duration-300">
                            <svg class="w-8 h-8 text-brand-blue ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>

                    <!-- Tag -->
                    <div class="absolute bottom-6 right-6 bg-black/70 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-lg">
                        30-45 sec warm intro video
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- SECTION 3: FACULTY DEPARTMENTS -->
    <section class="py-24 bg-slate-50 relative overflow-hidden">
        
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03]"></div>

        <div class="max-w-[1400px] mx-auto px-6 relative z-10">
            
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-[#00539C] font-royal font-bold text-3xl md:text-4xl mb-4">Our Faculty & Staff</h2>
                <div class="h-1 w-24 bg-[#D72638] mx-auto rounded-full"></div>
                <p class="text-slate-500 mt-4 max-w-2xl mx-auto">
                    A community of dedicated educators committed to shaping the future of our students.
                </p>
            </div>

            <!-- DEPARTMENTS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- CARD 1: ACADEMIC COUNCIL -->
                <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 hover:-translate-y-2 transition-transform duration-500">
                    <h3 class="text-center font-royal font-bold text-[#00539C] text-lg mb-8 tracking-widest uppercase border-b border-slate-100 pb-4">
                        Academic Council
                    </h3>
                    <div class="grid grid-cols-3 gap-4">
                        <!-- Replace src with actual images -->
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm group">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm group">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm group">
                            <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm group">
                            <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm group">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm group">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                    </div>
                </div>

                <!-- CARD 2: EARLY YEARS (EYP) -->
                <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 hover:-translate-y-2 transition-transform duration-500">
                    <h3 class="text-center font-royal font-bold text-[#00539C] text-lg mb-8 tracking-widest uppercase border-b border-slate-100 pb-4">
                        Early Years (EYP)
                    </h3>
                    <div class="grid grid-cols-3 gap-4">
                        @for($i = 0; $i < 9; $i++)
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm bg-slate-100 group">
                            <img src="https://i.pravatar.cc/300?img={{ $i + 10 }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-500">
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- CARD 3: PRIMARY YEARS (PYP) -->
                <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 hover:-translate-y-2 transition-transform duration-500">
                    <h3 class="text-center font-royal font-bold text-[#00539C] text-lg mb-8 tracking-widest uppercase border-b border-slate-100 pb-4">
                        Primary Years (PYP)
                    </h3>
                    <div class="grid grid-cols-3 gap-4">
                        @for($i = 0; $i < 9; $i++)
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm bg-slate-100 group">
                            <img src="https://i.pravatar.cc/300?img={{ $i + 20 }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-500">
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- CARD 4: MIDDLE YEARS (MYP) -->
                <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 hover:-translate-y-2 transition-transform duration-500">
                    <h3 class="text-center font-royal font-bold text-[#00539C] text-lg mb-8 tracking-widest uppercase border-b border-slate-100 pb-4">
                        Middle Years (MYP)
                    </h3>
                    <div class="grid grid-cols-3 gap-4">
                        @for($i = 0; $i < 9; $i++)
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm bg-slate-100 group">
                            <img src="https://i.pravatar.cc/300?img={{ $i + 30 }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-500">
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- CARD 5: DIPLOMA PROGRAMME (DP) -->
                <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 hover:-translate-y-2 transition-transform duration-500">
                    <h3 class="text-center font-royal font-bold text-[#00539C] text-lg mb-8 tracking-widest uppercase border-b border-slate-100 pb-4">
                        Diploma Programme (DP)
                    </h3>
                    <div class="grid grid-cols-3 gap-4">
                        @for($i = 0; $i < 6; $i++)
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm bg-slate-100 group">
                            <img src="https://i.pravatar.cc/300?img={{ $i + 40 }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-500">
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- CARD 6: ADMIN & SUPPORT -->
                <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 hover:-translate-y-2 transition-transform duration-500">
                    <h3 class="text-center font-royal font-bold text-[#00539C] text-lg mb-8 tracking-widest uppercase border-b border-slate-100 pb-4">
                        Admin & Support
                    </h3>
                    <div class="grid grid-cols-3 gap-4">
                        @for($i = 0; $i < 6; $i++)
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-sm bg-slate-100 group">
                            <img src="https://i.pravatar.cc/300?img={{ $i + 50 }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition duration-500">
                        </div>
                        @endfor
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- SECTION 4: COFFEE CHAT CTA (HIMAY: Cognitive Ease & Low Friction) -->
<div class="bg-white py-24 text-center border-t border-gray-50">
    <!-- Increased max-width to 'max-w-7xl' to prevent line breaks -->
    <div class="max-w-7xl mx-auto px-4">
        
        <!-- Headline: Elegant Serif, Muted Purple, Single Line on Desktop -->
        <h2 class="font-header text-3xl md:text-5xl text-[#6d5c7d] mb-10 leading-tight">
            Want to see how our teachers mentor your child?
        </h2>
        
        <!-- Button: Red Pill Shape (HIMAY: High Contrast Action) -->
        <a href="{{ route('contact') }}" class="inline-block bg-[#e04f4f] text-white px-10 py-4 rounded-full shadow-soft hover:bg-[#c93e3e] hover:shadow-lg transition transform hover:-translate-y-1 font-sub font-bold text-lg tracking-wide">
            Schedule a Virtual Coffee Chat with Our Headmaster or Teachers
        </a>
        
        <!-- Subtext: Italic Gray (HIMAY: Reassurance) -->
        <p class="text-gray-500 text-sm mt-6 italic font-header">
            Meet the educators who will guide your child—ask anything, no commitment.
        </p>

    </div>
</div>
@endsection