<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="copiedMessage" class="copied-message">Texto copiado al portapapeles</div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($urls as $url)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-2">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <span>Url acortada</span>

                        <span id="short_url" class="ml-4 w-auto px-5 py-3 mr-2 font-semibold bg-gray-900 text-white rounded border select-all" onclick="shorter.copy_url_args('{{ url($url->code) }}')">
                            {{ url($url->code) }}
                        </span>

                        {{ $url->url }}


                        <a href="{{ url($url->code) }}" class="w-auto px-5 py-2 font-semibold bg-gray-900 text-white rounded border float-right go-to-link" target="_blank">
                            Ir
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
