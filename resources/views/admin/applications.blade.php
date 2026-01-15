
@extends('layouts.admin')

@section('title', 'Applicants')
@section('header', 'Student Database')

@section('content')

    <!-- 1. MINI STATS OVERVIEW (New Feature) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total -->
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between group hover:border-blue-500/30 transition">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Students</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $students->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-500/10 text-brand-blue dark:text-blue-400 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
        </div>
        <!-- Pending -->
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between group hover:border-amber-500/30 transition">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Pending Review</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $students->where('status', 'pending')->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <!-- Enrolled -->
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between group hover:border-emerald-500/30 transition">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Officially Enrolled</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $students->where('status', 'accepted')->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <!-- 2. TOOLBAR (Modern Pills + Search) -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        
        <!-- Filter Pills -->
        <div class="flex p-1.5 bg-white dark:bg-[#151e32] rounded-xl border border-slate-200 dark:border-white/5 shadow-sm">
            <a href="{{ route('admin.applications', ['status' => 'all']) }}" 
               class="px-5 py-2 rounded-lg text-xs font-bold transition-all {{ !request('status') || request('status') == 'all' ? 'bg-brand-blue text-white shadow-md' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-white/5' }}">
               All Students
            </a>
            <a href="{{ route('admin.applications', ['status' => 'pending']) }}" 
               class="px-5 py-2 rounded-lg text-xs font-bold transition-all {{ request('status') == 'pending' ? 'bg-amber-500 text-white shadow-md' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-white/5' }}">
               Pending
            </a>
            <a href="{{ route('admin.applications', ['status' => 'accepted']) }}" 
               class="px-5 py-2 rounded-lg text-xs font-bold transition-all {{ request('status') == 'accepted' ? 'bg-emerald-500 text-white shadow-md' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-white/5' }}">
               Enrolled
            </a>
            <a href="{{ route('admin.applications', ['status' => 'rejected']) }}" 
               class="px-5 py-2 rounded-lg text-xs font-bold transition-all {{ request('status') == 'rejected' ? 'bg-red-500 text-white shadow-md' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-white/5' }}">
               Declined
            </a>
        </div>

        <!-- Search Bar -->
        <form action="{{ route('admin.applications') }}" method="GET" class="relative w-full md:w-96 group">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-brand-blue transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, LRN, or email..." 
                   class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-white/10 rounded-xl leading-5 bg-white dark:bg-[#151e32] text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-brand-blue sm:text-sm transition shadow-sm">
        </form>
    </div>

    <!-- 3. DATA GRID (Premium Table) -->
    <div class="bg-white dark:bg-[#151e32] rounded-3xl shadow-card border border-slate-100 dark:border-white/5 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 dark:bg-white/5 text-slate-400 text-[10px] uppercase tracking-widest font-bold border-b border-slate-100 dark:border-white/5">
                    <tr>
                        <th class="px-8 py-5">Student</th>
                        <th class="px-8 py-5">Grade Level</th>
                        <th class="px-8 py-5">Parent / Contact</th>
                        <th class="px-8 py-5">Status</th>
                        <th class="px-8 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-white/5 text-sm">
                    @forelse($students as $student)
                    <tr class="hover:bg-blue-50/30 dark:hover:bg-white/5 transition duration-200 group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <!-- Avatar Circle -->
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900/50 dark:to-blue-800/50 text-brand-blue dark:text-blue-300 flex items-center justify-center text-xs font-bold shadow-sm group-hover:scale-110 transition">
                                    {{ substr($student->first_name, 0, 1) }}{{ substr($student->last_name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-slate-800 dark:text-white text-base">{{ $student->last_name }}, {{ $student->first_name }}</div>
                                    <div class="text-xs text-slate-400 font-mono mt-0.5 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884-.5 2-2 2h4c-1.5 0-2-1.116-2-2z"></path></svg>
                                        {{ $student->lrn ?? 'No LRN' }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 px-3 py-1 rounded-lg text-xs font-bold border border-slate-200 dark:border-white/5">
                                {{ $student->grade_level }}
                            </span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-slate-700 dark:text-slate-300 font-medium text-sm">{{ $student->father_details['name'] ?? ($student->mother_details['name'] ?? 'N/A') }}</div>
                            <div class="text-xs text-slate-400 mt-0.5">{{ $student->phone }}</div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide border shadow-sm
                                {{ $student->status == 'pending' ? 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-500/10 dark:text-amber-400 dark:border-amber-500/20' : '' }}
                                {{ $student->status == 'accepted' ? 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20' : '' }}
                                {{ $student->status == 'rejected' ? 'bg-rose-50 text-rose-700 border-rose-200 dark:bg-rose-500/10 dark:text-rose-400 dark:border-rose-500/20' : '' }}">
                                <span class="w-2 h-2 rounded-full {{ $student->status == 'pending' ? 'bg-amber-500' : ($student->status == 'accepted' ? 'bg-emerald-500' : 'bg-rose-500') }}"></span>
                                {{ $student->status ?? 'Pending' }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <!-- MODAL TRIGGER -->
                            <div x-data="{ open: false }">
                                <button @click="open = true" class="text-slate-500 hover:text-brand-blue dark:text-slate-400 dark:hover:text-white font-bold text-xs border border-slate-200 dark:border-white/10 hover:border-brand-blue dark:hover:border-white bg-white dark:bg-white/5 px-4 py-2 rounded-lg transition shadow-sm flex items-center gap-2 ml-auto group-hover:bg-brand-blue group-hover:text-white group-hover:border-brand-blue">
                                    <span>Manage</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </button>
                                
                                <!-- MODAL (Reused from Dashboard) -->
                                <div x-show="open" x-cloak class="fixed inset-0 z-[100] overflow-y-auto">
                                    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                                        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-[#0B1120]/80 backdrop-blur-sm transition-opacity" @click="open = false"></div>
                                        <div x-show="open" x-transition.scale class="inline-block bg-white dark:bg-[#151e32] rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-3xl sm:w-full border border-gray-100 dark:border-white/10">
                                            
                                            <!-- Modal Header -->
                                            <div class="bg-[#0B1120] px-8 py-6 flex justify-between items-start relative overflow-hidden">
                                                <div class="absolute top-0 right-0 w-64 h-64 bg-brand-blue/20 rounded-full blur-3xl -mr-16 -mt-16 pointer-events-none"></div>
                                                <div class="relative z-10">
                                                    <h3 class="text-xl font-royal font-bold text-white tracking-wide">Application Profile</h3>
                                                    <div class="flex items-center gap-3 mt-2">
                                                        <span class="text-xs text-blue-300 font-mono">ID: #{{ $student->id }}</span>
                                                        <span class="text-xs bg-white/10 text-white px-2 py-0.5 rounded">{{ $student->created_at->format('F d, Y') }}</span>
                                                    </div>
                                                </div>
                                                <button @click="open = false" class="text-white/40 hover:text-white transition bg-white/5 hover:bg-white/10 p-2 rounded-full">✕</button>
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="p-8 max-h-[70vh] overflow-y-auto bg-gray-50 dark:bg-[#0f1623]">
                                                <div class="grid grid-cols-2 gap-8">
                                                    <!-- Column 1 -->
                                                    <div>
                                                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-200 dark:border-white/10 pb-2">Student Profile</h4>
                                                        <div class="space-y-3 text-sm">
                                                            <p class="flex justify-between"><span class="text-gray-500 dark:text-gray-400">Full Name</span> <span class="font-bold text-slate-800 dark:text-white">{{ $student->first_name }} {{ $student->last_name }}</span></p>
                                                            <p class="flex justify-between"><span class="text-gray-500 dark:text-gray-400">LRN</span> <span class="font-medium text-slate-700 dark:text-gray-300 font-mono">{{ $student->lrn ?? 'N/A' }}</span></p>
                                                            <p class="flex justify-between"><span class="text-gray-500 dark:text-gray-400">DOB</span> <span class="font-medium text-slate-700 dark:text-gray-300">{{ $student->birth_date }}</span></p>
                                                            <p class="flex justify-between"><span class="text-gray-500 dark:text-gray-400">Previous School</span> <span class="font-medium text-slate-700 dark:text-gray-300">{{ $student->previous_school }}</span></p>
                                                        </div>
                                                    </div>
                                                    <!-- Column 2 -->
                                                    <div>
                                                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-200 dark:border-white/10 pb-2">Family</h4>
                                                        <div class="space-y-3 text-sm">
                                                            <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg border border-blue-100 dark:border-blue-900/30">
                                                                <span class="text-[10px] font-bold text-blue-600 dark:text-blue-400 uppercase block mb-1">Father</span>
                                                                <p class="font-bold text-slate-800 dark:text-white">{{ $student->father_details['name'] ?? 'N/A' }}</p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $student->father_details['phone'] ?? '' }}</p>
                                                            </div>
                                                            <div class="bg-red-50 dark:bg-red-900/20 p-3 rounded-lg border border-red-100 dark:border-red-900/30">
                                                                <span class="text-[10px] font-bold text-red-600 dark:text-red-400 uppercase block mb-1">Mother</span>
                                                                <p class="font-bold text-slate-800 dark:text-white">{{ $student->mother_details['name'] ?? 'N/A' }}</p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $student->mother_details['phone'] ?? '' }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Health -->
                                                <div class="mt-6">
                                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Health & Conditions</h4>
                                                    <p class="text-sm bg-white dark:bg-white/5 p-4 rounded-lg border border-gray-200 dark:border-white/10 text-slate-600 dark:text-gray-300 italic">
                                                        "{{ $student->health_conditions ?? 'None reported.' }}"
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Modal Footer -->
                                            <div class="bg-white dark:bg-[#151e32] px-8 py-5 flex justify-end gap-3 border-t border-gray-100 dark:border-white/10">
                                                <form action="{{ route('admin.status', $student->id) }}" method="POST">
                                                    @csrf <input type="hidden" name="status" value="rejected">
                                                    <button class="px-4 py-2 text-xs font-bold text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition border border-red-100 dark:border-red-900/30">Decline</button>
                                                </form>
                                                <form action="{{ route('admin.status', $student->id) }}" method="POST">
                                                    @csrf <input type="hidden" name="status" value="accepted">
                                                    <button class="px-6 py-2 text-xs font-bold text-white bg-brand-blue hover:bg-blue-800 rounded-lg shadow-md transition">Approve & Enroll</button>
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
        
        <!-- Pagination -->
        <div class="px-8 py-4 border-t border-slate-100 dark:border-white/5">
            {{ $students->links() }} 
        </div>
    </div>

@endsection
