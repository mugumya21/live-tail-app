<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-2xl shadow-md dark:bg-zinc-900">
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
            required
        />


        <!-- Submit Button -->
        <flux:button type="submit" variant="danger" class="w-full">
             {{ __('Add Customer')}}
        </flux:button>
    </form>
</div>
