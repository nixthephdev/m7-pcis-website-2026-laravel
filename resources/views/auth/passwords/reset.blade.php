<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#101426] min-h-screen flex flex-col items-center justify-center p-4 text-white relative overflow-hidden">

    <div class="relative z-10 w-full max-w-[420px] flex flex-col items-center">
        
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold tracking-wide text-white">Set New Password</h1>
            <p class="text-sm text-blue-200/70 mt-1 font-light">Create a strong password for your account</p>
        </div>

        <div class="w-full bg-[#1E253E] border border-white/5 rounded-2xl shadow-2xl p-8 backdrop-blur-sm">
            
            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-1.5">Email Address</label>
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" required readonly
                           class="w-full px-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-gray-400 cursor-not-allowed text-sm">
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-1.5">New Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
                    @error('password') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-300 mb-1.5">Confirm Password</label>
                    <input type="password" name="password_confirmation" required 
                           class="w-full px-4 py-3 rounded-lg bg-[#15192B] border border-gray-700 text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded-lg shadow-lg transition transform hover:-translate-y-0.5">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</body>
</html>