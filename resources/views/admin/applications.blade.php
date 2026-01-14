@extends('layouts.admin')

@section('title', 'Applications')
@section('header', 'Student Database')
@section('subheader', 'Manage and review enrollment records.')

@section('content')

    <!-- TOOLBAR (Search & Filters) -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
        <!-- Filter Tabs -->
        <div class="flex gap-2 border-b border-gray-200 dark:border-white/10 overflow-x-auto transition-colors w-full md:w-auto">
            <a href="{{ route('admin.applications', ['status' => 'all']) }}" 
               class="px-6 py-3 text-sm font-bold border-b-2 transition {{ !request('status') || request('status') == 'all' ? 'border-brand-blue text-brand-blue' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white' }}">
               All
            </a>
            <a href="{{ route('admin.applications', ['status' => 'pending']) }}" 
               class="px-6 py-3 text-sm font-bold border-b-2 transition {{ request('status') == 'pending' ? 'border-brand-gold text-brand-gold' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white' }}">
               Pending
            </a>
            <a href="{{ route('admin.applications', ['status' => 'accepted']) }}" 
               class="px-6 py-3 text-sm font-bold border-b-2 transition {{ request('status') == 'accepted' ? 'border-brand-green text-brand-green' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white' }}">
               Enrolled
            </a>
            <a href="{{ route('admin.applications', ['status' => 'rejected']) }}" 
               class="px-6 py-3 text-sm font-bold border-b-2 transition {{ request('status') == 'rejected' ? 'border-brand-red text-brand-red' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white' }}">
               Declined
            </a>
        </div>

        <!-- Search Bar -->
        <form action="{{ route('admin.applications') }}" method="GET" class="relative w-full md:w-96">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search database..." 
                   class="w-full pl-12 pr-4 py-3 bg-white/80 dark:bg-white/5 backdrop-blur-md border border-gray-200 dark:border-white/10 rounded-full text-sm focus:ring-2 focus:ring-brand-blue focus:border-transparent outline-none shadow-sm transition text-gray-700 dark:text-white placeholder-gray-400">
            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </form>
    </div>

    <!-- DATA TABLE -->
    <div class="bg-white/80 dark:bg-white/5 backdrop-blur-md rounded-2xl shadow-lg border border-gray-200 dark:border-white/10 overflow-hidden transition-colors">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50/50 dark:bg-white/5 text-gray-500 dark:text-gray-400 text-[10px] uppercase tracking-widest font-bold border-b border-gray-200 dark:border-white/5">
                <tr>
                    <th class="px-6 py-4">Student</th>
                    <th class="px-6 py-4">Grade</th>
                    <th class="px-6 py-4">Parent / Contact</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-white/5 text-sm">
                @forelse($students as $student)
                <tr class="hover:bg-blue-50/50 dark:hover:bg-white/5 transition duration-200 text-gray-700 dark:text-gray-300">
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-800 dark:text-white">{{ $student->last_name }}, {{ $student->first_name }}</div>
                        <div class="text-xs text-gray-400 font-mono mt-0.5">LRN: {{ $student->lrn ?? 'N/A' }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-gray-100 dark:bg-white/10 text-gray-600 dark:text-gray-300 px-2 py-1 rounded text-xs font-bold border border-gray-200 dark:border-white/5">{{ $student->grade_level }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-slate-700 dark:text-gray-300 font-medium">{{ $student->father_details['name'] ?? ($student->mother_details['name'] ?? 'N/A') }}</div>
                        <div class="text-xs text-gray-400">{{ $student->phone }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide border
                            {{ $student->status == 'pending' ? 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-900/30 dark:text-amber-400 dark:border-amber-800' : '' }}
                            {{ $student->status == 'accepted' ? 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800' : '' }}
                            {{ $student->status == 'rejected' ? 'bg-rose-50 text-rose-700 border-rose-200 dark:bg-rose-900/30 dark:text-rose-400 dark:border-rose-800' : '' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $student->status == 'pending' ? 'bg-amber-500' : ($student->status == 'accepted' ? 'bg-emerald-500' : 'bg-rose-500') }}"></span>
                            {{ $student->status ?? 'Pending' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <!-- MODAL TRIGGER -->
                        <div x-data="{ open: false }">
                            <button @click="open = true" class="text-brand-blue dark:text-blue-400 hover:text-white font-bold text-xs border border-blue-100 dark:border-blue-900 hover:bg-brand-blue dark:hover:bg-blue-600 px-4 py-1.5 rounded-lg transition shadow-sm">
                                Manage
                            </button>
                            <!-- Include Modal here (same as dashboard) -->
                            <!-- For brevity, I assume you can copy the modal code from the previous step into here -->
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="p-12 text-center text-gray-500 dark:text-gray-400 italic">No records found matching your criteria.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-gray-200 dark:border-white/5 text-gray-500 dark:text-gray-400 text-xs">
            {{ $students->links() }} 
        </div>
    </div>

@endsection