@extends('layouts.app')

@section('title', 'Apply Now - M7 PCIS')

@section('content')

<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center relative">
    
    <!-- Background Decoration -->
    <div class="absolute top-0 left-0 w-full h-1/2 bg-brand-blue z-0"></div>
    <div class="absolute top-10 right-10 w-64 h-64 bg-brand-yellow opacity-10 rounded-full blur-3xl z-0"></div>

    <div class="max-w-6xl w-full relative z-10">
        
        <!-- The Premium Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
            
            <!-- LEFT SIDE: The "Sell" (Visuals & Motivation) -->
            <div class="md:w-5/12 bg-brand-dark relative text-white p-10 flex flex-col justify-between overflow-hidden">
                <!-- Background Image Overlay -->
                <div class="absolute inset-0 z-0">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" class="w-full h-full object-cover opacity-30" alt="School">
                    <div class="absolute inset-0 bg-gradient-to-b from-brand-blue/90 to-brand-dark/90"></div>
                </div>

                <div class="relative z-10">
                    <h2 class="font-royal font-bold text-3xl mb-2 text-brand-yellow">Begin Your Journey</h2>
                    <p class="text-blue-100 font-light text-sm">Join the M7 Philippine Cambridge family today.</p>
                </div>

                <div class="relative z-10 space-y-6 my-10">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-brand-green/20 flex items-center justify-center mr-4 border border-brand-green/50">
                            <svg class="w-5 h-5 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">World-Class Curriculum</h4>
                            <p class="text-xs text-gray-400">Cambridge Pathway</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-brand-red/20 flex items-center justify-center mr-4 border border-brand-red/50">
                            <svg class="w-5 h-5 text-brand-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">Leadership Focus</h4>
                            <p class="text-xs text-gray-400">Values-based education</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-brand-yellow/20 flex items-center justify-center mr-4 border border-brand-yellow/50">
                            <svg class="w-5 h-5 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">Inclusive Community</h4>
                            <p class="text-xs text-gray-400">Unity in diversity</p>
                        </div>
                    </div>
                </div>

                <div class="relative z-10">
                    <p class="text-xs text-gray-400">Need assistance?</p>
                    <p class="font-bold text-lg">+6346 458 6588</p>
                </div>
            </div>

            <!-- RIGHT SIDE: The Form -->
            <div class="md:w-7/12 bg-white p-10 md:p-14 relative">
                <!-- Color Strip -->
                <div class="absolute top-0 left-0 w-full h-1.5 flex">
                    <div class="w-1/4 bg-brand-blue"></div>
                    <div class="w-1/4 bg-brand-red"></div>
                    <div class="w-1/4 bg-brand-yellow"></div>
                    <div class="w-1/4 bg-brand-green"></div>
                </div>

                <h2 class="text-2xl font-serif font-bold text-brand-blue mb-6">Student Application</h2>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-brand-green p-4 mb-8 rounded-r-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-brand-green" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700 font-medium">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('apply.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2 group-focus-within:text-brand-blue transition">First Name</label>
                            <input type="text" name="first_name" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition duration-200" placeholder="Student's First Name">
                        </div>
                        
                        <!-- Last Name -->
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2 group-focus-within:text-brand-blue transition">Last Name</label>
                            <input type="text" name="last_name" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition duration-200" placeholder="Student's Last Name">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Email -->
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2 group-focus-within:text-brand-blue transition">Email Address</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition duration-200" placeholder="parent@example.com">
                        </div>
                        <!-- Phone -->
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2 group-focus-within:text-brand-blue transition">Phone Number</label>
                            <input type="text" name="phone" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition duration-200" placeholder="+63 900 000 0000">
                        </div>
                    </div>

                    <!-- Grade Level -->
                    <div class="group">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2 group-focus-within:text-brand-blue transition">Applying for Grade Level</label>
                        <div class="relative">
                            <select name="grade_level" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition duration-200 appearance-none cursor-pointer">
                                <option value="" disabled selected>Select Grade Level</option>
                                <option value="Kindergarten">Kindergarten (Early Years)</option>
                                <option value="Grade 1">Grade 1 (Primary)</option>
                                <option value="Grade 7">Grade 7 (Junior High)</option>
                                <option value="Grade 11">Grade 11 (Senior High)</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Previous School -->
                    <div class="group">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wide mb-2 group-focus-within:text-brand-blue transition">Previous School (Optional)</label>
                        <input type="text" name="previous_school" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-blue/20 focus:border-brand-blue transition duration-200" placeholder="Name of previous school attended">
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-brand-red text-white font-bold py-4 rounded-xl shadow-lg hover:bg-red-700 hover:shadow-xl transition transform hover:-translate-y-0.5 tracking-wide uppercase text-sm">
                            Submit Application
                        </button>
                        <p class="text-center text-xs text-gray-400 mt-4">By clicking submit, you agree to our Data Privacy Policy.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection