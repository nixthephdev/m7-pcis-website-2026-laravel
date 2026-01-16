<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#101426] min-h-screen flex flex-col items-center justify-center p-4 text-white relative overflow-hidden">

    <!-- Background Glow (Subtle) -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[20%] w-[500px] h-[500px] bg-blue-900/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[20%] w-[500px] h-[500px] bg-indigo-900/20 rounded-full blur-[120px]"></div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="relative z-10 w-full max-w-[420px] flex flex-col items-center">
        
        <!-- 1. LOGO & HEADER -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" class="h-20 w-auto mx-auto mb-4 drop-shadow-xl">
            <h1 class="text-2xl font-bold tracking-wide text-white">M7 PCIS</h1>
            <p class="text-sm text-blue-200/70 mt-1 font-light">Registrar & Admissions Management System</p>
        </div>

        <!-- 2. LOGIN CARD -->
        <div class="w-full bg-[#1E253E] border border-white/5 rounded-2xl shadow-2xl p-8 backdrop-blur-sm">
            
            <!-- Error Alert -->
            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-lg mb-6 text-xs flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email Field -->
                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-1.5">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500 group-focus-within:text-blue-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                        </div>
                        <input type="email" name="email" required 
                               class="w-full pl-11 pr-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm"
                               placeholder="admin@pcis.edu.ph">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-1.5">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500 group-focus-within:text-blue-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <input type="password" name="password" required 
                               class="w-full pl-11 pr-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm"
                               placeholder="••••••••">
                    </div>
                </div>

                <!-- Options -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer text-gray-400 hover:text-gray-300">
                        <input type="checkbox" class="rounded border-gray-600 bg-[#15192B] text-blue-500 focus:ring-offset-[#1E253E] focus:ring-blue-500">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="text-blue-400 hover:text-blue-300 transition">Forgot password?</a>
                </div>

                <!-- Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold py-3 rounded-lg shadow-lg shadow-blue-900/30 transition transform hover:-translate-y-0.5">
                    Sign In
                </button>
            </form>
        </div>

        <!-- 3. FOOTER CREDITS -->
        <div class="mt-12 text-center">
            <p class="text-[10px] text-gray-500">
                &copy; {{ date('Y') }} M7 PCIS. All rights reserved.
            </p>
            <p class="text-[10px] text-gray-600 mt-1">
                System Architecture & Development by <span class="text-gray-400 font-bold">Nikko Calumpiano</span>
            </p>
        </div>

    </div>

</body>
</html>