<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('person.index')
            ->with('people', Person::with('business')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('person.create')
            ->with('businesses', Business::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email'
        ]);

        $person = new Person;
        $person->firstname = $request->input('firstname');
        $person->lastname = $request->input('lastname');
        $person->email = $request->input('email');
        $person->phone = $request->input('phone');
        $person->business_id = $request->input('business_id');
        $person->save();

        return redirect(route('person.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('person.detail')->with('person', $person);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person): View
    {
        return view('person.edit')
            ->with([
                'person' => $person,
                'businesses' => Business::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person): RedirectResponse
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email'
        ]);

        $person->firstname = $request->input('firstname');
        $person->lastname = $request->input('lastname');
        $person->email = $request->input('email');
        $person->phone = $request->input('phone');
        $person->business_id = $request->input('business_id');
        $person->save();

        return redirect(route('person.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return redirect(route('person.index'));
    }
}
