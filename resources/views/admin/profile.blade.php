@extends('layouts.admin')

@section('title', 'Account Settings')
@section('header', 'Account Settings')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 px-6 py-4 rounded-xl shadow-sm flex items-center animate-fade-in-down">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if($errors->any())
        <div class="bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 text-red-700 dark:text-red-400 px-6 py-4 rounded-xl shadow-sm">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- CARD 1: PROFILE INFORMATION -->
    <div class="bg-white dark:bg-[#151e32] rounded-xl shadow-sm border border-slate-200 dark:border-white/5 p-8 transition-colors duration-300">
        <div class="flex items-start gap-4 mb-6 border-b border-slate-100 dark:border-white/5 pb-6">
            <div class="p-3 bg-blue-50 dark:bg-blue-500/10 rounded-lg text-brand-blue dark:text-blue-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-slate-800 dark:text-white">Profile Information</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Update your account's profile information and email address.</p>
            </div>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Profile Picture -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Profile Picture</label>
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 rounded-full overflow-hidden border-2 border-slate-100 dark:border-white/10 shadow-sm">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}?v={{ time() }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-xl font-bold text-slate-400">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <label class="px-4 py-2 bg-white dark:bg-white/5 border border-slate-300 dark:border-white/10 rounded-lg text-sm font-medium text-slate-700 dark:text-white cursor-pointer hover:bg-slate-50 dark:hover:bg-white/10 transition shadow-sm">
                            Select New Photo
                            <input type="file" name="avatar" class="hidden" accept="image/*">
                        </label>
                        <p class="text-xs text-slate-400 mt-2">JPG, PNG or GIF (Max 3MB)</p>
                    </div>
                </div>
            </div>

            <!-- Name -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Full Name</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 bg-white dark:bg-black/20 text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue focus:border-brand-blue transition shadow-sm">
            </div>

            <!-- Email -->
            <div class="mb-8">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 bg-white dark:bg-black/20 text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue focus:border-brand-blue transition shadow-sm">
            </div>

            <div class="flex justify-start">
                <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg font-bold text-sm hover:bg-blue-700 transition shadow-md">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <!-- CARD 2: UPDATE PASSWORD -->
    <div class="bg-white dark:bg-[#151e32] rounded-xl shadow-sm border border-slate-200 dark:border-white/5 p-8 transition-colors duration-300">
        <div class="flex items-start gap-4 mb-6 border-b border-slate-100 dark:border-white/5 pb-6">
            <div class="p-3 bg-amber-50 dark:bg-amber-500/10 rounded-lg text-amber-600 dark:text-amber-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-slate-800 dark:text-white">Update Password</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Ensure your account is using a long, random password to stay secure.</p>
            </div>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            <!-- Hidden fields to pass validation for name/email if not updating them here -->
            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">

            <div class="space-y-6 mb-8">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">New Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 bg-white dark:bg-black/20 text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue focus:border-brand-blue transition shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 bg-white dark:bg-black/20 text-slate-800 dark:text-white focus:ring-2 focus:ring-brand-blue focus:border-brand-blue transition shadow-sm">
                </div>
            </div>

            <div class="flex justify-start">
                <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg font-bold text-sm hover:bg-blue-700 transition shadow-md">
                    Update Password
                </button>
            </div>
        </form>
    </div>

    <!-- CARD 3: DELETE ACCOUNT -->
    <div class="bg-white dark:bg-[#151e32] rounded-xl shadow-sm border border-slate-200 dark:border-white/5 p-8 transition-colors duration-300">
        <div class="flex items-start gap-4 mb-6 border-b border-slate-100 dark:border-white/5 pb-6">
            <div class="p-3 bg-red-50 dark:bg-red-500/10 rounded-lg text-red-600 dark:text-red-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-slate-800 dark:text-white">Delete Account</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Permanently remove your account and data.</p>
            </div>
        </div>

        <div class="max-w-xl text-sm text-slate-500 dark:text-slate-400 mb-6">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </div>

        <div class="flex justify-start">
            <button onclick="alert('This feature is disabled for the main admin account.')" class="bg-red-600 text-white px-6 py-2.5 rounded-lg font-bold text-sm hover:bg-red-700 transition shadow-md">
                Delete Account
            </button>
        </div>
    </div>

</div>

@endsection