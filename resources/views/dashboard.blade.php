<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto">
        <!-- MENU UTAMA -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
            <a href="{{ route('barcodes.create') }}"
                class="block p-4 bg-blue-600 text-white text-center rounded shadow hover:bg-blue-700 transition">
                + Buat Barcode Kosong
            </a>
            <a href="{{ route('barcodes.scan') }}"
                class="block p-4 bg-green-600 text-white text-center rounded shadow hover:bg-green-700 transition">
                Scan Barcode
            </a>
        </div>

        <!-- DAFTAR BARCODE -->
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-bold mb-4">Daftar Barcode</h3>

            @if (session('success'))
                <div class="p-2 mb-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($barcodes->count())
                <ul class="divide-y divide-gray-200">
                    @foreach ($barcodes as $barcode)
                        <li class="py-2 flex items-center justify-between">
                            <div>
                                <p class="font-mono text-sm">{{ $barcode->code }}</p>
                                @if ($barcode->serial_number)
                                    <span class="text-green-600 text-xs">✅ Sudah diisi</span>
                                @else
                                    <span class="text-yellow-600 text-xs">⏳ Belum diisi</span>
                                @endif
                            </div>
                            <div>
                                @if ($barcode->serial_number)
                                    <a href="{{ route('barcodes.processScan') }}" class="text-blue-600 text-sm">Lihat</a>
                                @else
                                    <a href="{{ route('barcodes.edit', $barcode->id) }}" class="text-blue-600 text-sm">Isi Data</a>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500 text-sm">Belum ada barcode.</p>
            @endif
        </div>
    </div>
</x-app-layout>