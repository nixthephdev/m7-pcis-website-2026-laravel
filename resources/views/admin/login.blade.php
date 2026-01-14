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
                        brand: { blue: '#00539C', gold: '#F4A300', red: '#D72638', green: '#009245', dark: '#0B1120' }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in': 'fadeIn 0.8s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'scale(0.95)' },
                            '100%': { opacity: '1', transform: 'scale(1)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="h-screen w-full flex items-center justify-center relative overflow-hidden bg-[#050914]">

    <!-- 1. VIBRANT MESH BACKGROUND (No Images, Just CSS) -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <!-- Blue Glow (Top Left) -->
        <div class="absolute -top-[20%] -left-[10%] w-[70%] h-[70%] bg-brand-blue/40 rounded-full blur-[120px] animate-pulse"></div>
        <!-- Red Glow (Bottom Right) -->
        <div class="absolute -bottom-[20%] -right-[10%] w-[60%] h-[60%] bg-brand-red/30 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
        <!-- Gold Glow (Center Accent) -->
        <div class="absolute top-[30%] left-[40%] w-[30%] h-[30%] bg-brand-gold/20 rounded-full blur-[100px] animate-float"></div>
        
        <!-- Grid Pattern Overlay for Texture -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
    </div>

    <!-- 2. PREMIUM LOGIN CARD -->
    <div class="relative z-10 w-full max-w-[420px] p-6 animate-fade-in">
        
        <!-- Glass Effect Card -->
        <div class="bg-white/10 backdrop-blur-2xl rounded-[2rem] shadow-2xl border border-white/20 overflow-hidden relative">
            
            <!-- Top Shine -->
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-blue via-brand-gold to-brand-red opacity-80"></div>

            <div class="p-10">
                
                <!-- Logo Section -->
                <div class="text-center mb-10">
                    
                    <!-- Logo (No White Background, Just the Image) -->
                    <div class="w-24 h-24 mx-auto mb-4 transform hover:scale-110 transition duration-500 drop-shadow-[0_0_15px_rgba(255,255,255,0.3)]">
                        <img src="{{ asset('images/logo.png') }}" class="h-full w-full object-contain filter brightness-110 contrast-125" alt="Logo">
                    </div>

                    <!-- Text: M (Blue), 7 (Red), PCIS (Blue) -->
                    <h1 class="font-royal font-bold text-3xl tracking-wider drop-shadow-md">
                        <span class="text-blue-400">M</span><span class="text-brand-red">7</span> <span class="text-blue-400">PCIS</span>
                    </h1>
                    
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.3em] font-medium mt-2 opacity-80">Registrar Portal</p>
                </div>

                <!-- Error Message -->
                @if($errors->any())
                    <div class="bg-red-500/20 border border-red-500/50 rounded-xl p-3 mb-6 flex items-center gap-3 backdrop-blur-sm">
                        <svg class="w-5 h-5 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-xs text-white/90">{{ $errors->first() }}</p>
                    </div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Email -->
                    <div class="group">
                        <label class="block text-[10px] font-bold text-blue-200 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                        <div class="relative">
                            <input type="email" name="email" required 
                                   class="w-full pl-4 pr-4 py-3.5 rounded-xl bg-[#0B1120]/50 border border-white/10 text-white text-sm focus:outline-none focus:bg-[#0B1120]/80 focus:border-brand-gold transition placeholder-white/20 shadow-inner"
                                   placeholder="admin@pcis.edu.ph">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="group">
                        <div class="flex justify-between items-center mb-2 ml-1">
                            <label class="block text-[10px] font-bold text-blue-200 uppercase tracking-widest">Password</label>
                            <!-- Forgot Password Link -->
                            <a href="#" class="text-[10px] text-brand-gold hover:text-white transition font-medium">Forgot Password?</a>
                        </div>
                        <div class="relative">
                            <input type="password" name="password" required 
                                   class="w-full pl-4 pr-4 py-3.5 rounded-xl bg-[#0B1120]/50 border border-white/10 text-white text-sm focus:outline-none focus:bg-[#0B1120]/80 focus:border-brand-gold transition placeholder-white/20 shadow-inner"
                                   placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-brand-blue to-[#1e40af] text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-900/50 hover:shadow-brand-gold/20 hover:scale-[1.02] transition-all duration-300 uppercase tracking-widest text-xs border border-white/10 relative overflow-hidden group">
                        <span class="relative z-10">Secure Login</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-brand-gold to-brand-red opacity-0 group-hover:opacity-100 transition duration-500"></div>
                    </button>

                </form>

            </div>
            
            <!-- Footer -->
            <div class="bg-[#0B1120]/40 p-4 text-center border-t border-white/5">
                <a href="{{ route('home') }}" class="text-[10px] text-white/40 hover:text-white transition flex items-center justify-center gap-1.5 font-medium tracking-wide">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Return to Main Website
                </a>
            </div>

        </div>
        
      
        <!-- Bottom Credits -->
        <div class="mt-8 text-center space-y-1">
            <p class="text-white/20 text-[10px] font-light tracking-wider">
                &copy; {{ date('Y') }} M7 PCIS System. Protected.
            </p>
            
            <!-- Developer Credit -->
            <p class="text-white/10 text-[9px] font-mono hover:text-brand-gold transition duration-300 cursor-default">
                System Architecture & Development by <span class="font-bold">Nikko Calumpiano</span>
            </p>
        </div>

    </div>

</body>
</html>