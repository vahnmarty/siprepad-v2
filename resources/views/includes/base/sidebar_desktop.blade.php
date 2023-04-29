<!-- Static sidebar for desktop -->
<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col px-6 pb-4 overflow-y-auto grow gap-y-5 bg-brand-red">
        <div class="flex items-center h-16 shrink-0">
            <img class="w-auto h-8" src="{{ asset('img/logo-white.png') }}" alt="Your Company">
        </div>
        <nav class="flex flex-col flex-1">
            <ul role="list" class="flex flex-col flex-1 gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        <li>
                            <!-- Current: "bg-brand-red text-white", Default: "text-white hover:text-white hover:bg-brand-red" -->
                            <a href="{{ url('dashboard') }}"
                                class="flex p-2 text-sm font-semibold leading-6 text-white rounded-md group gap-x-3 bg-white/20">
                                <svg class="w-6 h-6 text-white shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                Home
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>