
@extends('layouts.app')

@section('title', 'Academics - M7 PCIS')

@section('content')
<script src="//unpkg.com/alpinejs" defer></script>

<!-- SECTION 1: HERO (Cinematic) -->
<div class="relative h-[85vh] flex items-center justify-center overflow-hidden bg-[#0a1a4a]">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
             class="w-full h-full object-cover opacity-40 scale-105 animate-pulse-slow" 
             alt="Academic Excellence">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0a1a4a]/80 via-[#0a1a4a]/40 to-[#0a1a4a]"></div>
    </div>
    <div class="relative z-10 max-w-[1400px] mx-auto px-4 text-center">
        <span class="inline-block py-1 px-3 rounded-full bg-brand-gold/20 border border-brand-gold/50 text-brand-gold text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-md">
            World-Class Education
        </span>
        <h1 class="font-header font-bold text-5xl md:text-7xl text-white mb-8 drop-shadow-2xl leading-tight">
            A Seamless Journey of <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 via-white to-blue-200">Academic Excellence</span>
        </h1>
        <p class="text-xl text-blue-100/80 font-light max-w-3xl mx-auto leading-relaxed">
            From the curiosity of Early Years to the rigor of the IB Diploma, we empower students to become critical thinkers and global leaders.
        </p>
    </div>
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce text-white/30">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7-7-7"></path></svg>
    </div>
</div>

<!-- SECTION 2: INTERACTIVE CURRICULUM -->
<div class="bg-gray-50 py-24" x-data="{ activeTab: 'eyp' }">
    <div class="max-w-[1400px] mx-auto px-4">
        <div class="flex justify-center mb-16 sticky top-24 z-30">
            <div class="bg-white p-2 rounded-full shadow-2xl border border-gray-100 inline-flex gap-2">
                <button @click="activeTab = 'eyp'" :class="activeTab === 'eyp' ? 'bg-brand-gold text-white shadow-lg' : 'text-gray-500 hover:bg-gray-100'" class="px-8 py-3 rounded-full font-bold text-sm transition-all duration-300">Early Years</button>
                <button @click="activeTab = 'pyp'" :class="activeTab === 'pyp' ? 'bg-brand-red text-white shadow-lg' : 'text-gray-500 hover:bg-gray-100'" class="px-8 py-3 rounded-full font-bold text-sm transition-all duration-300">Primary</button>
                <button @click="activeTab = 'myp'" :class="activeTab === 'myp' ? 'bg-brand-blue text-white shadow-lg' : 'text-gray-500 hover:bg-gray-100'" class="px-8 py-3 rounded-full font-bold text-sm transition-all duration-300">High School</button>
            </div>
        </div>

        <div class="relative min-h-[600px]">
            <!-- EYP Content -->
            <div x-show="activeTab === 'eyp'" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0" class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative group">
                    <div class="absolute inset-0 bg-brand-gold rounded-[3rem] rotate-3 opacity-20 group-hover:rotate-6 transition duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="relative rounded-[3rem] shadow-2xl border-4 border-white object-cover h-[500px] w-full" alt="EYP">
                </div>
                <div>
                    <h2 class="text-4xl font-header font-bold text-brand-dark mb-6">Nurturing Curiosity</h2>
                    <p class="text-lg text-gray-600 mb-8 font-light leading-relaxed">Our Early Years Programme (EYP) is designed to ignite a love for learning. Through play-based inquiry, children develop social skills, emotional intelligence, and foundational literacy.</p>
                    <div class="grid grid-cols-2 gap-6 mb-10">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-brand-gold"><span class="text-3xl mb-2 block">🎨</span><h4 class="font-bold text-brand-dark">Creative Play</h4><p class="text-xs text-gray-500">Art, Music, and Movement</p></div>
                        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-brand-gold"><span class="text-3xl mb-2 block">🧠</span><h4 class="font-bold text-brand-dark">Emotional EQ</h4><p class="text-xs text-gray-500">Self-awareness & Empathy</p></div>
                    </div>
                    <a href="{{ route('apply.form') }}" class="inline-flex items-center text-brand-gold font-bold hover:underline decoration-2 underline-offset-4">Apply for Nursery & Kinder <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                </div>
            </div>

            <!-- PYP Content -->
            <div x-show="activeTab === 'pyp'" style="display: none;" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0" class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <h2 class="text-4xl font-header font-bold text-brand-dark mb-6">Building Foundations</h2>
                    <p class="text-lg text-gray-600 mb-8 font-light leading-relaxed">The Primary Years Programme (PYP) focuses on the development of the whole child as an inquirer, both in the classroom and in the world outside.</p>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-start"><div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-brand-red mr-4 shrink-0">✓</div><span class="text-gray-700">Cambridge Primary Curriculum</span></li>
                        <li class="flex items-start"><div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-brand-red mr-4 shrink-0">✓</div><span class="text-gray-700">Digital Literacy & Coding Basics</span></li>
                        <li class="flex items-start"><div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-brand-red mr-4 shrink-0">✓</div><span class="text-gray-700">Global Perspectives</span></li>
                    </ul>
                    <a href="{{ route('apply.form') }}" class="inline-flex items-center text-brand-red font-bold hover:underline decoration-2 underline-offset-4">Enroll in Grades 1-6 <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                </div>
                <div class="order-1 lg:order-2 relative group">
                    <div class="absolute inset-0 bg-brand-red rounded-[3rem] -rotate-3 opacity-20 group-hover:-rotate-6 transition duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="relative rounded-[3rem] shadow-2xl border-4 border-white object-cover h-[500px] w-full" alt="PYP">
                </div>
            </div>

            <!-- MYP Content -->
            <div x-show="activeTab === 'myp'" style="display: none;" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0" class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative group">
                    <div class="absolute inset-0 bg-brand-blue rounded-[3rem] rotate-3 opacity-20 group-hover:rotate-6 transition duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1529390003361-841c781e22fb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="relative rounded-[3rem] shadow-2xl border-4 border-white object-cover h-[500px] w-full" alt="High School">
                </div>
                <div>
                    <h2 class="text-4xl font-header font-bold text-brand-dark mb-6">Future Leaders</h2>
                    <p class="text-lg text-gray-600 mb-8 font-light leading-relaxed">Our Senior High School program prepares students for the world's best universities. We offer specialized tracks aligned with global standards.</p>
                    <div class="space-y-4 mb-10">
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4 hover:border-brand-blue transition"><div class="w-12 h-12 bg-blue-50 text-brand-blue rounded-lg flex items-center justify-center font-bold">STEM</div><div><h4 class="font-bold text-gray-800">Science, Tech, Engineering, Math</h4><p class="text-xs text-gray-500">For future doctors, engineers, and scientists.</p></div></div>
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4 hover:border-brand-blue transition"><div class="w-12 h-12 bg-blue-50 text-brand-blue rounded-lg flex items-center justify-center font-bold">ABM</div><div><h4 class="font-bold text-gray-800">Accountancy & Business</h4><p class="text-xs text-gray-500">For future entrepreneurs and corporate leaders.</p></div></div>
                    </div>
                    <a href="{{ route('apply.form') }}" class="inline-flex items-center text-brand-blue font-bold hover:underline decoration-2 underline-offset-4">View Senior High Tracks <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 3: FACILITIES (Where Learning Happens) -->
<div class="py-24 bg-white">
    <div class="max-w-[1400px] mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-header font-bold text-brand-blue mb-4">Where Learning Happens</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">State-of-the-art facilities designed to inspire creativity and collaboration.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group relative overflow-hidden rounded-2xl shadow-lg h-80">
                <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-8">
                    <h3 class="text-white font-bold text-xl">Science Labs</h3>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg h-80">
                <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-8">
                    <h3 class="text-white font-bold text-xl">Modern Library</h3>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg h-80">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-8">
                    <h3 class="text-white font-bold text-xl">Sports Complex</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 4: FACULTY SPOTLIGHT -->
<div class="bg-brand-dark py-24 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
    <div class="max-w-[1400px] mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <div>
                <h2 class="text-4xl font-header font-bold mb-2">Mentored by the Best</h2>
                <p class="text-blue-200">Our faculty are subject-matter experts dedicated to your child's success.</p>
            </div>
            <a href="{{ route('team') }}" class="text-brand-gold font-bold hover:underline mt-4 md:mt-0">Meet the Team &rarr;</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Teacher 1 -->
            <div class="bg-white/5 backdrop-blur-sm p-6 rounded-2xl border border-white/10 hover:bg-white/10 transition group">
                <div class="w-20 h-20 rounded-full overflow-hidden mb-4 border-2 border-brand-gold">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-lg">Dr. Elena Cruz</h4>
                <p class="text-xs text-brand-gold uppercase tracking-wider mb-2">Science Dept Head</p>
                <p class="text-xs text-gray-400">"We don't just teach science; we create scientists."</p>
            </div>
            <!-- Teacher 2 -->
            <div class="bg-white/5 backdrop-blur-sm p-6 rounded-2xl border border-white/10 hover:bg-white/10 transition group">
                <div class="w-20 h-20 rounded-full overflow-hidden mb-4 border-2 border-brand-blue">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-lg">Mr. David Tan</h4>
                <p class="text-xs text-brand-blue uppercase tracking-wider mb-2">Math Coordinator</p>
                <p class="text-xs text-gray-400">"Mathematics is the language of the future."</p>
            </div>
            <!-- Teacher 3 -->
            <div class="bg-white/5 backdrop-blur-sm p-6 rounded-2xl border border-white/10 hover:bg-white/10 transition group">
                <div class="w-20 h-20 rounded-full overflow-hidden mb-4 border-2 border-brand-red">
                    <img src="https://images.unsplash.com/photo-1580894732444-8ecded7900cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-lg">Ms. Sarah Lee</h4>
                <p class="text-xs text-brand-red uppercase tracking-wider mb-2">Arts Director</p>
                <p class="text-xs text-gray-400">"Creativity is intelligence having fun."</p>
            </div>
            <!-- Teacher 4 -->
            <div class="bg-white/5 backdrop-blur-sm p-6 rounded-2xl border border-white/10 hover:bg-white/10 transition group">
                <div class="w-20 h-20 rounded-full overflow-hidden mb-4 border-2 border-brand-green">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-lg">Mr. Alex Reyes</h4>
                <p class="text-xs text-brand-green uppercase tracking-wider mb-2">Sports Coach</p>
                <p class="text-xs text-gray-400">"Discipline on the field translates to life."</p>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 5: SUCCESS STORIES (Alumni) -->
<div class="py-24 bg-gray-50">
    <div class="max-w-[1400px] mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-header font-bold text-brand-blue mb-4">Success Stories</h2>
            <p class="text-gray-600">Our graduates are accepted into top universities worldwide.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border-t-4 border-brand-blue">
                <p class="text-gray-600 italic mb-6">"PCIS gave me the confidence to compete globally. The IB curriculum was challenging but prepared me perfectly for university."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center font-bold text-brand-blue">JD</div>
                    <div>
                        <h4 class="font-bold text-brand-dark">John Doe</h4>
                        <p class="text-xs text-gray-500">Class of 2023 • UP Diliman</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border-t-4 border-brand-gold">
                <p class="text-gray-600 italic mb-6">"The teachers here are mentors for life. They pushed me to go beyond my limits."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center font-bold text-brand-gold">MS</div>
                    <div>
                        <h4 class="font-bold text-brand-dark">Maria Santos</h4>
                        <p class="text-xs text-gray-500">Class of 2022 • Ateneo de Manila</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border-t-4 border-brand-red">
                <p class="text-gray-600 italic mb-6">"I learned leadership and resilience here. PCIS is more than a school; it's a family."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center font-bold text-brand-red">AR</div>
                    <div>
                        <h4 class="font-bold text-brand-dark">Alex Reyes</h4>
                        <p class="text-xs text-gray-500">Class of 2024 • De La Salle University</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="bg-brand-blue py-20 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    <div class="max-w-3xl mx-auto px-4 relative z-10">
        <h2 class="text-3xl font-header font-bold text-white mb-8">Ready to start your journey?</h2>
        <a href="{{ route('apply.form') }}" class="inline-block bg-white text-brand-blue px-10 py-4 rounded-full shadow-lg hover:bg-gray-100 transition font-bold text-lg tracking-wide">
            Apply Now
        </a>
    </div>
</div>
@endsection