@extends('layouts.app')

@section('content')
<div class="max-w-xs mx-auto w-full">
    <div>
        <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $contact->coupon_code }}&size=300x300" alt="QR Code">
    </div>

    <div class="w-full">
        <form method="POST" action="{{ route('contacts.qrcode.activate', $contact->id) }}" class="inline">
             @csrf
            @method('PUT')
            <button type="submit" class="w-full p-3 bg-green-500 rounded hover:bg-green-800">Activate code</button>
        </form>
    </div>
</div>
@endsection
