<div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow-md dark:bg-zinc-900">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Left: Form -->
        <div>
            <form wire:submit.prevent="addInCart" class="flex flex-col gap-4">
                <!-- Customer Selection -->
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-200">Customer</label>
                    <select  wire:model="customer_id" required class="w-full mt-1 p-2 border rounded-md dark:bg-zinc-800 dark:text-white">
                        <option value="">Select a customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Selection -->
                <div>
                    <label class="text-sm text-gray-700 dark:text-gray-200">Product</label>
                    <select  wire:model="product_id" required class="w-full mt-1 p-2 border rounded-md dark:bg-zinc-800 dark:text-white">
                        <option value="" >Select a product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity -->
                <flux:input
                    wire:model="quantity"
                    :label="__('Quantity')"
                    type="number"
                    placeholder=""
                    required />

                <!-- Unit Price -->
                <flux:input
                    type="number"
                    :label="__('Unit Price')"
                    wire:model="amount"
                    placeholder=""
                    required />

                <!-- Units -->
                <flux:input
                    type="text"
                    :label="__('Units')"
                    wire:model="unit"
                    placeholder="PC"
                    required />

                <!-- Submit Button -->
                <flux:button type="submit" variant="danger" class="w-full">
                    {{ __('+ Add') }}
                </flux:button>
            </form>
        </div>

        <!-- Right: Cart List -->
        <div>
            <h2 class="text-lg font-semibold mb-2 text-gray-900 dark:text-zinc-100">Cart List</h2>

          @forelse ($cart as $cartItem)
    <div class="flex justify-between items-center p-4 border border-zinc-200 dark:border-zinc-700 rounded-md mb-2">
        <p class="text-gray-800 dark:text-white">{{ $cartItem['product_name'] }}</p>
        <p class="text-gray-800 dark:text-white">{{ $cartItem['total_products'] }}</p>
        <div class="flex gap-2">
            <!-- Edit Button -->
    <!-- Edit Button -->
<a wire:click="edit({{ $cartItem['product_id'] }})"
   class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white text-gray-600 hover:bg-gray-100 shadow"
   title="Edit">
    <i data-lucide="pencil" class="w-5 h-5"></i>
</a>

<!-- Delete Button -->
<a wire:click="delete({{ $cartItem['product_id'] }})"
   onclick="return confirm('Are you sure you want to delete this item?')"
   class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white text-red-600 hover:bg-red-100 shadow"
   title="Delete">
    <i data-lucide="trash-2" class="w-5 h-5"></i>
</a>

        </div>
    </div>
@empty
    <p class="text-gray-500 dark:text-gray-400">No Item found.</p>
@endforelse

        </div>
    </div>
</div>

<!-- Include Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
</script>
