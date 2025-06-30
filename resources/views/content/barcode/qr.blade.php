<x-app-layout>
    <h1>QR Generated</h1>
    <img src="{{ $qr_url }}" alt="QR Code">
    <p>Code: {{ $code }}</p>
</x-app-layout>