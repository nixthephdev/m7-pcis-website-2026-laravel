<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Portal - M7 PCIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Lato', sans-serif; }
        .font-header { font-family: 'Playfair Display', serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#F4F4F4]">

    <!-- Navbar -->
    <nav class="bg-[#00539C] text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo.png') }}" class="h-10 w-auto bg-white rounded-full p-0.5" alt="Logo">
                <div>
                    <h1 class="font-header font-bold text-xl tracking-wide">M7 PCIS</h1>
                    <p class="text-xs text-blue-200 uppercase tracking-widest font-bold">Registrar Portal</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="text-sm text-blue-200 hover:text-white underline">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-12">
        
        <!-- Header & Stats -->
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

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE -->
        <div class="bg-white rounded shadow-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#00539C] text-white uppercase text-xs tracking-wider">
                            <th class="p-5 font-bold">Status</th>
                            <th class="p-5 font-bold">Date</th>
                            <th class="p-5 font-bold">Student Name</th>
                            <th class="p-5 font-bold">Grade</th>
                            <th class="p-5 font-bold">Contact</th>
                            <th class="p-5 font-bold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        @forelse($students as $student)
                        <tr class="hover:bg-blue-50 transition duration-150">
                            <!-- Status Badge -->
                            <td class="p-5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide
                                    {{ $student->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $student->status == 'accepted' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $student->status == 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ $student->status ?? 'Pending' }}
                                </span>
                            </td>
                            <td class="p-5 text-gray-500 whitespace-nowrap">
                                {{ $student->created_at->format('M d, Y') }}
                            </td>
                            <td class="p-5 font-bold text-gray-800 text-base">
                                {{ $student->last_name }}, {{ $student->first_name }}
                                <span class="block text-xs font-normal text-gray-400">LRN: {{ $student->lrn ?? 'N/A' }}</span>
                            </td>
                            <td class="p-5">
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-bold">{{ $student->grade_level }}</span>
                            </td>
                            <td class="p-5 text-gray-600">
                                <div class="text-xs">{{ $student->email }}</div>
                                <div class="text-xs mt-1">{{ $student->phone }}</div>
                            </td>
                            <td class="p-5 text-center">
                                <!-- VIEW BUTTON (Triggers Modal) -->
                                <div x-data="{ open: false }">
                                    <button @click="open = true" class="bg-[#00539C] text-white px-4 py-2 rounded shadow hover:bg-blue-800 text-xs font-bold transition">
                                        VIEW DETAILS
                                    </button>

                                    <!-- MODAL -->
                                    <div x-show="open" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                            
                                            <!-- Backdrop -->
                                            <div x-show="open" x-transition.opacity class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="open = false"></div>

                                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                            <!-- Modal Panel -->
                                            <div x-show="open" x-transition.scale class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                                                
                                                <!-- Modal Header -->
                                                <div class="bg-[#00539C] px-4 py-3 sm:px-6 flex justify-between items-center">
                                                    <h3 class="text-lg leading-6 font-bold text-white" id="modal-title">Application Details</h3>
                                                    <button @click="open = false" class="text-white hover:text-gray-200">✕</button>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 max-h-[70vh] overflow-y-auto">
                                                    
                                                    <!-- Student Info -->
                                                    <h4 class="text-[#00539C] font-bold border-b border-gray-200 pb-2 mb-4">Student Information</h4>
                                                    <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
                                                        <div><span class="text-gray-500 block">Full Name:</span> {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</div>
                                                        <div><span class="text-gray-500 block">Applicant Type:</span> {{ $student->applicant_type }}</div>
                                                        <div><span class="text-gray-500 block">Date of Birth:</span> {{ $student->birth_date }}</div>
                                                        <div><span class="text-gray-500 block">Religion:</span> {{ $student->religion }}</div>
                                                        <div><span class="text-gray-500 block">Previous School:</span> {{ $student->previous_school }}</div>
                                                    </div>

                                                    <!-- Parents Info -->
                                                    <h4 class="text-[#00539C] font-bold border-b border-gray-200 pb-2 mb-4">Family Background</h4>
                                                    <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
                                                        <div class="bg-blue-50 p-3 rounded">
                                                            <strong class="block text-blue-800 mb-1">Father</strong>
                                                            <p>{{ $student->father_details['name'] ?? 'N/A' }}</p>
                                                            <p class="text-xs text-gray-500">{{ $student->father_details['phone'] ?? '' }}</p>
                                                        </div>
                                                        <div class="bg-red-50 p-3 rounded">
                                                            <strong class="block text-red-800 mb-1">Mother</strong>
                                                            <p>{{ $student->mother_details['name'] ?? 'N/A' }}</p>
                                                            <p class="text-xs text-gray-500">{{ $student->mother_details['phone'] ?? '' }}</p>
                                                        </div>
                                                    </div>

                                                    <!-- Health -->
                                                    <h4 class="text-[#00539C] font-bold border-b border-gray-200 pb-2 mb-4">Health & Notes</h4>
                                                    <p class="text-sm text-gray-700 bg-gray-50 p-3 rounded">{{ $student->health_conditions ?? 'No conditions listed.' }}</p>

                                                </div>

                                                <!-- Modal Footer (Actions) -->
                                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                                                    
                                                    <!-- Approve Form -->
                                                    <form action="{{ route('admin.status', $student->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status" value="accepted">
                                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                                                            Approve Application
                                                        </button>
                                                    </form>

                                                    <!-- Reject Form -->
                                                    <form action="{{ route('admin.status', $student->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status" value="rejected">
                                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                                                            Reject
                                                        </button>
                                                    </form>

                                                    <!-- Delete Form -->
                                                    <form action="{{ route('admin.delete', $student->id) }}" method="POST" onsubmit="return confirm('Delete permanently?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                            Delete Record
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END MODAL -->
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-gray-400">No applications found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>