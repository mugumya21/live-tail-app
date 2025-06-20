<flux:navlist variant="outline" >
    <!-- Platform -->
    <flux:navlist.group class="grid">
        <flux:navlist.item icon="home" href="#" wire:navigate>Dashboard</flux:navlist.item>
        <flux:navlist.item icon="shopping-cart" href="{{ route('sales.create') }}">Make a Sale</flux:navlist.item>
    </flux:navlist.group>

    <!-- Transactions -->
    <flux:navlist.group  class="grid">
        <button
            type="button"
            class="flex items-center justify-between w-full px-3 py-2 text-left rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition"
            wire:click.prevent="toggleGroup('transactions')"
        >
            <span class="flex items-center space-x-2">

                <span>Transactions</span>
            </span>
            <svg
                class="w-4 h-4 transition-transform duration-300"
                :class="openGroups['transactions'] ? 'rotate-90' : ''"
                xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <div
            class="ml-6 mt-1 space-y-1 text-sm overflow-hidden transition-all duration-300"
            style="max-height: {{ $openGroups['transactions'] ? '500px' : '0' }};"
        >
            <flux:navlist.item icon="receipt-percent" href="#">All Transactions</flux:navlist.item>
            <flux:navlist.item icon="plus-circle" href="#">New Transaction</flux:navlist.item>
            <flux:navlist.item icon="banknotes" href="#">Expenses</flux:navlist.item>
            <flux:navlist.item icon="banknotes" href="#">Income</flux:navlist.item>
            <flux:navlist.item icon="truck" href="#">Purchase</flux:navlist.item>
        </div>
    </flux:navlist.group>

    <!-- Inventory -->
    <flux:navlist.group  class="grid">
        <button
            type="button"
            class="flex items-center justify-between w-full px-3 py-2 text-left rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition"
            wire:click.prevent="toggleGroup('inventory')"
        >
            <span class="flex items-center space-x-2">
                <span>Inventory</span>
            </span>
            <svg
                class="w-4 h-4 transition-transform duration-300"
                :class="openGroups['inventory'] ? 'rotate-90' : ''"
                xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <div
            class="ml-6 mt-1 space-y-1 text-sm overflow-hidden transition-all duration-300"
            style="max-height: {{ $openGroups['inventory'] ? '500px' : '0' }};"
        >
            <flux:navlist.item icon="list-bullet" href="#">Category</flux:navlist.item>
            <flux:navlist.item icon="cube" href="#">Product</flux:navlist.item>
            <flux:navlist.item icon="truck" href="#">Supplier</flux:navlist.item>
            <flux:navlist.item icon="users" href="{{ route('customers.list') }}">Customer</flux:navlist.item>
        </div>
    </flux:navlist.group>

        <!-- Accounts -->
    <flux:navlist.group  class="grid">
        <button
            type="button"
            class="flex items-center justify-between w-full px-3 py-2 text-left rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition"
            wire:click.prevent="toggleGroup('accounts')"
        >
            <span class="flex items-center space-x-2">

                <span> Accounts</span>
            </span>
            <svg
                class="w-4 h-4 transition-transform duration-300"
                :class="openGroups['financial_transactions'] ? 'rotate-90' : ''"
                xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <div
            class="ml-6 mt-1 space-y-1 text-sm overflow-hidden transition-all duration-300"
            style="max-height: {{ $openGroups['accounts'] ? '500px' : '0' }};"
        >
            <flux:navlist.item icon="receipt-percent" href="#">Charts Of Accounts</flux:navlist.item>
            <flux:navlist.item icon="plus-circle" href="#">Ledger Accounts</flux:navlist.item>
            <flux:navlist.item icon="banknotes" href="#">Trial Balance</flux:navlist.item>
            <flux:navlist.item icon="banknotes" href="#">Income Statments</flux:navlist.item>
            <flux:navlist.item icon="truck" href="#">Balance Sheet</flux:navlist.item>
        </div>
    </flux:navlist.group>
    <!-- System -->
    <flux:navlist.group  class="grid">
        <button
            type="button"
            class="flex items-center justify-between w-full px-3 py-2 text-left rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition"
            wire:click.prevent="toggleGroup('system')"
        >
            <span class="flex items-center space-x-2">
                <span>System</span>
            </span>
            <svg
                class="w-4 h-4 transition-transform duration-300"
                :class="openGroups['system'] ? 'rotate-90' : ''"
                xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <div
            class="ml-6 mt-1 space-y-1 text-sm overflow-hidden transition-all duration-300"
            style="max-height: {{ $openGroups['system'] ? '500px' : '0' }};"
        >
            <flux:navlist.item icon="chart-bar" href="#">Report</flux:navlist.item>
            <flux:navlist.item icon="users" href="#">User</flux:navlist.item>
            <flux:navlist.item icon="cog" href="#">Settings</flux:navlist.item>
        </div>
    </flux:navlist.group>

    <flux:spacer />


</flux:navlist>
