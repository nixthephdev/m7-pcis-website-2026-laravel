@extends('layouts.applicant')

@section('content')

<div class="max-w-5xl mx-auto px-4 py-12">
    
    <!-- HEADER -->
    <div class="text-center mb-10">
        <h1 class="text-3xl font-royal font-bold text-[#00539C] dark:text-white mb-2 tracking-wide">Admission Policy</h1>
        <p class="text-slate-500 dark:text-slate-400">Academic Year 2026-2027</p>
    </div>

    <!-- CARD CONTAINER -->
    <div class="bg-white dark:bg-[#1E253E] rounded-3xl shadow-xl border border-slate-100 dark:border-white/5 overflow-hidden flex flex-col h-[75vh]">
        
        <!-- SCROLLABLE CONTENT AREA -->
        <div class="overflow-y-auto p-8 md:p-12 space-y-10 text-sm text-slate-700 dark:text-slate-300 leading-relaxed scroll-smooth">

            <!-- PURPOSE -->
            <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-2xl border border-blue-100 dark:border-blue-900/30">
                <h3 class="text-[#00539C] dark:text-blue-400 font-bold uppercase tracking-widest mb-2 text-xs">Purpose</h3>
                <p class="text-justify text-slate-700 dark:text-slate-300">The School Admission Policy ensures a fair, transparent, and consistent process for admitting students. It guides families through the requirements, timelines, and expectations for enrollment while helping the school maintain appropriate class sizes, uphold academic standards, and support student success.</p>
            </div>

            <!-- 1. ELIGIBILITY -->
            <section>
                <h3 class="text-[#00539C] dark:text-blue-400 font-bold text-lg uppercase tracking-wide mb-4 border-b border-gray-100 dark:border-white/5 pb-2">1. Eligibility</h3>
                <ul class="list-disc pl-6 space-y-2 marker:text-[#00539C] dark:marker:text-blue-400">
                    <li>The school accepts applicants regardless of race, religion, nationality, or background.</li>
                    <li>Age requirements follow the guidelines set by the Department of Education.</li>
                    <li>Students must meet the developmental, academic, and behavioral readiness appropriate for their grade level.</li>
                </ul>
            </section>

            <!-- 2. ADMISSION REQUIREMENTS -->
            <section>
                <h3 class="text-[#00539C] dark:text-blue-400 font-bold text-lg uppercase tracking-wide mb-6 border-b border-gray-100 dark:border-white/5 pb-2">2. Admission Requirements</h3>
                
                <div class="space-y-8">
                    
                    <!-- EYP -->
                    <div class="bg-white dark:bg-white/5 border-l-4 border-emerald-400 pl-6 py-2">
                        <h4 class="font-bold text-slate-800 dark:text-white text-base mb-3">Early Years Programme (EYP)</h4>
                        <div class="space-y-4">
                            <div>
                                <span class="font-bold text-emerald-700 dark:text-emerald-400 block">EYP 1 (Nursery)</span>
                                <ul class="list-disc pl-5 text-xs">
                                    <li>The applicant must already be 3 years old by November 30, 2026.</li>
                                </ul>
                            </div>
                            <!-- ... (Keep content, styling applied via parent classes) ... -->
                        </div>
                    </div>

                    <!-- PYP -->
                    <div class="bg-white dark:bg-white/5 border-l-4 border-blue-400 pl-6 py-2">
                        <h4 class="font-bold text-slate-800 dark:text-white text-base mb-3">PYP 1-5 (Year 1-5)</h4>
                        <ul class="list-disc pl-5 space-y-2 text-xs">
                            <li>The applicant must have a general average of at least 85% with no grade lower than 80%.</li>
                            <!-- ... -->
                        </ul>
                    </div>

                    <!-- MYP -->
                    <div class="bg-white dark:bg-white/5 border-l-4 border-amber-400 pl-6 py-2">
                        <h4 class="font-bold text-slate-800 dark:text-white text-base mb-3">MYP 1-5 (Year 6-10) Middle School</h4>
                        <ul class="list-disc pl-5 space-y-2 text-xs">
                            <li>The applicant must have a general average of at least 85% with no grade lower than 80%.</li>
                            <!-- ... -->
                        </ul>
                    </div>

                    <!-- IB DIPLOMA -->
                    <div class="bg-white dark:bg-white/5 border-l-4 border-purple-400 pl-6 py-2">
                        <h4 class="font-bold text-slate-800 dark:text-white text-base mb-3">IB Diploma Programme (DP 1-2)</h4>
                        <ul class="list-disc pl-5 space-y-2 text-xs">
                            <li>The applicant must have a general average of at least 85% with no grade lower than 80%.</li>
                            <!-- ... -->
                        </ul>
                    </div>

                </div>
            </section>

            <!-- 3. ADMISSION PROCESS -->
            <section>
                <h3 class="text-[#00539C] dark:text-blue-400 font-bold text-lg uppercase tracking-wide mb-6 border-b border-gray-100 dark:border-white/5 pb-2">3. Admission Process</h3>
                <div class="space-y-6">
                    <div>
                        <h4 class="font-bold text-slate-800 dark:text-white text-sm">Step 1: Inquiry and Orientation</h4>
                        <p class="text-xs mt-1">Families may inquire through phone, email, or onsite.</p>
                    </div>
                    <!-- ... -->
                </div>
            </section>

        </div>

        <!-- FOOTER ACTION -->
        <div class="p-6 md:p-8 border-t border-gray-100 dark:border-white/5 bg-gray-50 dark:bg-[#151e32] flex justify-between items-center shrink-0">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-slate-400 hover:text-red-500 font-bold text-sm transition uppercase tracking-wider">Decline & Logout</button>
            </form>
            
            <a href="{{ route('applicant.dashboard') }}" class="bg-[#00539C] text-white px-8 py-3.5 rounded-xl font-bold hover:bg-blue-800 transition shadow-lg shadow-blue-500/30 flex items-center gap-2 transform hover:-translate-y-0.5">
                I Have Read & Agree
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

    </div>
</div>

@endsection