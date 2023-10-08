<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex">
                        <input type="text" id="long_url" placeholder="Pega la url aqui" class="w-full px-4 py-3 rounded text-gray-600" autofocus>
                        <button class="ml-4 w-auto px-6 py-3 font-semibold bg-gray-900 text-white rounded border" onclick="shorter.short_url()">
                            <span>Acortar</span>
                        </button>
                    </div>

                    <div id="short_url_container" class="flex pt-4" style="display: none">
                        <input type="text" id="short_url" class="w-full px-4 py-3 rounded text-gray-600" onclick="shorter.copy_url()">
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
