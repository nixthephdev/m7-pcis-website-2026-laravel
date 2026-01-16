@extends('layouts.applicant')

@section('title', 'Applicant Dashboard')

@section('content')

<div class="max-w-5xl mx-auto px-4 py-12">

    <!-- WELCOME HEADER -->
    <div class="mb-12 text-center">
        <h1 class="text-3xl md:text-4xl font-royal font-bold text-[#00539C] dark:text-white mb-3 tracking-wide">
            Welcome, {{ explode(' ', auth()->user()->name)[0] }}
        </h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm md:text-base max-w-2xl mx-auto">
            This is your admission command center. Select an option below to proceed with your application journey at M7 PCIS.
        </p>
    </div>

    <!-- ACTION GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- 1. OPEN APPLICATION FORM -->
        <a href="{{ route('applicant.form') }}" 
           class="group relative bg-white dark:bg-[#1E253E] rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-white/5 hover:shadow-xl hover:border-blue-200 dark:hover:border-blue-500/30 transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 dark:bg-blue-900/20 rounded-full blur-3xl -mr-16 -mt-16 transition group-hover:bg-blue-100 dark:group-hover:bg-blue-900/40"></div>
            
            <div class="relative z-10 flex items-center gap-6">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 dark:bg-blue-900/30 text-brand-blue dark:text-blue-400 flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div class="text-left">
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white group-hover:text-brand-blue dark:group-hover:text-blue-400 transition">Fill Application Form</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Start or continue your online enrollment form.</p>
                </div>
                <div class="ml-auto text-slate-300 dark:text-slate-600 group-hover:text-brand-blue dark:group-hover:text-blue-400 group-hover:translate-x-1 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </div>
        </a>

        <!-- 2. SUBMIT REQUIREMENTS -->
        <button onclick="alert('Please complete the Application Form first.')" 
           class="group relative bg-white dark:bg-[#1E253E] rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-white/5 hover:shadow-xl hover:border-amber-200 dark:hover:border-amber-500/30 transition-all duration-300 transform hover:-translate-y-1 overflow-hidden w-full text-left">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50 dark:bg-amber-900/20 rounded-full blur-3xl -mr-16 -mt-16 transition group-hover:bg-amber-100 dark:group-hover:bg-amber-900/40"></div>
            
            <div class="relative z-10 flex items-center gap-6">
                <div class="w-16 h-16 rounded-2xl bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition">Submit Requirements</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Upload PSA, Report Card, and other docs.</p>
                </div>
            </div>
        </button>

        <!-- 3. EXAM PERMIT -->
        <button class="group relative bg-white dark:bg-[#1E253E] rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-white/5 hover:shadow-xl hover:border-purple-200 dark:hover:border-purple-500/30 transition-all duration-300 transform hover:-translate-y-1 overflow-hidden w-full text-left">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-purple-50 dark:bg-purple-900/20 rounded-full blur-3xl -mr-16 -mt-16 transition group-hover:bg-purple-100 dark:group-hover:bg-purple-900/40"></div>
            
            <div class="relative z-10 flex items-center gap-6">
                <div class="w-16 h-16 rounded-2xl bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition">Entrance Exam Permit</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Download your schedule and permit.</p>
                </div>
            </div>
        </button>

        <!-- 4. VIEW RESULT -->
        <button class="group relative bg-white dark:bg-[#1E253E] rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-white/5 hover:shadow-xl hover:border-emerald-200 dark:hover:border-emerald-500/30 transition-all duration-300 transform hover:-translate-y-1 overflow-hidden w-full text-left">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 dark:bg-emerald-900/20 rounded-full blur-3xl -mr-16 -mt-16 transition group-hover:bg-emerald-100 dark:group-hover:bg-emerald-900/40"></div>
            
            <div class="relative z-10 flex items-center gap-6">
                <div class="w-16 h-16 rounded-2xl bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">Application Result</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Check your enrollment status.</p>
                </div>
            </div>
        </button>

    </div>

    <!-- SUPPORT SECTION -->
    <div class="mt-12 text-center border-t border-slate-200 dark:border-white/5 pt-8">
        <p class="text-sm text-slate-400 mb-2">Need assistance with your application?</p>
        <a href="mailto:admissions@pcis.edu.ph" class="inline-flex items-center gap-2 text-[#00539C] dark:text-blue-400 font-bold hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            Contact Admissions Office
        </a>
    </div>

</div>

@endsection