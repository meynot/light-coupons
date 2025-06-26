<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        <header class="py-6">
            <h1 class="text-3xl font-bold text-center">{{ config('app.name') }}</h1>
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="py-6 text-center">
            <p class="text-gray-600">© {{ date('Y') }} - {{ config('app.name') }}. All rights reserved.</p>
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
