<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Lato', 'sans-serif'], royal: ['Cinzel', 'serif'] },
                    colors: { brand: { blue: '#00539C', gold: '#F4A300' } }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl overflow-hidden">
        
        <!-- Header -->
        <div class="bg-brand-blue p-8 text-center">
            <img src="{{ asset('images/logo.png') }}" class="h-20 w-auto mx-auto mb-4 bg-white rounded-full p-1 shadow-lg" alt="Logo">
            <h1 class="font-royal text-white text-2xl font-bold tracking-wide">Admin Portal</h1>
            <p class="text-blue-200 text-sm mt-1">Authorized Personnel Only</p>
        </div>

        <!-- Form -->
        <div class="p-8">
            
            @if($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-6 border border-red-100 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                
                <div class="mb-5">
                    <label class="block text-gray-700 text-xs font-bold uppercase tracking-wide mb-2">Email Address</label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/20 outline-none transition" placeholder="admin@pcis.edu.ph">
                </div>

                <div class="mb-8">
                    <label class="block text-gray-700 text-xs font-bold uppercase tracking-wide mb-2">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/20 outline-none transition" placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-brand-blue text-white font-bold py-3 rounded-lg shadow-lg hover:bg-[#003f75] transition transform hover:-translate-y-0.5">
                    Secure Login
                </button>
            </form>
        </div>
        
        <div class="bg-gray-50 p-4 text-center border-t border-gray-100">
            <a href="{{ route('home') }}" class="text-xs text-gray-500 hover:text-brand-blue transition">← Back to Website</a>
        </div>

    </div>

</body>
</html>