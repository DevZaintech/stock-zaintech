<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cek Keaslian Produk | Zaintech</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

  <!-- Logo di header -->
  <div class="mb-4">
    <img src="https://zaintech.co.id/public/assets/img/Logo%20Zaintech%20B_092.png"
         alt="Logo Zaintech"
         class="w-40 h-auto mx-auto">
  </div>

  <!-- Card content -->
  <div class="bg-white shadow-lg rounded-lg p-8 max-w-md text-center">
    <!-- Icon Check -->
    <div class="flex justify-center mb-4">
      <svg xmlns="http://www.w3.org/2000/svg"
           class="h-16 w-16 text-green-600"
           fill="none"
           viewBox="0 0 24 24"
           stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </div>

    <h1 class="text-2xl font-bold mb-2 text-gray-800">Cek Keaslian Produk</h1>
    <p class="text-gray-600 mb-6">
      Scan QR Code yang tertera pada produk Anda untuk memastikan keaslian dan masa garansi resmi Zaintech.
    </p>

    <!-- Contoh gambar QR code -->
    <img src="https://api.qrserver.com/v1/create-qr-code/?data=DummyExample&size=150x150"
         alt="Contoh QR Code"
         class="mx-auto w-32 h-32 mb-4">

    <p class="text-gray-500 text-sm">
      Pastikan Anda membeli produk asli hanya dari Zaintech.
    </p>
  </div>

</body>
</html>