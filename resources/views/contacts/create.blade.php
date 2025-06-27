@extends('layouts.app')

@section('content')
    <div class="">
        <h1 class="text-2xl text-center font-bold mb-2">{{ __('Create New Contact') }}</h1>
        <form action="{{ route('contacts.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <x-input-box type="text" label="{{ __('Name') }}" name="name" id="name" label="{{ __('Name') }}" required></x-input-box>
            <x-input-box type="email" label="{{ __('Email') }}" name="email" id="email" label="{{ __('Email') }}"></x-input-box>
            <x-input-box type="text" label="{{ __('Phone') }}" name="phone" id="phone" label="{{ __('Phone number') }}" required></x-input-box>
            <x-input-box type="text" label="{{ __('Coupon Code') }}" name="coupon_code" id="coupon_code" required></x-input-box>
@php
            $start_day = \Carbon\Carbon::parse(now());
            $end_day = \Carbon\Carbon::parse($start_day->addWeeks(1));
@endphp

            <x-input-box type="datetime-local" label="{{ __('Expiration Date') }}" name="expired_at" value="{{ $end_day }}" id="expiration_date" required></x-input-box>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create Contact</button>
                <a href="{{ route('contacts.index') }}" class="text-blue-500">Back to Contacts</a>
            </div>
        </form>
    </div>
    @endsection
