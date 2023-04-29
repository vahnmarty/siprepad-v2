<div>
    <h2 class="text-3xl font-bold text-center">Welcome to our Wildcat Family!</h2>

    <p class="mt-3 text-center">For questions about a specific topic, please feel free to email the individuals
        below.</p>

    <div class="grid grid-cols-3 gap-6 mt-8">

        @foreach($departments as $dept)
        <div class="p-4 bg-white border border-gray-300 rounded-md">
            <h4 class="mb-2 font-bold">{{ $dept['name'] }}</h4>
            <div class="flex items-center gap-2">
                <x-heroicon-s-user-circle class="flex-shrink-0 w-5 h-5" />
                <span>{{ $dept['authorized_person'] }}</span>
            </div>
            <div class="flex items-center gap-2">
                <x-heroicon-s-mail class="flex-shrink-0 w-5 h-5" />
                <a href="mailto:{{ $dept['email'] }}" class="link">
                    {{ $dept['email'] }}
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
