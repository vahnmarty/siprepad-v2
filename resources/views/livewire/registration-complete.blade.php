<div class="min-h-screen bg-hero-pattern">
    <div class="py-6 mx-auto">

        <div
            class="relative max-w-5xl p-8 mx-auto mt-16 border border-gray-200 rounded-lg shadow-lg bg-gray-50 lg:px-16">
            <div class="-mt-24">
                <img src="{{ asset('img/ribbon.png') }}" class="w-auto h-32 mx-auto" alt="">
            </div>
            <div class="max-w-5xl mx-auto mt-8">
                <header>
                    <h1 class="text-4xl font-bold text-center uppercase">Congratulations!</h1>

                    <h6 class="mt-4 text-xl font-bold text-center text-blue-800">Thank you for completing the
                        registration
                        for the AY {{ $school_year }}.</h6>
                    <p class="mt-3 text-center">We are excited to welcome your family to St. Ignatius.</p>
                </header>

                <div class="mt-8 mb-8 border-t border-gray-200"></div>
                <div class="space-y-8">
                    <div>
                        <h4 class="font-bold">A message for students:</h4>
                        <p class="mt-3">
                            Login today to your new <strong class="font-bold">SI Google Account</strong> and
                            access your email
                            using the credentials below. Make sure to use <strong class="underlune">@siprep.org</strong>
                            and
                            not
                            @gmail.com
                        </p>
                    </div>



                    <div>
                        <div class="m-auto grid justify-center lg:grid-cols-[repeat(auto-fit,_33.333336%)]">
                            @foreach ($students as $student)
                                <div class="p-4 border-2 border-red-300 rounded-md bg-red-50">
                                    <h3 class="mb-4 text-xl font-bold text-red-800">Student 1 -
                                        {{ $student->getFullName() }}
                                    </h3>
                                    <p>Email: <strong class="text-red-700">email@siprepr.ogasd</strong></p>
                                    <p>Password: <strong class="text-red-700">some-random-password</strong></p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <p>You will receive important information via your SI Email Account throughout the summer,
                            including
                            messages about upcoming activities and your first assignment in June. SI students are
                            expected
                            to check their email inbox daily.</p>
                    </div>

                    <div>
                        <div class="p-4 border-l-4 border-blue-400 bg-blue-50">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">
                                        If you would like to change your password , you must change it via the SI
                                        Website by
                                        going to
                                        <a href="https://www.siprep.org/pw" target="_blank"
                                            class="font-medium text-blue-700 underline hover:text-blue-600">https://www.siprep.org/pw</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 mt-4 border-l-4 border-blue-400 bg-blue-50">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">
                                        If you have difficulties with your email account , please contact
                                        <a href="mailto:SI_librarians@siprep.org" target="_blank"
                                            class="font-medium text-blue-700 underline hover:text-blue-600">SI_librarians@siprep.org</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center text-2xl font-bold text-blue-800">******</div>

                    <div>
                        <p>If you are interested in exclusive rising 9th grade programs this summer before the school
                            year
                            begings, please click on these 2 SI Summer Programs links: </p>

                        <div class="grid gap-6 mt-4 lg:grid-cols-2">
                            <div class="p-4 bg-white border border-gray-300 rounded-md">
                                <h4 class="font-bold">Cat Camp</h4>
                                <div class="flex gap-3 mt-3">
                                    <x-heroicon-o-calendar class="flex-shrink w-5 h-5" />
                                    <p class="text-sm">Tuesday, March 21, 2023 at 10:am PT</p>
                                </div>
                                <div class="flex gap-3 mt-2">
                                    <x-heroicon-s-link class="flex-shrink w-5 h-5" />
                                    <a href="https://www.siprograms.com/camps/cat-camp" target="_blank"
                                        class="text-sm text-blue-500 hover:text-blue-600">
                                        https://www.siprograms.com/camps/cat-camp
                                    </a>
                                </div>
                            </div>
                            <div class="p-4 bg-white border border-gray-300 rounded-md">
                                <h4 class="font-bold">Rising 9th Grader Summer Classes</h4>
                                <div class="flex gap-3 mt-3">
                                    <x-heroicon-o-calendar class="flex-shrink w-5 h-5" />
                                    <p class="text-sm">Tuesday, March 21, 2023 at 10:am PT</p>
                                </div>
                                <div class="flex gap-3 mt-2">
                                    <x-heroicon-s-link class="flex-shrink w-5 h-5" />
                                    <a href="https://www.siprograms.com/academics/9th-grade" target="_blank"
                                        class="text-sm text-blue-500 hover:text-blue-600">
                                        https://www.siprograms.com/academics/9th-grade
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <h2 class="mt-16 text-3xl font-extrabold text-center uppercase">Next Steps</h2>
        <div class="max-w-5xl p-8 mx-auto mt-8 border border-gray-200 rounded-lg shadow-lg bg-gray-50 lg:px-16">
            <div class="space-y-8">
                <div>
                    <p class="text-xl font-bold">1. Upload SFUSD Freshman Health Form:
                        <strong class="text-red-700">Due by July 1, 2023</strong>
                    </p>
                    <p class="flex items-center mt-3">
                        <span>Download</span>
                        <a href="https://www.siprepadmissions.org/public/files/SIFROSHHealthForm202324.pdf"
                            target="_blank" class="inline-flex items-center underline link">
                            <x-heroicon-o-download class="w-5 h-5" />
                            SFUSD Freshman Health Form
                        </a>
                        <span class="italic">
                            (Note that this form requires a doctor's signature.)
                        </span>
                    </p>

                    <div class="p-4 mt-4 border-l-4 border-yellow-400 bg-yellow-50">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <x-heroicon-s-information-circle class="w-5 h-5 text-yellow-600" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    Upload your SFUSD Freshman Health Form here. Please use the following naming
                                    convention
                                    for the file:
                                </p>
                                <p class="mt-2"><strong
                                        class="text-red-800">{Student_First_Name}_{Student_Last_Name}_{Name_of_File}.pdf</strong>
                                    <span class="text-sm italic">(The file doesn't have to be a PDF).</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 mt-4 border-l-4 border-blue-400 bg-blue-50">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <x-heroicon-s-information-circle class="w-5 h-5 text-blue-600" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700">
                                    <strong> NOTE: </strong> Do NOT upload the Ticket to Play Medical Clearance Form
                                    here.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-5xl p-8 mx-auto mt-8 border border-gray-200 rounded-lg shadow-lg bg-gray-50 lg:px-16">
            <div class="space-y-8">
                <div class="space-y-4">
                    <p class="text-xl font-bold">2. SI Athletics Ticket to Play Medical Clearance Form:
                        <strong class="text-red-700">Due between June 1, 2023 – August 1, 2023</strong>
                    </p>

                    <p>
                        To participate in SI Athletics, including tryouts, you must register to play through SI’s
                        FamilyID
                        system (not live until June 1, 2023). As a part of this process, you will be required to upload
                        SI’s
                        Ticket to Play Medical Clearance Form. The ticket to play requires a physical exam with a
                        doctor. We
                        strongly encourage you to schedule this exam between June 1, 2023 and August 1, 2023 to maintain
                        athletic eligibility for the entire school year. The FamilyID website will open for registration
                        on
                        June 1. Please do not register until you are ready to upload your ticket to play.
                    </p>

                    <p>
                        Download SI's Ticket to Play Medical Clearance Form
                        <a href="https://resources.finalsite.net/images/v1674767044/siprep/t6goeoxvhp5mj2nzsgcu/MedicalClearanceFormTemplate.pdf"
                            target="_blank" class="underline link">here.</a>
                    </p>

                </div>
            </div>
        </div>

        <div class="max-w-5xl p-8 mx-auto mt-8 border border-gray-200 rounded-lg shadow-lg bg-gray-50 lg:px-16">
            <div class="space-y-8">
                <div class="space-y-4">
                    <p class="text-xl font-bold">3. Visit the Wildcat Welcome Portal Now!</p>

                    <p>
                        We will be in touch throughout the summer. Look for our Wildcats Welcome Newsletter every other
                        Thursday in your inbox. Stay informed all summer by visiting our <a
                            href="http://www.siprep.org/welcome" target="_link" class="underline link">Wildcat
                            Welcome
                            Portal</a>. We will be updating this site throughout the summer. Answers to any questions
                        that
                        may arise over the summer can usually be found on the Welcome Portal.
                    </p>


                </div>
            </div>
        </div>


    </div>

    <div class="py-16 mt-16 bg-white border-t-2 border-red-300">
        <div class="max-w-5xl mx-auto">
            @livewire('settings.the-working-group')
        </div>
    </div>



</div>
