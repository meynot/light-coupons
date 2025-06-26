@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-4">Contacts</h1>
        <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Contact</a>
        <table class="min-w-full mt-4 border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">
                        Phone <br />
                        <input type="numeric" name="phone" placeholder="Find phone" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </th>
                    <th class="border px-4 py-2">Coupon Code</th>
                    <th class="border px-4 py-2">QR Code</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td class="border px-4 py-2">{{ $contact->name }}</td>
                        <td class="border px-4 py-2">{{ $contact->email }}</td>
                        <td class="border px-4 py-2">{{ str_repeat('*', strlen($contact->phone)) }}</td>
                        <td class="border px-4 py-2">{{ $contact->coupon_code }}</td>
                        <td class="border px-4 py-2">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $contact->coupon_code }}&size=100x100" alt="QR Code">
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="text-yellow-500">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
