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

<!-- SECTION 3: OUR FACULTY (Grid by Department) -->
<div class="py-24 bg-white border-t border-gray-100">
    <div class="max-w-[1400px] mx-auto px-4">
        
        <div class="text-center mb-20">
            <h2 class="text-4xl font-header font-bold text-brand-blue mb-4">Meet Our Educators</h2>
            <p class="text-gray-600 font-light">Dedicated professionals committed to your child's success.</p>
        </div>

        <!-- ACADEMIC COUNCIL (Blue Theme) -->
        <div class="mb-20">
            <h3 class="text-2xl font-serif font-bold text-brand-blue mb-8 border-l-4 border-brand-blue pl-4">Academic Council</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Loop this block for each person -->
                <div class="group">
                    <div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-blue/20 group-hover:border-brand-blue transition duration-300 relative">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-blue/90 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-3">
                            <span class="text-white text-xs font-bold">Ms. Elena Cruz<br><span class="font-light text-[10px]">Director</span></span>
                        </div>
                    </div>
                </div>
                <!-- Duplicate for demo (Remove later) -->
                <div class="group"><div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-blue/20 group-hover:border-brand-blue transition duration-300 relative"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div></div>
                <div class="group"><div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-blue/20 group-hover:border-brand-blue transition duration-300 relative"><img src="https://images.unsplash.com/photo-1580894732444-8ecded7900cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div></div>
            </div>
        </div>

        <!-- PRIMARY YEARS (PYP) - Yellow Theme -->
        <div class="mb-20">
            <h3 class="text-2xl font-serif font-bold text-[#b47800] mb-8 border-l-4 border-brand-gold pl-4">Primary Years Programme (PYP)</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Person -->
                <div class="group">
                    <div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-gold/20 group-hover:border-brand-gold transition duration-300 relative">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-gold/90 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-3">
                            <span class="text-white text-xs font-bold">Ms. Sarah Lee<br><span class="font-light text-[10px]">Grade 1 Adviser</span></span>
                        </div>
                    </div>
                </div>
                <!-- Duplicates for demo -->
                <div class="group"><div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-gold/20 group-hover:border-brand-gold transition duration-300 relative"><img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div></div>
                <div class="group"><div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-gold/20 group-hover:border-brand-gold transition duration-300 relative"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div></div>
                <div class="group"><div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-gold/20 group-hover:border-brand-gold transition duration-300 relative"><img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div></div>
            </div>
        </div>

        <!-- MIDDLE YEARS (MYP) - Teal Theme -->
        <div class="mb-20">
            <h3 class="text-2xl font-serif font-bold text-brand-teal mb-8 border-l-4 border-brand-teal pl-4">Middle Years Programme (MYP)</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Person -->
                <div class="group">
                    <div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-teal/20 group-hover:border-brand-teal transition duration-300 relative">
                        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                </div>
                <!-- Duplicates -->
                <div class="group"><div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-teal/20 group-hover:border-brand-teal transition duration-300 relative"><img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div></div>
                <div class="group"><div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-teal/20 group-hover:border-brand-teal transition duration-300 relative"><img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div></div>
            </div>
        </div>

        <!-- DIPLOMA (DP) - Red Theme -->
        <div class="mb-20">
            <h3 class="text-2xl font-serif font-bold text-brand-red mb-8 border-l-4 border-brand-red pl-4">Diploma Programme (DP)</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Person -->
                <div class="group">
                    <div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-red/20 group-hover:border-brand-red transition duration-300 relative">
                        <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                </div>
                <!-- Duplicates -->
                <div class="group"><div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-red/20 group-hover:border-brand-red transition duration-300 relative"><img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div></div>
                <div class="group"><div class="aspect-square overflow-hidden rounded-xl shadow-md border-2 border-brand-red/20 group-hover:border-brand-red transition duration-300 relative"><img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div></div>
            </div>
        </div>

    </div>
</div>

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