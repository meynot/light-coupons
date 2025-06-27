@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-4">Contacts</h1>

    <form method="GET" action="{{ route('contacts.index') }}">
        <div>
            <input type="text" name="name" placeholder="{{ ('find by name') }}" autocomplete="off" value="{{ request('name') }}">
            <input type="text" name="email" placeholder="{{ ('find by email') }}" autocomplete="off" value="{{ request('email') }}">
            <input type="text" name="phone" placeholder="{{ ('find by phone') }}" autocomplete="off" value="{{ request('phone') }}">
            <input type="text" name="coupon_code" placeholder="{{ ('find by coupon_code') }}" autocomplete="off" value="{{ request('coupon_code') }}">
            <input type="date" name="created_at" value="{{ request('created_at') }}">
            <button type="submit">Filter</button>
            <a href="{{ route('contacts.index') }}">Reset</a>
        </div>
    </form>


        <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Contact</a>
        <table class="min-w-full mt-4 border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">
                        <a href="{{ route('contacts.index', array_merge(request()->all(), ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}">
                            Name
                        </a>
                    </th>
                    <th class="border px-4 py-2">
                        <a href="{{ route('contacts.index', array_merge(request()->all(), ['sort' => 'email', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}">
                            Email
                        </a>
                    </th>
                    <th class="border px-4 py-2">
                        <a href="{{ route('contacts.index', array_merge(request()->all(), ['sort' => 'phone', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}">
                            Phone
                        </a>
                    </th>
                        <input type="numeric" name="phone" placeholder="Find phone" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </th>
                    <th class="border px-4 py-2">Coupon Code</th>
                    <th class="border px-4 py-2">QR Code</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td class="border px-4 py-2">{{ $contact->name }}</td>
                        <td class="border px-4 py-2">{{ $contact->email }}</td>
                        <td class="border px-4 py-2 text-last">{{ substr($contact->phone, 0, strlen($contact->phone) - 4) . '****' }}</td>
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
                @empty
                    <tr>
                        <td colspan="3">{{ __('No coupons found') }}.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $contacts->links() }}
    </div>
@endsection
