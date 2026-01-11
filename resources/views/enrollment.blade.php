@extends('layouts.app')

@section('title', 'Online Admission - M7 PCIS')

@section('content')
<script src="//unpkg.com/alpinejs" defer></script>

<div class="min-h-screen bg-[#F9F9F9] py-12 px-4 font-sans" 
     x-data="enrollmentForm()">
    
    <div class="max-w-[1400px] mx-auto flex flex-col lg:flex-row gap-8">
        
        <!-- 1. SIDEBAR NAVIGATION -->
        <div class="lg:w-1/5 hidden lg:block">
            <div class="bg-white rounded-lg shadow-sm p-6 sticky top-24">
                <ul class="space-y-1">
                    <template x-for="(label, index) in steps">
                        <li>
                            <button type="button" @click="jump(index + 1)" 
                                class="w-full text-left py-3 px-4 rounded-md text-sm font-bold transition-all duration-200"
                                :class="step === index + 1 ? 'bg-gray-100 text-brand-blue border-l-4 border-brand-blue' : 'text-gray-500 hover:bg-gray-50'">
                                <span x-text="index + 1"></span>. <span x-text="label"></span>
                            </button>
                        </li>
                    </template>
                </ul>
            </div>
        </div>

        <!-- 2. MAIN FORM AREA -->
        <div class="lg:w-4/5">
            <form action="{{ route('apply.submit') }}" method="POST" class="bg-white rounded-xl shadow-sm p-8 md:p-12 relative min-h-[600px]">
                @csrf
                
                <!-- Hidden Inputs for JSON Data -->
                <input type="hidden" name="siblings_data" :value="JSON.stringify(siblings)">
                <input type="hidden" name="academic_history" :value="JSON.stringify(schools)">

                <!-- STEP 1: APPLICATION TYPE -->
                <div x-show="step === 1">
                    <h2 class="text-3xl font-header font-bold text-gray-800 mb-8">Application Type</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <template x-for="type in ['New Student', 'Returnee', 'Transferee']">
                            <label class="cursor-pointer group">
                                <input type="radio" name="applicant_type" :value="type" class="peer sr-only">
                                <div class="p-8 rounded-xl border-2 border-gray-100 peer-checked:border-brand-blue peer-checked:bg-blue-50 hover:border-blue-200 transition text-center h-full flex flex-col items-center justify-center">
                                    <span class="font-bold text-gray-700 peer-checked:text-brand-blue" x-text="type"></span>
                                </div>
                            </label>
                        </template>
                    </div>
                </div>

                <!-- STEP 2: STUDENT INFORMATION -->
                <div x-show="step === 2" x-cloak>
                    <h2 class="text-3xl font-header font-bold text-gray-800 mb-8">Student's Personal Information</h2>
                    <div class="space-y-5">
                        
                        <!-- LRN -->
                        <div>
                            <label class="block text-sm font-bold text-gray-600 mb-1">Learner Reference Number (LRN)</label>
                            <div class="relative">
                                <input type="text" name="lrn" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue focus:ring-1 focus:ring-brand-blue outline-none transition">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-red-300">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                            </div>
                        </div>

                        <!-- Name Fields -->
                        <div>
                            <label class="block text-sm font-bold text-gray-600 mb-1">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" required class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-600 mb-1">Middle Name</label>
                            <input type="text" name="middle_name" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-600 mb-1">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" required class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-bold text-gray-600 mb-1">Gender</label>
                                <select name="gender" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none bg-white">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-600 mb-1">Birth Date <span class="text-red-500">*</span></label>
                                <input type="date" name="birth_date" required class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                            </div>
                        </div>

                        <!-- Grade Level -->
                        <div>
                            <label class="block text-sm font-bold text-gray-600 mb-1">Grade Level Applying For <span class="text-red-500">*</span></label>
                            <select name="grade_level" required class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none bg-white">
                                <option value="Nursery">Nursery (EYP 1)</option>
                                <option value="Kinder">Kindergarten (EYP 3)</option>
                                <option value="Grade 1">Grade 1</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 11">Grade 11 (IB DP)</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-bold text-gray-600 mb-1">Height (cm)</label>
                                <input type="number" name="height" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-600 mb-1">Weight (kg)</label>
                                <input type="number" name="weight" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: HOME ADDRESS & CONTACT -->
                <div x-show="step === 3" x-cloak>
                    <h2 class="text-3xl font-header font-bold text-gray-800 mb-6">Home Address</h2>
                    <div class="space-y-5">
                        <input type="text" name="country" value="Philippines" readonly class="w-full p-3 rounded border border-red-300 bg-gray-50 text-gray-500">
                        <input type="text" name="province" placeholder="State / Province" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                        <input type="text" name="city" placeholder="City / Municipality" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                        <input type="text" name="barangay" placeholder="Barangay" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                        <input type="text" name="house_no" placeholder="House No. & Street Name" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                    </div>

                    <h2 class="text-3xl font-header font-bold text-gray-800 mt-10 mb-6">Contact Detail</h2>
                    <div class="space-y-5">
                        <input type="text" name="phone" placeholder="Mobile Phone Number *" required class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none">
                    </div>
                </div>

                <!-- STEP 4: FATHER'S INFO -->
                <div x-show="step === 4" x-cloak>
                    <h2 class="text-3xl font-header font-bold text-gray-800 mb-6">Father's Information</h2>
                    <div class="space-y-5">
                        <input type="text" name="father_data[first_name]" placeholder="First Name" class="w-full p-3 rounded border border-red-300 outline-none">
                        <input type="text" name="father_data[last_name]" placeholder="Last Name" class="w-full p-3 rounded border border-red-300 outline-none">
                        <input type="text" name="father_data[mobile]" placeholder="Mobile Number" class="w-full p-3 rounded border border-red-300 outline-none">
                        <input type="email" name="father_data[email]" placeholder="Email Address" class="w-full p-3 rounded border border-red-300 outline-none">
                        
                        <div class="border-t border-gray-200 pt-6 mt-6">
                            <h3 class="text-xl font-bold text-gray-700 mb-4">Background</h3>
                            <input type="text" name="father_data[occupation]" placeholder="Occupation" class="w-full p-3 rounded border border-red-300 outline-none mb-4">
                            <input type="text" name="father_data[company]" placeholder="Company Name" class="w-full p-3 rounded border border-red-300 outline-none">
                        </div>
                    </div>
                </div>

                <!-- STEP 5: MOTHER'S INFO -->
                <div x-show="step === 5" x-cloak>
                    <h2 class="text-3xl font-header font-bold text-gray-800 mb-6">Mother's Information</h2>
                    <div class="space-y-5">
                        <input type="text" name="mother_data[first_name]" placeholder="First Name" class="w-full p-3 rounded border border-red-300 outline-none">
                        <input type="text" name="mother_data[last_name]" placeholder="Last Name (Maiden)" class="w-full p-3 rounded border border-red-300 outline-none">
                        <input type="text" name="mother_data[mobile]" placeholder="Mobile Number" class="w-full p-3 rounded border border-red-300 outline-none">
                        <input type="email" name="mother_data[email]" placeholder="Email Address" class="w-full p-3 rounded border border-red-300 outline-none">
                    </div>
                </div>

                <!-- STEP 6: GUARDIAN -->
                <div x-show="step === 6" x-cloak>
                    <h2 class="text-3xl font-header font-bold text-gray-800 mb-6">Guardian's Information</h2>
                    <div class="space-y-5">
                        <input type="text" name="guardian_data[name]" placeholder="Full Name" class="w-full p-3 rounded border border-red-300 outline-none">
                        <input type="text" name="guardian_data[relation]" placeholder="Relationship to Applicant" class="w-full p-3 rounded border border-red-300 outline-none">
                        <input type="text" name="guardian_data[mobile]" placeholder="Mobile Number" class="w-full p-3 rounded border border-red-300 outline-none">
                    </div>
                </div>

                <!-- STEP 7: SIBLINGS -->
                <div x-show="step === 7" x-cloak>
                    <h2 class="text-3xl font-header font-bold text-gray-800 mb-2">Siblings Information</h2>
                    <p class="text-gray-500 mb-6">If the applicant has siblings currently enrolled or graduated from PCIS.</p>
                    
                    <template x-for="(sibling, index) in siblings" :key="index">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-3 flex justify-between items-center">
                            <div>
                                <p class="font-bold text-brand-blue" x-text="sibling.name"></p>
                                <p class="text-xs text-gray-500" x-text="sibling.status"></p>
                            </div>
                            <button type="button" @click="siblings.splice(index, 1)" class="text-red-500 text-sm hover:underline">Remove</button>
                        </div>
                    </template>

                    <button type="button" @click="showSiblingModal = true" class="bg-brand-teal text-white px-6 py-3 rounded shadow hover:bg-teal-700 transition">
                        + Add Sibling Information
                    </button>
                </div>

                <!-- STEP 8: HEALTH -->
                <div x-show="step === 8" x-cloak>
                    <h2 class="text-3xl font-header font-bold text-gray-800 mb-6">Student's Health</h2>
                    <div class="space-y-5">
                        <label class="block text-sm font-bold text-gray-600 mb-1">Any allergies or peculiar disease?</label>
                        <textarea name="health_conditions" rows="3" class="w-full p-3 rounded border border-red-300 focus:border-brand-blue outline-none"></textarea>
                    </div>
                </div>

                <!-- STEP 9: ADDITIONAL INFO -->
                <div x-show="step === 9" x-cloak>
                    <h2 class="text-3xl font-header font-bold text-gray-800 mb-6">Additional Information</h2>
                    <div class="space-y-5">
                        <label class="block text-sm font-bold text-gray-600 mb-1">Previous School</label>
                        <input type="text" name="previous_school" class="w-full p-3 rounded border border-red-300 outline-none">
                    </div>
                </div>

                <!-- STEP 10: PRIMARY EMAIL -->
                <div x-show="step === 10" x-cloak>
                    <div class="bg-green-50 border border-brand-green p-6 rounded-lg mb-8">
                        <h3 class="font-bold text-brand-green mb-2">Primary Email Address</h3>
                        <input type="email" name="email" required placeholder="parent@example.com" class="w-full p-3 rounded border border-brand-green focus:ring-1 focus:ring-brand-green outline-none">
                    </div>
                </div>

                <!-- STEP 11: SUMMARY -->
                <div x-show="step === 11" x-cloak>
                    <div class="text-center py-10">
                        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h2 class="text-3xl font-header font-bold text-brand-dark mb-4">Ready to Submit?</h2>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">
                            Please ensure all information is correct. By clicking submit, you agree to the PCIS Data Privacy Policy.
                        </p>
                        
                        <button type="submit" class="bg-brand-blue text-white px-12 py-4 rounded shadow-lg hover:bg-blue-800 transition font-bold text-lg w-full md:w-auto">
                            SUBMIT APPLICATION
                        </button>
                    </div>
                </div>

                <!-- NAVIGATION BUTTONS -->
                <div class="flex justify-between mt-12 pt-6 border-t border-gray-100" x-show="step < 11">
                    <button type="button" @click="back()" x-show="step > 1" class="bg-gray-200 text-gray-700 px-6 py-3 rounded hover:bg-gray-300 font-bold">
                        BACK
                    </button>
                    <div x-show="step === 1"></div>
                    <button type="button" @click="next()" class="bg-brand-green text-white px-8 py-3 rounded shadow hover:bg-green-700 transition font-bold">
                        NEXT
                    </button>
                </div>

                <!-- SIBLING MODAL (Alpine) -->
                <div x-show="showSiblingModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50" x-cloak>
                    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md">
                        <h3 class="font-bold text-xl mb-4">Sibling Information</h3>
                        <input type="text" x-model="newSibling.name" placeholder="Name" class="w-full p-3 border rounded mb-3">
                        <select x-model="newSibling.status" class="w-full p-3 border rounded mb-4">
                            <option>Currently Enrolled</option>
                            <option>Graduate</option>
                        </select>
                        <div class="flex justify-end gap-3">
                            <button type="button" @click="showSiblingModal = false" class="text-gray-500">Cancel</button>
                            <button type="button" @click="addSibling()" class="bg-brand-green text-white px-4 py-2 rounded">Add</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function enrollmentForm() {
        return {
            step: 1,
            maxStep: 11,
            showSiblingModal: false,
            siblings: [],
            newSibling: { name: '', status: 'Currently Enrolled' },
            steps: [
                'Application Type', 'Student Information', 'Home Address', 
                'Father\'s Info', 'Mother\'s Info', 'Guardian', 
                'Siblings', 'Student Health', 'Additional Info', 
                'Primary Email', 'Summary'
            ],
            next() { if(this.step < this.maxStep) this.step++ },
            back() { if(this.step > 1) this.step-- },
            jump(s) { this.step = s },
            addSibling() {
                if(this.newSibling.name) {
                    this.siblings.push({...this.newSibling});
                    this.newSibling.name = '';
                    this.showSiblingModal = false;
                }
            }
        }
    }
</script>
@endsection