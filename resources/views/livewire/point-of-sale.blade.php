<div>
    <h1>{{ $name }}</h1>
    <h2>{{ count($users)}}</h2>
{{-- <button wire:click='addUser'> click user </button> --}}
<form wire:submit.prevent="addUser" class="p-5">

    <input class="block rounded border border-gray-200 px-3 py-1 mt-2" type="text" wire:model="name" id="" placeholder="enter username">
    @error('name')
        <span class="text-xs text-red-600">{{$message}}</span>
    @enderror
    <input class="block rounded border border-gray-200 px-3 py-1 mt-2"  type="email" wire:model="email" id="" placeholder="enter email">
        @error('email')
        <span class="text-xs text-red-600">{{$message}}</span>
    @enderror
    <input class="block rounded border border-gray-200 px-3 py-1 mt-2"  type="password" wire:model="password" id="" placeholder="enter password">
        @error('email')
        <span class="text-xs text-red-400">{{$message}}</span>
    @enderror
    <button type="submit" class="block rounded border bg-gray-800 px-3 py-1 mt-2 text-white" > add user</button>

       <a href="{{ route('customer.render') }}">Customer</a>
</form>
    {{-- Success is as dangerous as failure. --}}
</div>


