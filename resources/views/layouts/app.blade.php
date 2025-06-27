<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="min-h-screen">
    <div class=" mx-auto">

{{--
        <header class="py-6">
            <h1 class="text-3xl font-bold text-center">{{ config('app.name') }}</h1>
        </header>
--}}
        <main>
<div class="flex items-center justify-center p-4">
  <div class="max-w-sm w-full bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all">
    <div class="relative">
      <img
        src="{{ env('APP_LOGO') }}"
        class="w-full h-52 object-cover"
      />
      <span class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">
        {{ config('app.name') }}
      </span>
    </div>

    <div class="space-y-4">
        @yield('content')
    </div>
  </div>
</div>
        </main>
        <footer class="absolute bottom-0 mt-2 w-full">
            <p class="text-center text-gray-600">© {{ date('Y') }} - {{ config('app.name') }}. All rights reserved.</p>
        </footer>
    </div>
    <script src="{{ asset('js/qr.js') }}"></script>
<script>
    document.getElementById('generate-qr').addEventListener('click', function() {
        const couponCode = document.getElementById('coupon_code').value;
        generateQRCode(couponCode);
    });

    function generateQRCode(text) {
        const qrCodeContainer = document.getElementById('qr-code');
        qrCodeContainer.innerHTML = ''; // Clear previous QR code
        const qrCode = new QRCode(qrCodeContainer, {
            text: text,
            width: 128,
            height: 128,
        });
    }
</script>

</body>
</html>
