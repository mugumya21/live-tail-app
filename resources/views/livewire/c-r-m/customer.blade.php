<div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow-md dark:bg-zinc-900">
    <div class="flex flex-col md:flex-row gap-10">
        <!-- Left: Form -->
        <div class="md:w-1/2">
            <form wire:submit.prevent="addCustomer" class="flex flex-col gap-4">
                <!-- Name -->
                <flux:input
                    type="text"
                    :label="__('User name')"
                    wire:model="name"
                    placeholder="Enter your name"
                    required />

                <!-- Email -->
                <flux:input
                    wire:model="email"
                    :label="__('Email')"
                    type="email"
                    placeholder="Enter email"
                    required />

                <!-- Submit Button -->
                <flux:button type="submit" variant="danger" class="w-full">
                    {{ __('Add Customer') }}
                </flux:button>
            </form>
        </div>

        <!-- Right: Customer List -->
        <div class="md:w-1/2 space-y-4">
            <h2 class="text-lg font-semibold mb-2 text-white dark:text-zinc-100">Customer List</h2>

                    <input type="text"  wire:model.live="search" placeholder="search...">

            </search>
            @forelse ($customers as $customer)
                <div class="p-4 border border-zinc-200 dark:border-zinc-700 rounded-md">
                    <p><strong>Name:</strong> {{ $customer->name }}</p>
                    <p><strong>Created at:</strong> {{ $customer->created_at }}</p>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">No Customer found</p>
            @endforelse
            {{ $customers->links()}}
        </div>
    </div>
</div>
