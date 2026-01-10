<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Portal - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Using Lato for the dashboard for readability -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Lato', sans-serif; }
        .font-header { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#F4F4F4]"> <!-- Soft Gray BG -->

    <!-- Admin Navbar: Deep Blue -->
    <nav class="bg-[#00539C] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo.png') }}" class="h-10 w-auto bg-white rounded-full p-0.5" alt="Logo">
                <div>
                    <h1 class="font-header font-bold text-xl tracking-wide">M7 PCIS</h1>
                    <p class="text-xs text-blue-200 uppercase tracking-widest font-bold">Registrar Portal</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="text-sm text-blue-100 hover:text-white transition">View Website</a>
                <div class="h-4 w-px bg-blue-400"></div>
                <span class="font-bold text-[#F4A300]">Admin</span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-6 py-12">
        
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-3xl font-bold text-[#00539C]">Enrollment Applications</h2>
                <p class="text-gray-500 mt-1">Manage incoming student applications for SY 2024-2025.</p>
            </div>
            <div class="bg-white px-6 py-3 rounded shadow-sm border-l-4 border-[#00539C]">
                <span class="text-gray-500 text-xs font-bold uppercase tracking-wider block">Total Applicants</span>
                <span class="text-[#00539C] font-bold text-2xl">{{ $students->count() }}</span>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-[#009688] text-[#009688] p-4 mb-6 rounded shadow-sm flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Data Table -->
        <div class="bg-white rounded shadow-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#00539C] text-white uppercase text-xs tracking-wider">
                            <th class="p-5 font-bold">Date Applied</th>
                            <th class="p-5 font-bold">Student Name</th>
                            <th class="p-5 font-bold">Grade Level</th>
                            <th class="p-5 font-bold">Contact Info</th>
                            <th class="p-5 font-bold">Previous School</th>
                            <th class="p-5 font-bold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        @forelse($students as $student)
                        <tr class="hover:bg-blue-50 transition duration-150">
                            <td class="p-5 text-gray-500 whitespace-nowrap">
                                {{ $student->created_at->format('M d, Y') }}<br>
                                <span class="text-xs opacity-70">{{ $student->created_at->format('h:i A') }}</span>
                            </td>
                            <td class="p-5 font-bold text-gray-800 text-base">
                                {{ $student->last_name }}, {{ $student->first_name }}
                            </td>
                            <td class="p-5">
                                <span class="px-3 py-1 rounded text-xs font-bold uppercase tracking-wide
                                    {{ $student->grade_level == 'Kindergarten' ? 'bg-[#F4A300]/20 text-[#b47800]' : '' }}
                                    {{ str_contains($student->grade_level, 'Grade 11') ? 'bg-[#00539C]/10 text-[#00539C]' : 'bg-gray-100 text-gray-600' }}">
                                    {{ $student->grade_level }}
                                </span>
                            </td>
                            <td class="p-5 text-gray-600">
                                <div class="flex items-center gap-2"><span class="text-gray-400">✉️</span> {{ $student->email }}</div>
                                <div class="flex items-center gap-2 mt-1"><span class="text-gray-400">📱</span> {{ $student->phone }}</div>
                            </td>
                            <td class="p-5 text-gray-500 italic">
                                {{ $student->previous_school ?? 'N/A' }}
                            </td>
                            <td class="p-5 text-center">
                                <form action="{{ route('admin.delete', $student->id) }}" method="POST" onsubmit="return confirm('Delete this application?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[#D72638] hover:text-red-800 font-bold text-xs uppercase tracking-wide hover:underline">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-gray-400 bg-[#F9F9F9]">
                                <div class="mb-2 text-2xl">📂</div>
                                <p class="text-lg">No applications received yet.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>