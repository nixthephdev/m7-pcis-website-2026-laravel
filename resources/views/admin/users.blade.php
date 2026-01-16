@extends('layouts.admin')

@section('title', 'User Management')
@section('header', 'System Users')

@section('content')

    <!-- 1. MINI STATS -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Staff -->
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Staff</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $users->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-blue-50 text-brand-blue flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></div>
        </div>
        <!-- Admins -->
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Admins</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $users->where('role', 'admin')->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-red-50 text-red-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg></div>
        </div>
        <!-- Registrars -->
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Registrars</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $users->where('role', 'registrar')->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg></div>
        </div>
        <!-- Cashiers -->
        <div class="bg-white dark:bg-[#151e32] p-5 rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Cashiers</p>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mt-1">{{ $users->where('role', 'cashier')->count() }}</h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
        </div>
    </div>

    <!-- 2. TOOLBAR -->
    <div class="flex justify-between items-center mb-6" x-data="{ openModal: false }">
        <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest">Staff Accounts</h3>
        
        <!-- Add User Button -->
        <button @click="openModal = true" class="bg-brand-blue hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-lg shadow-blue-500/30 flex items-center gap-2 transition transform hover:-translate-y-0.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Add New User
        </button>

        <!-- ADD USER MODAL -->
        <div x-show="openModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center px-4">
            <div class="fixed inset-0 bg-[#0B1120]/80 backdrop-blur-sm transition-opacity" @click="openModal = false"></div>
            
            <div class="bg-white dark:bg-[#151e32] rounded-2xl shadow-2xl w-full max-w-md relative overflow-hidden transform transition-all border border-gray-100 dark:border-white/10">
                <div class="bg-brand-blue px-6 py-4 border-b border-white/10">
                    <h3 class="text-white font-bold text-lg">Create New User</h3>
                    <p class="text-blue-200 text-xs">Add a new staff member to the system.</p>
                </div>
                
                <form action="{{ route('admin.users.create') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-1">Full Name</label>
                        <input type="text" name="name" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0B1120] text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-1">Email Address</label>
                        <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0B1120] text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-1">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0B1120] text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase mb-1">Role</label>
                        <select name="role" required class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0B1120] text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue outline-none">
                            <option value="registrar">Registrar</option>
                            <option value="cashier">Cashier</option>
                            <option value="marketing">Marketing</option>
                            <option value="admin">IT Admin</option>
                        </select>
                    </div>
                    <div class="pt-4 flex justify-end gap-3">
                        <button type="button" @click="openModal = false" class="px-4 py-2 text-xs font-bold text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white">Cancel</button>
                        <button type="submit" class="bg-brand-blue text-white px-6 py-2 rounded-lg text-xs font-bold shadow-md hover:bg-blue-800 transition">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 3. USERS TABLE -->
    <div class="bg-white dark:bg-[#151e32] rounded-3xl shadow-card border border-slate-100 dark:border-white/5 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 dark:bg-white/5 text-slate-400 text-[10px] uppercase tracking-widest font-bold border-b border-slate-100 dark:border-white/5">
                <tr>
                    <th class="px-8 py-5">User</th>
                    <th class="px-8 py-5">Role</th>
                    <th class="px-8 py-5">Email</th>
                    <th class="px-8 py-5">Created</th>
                    <th class="px-8 py-5 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 dark:divide-white/5 text-sm">
                @foreach($users as $user)
                <tr class="hover:bg-blue-50/30 dark:hover:bg-white/5 transition duration-200">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-white/10 flex items-center justify-center font-bold text-slate-600 dark:text-white text-xs">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <span class="font-bold text-slate-800 dark:text-white">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase border
                            @if($user->role == 'admin') bg-red-50 text-red-600 border-red-200 dark:bg-red-900/20 dark:border-red-900/50
                            @elseif($user->role == 'registrar') bg-purple-50 text-purple-600 border-purple-200 dark:bg-purple-900/20 dark:border-purple-900/50
                            @elseif($user->role == 'cashier') bg-emerald-50 text-emerald-600 border-emerald-200 dark:bg-emerald-900/20 dark:border-emerald-900/50
                            @else bg-blue-50 text-blue-600 border-blue-200 dark:bg-blue-900/20 dark:border-blue-900/50 @endif">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-slate-500 dark:text-slate-400">{{ $user->email }}</td>
                    <td class="px-8 py-5 text-slate-400 text-xs">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="px-8 py-5 text-right">
                        @if(auth()->id() !== $user->id)
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:text-red-600 font-bold text-xs">Remove</button>
                        </form>
                        @else
                        <span class="text-slate-300 text-xs italic">Current User</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection