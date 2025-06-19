<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Cards Grid: 4 columns -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-2 lg:grid-cols-4">
            <!-- Card 1 -->
            <div class="relative aspect-video rounded-xl border border-neutral-200 bg-blue-600 p-3 text-white text-sm">
                <div class="font-semibold">Total Categories</div>
                <div class="mt-1 text-xl font-bold">4,000</div>
            </div>

            <!-- Card 2 -->
            <div class="relative aspect-video rounded-xl border border-neutral-200 bg-yellow-500 p-3 text-white text-sm">
                <div class="font-semibold">Total Products</div>
                <div class="mt-1 text-xl font-bold">45</div>
            </div>

            <!-- Card 3 -->
            <div class="relative aspect-video rounded-xl border border-neutral-200 bg-purple-600 p-3 text-white text-sm">
                <div class="font-semibold">Total Employees</div>
                <div class="mt-1 text-xl font-bold">1,041</div>
            </div>

            <!-- Card 4 -->
            <div class="relative aspect-video rounded-xl border border-neutral-200 bg-green-600 p-3 text-white text-sm">
                <div class="font-semibold">Total Suppliers</div>
                <div class="mt-1 text-xl font-bold">12</div>
            </div>

            <!-- Card 5 -->
            <div class="relative aspect-video rounded-xl border border-neutral-200 bg-red-600 p-3 text-white text-sm">
                <div class="font-semibold">Total Orders</div>
                <div class="mt-1 text-xl font-bold">310</div>
            </div>

            <!-- Card 6 -->
            <div class="relative aspect-video rounded-xl border border-neutral-200 bg-gray-800 p-3 text-white text-sm">
                <div class="font-semibold">Total Sales</div>
                <div class="mt-1 text-xl font-bold">$120,000</div>
            </div>

            <!-- Card 7 -->
            <div class="relative aspect-video rounded-xl border border-neutral-200 bg-pink-600 p-3 text-white text-sm">
                <div class="font-semibold">Total Expenses</div>
                <div class="mt-1 text-xl font-bold">5</div>
            </div>

            <!-- Card 8 -->
            <div class="relative aspect-video rounded-xl border border-neutral-200 bg-teal-600 p-3 text-white text-sm">
                <div class="font-semibold">Total Purchases</div>
                <div class="mt-1 text-xl font-bold">87</div>
            </div>
        </div>
                       @include('partials.pie-and-bar-chart')


    </div>



</x-layouts.app>
