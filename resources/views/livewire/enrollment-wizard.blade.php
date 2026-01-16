<div class="max-w-[1400px] mx-auto px-4 py-12">
    
    <div class="flex flex-col lg:flex-row gap-10">
        
        <!-- LEFT: SIDEBAR -->
        <div class="w-full lg:w-64 shrink-0">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                <div class="p-4 bg-brand-blue text-white font-bold text-sm tracking-wide uppercase">
                    Application Steps
                </div>
                <nav class="flex flex-col text-xs font-bold uppercase tracking-wide">
                    @php
                        $steps = [
                            1 => 'Application Type',
                            2 => 'Student Information',
                            3 => 'Home Address',
                            4 => 'Family Background',
                            5 => 'Father\'s Info',
                            6 => 'Mother\'s Info',
                            7 => 'Guardian',
                            8 => 'Siblings',
                            9 => 'Academic History',
                            10 => 'Student Health',
                            11 => 'Additional Info',
                            12 => 'Summary'
                        ];
                    @endphp

                    @foreach($steps as $key => $label)
                        <div class="px-5 py-3 border-b border-gray-50 flex items-center gap-3 transition-colors duration-300 {{ $currentStep == $key ? 'bg-blue-50 text-brand-blue border-l-4 border-l-brand-blue' : 'text-gray-400' }}">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center text-[10px] {{ $currentStep == $key ? 'bg-brand-blue text-white' : 'bg-gray-100 text-gray-400' }}">
                                {{ $key }}
                            </div>
                            {{ $label }}
                        </div>
                    @endforeach
                </nav>
            </div>
        </div>

        <!-- RIGHT: FORM -->
        <div class="flex-grow">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 md:p-12 min-h-[600px]">
                
                <!-- STEP 1-4 (Same as before, abbreviated for space, keep your previous code for 1-4 or use this) -->
                @if($currentStep == 1)
                    <div class="animate-fade-in-up space-y-8">
                        <h2 class="text-2xl font-royal font-bold text-gray-800">Application Type</h2>
                        <!-- ... (Keep your existing Step 1 code) ... -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach(['New', 'Returnee', 'Transferee'] as $type)
                            <label class="cursor-pointer group">
                                <input type="radio" wire:model="applicant_type" value="{{ $type }}" class="peer sr-only">
                                <div class="py-4 text-center border-2 border-gray-200 rounded-xl peer-checked:border-brand-blue peer-checked:bg-blue-50 peer-checked:text-brand-blue font-bold text-gray-500 group-hover:border-blue-200 transition">{{ $type }}</div>
                            </label>
                            @endforeach
                        </div>
                        @error('applicant_type') <span class="text-red-500 text-xs block">{{ $message }}</span> @enderror

                        <!-- Grade Level (UPDATED TO PCIS STANDARD) -->
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Grade Level Applying For <span class="text-red-500">*</span></label>
                            <select wire:model="grade_level" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none bg-white text-gray-700 font-medium">
                                <option value="">Select Grade Level</option>
                                
                                <optgroup label="Early Years Programme (EYP)">
                                    <option value="EYP 1 (Nursery)">EYP 1 (Nursery)</option>
                                    <option value="EYP 2 (Reception)">EYP 2 (Reception)</option>
                                    <option value="EYP 3 (Kinder)">EYP 3 (Kinder)</option>
                                </optgroup>

                                <optgroup label="Primary Years Programme (PYP)">
                                    <option value="PYP 1 (Grade 1)">PYP 1 (Grade 1)</option>
                                    <option value="PYP 2 (Grade 2)">PYP 2 (Grade 2)</option>
                                    <option value="PYP 3 (Grade 3)">PYP 3 (Grade 3)</option>
                                    <option value="PYP 4 (Grade 4)">PYP 4 (Grade 4)</option>
                                    <option value="PYP 5 (Grade 5)">PYP 5 (Grade 5)</option>
                                </optgroup>

                                <optgroup label="Middle Years Programme (MYP)">
                                    <option value="MYP 1 (Grade 6)">MYP 1 (Grade 6)</option>
                                    <option value="MYP 2 (Grade 7)">MYP 2 (Grade 7)</option>
                                    <option value="MYP 3 (Grade 8)">MYP 3 (Grade 8)</option>
                                    <option value="MYP 4 (Grade 9)">MYP 4 (Grade 9)</option>
                                    <option value="MYP 5 (Grade 10)">MYP 5 (Grade 10)</option>
                                </optgroup>

                                <optgroup label="Diploma Programme (DP)">
                                    <option value="DP 1 (Grade 11)">DP 1 (Grade 11)</option>
                                    <option value="DP 2 (Grade 12)">DP 2 (Grade 12)</option>
                                </optgroup>
                            </select>
                            @error('grade_level') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                @endif

                @if($currentStep == 2)
                    <!-- ... (Keep your existing Step 2 code) ... -->
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800">Student Info</h2>
                        <div class="grid grid-cols-3 gap-4">
                            <input type="text" wire:model="first_name" placeholder="First Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="middle_name" placeholder="Middle Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="last_name" placeholder="Last Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="date" wire:model="birth_date" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <select wire:model="gender" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white"><option value="">Gender</option><option>Male</option><option>Female</option></select>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" wire:model="citizenship" placeholder="Citizenship" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="religion" placeholder="Religion" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" wire:model="height" placeholder="Height (cm)" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="weight" placeholder="Weight (kg)" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        </div>
                    </div>
                @endif

                @if($currentStep == 3)
                    <!-- ... (Keep Step 3 Address) ... -->
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800">Home Address</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" wire:model="province" placeholder="Province" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="city" placeholder="City" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="barangay" placeholder="Barangay" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="street" placeholder="Street" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        </div>
                    </div>
                @endif

                @if($currentStep == 4)
                    <!-- ... (Keep Step 4 Family) ... -->
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800">Contact & Family</h2>
                        <input type="text" wire:model="mobile_number" placeholder="Mobile Number" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        <select wire:model="marital_status" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white">
                            <option value="">Parents' Marital Status</option>
                            <option>Married</option><option>Single</option><option>Separated</option>
                        </select>
                    </div>
                @endif

                <!-- STEP 5: FATHER'S INFO (DETAILED) -->
                @if($currentStep == 5)
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 border-b border-gray-100 pb-4">Father's Information</h2>
                        
                        <!-- Name -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <input type="text" wire:model="father_first" placeholder="First Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="father_middle" placeholder="Middle Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="father_last" placeholder="Last Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        </div>

                        <!-- Personal -->
                        <div class="grid grid-cols-2 gap-4">
                            <input type="date" wire:model="father_birthdate" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <select wire:model="father_type" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white">
                                <option value="">Type</option>
                                <option>Biological Father</option><option>Adoptive Father</option><option>Step Father</option>
                            </select>
                        </div>

                        <!-- Home -->
                        <div class="grid grid-cols-2 gap-4">
                            <select wire:model="father_home_ownership" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white">
                                <option value="">Home Ownership</option>
                                <option>Owned</option><option>Rented</option><option>Mortgaged</option><option>Living with Relatives</option>
                            </select>
                            <input type="text" wire:model="father_mobile" placeholder="Mobile Number" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        </div>

                        <!-- Background -->
                        <h3 class="text-lg font-bold text-gray-700 mt-4">Background</h3>
                        <div class="grid grid-cols-1 gap-4">
                            <select wire:model="father_education" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white">
                                <option value="">Highest Educational Attainment</option>
                                <option>Doctorate</option><option>Post Graduate</option><option>College Graduate</option><option>High School</option>
                            </select>
                            <input type="text" wire:model="father_occupation" placeholder="Occupation / Specialization" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="father_company" placeholder="Company Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="father_company_address" placeholder="Company Address" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="father_company_tel" placeholder="Company Telephone" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        </div>

                        <!-- Alumni -->
                        <div class="space-y-2">
                            <label class="flex items-center gap-2"><input type="checkbox" wire:model="father_is_employee" value="yes"> De La Salle School Employee?</label>
                            <label class="flex items-center gap-2"><input type="checkbox" wire:model="father_is_alumnus" value="yes"> DLSZ Alumnus?</label>
                            <label class="flex items-center gap-2"><input type="checkbox" wire:model="father_is_lasalle_alumnus" value="yes"> Alumnus of other La Salle School?</label>
                        </div>
                    </div>
                @endif

                <!-- STEP 6: MOTHER'S INFO (Detailed) -->
                @if($currentStep == 6)
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800 border-b border-gray-100 pb-4">Mother's Information</h2>
                        
                        <!-- Name -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <input type="text" wire:model="mother_first" placeholder="First Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="mother_middle" placeholder="Middle Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="mother_last" placeholder="Maiden Last Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        </div>

                        <!-- Background -->
                        <div class="grid grid-cols-1 gap-4">
                            <select wire:model="mother_education" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white">
                                <option value="">Highest Educational Attainment</option>
                                <option>Doctorate</option><option>Post Graduate</option><option>College Graduate</option><option>High School</option>
                            </select>
                            <input type="text" wire:model="mother_occupation" placeholder="Occupation" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="mother_company" placeholder="Company Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                            <input type="text" wire:model="mother_company_address" placeholder="Company Address" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        </div>
                    </div>
                @endif

                <!-- STEP 7: GUARDIAN -->
                @if($currentStep == 7)
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800">Guardian's Information</h2>
                        <input type="text" wire:model="guardian_name" placeholder="Full Name" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        <input type="text" wire:model="guardian_relation" placeholder="Relationship" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        <input type="text" wire:model="guardian_mobile" placeholder="Mobile" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        <textarea wire:model="guardian_address" placeholder="Address" class="w-full px-4 py-3 rounded-lg border border-gray-300"></textarea>
                    </div>
                @endif

                <!-- STEP 8: SIBLINGS -->
                @if($currentStep == 8)
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800">Siblings Information</h2>
                        @foreach($siblings as $index => $sibling)
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 mb-4 relative">
                                <button wire:click="removeSibling({{ $index }})" class="absolute top-2 right-2 text-red-500 text-xs font-bold hover:underline">Remove</button>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                                    <input type="text" wire:model="siblings.{{ $index }}.name" placeholder="Sibling Name" class="w-full px-3 py-2 rounded border border-gray-300">
                                    <input type="text" wire:model="siblings.{{ $index }}.school" placeholder="School" class="w-full px-3 py-2 rounded border border-gray-300">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <input type="text" wire:model="siblings.{{ $index }}.grade" placeholder="Year / Grade" class="w-full px-3 py-2 rounded border border-gray-300">
                                    <select wire:model="siblings.{{ $index }}.status" class="w-full px-3 py-2 rounded border border-gray-300 bg-white">
                                        <option>Currently Enrolled</option>
                                        <option>Graduate</option>
                                    </select>
                                </div>
                            </div>
                        @endforeach
                        <button wire:click="addSibling" class="bg-teal-500 text-white px-4 py-2 rounded-lg text-sm font-bold">+ Add Sibling</button>
                    </div>
                @endif

                <!-- STEP 9: ACADEMIC HISTORY (NEW) -->
                @if($currentStep == 9)
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800">Academic History</h2>
                        <p class="text-sm text-gray-500">Please list previous schools attended.</p>

                        @foreach($schools as $index => $school)
                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 mb-4 relative">
                                <button wire:click="removeSchool({{ $index }})" class="absolute top-2 right-2 text-red-500 text-xs font-bold hover:underline">Remove</button>
                                <div class="grid grid-cols-1 gap-4 mb-2">
                                    <input type="text" wire:model="schools.{{ $index }}.name" placeholder="School Name" class="w-full px-3 py-2 rounded border border-gray-300">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <input type="text" wire:model="schools.{{ $index }}.year" placeholder="School Year (e.g. 2024-2025)" class="w-full px-3 py-2 rounded border border-gray-300">
                                    <input type="text" wire:model="schools.{{ $index }}.level" placeholder="Grade Level" class="w-full px-3 py-2 rounded border border-gray-300">
                                </div>
                                <input type="text" wire:model="schools.{{ $index }}.awards" placeholder="Awards / Honors Received" class="w-full px-3 py-2 rounded border border-gray-300 mt-2">
                            </div>
                        @endforeach
                        <button wire:click="addSchool" class="bg-teal-500 text-white px-4 py-2 rounded-lg text-sm font-bold">+ Add School</button>
                    </div>
                @endif

                <!-- STEP 10: HEALTH -->
                @if($currentStep == 10)
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800">Student's Health</h2>
                        <input type="text" wire:model="health_allergies" placeholder="Any allergies?" class="w-full px-4 py-3 rounded-lg border border-gray-300">
                        <textarea wire:model="health_conditions" placeholder="Medical conditions?" class="w-full px-4 py-3 rounded-lg border border-gray-300"></textarea>
                    </div>
                @endif

                <!-- STEP 11: ADDITIONAL -->
                @if($currentStep == 11)
                    <div class="animate-fade-in-up space-y-6">
                        <h2 class="text-2xl font-royal font-bold text-gray-800">Additional Info</h2>
                        <textarea wire:model="disciplinary_history" placeholder="Disciplinary cases?" class="w-full px-4 py-3 rounded-lg border border-gray-300"></textarea>
                        <textarea wire:model="learning_difficulty" placeholder="Learning difficulties?" class="w-full px-4 py-3 rounded-lg border border-gray-300"></textarea>
                    </div>
                @endif

                <!-- STEP 12: SUMMARY & PRIVACY -->
                @if($currentStep == 12)
                    <div class="animate-fade-in-up text-center">
                        <h2 class="text-2xl font-bold text-gray-800">Ready to Submit?</h2>
                        
                        <div class="bg-blue-50 border border-blue-100 p-6 rounded-xl text-left my-6 text-sm text-blue-900">
                            <h4 class="font-bold mb-2">Data Privacy Statement</h4>
                            <p>In accordance with the Privacy Statement and the policies and procedures contained therein, I hereby agree to provide De La Salle Santiago Zobel School my personal/family information as defined by the Data Privacy Act of 2012.</p>
                            <p class="mt-2">By clicking the <strong>Submit Application</strong> button, I acknowledge that I have fully read and understood the contents of the DLSZ Data Privacy Statement.</p>
                        </div>

                        <div class="mb-6 text-left max-w-md mx-auto">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Confirm Primary Email Address <span class="text-red-500">*</span></label>
                            <input type="email" wire:model="primary_email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-blue outline-none">
                            @error('primary_email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <button wire:click="submit" class="bg-brand-blue text-white px-12 py-4 rounded-xl font-bold shadow-xl hover:bg-blue-800 transition transform hover:-translate-y-1">
                            SUBMIT APPLICATION
                        </button>
                    </div>
                @endif

                <!-- NAV BUTTONS -->
                <div class="mt-10 pt-6 border-t border-gray-100 flex justify-between items-center">
                    @if($currentStep > 1)
                        <button wire:click="previousStep" class="text-gray-500 font-bold hover:text-brand-blue transition">← Back</button>
                    @else <div></div> @endif

                    @if($currentStep < 12)
                        <button wire:click="nextStep" class="bg-brand-blue text-white px-8 py-3 rounded-lg font-bold shadow-md hover:bg-blue-800 transition">Next Step →</button>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>