@extends('layouts.app')

@section('content')
<x-card-layout>
<div class="max-w-sm mx-auto">
    <div class="my-4 flex flex-col items-center">
        <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $contact->coupon_code }}&size=320x320" alt="QR Code">
    </div>

    <div class="w-full">
        <form method="POST" action="{{ route('contacts.qrcode.activate', $contact->id) }}" class="inline">
             @csrf
            @method('PUT')
            <button type="submit" class="w-full p-3 cursor-pointer bg-green-500 rounded hover:bg-green-800 hover:text-white">Activate code</button>
        </form>
    </div>
</div>
</x-card-layout>
@endsection
