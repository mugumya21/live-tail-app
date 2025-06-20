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
               <div class="flex items-center space-x-4 p-4">
                <!-- Search Input -->
                <input
                    type="text"
                    class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-400"
                    wire:model.live.debounce.500ms="search"
                    placeholder="Search..." >

                <!-- Export Button -->
                <a
                    href="#"
                    wire:click.prevent="export"
                    class="bg-gray-800 text-white rounded px-4 py-1 hover:bg-gray-700 transition"
                >
                    Export
                </a>
            </div>


            </div>

            </search>
            @forelse ($customers as $customer)
            <div  wire:key="customer{{ $customer->id }}" class="grid grid-cols-2 p-4 border border-zinc-200 dark:border-zinc-700 rounded-md">
                <div class="">
                    @if ($editCustomerId ===  $customer->id)


                    {{--   x-on:blur="$wire.save()" this is alpine that listens to all events and clicks  --}}
                <input
                    type="text" wire:model="editCustomerName" x-on:blur="$wire.save()"
                    class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-400"
                     >

                    @else
                    <p><strong>Name:</strong> {{ $customer->name }}</p>

                    @endif

                    <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                    <p><strong>Created at:</strong> {{ $customer->created_at }}</p>


                </div>
                    <div>
                        <button  wire:click="edit({{ $customer->id}})" class="rounded text-white bg-green-500 px-4 py-1 m-3">
                        <i class="fas fa-edit"></i> Edit
                        </button>

                        <!-- Delete Button -->
                         <button wire:click="delete({{ $customer->id}})"  class="rounded text-white bg-red-500 px-4 py-1 m-3">
                        <i class="fas fa-trash"></i> Delete
                        </button>
                     </div>
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
