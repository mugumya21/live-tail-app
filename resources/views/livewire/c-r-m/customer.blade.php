<div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow-md dark:bg-zinc-900">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Left: Form -->
        <div class="">
            <form wire:submit.prevent="addCustomer" class="flex flex-col gap-4">
                <!-- Name -->
                <flux:input
                    type="text"
                    :label="__('Name')"
                    wire:model="name"
                    placeholder="Enter the name of the customer"
                    required />

                <!-- phone -->
                <flux:input
                    wire:model="phone"
                    :label="__('phone')"
                    type="text"
                    placeholder="Enter phone number"
                    required />


                <!-- Email -->
                <flux:input
                    type="text"
                    :label="__('Email')"
                    wire:model="email"
                    placeholder='Enter the email'
                    required />


                <!-- Submit Button -->
                <flux:button type="submit" variant="primary" class="w-full">
                    {{ __('Add Customer') }}
                </flux:button>
            </form>
        </div>

        <!-- Right: Customer List -->
        <div class="">
            <h2> {{ $customers_count }} Customers</h2>
            <h2 class="text-lg font-semibold mb-2 text-white dark:text-zinc-100">Customer List</h2>
            <div class="grid grid-cols-2">
                <a href="" wire:click.prevent="export" class="bg-gray-800 text-white rounded">Export</a>
                    <input type="text"  wire:model.live.debounce="search" placeholder="search...">

            </div>

            </search>
            @forelse ($customers as $customer)
                <div class="p-4 border border-zinc-200 dark:border-zinc-700 rounded-md">
                    <p><strong>Name:</strong> {{ $customer->name }}</p>
                    <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                    <p><strong>Created at:</strong> {{ $customer->created_at }}</p>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">No Customer found</p>
            @endforelse
            <div class="mt-2">
                            {{ $customers->links()}}

            </div>
        </div>
    </div>
</div>
