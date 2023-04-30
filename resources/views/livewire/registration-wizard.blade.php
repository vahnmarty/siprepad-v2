<div class="min-h-screen px-8 py-6 mx-auto bg-hero-pattern">

    <h1 class="mt-3 text-4xl font-extrabold text-center text-dark-red">Online Registration</h1>

    <div class="p-8 mt-8 bg-white border border-gray-200 rounded-md shadow-lg">
        <div class="max-w-5xl mx-auto mt-8">
            
            <form action="" wire:submit.prevent="submit">
                {{ $this->form }}
            </form>
        </div>
    </div>
</div>
