@extends('layouts.app')

@section('title', 'Life at PCIS')

@section('content')

<!-- HERO: Vibrant & Active -->
<div class="relative h-[70vh] flex items-center justify-center overflow-hidden bg-brand-yellow">
    <div class="absolute inset-0 z-0">
        <!-- Image: Sports or Activities -->
        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" class="w-full h-full object-cover" alt="Student Life">
        <div class="absolute inset-0 bg-gradient-to-t from-brand-gold/90 via-brand-gold/40 to-transparent"></div>
    </div>
    <div class="relative z-10 max-w-[1400px] mx-auto px-4 text-center">
        <h1 class="font-header font-bold text-5xl md:text-7xl text-brand-dark mb-6 drop-shadow-sm">
            More Than Just a Classroom
        </h1>
        <p class="text-xl md:text-2xl font-light text-brand-dark max-w-3xl mx-auto">
            A vibrant community where sports, arts, and leadership thrive alongside academics.
        </p>
    </div>
</div>

<!-- A DAY IN THE LIFE (Timeline) -->
<div class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-header font-bold text-brand-blue mb-4">A Day in the Life</h2>
            <p class="text-gray-600">Experience a typical day of a PCIS student.</p>
        </div>

        <div class="space-y-8">
            <!-- 7:30 AM -->
            <div class="flex flex-col md:flex-row gap-8 items-center group">
                <div class="w-32 text-right md:border-r-4 md:border-brand-yellow md:pr-8">
                    <span class="block text-2xl font-bold text-brand-blue">7:30 AM</span>
                    <span class="text-sm text-gray-500 uppercase tracking-wide">Arrival</span>
                </div>
                <div class="flex-1 bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition duration-300">
                    <h4 class="font-bold text-lg text-brand-dark mb-2">Morning Assembly</h4>
                    <p class="text-gray-600 text-sm">Students gather for the flag ceremony, announcements, and a morning reflection to start the day with purpose.</p>
                </div>
            </div>

            <!-- 8:00 AM -->
            <div class="flex flex-col md:flex-row gap-8 items-center group">
                <div class="w-32 text-right md:border-r-4 md:border-brand-blue md:pr-8">
                    <span class="block text-2xl font-bold text-brand-blue">8:00 AM</span>
                    <span class="text-sm text-gray-500 uppercase tracking-wide">Academics</span>
                </div>
                <div class="flex-1 bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition duration-300">
                    <h4 class="font-bold text-lg text-brand-dark mb-2">Core Subjects & Inquiry</h4>
                    <p class="text-gray-600 text-sm">Interactive lessons in Math, Science, and Language Arts using the Cambridge framework.</p>
                </div>
            </div>

            <!-- 12:00 PM -->
            <div class="flex flex-col md:flex-row gap-8 items-center group">
                <div class="w-32 text-right md:border-r-4 md:border-brand-red md:pr-8">
                    <span class="block text-2xl font-bold text-brand-blue">12:00 PM</span>
                    <span class="text-sm text-gray-500 uppercase tracking-wide">Break</span>
                </div>
                <div class="flex-1 bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition duration-300">
                    <h4 class="font-bold text-lg text-brand-dark mb-2">Lunch & Social Time</h4>
                    <p class="text-gray-600 text-sm">A healthy lunch at the cafeteria followed by free play or library time to recharge.</p>
                </div>
            </div>

            <!-- 3:00 PM -->
            <div class="flex flex-col md:flex-row gap-8 items-center group">
                <div class="w-32 text-right md:border-r-4 md:border-brand-green md:pr-8">
                    <span class="block text-2xl font-bold text-brand-blue">3:00 PM</span>
                    <span class="text-sm text-gray-500 uppercase tracking-wide">Enrichment</span>
                </div>
                <div class="flex-1 bg-gray-50 p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition duration-300">
                    <h4 class="font-bold text-lg text-brand-dark mb-2">Clubs & Varsity</h4>
                    <p class="text-gray-600 text-sm">Robotics, Football, Glee Club, or Debate Team practice. This is where passions are built.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- GALLERY (Bento Grid) -->
<div class="py-24 bg-bg-secondary">
    <div class="max-w-[1400px] mx-auto px-4">
        <h2 class="text-4xl font-header font-bold text-center text-brand-blue mb-12">Campus Vibes</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 h-[600px]">
            <!-- Tall Left -->
            <div class="relative rounded-3xl overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1564419434663-c49967363849?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-black/80 to-transparent">
                    <h3 class="text-white font-bold text-xl">Varsity Sports</h3>
                </div>
            </div>
            <!-- Top Right -->
            <div class="relative rounded-3xl overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-black/80 to-transparent">
                    <h3 class="text-white font-bold text-xl">Creative Arts</h3>
                </div>
            </div>
            <!-- Bottom Right -->
            <div class="relative rounded-3xl overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1581092921461-eab62e97a782?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-black/80 to-transparent">
                    <h3 class="text-white font-bold text-xl">STEM & Robotics</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection