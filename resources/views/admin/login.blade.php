<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Cinzel:wght@600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'], royal: ['Cinzel', 'serif'] },
                    colors: {
                        brand: { blue: '#3b82f6', gold: '#F4A300', red: '#ef4444' }
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(59, 130, 246, 0.5)', /* Blue Glow */
                    }
                }
            }
        }
    </script>
</head>
<!-- UPDATED BODY: Royal Blue Radial Gradient -->
<body class="h-screen w-full flex flex-col items-center justify-center relative overflow-hidden bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#00539C] via-[#0a1a4a] to-[#020617] font-sans text-white">

    <!-- 1. BACKGROUND EFFECTS (Adjusted for Blue Theme) -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <!-- Top Glow (Lighter Blue) -->
        <div class="absolute top-[-20%] left-[50%] -translate-x-1/2 w-[800px] h-[800px] bg-[#4dabf7]/20 rounded-full blur-[120px]"></div>
        <!-- Bottom Right Glow (Subtle Gold Accent) -->
        <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-brand-gold/10 rounded-full blur-[100px]"></div>
        <!-- Texture Overlay -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
    </div>

    <!-- 2. MAIN CONTENT -->
    <div class="relative z-10 w-full max-w-[400px] p-4">
        
        <!-- HEADER SECTION -->
        <div class="text-center mb-8">
            <!-- Logo -->
            <div class="w-20 h-20 mx-auto mb-4 drop-shadow-2xl">
                <img src="{{ asset('images/logo.png') }}" class="h-full w-full object-contain" alt="Logo">
            </div>
            
            <!-- Title -->
            <h1 class="font-bold text-3xl tracking-wide mb-1">
                M<span class="text-brand-red">7</span> PCIS
            </h1>
            
            <!-- Subtitle (Blue Tint like reference) -->
            <p class="text-blue-200/80 text-xs font-medium tracking-wide">
                Registrar & Admissions Management System
            </p>
        </div>

        <!-- LOGIN CARD -->
        <div class="bg-[#1e293b]/60 backdrop-blur-xl rounded-2xl border border-white/10 shadow-2xl p-8">
            
            <!-- Error Alert -->
            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/20 text-red-200 text-xs p-3 rounded-lg mb-6 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf
                
                <!-- Email Input -->
                <div>
                    <label class="block text-gray-300 text-xs font-bold mb-2">Email Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500 group-focus-within:text-blue-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </div>
                        <input type="email" name="email" required 
                               class="w-full pl-10 pr-4 py-3 rounded-lg bg-[#0f172a]/80 border border-blue-500/30 text-white text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition placeholder-gray-600"
                               placeholder="admin@pcis.edu.ph">
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label class="block text-gray-300 text-xs font-bold mb-2">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500 group-focus-within:text-blue-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input type="password" name="password" required 
                               class="w-full pl-10 pr-4 py-3 rounded-lg bg-[#0f172a]/80 border border-blue-500/30 text-white text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition placeholder-gray-600"
                               placeholder="••••••••">
                    </div>
                </div>

                <!-- Extras -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center text-gray-400 cursor-pointer hover:text-white transition">
                        <input type="checkbox" class="mr-2 rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-offset-gray-900">
                        Remember me
                    </label>
                    <a href="#" class="text-blue-400 hover:text-blue-300 transition font-medium">Forgot password?</a>
                </div>

                <!-- Button -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3.5 rounded-lg shadow-lg shadow-blue-600/30 transition-all transform hover:-translate-y-0.5 duration-200 text-sm">
                    Sign In
                </button>

            </form>
        </div>

        <!-- FOOTER CREDITS -->
        <div class="mt-12 text-center space-y-1.5">
            <p class="text-blue-200/40 text-[10px]">
                &copy; {{ date('Y') }} M7 PCIS. All rights reserved.
            </p>
            <p class="text-blue-200/20 text-[10px] font-mono hover:text-white transition duration-300 cursor-default">
                System Architecture & Development by <span class="font-bold text-blue-200/50">Nikko Calumpiano</span>
            </p>
        </div>

    </div>

</body>
</html>