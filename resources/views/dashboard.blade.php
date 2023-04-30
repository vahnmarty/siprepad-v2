<x-app-layout>

    <div class="[min-height:calc(100vh - 64px)] min-h-screen bg-gray-900 bg-hero-app bg-cover">
        <header class="px-6 py-5 text-white bg-gray-900/50">
            <h2 class="text-xl font-bold">Hello, {{ Auth::user()->name }}!</h2>
            <blockquote class="mt-2 font-serif italic">
                For God so loved the world that he gave his one and only Son, that whoever believes in him shall not
                perish but have eternal life.
            </blockquote>
            <span class="font-bold">- John 3:16</span>
        </header>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto mt-8 lg:mt-16">

                <ul role="list" class="grid grid-cols-2 gap-6">

                    <li>
                        <div
                            class="relative flex items-start px-6 py-4 space-x-3 text-white border border-gray-700 rounded-md group bg-gray-900/80 hover:bg-gray-900">
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-sky-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062A1.125 1.125 0 013 16.81V8.688zM12.75 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062a1.125 1.125 0 01-1.683-.977V8.688z" />
                                    </svg>


                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-lg font-medium">
                                    <a href="{{ url('registration') }}">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Next Steps <span
                                            class="ml-2 rounded-full bg-sky-500 px-1.5 py-0.5 text-xs text-white">New</span>
                                    </a>
                                </div>
                                <p class="text-sm text-gray-300">
                                    View submitted form.
                                </p>
                            </div>
                            <div class="self-center flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div
                            class="relative flex items-start px-6 py-4 space-x-3 text-white border border-gray-700 rounded-md group bg-gray-900/80 hover:bg-gray-900">
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center justify-center w-12 h-12 bg-pink-500 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    </svg>


                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-lg font-medium">
                                    <a href="{{ url('registration') }}">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Online Registration
                                    </a>
                                </div>
                                <p class="text-sm text-gray-300">
                                    Register now
                                </p>
                            </div>
                            <div class="self-center flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div
                            class="relative flex items-start px-6 py-4 space-x-3 text-white border border-gray-700 rounded-md group bg-gray-900/80 hover:bg-gray-900">
                            <div class="flex-shrink-0">
                                <span
                                    class="inline-flex items-center justify-center w-12 h-12 bg-purple-500 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                    </svg>

                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-lg font-medium">
                                    <a href="{{ url('registration') }}">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Book a Wildcat Experience
                                    </a>
                                </div>
                                <p class="text-sm text-gray-300">
                                    (for 8th grade students)
                                </p>
                            </div>
                            <div class="self-center flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div
                            class="relative flex items-start px-6 py-4 space-x-3 text-white border border-gray-700 rounded-md group bg-gray-900/80 hover:bg-gray-900">
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center justify-center w-12 h-12 bg-blue-500 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>

                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-lg font-medium">
                                    <a href="{{ url('registration') }}">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        View Application
                                    </a>
                                </div>
                                <p class="text-sm text-gray-300">
                                    You have no existing application
                                </p>
                            </div>
                            <div class="self-center flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div
                            class="relative flex items-start px-6 py-4 space-x-3 text-white border border-gray-700 rounded-md group bg-gray-900/80 hover:bg-gray-900">
                            <div class="flex-shrink-0">
                                <span
                                    class="inline-flex items-center justify-center w-12 h-12 bg-yellow-500 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                                        <path stroke-linecap="round"
                                            d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>

                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-lg font-medium">
                                    <a href="{{ url('registration') }}">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Admissions Video
                                    </a>
                                </div>
                                <p class="text-sm text-gray-300">
                                    Required for all 8th Grade Applicants
                                </p>
                            </div>
                            <div class="self-center flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div
                            class="relative flex items-start px-6 py-4 space-x-3 text-white border border-gray-700 rounded-md group bg-gray-900/80 hover:bg-gray-900">
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center justify-center w-12 h-12 bg-red-500 rounded-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-lg font-medium">
                                    <a href="{{ url('registration') }}">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Supplemental Recommendation
                                    </a>
                                </div>
                                <p class="text-sm text-gray-300">
                                    ---
                                </p>
                            </div>
                            <div class="self-center flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
