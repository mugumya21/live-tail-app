<div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow-md dark:bg-zinc-900">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Left: Form -->
        <div class="">
            <form wire:submit.prevent="addRole" class="flex flex-col gap-4">
                <!-- Name -->
                <flux:input
                    type="text"
                    :label="__('Name')"
                    wire:model="name"
                    placeholder="eG. Admin"
                    required />



                <!-- description -->
                <flux:input
                    type="text"
                    :label="__('Description')"
                    wire:model="description"
                    placeholder='e.g. Admin role with full access'
                     />

                <!-- Permissions -->
            <flux:checkbox.group wire:model="permissions" label="Permissions">
                @foreach ($allpermissions as $permission )
                <flux:checkbox label="{{ $permission->name }}" value="{{ $permission->id }}" />
                @endforeach
            </flux:checkbox.group>


                <!-- Submit Button -->
                <flux:button type="submit" variant="primary" class="w-full">
                    {{ __('Add Role') }}
                </flux:button>
            </form>
        </div>

        <!-- Right: Role List -->
        <div class="">
            <h2 class="text-lg font-semibold mb-2 text-white dark:text-zinc-100">Role List</h2>
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
            @forelse ($roles as $role)
            <div  wire:key="role{{ $role->id }}" class="grid grid-cols-2 p-4 border border-zinc-200 dark:border-zinc-700 rounded-md">
                <div class="">
                    @if ($editRoleId ===  $role->id)


                <input
                    type="text" wire:model="editRoleName" x-on:blur="$wire.save()"
                    class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-400"
                     >


                <flux:checkbox.group wire:model="permissions" label="Permissions">
                @foreach ($allpermissions as $permission)
                    <flux:checkbox
                        label="{{ $permission->name }}"
                        value="{{ $permission->id }}" />
                @endforeach
                    </flux:checkbox.group>


                    @else
                    <p><strong>Name:</strong> {{ $role->name }}</p>

                    @foreach ($role->permissions as $perminsion)
                    <flux:badge color="lime">{{ $perminsion->name }}</flux:badge>

                    @endforeach
                    @endif


                </div>
                    <div>
                        <button  wire:click="edit({{ $role->id}})" class="rounded text-white bg-green-500 px-4 py-1 m-3">
                        <i class="fas fa-edit"></i> Edit
                        </button>

                        <!-- Delete Button -->
                         <button wire:click="delete({{ $role->id}})"  class="rounded text-white bg-red-500 px-4 py-1 m-3">
                        <i class="fas fa-trash"></i> Delete
                        </button>
                     </div>
            </div>

            @empty
                <p class="text-gray-500 dark:text-gray-400">No Role found</p>
            @endforelse
            <div class="mt-2">
                            {{ $roles->links()}}

            </div>
        </div>
    </div>
</div>

