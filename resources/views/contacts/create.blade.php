@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Create New Contact</h1>
        <form action="{{ route('contacts.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <label for="coupon_code" class="block text-sm font-medium text-gray-700">Coupon Code</label>
                <input type="text" name="coupon_code" id="coupon_code" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <button type="button" id="generate-qr" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Generate QR Code</button>
                <div id="qr-code" class="mt-4"></div>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create Contact</button>
                <a href="{{ route('contacts.index') }}" class="text-blue-500">Back to Contacts</a>
            </div>
        </form>
    </div>
    @endsection
