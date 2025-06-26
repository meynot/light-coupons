@extends('layouts.app')

@section('content')
<form action="{{ route('contacts.find') }}" method="POST" class="max-w-md mx-auto m-5">
    @csrf
    <div class="mx-5">
        <h1 class="text-2xl font-bold mb-4">Contacts</h1>
        <input type="numeric" name="phone" placeholder="Find phone" id="phone" class="p-3 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

            @if(session()->has('error'))
                <p class="text-red-700 text-center"> {{ session()->get('error') }}</p>
            @endif
        <button type="submit" class="w-full mt-5 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
    </div>
</form>
@endsection
