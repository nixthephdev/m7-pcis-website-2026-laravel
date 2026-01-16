<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#101426] min-h-screen flex flex-col items-center justify-center p-4 text-white relative overflow-hidden">

    <!-- Background Glow -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[20%] w-[500px] h-[500px] bg-blue-900/20 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 w-full max-w-[420px] flex flex-col items-center">
        
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" class="h-16 w-auto mx-auto mb-4 drop-shadow-xl">
            <h1 class="text-2xl font-bold tracking-wide text-white">Reset Password</h1>
            <p class="text-sm text-blue-200/70 mt-1 font-light">Enter your email to receive a reset link</p>
        </div>

        <div class="w-full bg-[#1E253E] border border-white/5 rounded-2xl shadow-2xl p-8 backdrop-blur-sm">
            
            @if (session('status'))
                <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-3 rounded-lg mb-6 text-xs flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-1.5">Email Address</label>
                    <input type="email" name="email" required 
                           class="w-full px-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-sm"
                           placeholder="name@example.com">
                    @error('email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded-lg shadow-lg transition transform hover:-translate-y-0.5">
                    Send Reset Link
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-xs text-gray-400 hover:text-white transition">← Back to Login</a>
            </div>
        </div>
    </div>
</body>
</html>