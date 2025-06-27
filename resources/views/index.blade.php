@extends('layouts.app')

@section('content')
<x-card-layout>
<form action="{{ route('contacts.find') }}" method="POST" class="max-w-md mx-auto m-5">
    @csrf
    <div class="mx-5">
        <h1 class="text-2xl font-bold mb-4">{{ __('Please enter phone number') }}</h1>
        <input type="numeric" name="phone" placeholder="Find phone" id="phone" class="border border-gray-300 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" autocomplete="off" required autofocus>

            @if(session()->has('error'))
                <p class="text-red-700 text-center"> {{ session()->get('error') }}</p>
            @endif
            @if(session()->has('success'))
                <p class="text-green-700 text-center"> {{ session()->get('success') }}</p>
            @endif
        <button type="submit" class="w-full flex justify-center bg-indigo-500 text-gray-100 p-4 my-4 rounded-full tracking-wide font-semibold  focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-lg cursor-pointer transition ease-in duration-300">{{ __('Search') }}</button>
    </div>
</form>
</x-card-layout>
@endsection
