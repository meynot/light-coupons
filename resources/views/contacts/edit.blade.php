@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Edit Contact</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $contact->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $contact->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $contact->phone) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label for="coupon_code" class="block text-sm font-medium text-gray-700">Coupon Code</label>
            <input type="text" name="coupon_code" id="coupon_code" value="{{ old('coupon_code', $contact->coupon_code) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <button type="button" id="generate-qr" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Generate QR Code</button>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">QR Code</label>
            <div id="qr-code" class="mt-2"></div>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Contact</button>
            <a href="{{ route('contacts.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </div>
    </form>
</div>

@endsection
