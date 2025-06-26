@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Contact Details</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold">Name: {{ $contact->name }}</h2>
        <p class="mt-2"><strong>Email:</strong> {{ $contact->email }}</p>
        <p class="mt-2"><strong>Phone:</strong> {{ $contact->phone }}</p>
        <p class="mt-2"><strong>Coupon Code:</strong> {{ $contact->coupon_code }}</p>

        <div class="mt-4">
            <h3 class="text-lg font-semibold">QR Code:</h3>
            <div id="qrcode" class="mt-2"></div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('contacts.index') }}" class="text-blue-500 hover:underline">Back to Contacts</a>
    </div>
</div>

<script>
    const couponCode = "{{ $contact->coupon_code }}";
    const qrcodeContainer = document.getElementById('qrcode');
    const qr = new QRCode(qrcodeContainer, {
        text: couponCode,
        width: 128,
        height: 128,
    });
</script>
@endsection
