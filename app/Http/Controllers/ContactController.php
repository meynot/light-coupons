<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:15',
            'coupon_code' => 'required|string|max:255',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:15',
            'coupon_code' => 'required|string|max:255',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }



    public function find(Request $request)
    {
        $query = $request->post('phone');
        $contacts = Contact::query()
            //->orWhere('email', 'like', "%{$query}%")
            ->Where('phone',$query)
            ->whereNull('used_at')
            ->where('expired_at', '>', now())
            ->get();

        if ($contacts->isEmpty())
        {
            return redirect()->back()->with('error', 'No contacts or no coupons found.');
        }
        $contact= $contacts->first();
        return view('contacts.qrcode', compact('contact'));
    }

    public function qrcodeActivate(Contact $contact)
    {
        $contact->used_at = now();
        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'QR Code activated successfully.');
    }
}
