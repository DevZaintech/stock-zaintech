<!DOCTYPE html>
<html>
<head>
  <title>Cetak QR</title>
  <style>
    @page {
      size: 80mm 50mm; /* ukuran kertas khusus */
      margin: 0;
    }
    body {
      margin: 0;
      padding: 0;
    }
    .print-area {
      width: 80mm;
      height: 50mm;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .qr-img {
      width: 40mm;
      height: 40mm;
      object-fit: contain;
    }
    .qr-text {
      font-size: 12pt;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="print-area">
    <img 
      class="qr-img" 
      src="{{ asset('storage/qr_codes/' . $barcode->code . '.png') }}" 
      alt="QR Code">

    <div class="qr-text">{{ $barcode->code }}</div>
  </div>

  <script>
    window.onload = function() {
      window.print();
    };
  </script>
</body>
</html>