@extends('layouts.admin')

@section('title', 'Applicants')
@section('header', 'Student Database')

@section('content')

    <!-- 1. MINI STATS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between group hover:border-blue-500/30 transition">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Students</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $students->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-500/10 text-brand-blue dark:text-blue-400 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
        </div>
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between group hover:border-amber-500/30 transition">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Pending Review</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $students->where('status', 'pending')->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between group hover:border-emerald-500/30 transition">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Enrolled</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $students->where('status', 'accepted')->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <!-- 2. TOOLBAR -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <div class="flex p-1.5 bg-white dark:bg-[#151e32] rounded-xl border border-slate-200 dark:border-white/5 shadow-sm">
            <a href="{{ route('admin.applications', ['status' => 'all']) }}" class="px-5 py-2 rounded-lg text-xs font-bold transition-all {{ !request('status') || request('status') == 'all' ? 'bg-brand-blue text-white shadow-md' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-white/5' }}">All</a>
            <a href="{{ route('admin.applications', ['status' => 'pending']) }}" class="px-5 py-2 rounded-lg text-xs font-bold transition-all {{ request('status') == 'pending' ? 'bg-amber-500 text-white shadow-md' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-white/5' }}">Pending</a>
            <a href="{{ route('admin.applications', ['status' => 'accepted']) }}" class="px-5 py-2 rounded-lg text-xs font-bold transition-all {{ request('status') == 'accepted' ? 'bg-emerald-500 text-white shadow-md' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-white/5' }}">Enrolled</a>
            <a href="{{ route('admin.applications', ['status' => 'rejected']) }}" class="px-5 py-2 rounded-lg text-xs font-bold transition-all {{ request('status') == 'rejected' ? 'bg-red-500 text-white shadow-md' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-white/5' }}">Declined</a>
        </div>

        <form action="{{ route('admin.applications') }}" method="GET" class="relative w-full md:w-96 group">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-brand-blue transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </div>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, LRN, or email..." class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-white/10 rounded-xl leading-5 bg-white dark:bg-[#151e32] text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-brand-blue sm:text-sm transition shadow-sm">
        </form>
    </div>

    <!-- 3. DATA GRID -->
    <div class="bg-white dark:bg-[#151e32] rounded-3xl shadow-card border border-slate-100 dark:border-white/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 dark:bg-white/5 text-slate-400 text-[10px] uppercase tracking-widest font-bold border-b border-slate-100 dark:border-white/5">
                    <tr>
                        <th class="px-8 py-5">Student</th>
                        <th class="px-8 py-5">Grade Level</th>
                        <th class="px-8 py-5">Contact</th>
                        <th class="px-8 py-5">Status</th>
                        <th class="px-8 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-white/5 text-sm">
                    @forelse($students as $student)
                    <tr class="hover:bg-blue-50/30 dark:hover:bg-white/5 transition duration-200 group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900/50 dark:to-blue-800/50 text-brand-blue dark:text-blue-300 flex items-center justify-center text-xs font-bold shadow-sm">
                                    {{ substr($student->first_name, 0, 1) }}{{ substr($student->last_name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-slate-800 dark:text-white text-base">{{ $student->last_name }}, {{ $student->first_name }}</div>
                                    <div class="text-xs text-slate-400 font-mono mt-0.5">LRN: {{ $student->lrn ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5"><span class="bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 px-3 py-1 rounded-lg text-xs font-bold">{{ $student->grade_level }}</span></td>
                        <td class="px-8 py-5 text-slate-600 dark:text-slate-400">{{ $student->email }}</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold border uppercase
                                {{ $student->status == 'pending' ? 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-500/10 dark:text-amber-400 dark:border-amber-500/20' : '' }}
                                {{ $student->status == 'accepted' ? 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20' : '' }}
                                {{ $student->status == 'rejected' ? 'bg-rose-50 text-rose-700 border-rose-200 dark:bg-rose-500/10 dark:text-rose-400 dark:border-rose-500/20' : '' }}">
                                {{ $student->status }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            
                            <!-- MODAL: FULL APPLICATION REVIEW -->
                            <div x-data="{ open: false }">
                                <button @click="open = true" class="text-brand-blue dark:text-blue-400 font-bold text-xs border border-blue-100 dark:border-blue-900 hover:bg-brand-blue hover:text-white dark:hover:bg-blue-500 px-4 py-2 rounded-lg transition">
                                    Review Application
                                </button>
                                
                                <!-- Z-INDEX 200 to fix overlap -->
                                <div x-show="open" x-cloak class="fixed inset-0 z-[9999] overflow-y-auto pt-20">
                                    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                                        
                                        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-[#0B1120]/90 backdrop-blur-sm transition-opacity" @click="open = false"></div>

                                        <!-- MODAL CONTAINER (Added dark:bg-[#151e32]) -->
                                        <div x-show="open" x-transition.scale class="inline-block bg-white dark:bg-[#151e32] rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-6xl sm:w-full border border-gray-100 dark:border-white/10 relative">
                                            
                                            <!-- HEADER -->
                                            <div class="bg-gradient-to-r from-[#002855] to-[#00539C] px-8 py-6 flex justify-between items-center text-white">
                                                <div>
                                                    <p class="text-[10px] font-bold uppercase tracking-widest text-blue-200 mb-1">Ref No: {{ $student->reference_no }}</p>
                                                    <h3 class="text-2xl font-royal font-bold">{{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_name }}</h3>
                                                    <div class="flex gap-3 mt-2 text-xs font-medium">
                                                        <span class="bg-white/20 px-2 py-1 rounded">{{ $student->grade_level }}</span>
                                                        <span class="bg-white/20 px-2 py-1 rounded">{{ $student->applicant_type }}</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="flex items-center gap-4">
                                                    <!-- DOWNLOAD PDF BUTTON -->
                                                    <a href="{{ route('admin.pdf', $student->id) }}" class="flex items-center gap-2 bg-white text-[#00539C] px-4 py-2 rounded-lg text-xs font-bold shadow-lg hover:bg-blue-50 transition">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12"></path></svg>
                                                        Export PDF
                                                    </a>

                                                    <button @click="open = false" class="text-white/50 hover:text-white text-2xl">×</button>
                                                </div>
                                            </div>

                                            <!-- BODY (Added dark:bg-[#0B1120]) -->
                                            <div class="p-8 max-h-[75vh] overflow-y-auto bg-slate-50 dark:bg-[#0B1120] space-y-8">
                                                
                                                <!-- 1. STUDENT PROFILE -->
                                                <div class="bg-white dark:bg-[#1e293b] p-6 rounded-xl shadow-sm border border-slate-200 dark:border-white/5">
                                                    <h4 class="text-xs font-bold text-brand-blue dark:text-blue-400 uppercase tracking-widest mb-4 border-b border-gray-100 dark:border-white/5 pb-2">Student Profile</h4>
                                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-sm text-slate-700 dark:text-gray-300">
                                                        <div><span class="text-xs text-gray-400 block">LRN</span> <b>{{ $student->lrn ?? 'N/A' }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Nickname</span> <b>{{ $student->nickname ?? 'N/A' }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Birth Date</span> <b>{{ $student->birth_date }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Birth Place</span> <b>{{ $student->birth_city }}, {{ $student->birth_country }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Citizenship</span> <b>{{ $student->citizenship }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Religion</span> <b>{{ $student->religion }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Languages</span> <b>{{ $student->primary_language }} / {{ $student->secondary_language }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Height/Weight</span> <b>{{ $student->height }}cm / {{ $student->weight }}kg</b></div>
                                                    </div>
                                                    <div class="mt-4 pt-4 border-t border-gray-100 dark:border-white/5 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-slate-700 dark:text-gray-300">
                                                        <div><span class="text-xs text-gray-400 block">Full Address</span> <b>{{ $student->address }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Primary Contact</span> <b>{{ $student->email }} / {{ $student->phone }}</b></div>
                                                    </div>
                                                </div>

                                                <!-- 2. ACADEMIC HISTORY -->
                                                <div class="bg-white dark:bg-[#1e293b] p-6 rounded-xl shadow-sm border border-slate-200 dark:border-white/5">
                                                    <h4 class="text-xs font-bold text-brand-blue dark:text-blue-400 uppercase tracking-widest mb-4 border-b border-gray-100 dark:border-white/5 pb-2">Academic History</h4>
                                                    @php
                                                        $academics = is_string($student->academic_history) ? json_decode($student->academic_history, true) : ($student->academic_history ?? []);
                                                    @endphp
                                                    @if(!empty($academics))
                                                        <table class="w-full text-sm text-left text-slate-700 dark:text-gray-300">
                                                            <thead class="text-xs text-gray-400 uppercase bg-slate-50 dark:bg-white/5">
                                                                <tr><th class="px-4 py-2">School</th><th class="px-4 py-2">Year</th><th class="px-4 py-2">Level</th><th class="px-4 py-2">Awards</th></tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($academics as $school)
                                                                    <tr class="border-b border-gray-100 dark:border-white/5">
                                                                        <td class="px-4 py-2 font-bold">{{ $school['name'] ?? '' }}</td>
                                                                        <td class="px-4 py-2">{{ $school['year'] ?? '' }}</td>
                                                                        <td class="px-4 py-2">{{ $school['level'] ?? '' }}</td>
                                                                        <td class="px-4 py-2 italic text-gray-500">{{ $school['awards'] ?? 'None' }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p class="text-sm text-gray-400 italic">No academic history provided.</p>
                                                    @endif
                                                </div>

                                                <!-- 3. PARENTS & BACKGROUND -->
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                    <!-- Father -->
                                                    <div class="bg-blue-50/50 dark:bg-blue-900/10 p-5 rounded-xl border border-blue-100 dark:border-blue-900/30 text-sm space-y-2 text-slate-700 dark:text-gray-300">
                                                        <h4 class="text-xs font-bold text-blue-800 dark:text-blue-400 uppercase tracking-widest mb-3">Father</h4>
                                                        <p><span class="text-xs text-gray-400">Name:</span> <b>{{ $student->father_details['name'] ?? 'N/A' }}</b> ({{ $student->father_details['type'] ?? '' }})</p>
                                                        <p><span class="text-xs text-gray-400">Contact:</span> {{ $student->father_details['mobile'] ?? 'N/A' }} / {{ $student->father_details['email'] ?? '' }}</p>
                                                        <p><span class="text-xs text-gray-400">Education:</span> {{ $student->father_details['education'] ?? 'N/A' }}</p>
                                                        <p><span class="text-xs text-gray-400">Work:</span> {{ $student->father_details['occupation'] ?? '' }} at {{ $student->father_details['company'] ?? '' }}</p>
                                                        <p><span class="text-xs text-gray-400">Home:</span> {{ $student->father_details['home_ownership'] ?? '' }}</p>
                                                        
                                                        <div class="mt-2 pt-2 border-t border-blue-200 dark:border-blue-800">
                                                            <span class="text-[10px] uppercase font-bold text-blue-600 dark:text-blue-400">Affiliations:</span>
                                                            <ul class="list-disc pl-4 text-xs">
                                                                @if(($student->father_details['is_employee'] ?? '') == 'yes') <li>DLSU Employee</li> @endif
                                                                @if(($student->father_details['is_alumnus'] ?? '') == 'yes') <li>DLSZ Alumnus</li> @endif
                                                                @if(($student->father_details['is_lasalle_alumnus'] ?? '') == 'yes') <li>La Salle Alumnus</li> @endif
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <!-- Mother -->
                                                    <div class="bg-pink-50/50 dark:bg-pink-900/10 p-5 rounded-xl border border-pink-100 dark:border-pink-900/30 text-sm space-y-2 text-slate-700 dark:text-gray-300">
                                                        <h4 class="text-xs font-bold text-pink-800 dark:text-pink-400 uppercase tracking-widest mb-3">Mother</h4>
                                                        <p><span class="text-xs text-gray-400">Name:</span> <b>{{ $student->mother_details['name'] ?? 'N/A' }}</b> ({{ $student->mother_details['type'] ?? '' }})</p>
                                                        <p><span class="text-xs text-gray-400">Contact:</span> {{ $student->mother_details['mobile'] ?? 'N/A' }} / {{ $student->mother_details['email'] ?? '' }}</p>
                                                        <p><span class="text-xs text-gray-400">Education:</span> {{ $student->mother_details['education'] ?? 'N/A' }}</p>
                                                        <p><span class="text-xs text-gray-400">Work:</span> {{ $student->mother_details['occupation'] ?? '' }} at {{ $student->mother_details['company'] ?? '' }}</p>
                                                        <p><span class="text-xs text-gray-400">Home:</span> {{ $student->mother_details['home_ownership'] ?? '' }}</p>

                                                        <div class="mt-2 pt-2 border-t border-pink-200 dark:border-pink-800">
                                                            <span class="text-[10px] uppercase font-bold text-pink-600 dark:text-pink-400">Affiliations:</span>
                                                            <ul class="list-disc pl-4 text-xs">
                                                                @if(($student->mother_details['is_employee'] ?? '') == 'yes') <li>DLSU Employee</li> @endif
                                                                @if(($student->mother_details['is_alumnus'] ?? '') == 'yes') <li>DLSZ Alumnus</li> @endif
                                                                @if(($student->mother_details['is_lasalle_alumnus'] ?? '') == 'yes') <li>La Salle Alumnus</li> @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- 4. FAMILY & SIBLINGS -->
                                                <div class="bg-white dark:bg-[#1e293b] p-6 rounded-xl shadow-sm border border-slate-200 dark:border-white/5">
                                                    <div class="grid grid-cols-3 gap-6 text-sm mb-4 text-slate-700 dark:text-gray-300">
                                                        <div><span class="text-xs text-gray-400 block">Marital Status</span> <b>{{ $student->parents_marital_status ?? 'N/A' }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Birth Order</span> <b>{{ $student->birth_order ?? 'N/A' }}</b></div>
                                                        <div><span class="text-xs text-gray-400 block">Guardian</span> <b>{{ $student->guardian_details['name'] ?? 'N/A' }}</b></div>
                                                    </div>

                                                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Siblings</h4>
                                                    @php
                                                        $siblings = is_string($student->siblings_data) ? json_decode($student->siblings_data, true) : ($student->siblings_data ?? []);
                                                    @endphp
                                                    @if(!empty($siblings))
                                                        <ul class="list-disc pl-5 text-sm text-slate-700 dark:text-gray-300">
                                                            @foreach($siblings as $sibling)
                                                                <li><b>{{ $sibling['name'] ?? '' }}</b> — {{ $sibling['grade'] ?? '' }} at {{ $sibling['school'] ?? '' }} ({{ $sibling['status'] ?? '' }})</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="text-sm text-gray-400 italic">No siblings listed.</p>
                                                    @endif
                                                </div>

                                                <!-- 5. ADDITIONAL INFO -->
                                                <div class="bg-white dark:bg-[#1e293b] p-6 rounded-xl shadow-sm border border-slate-200 dark:border-white/5">
                                                    <h4 class="text-xs font-bold text-red-600 dark:text-red-400 uppercase tracking-widest mb-4 border-b border-gray-100 dark:border-white/5 pb-2">Background Check & Health</h4>
                                                    <div class="space-y-4 text-sm">
                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                            <div class="bg-red-50 dark:bg-red-900/10 p-3 rounded border border-red-100 dark:border-red-900/30">
                                                                <span class="block text-xs font-bold text-red-800 dark:text-red-400 mb-1">Disciplinary History</span>
                                                                <p class="italic text-slate-700 dark:text-gray-300">{{ $student->disciplinary_history ?? 'None reported.' }}</p>
                                                            </div>
                                                            <div class="bg-amber-50 dark:bg-amber-900/10 p-3 rounded border border-amber-100 dark:border-amber-900/30">
                                                                <span class="block text-xs font-bold text-amber-800 dark:text-amber-400 mb-1">Learning Difficulties</span>
                                                                <p class="italic text-slate-700 dark:text-gray-300">{{ $student->learning_difficulty ?? 'None reported.' }}</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="block text-xs font-bold text-slate-500">Health Conditions / Allergies</span>
                                                            <p class="text-slate-800 dark:text-white">{{ $student->health_conditions ?? 'None reported.' }}</p>
                                                        </div>
                                                        <div>
                                                            <span class="block text-xs font-bold text-slate-500">Referral Source</span>
                                                            <p class="text-slate-800 dark:text-white">{{ $student->referral_source ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- FOOTER -->
                                            <div class="bg-gray-100 dark:bg-[#0B1120] px-8 py-5 flex justify-end gap-3 border-t border-gray-200 dark:border-white/10">
                                                <form action="{{ route('admin.status', $student->id) }}" method="POST">
                                                    @csrf <input type="hidden" name="status" value="rejected">
                                                    <button class="px-5 py-2.5 text-xs font-bold text-red-600 hover:bg-red-200 dark:hover:bg-red-900/20 rounded-lg transition border border-red-300 dark:border-red-900/30">Decline Application</button>
                                                </form>
                                                <form action="{{ route('admin.status', $student->id) }}" method="POST">
                                                    @csrf <input type="hidden" name="status" value="accepted">
                                                    <button class="px-6 py-2.5 text-xs font-bold text-white bg-brand-blue hover:bg-blue-800 rounded-lg shadow-lg">Approve & Enroll</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL -->

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-12 text-center text-slate-400 italic">No records found matching your criteria.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-8 py-4 border-t border-slate-100 dark:border-white/5">
            {{ $students->links() }} 
        </div>
    </div>

@endsection
