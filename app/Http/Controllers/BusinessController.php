<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessRequest;
use App\Models\Business;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('business.index')->with([
            'businesses' => Business::withCount('people')->paginate(10),
            'tag' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessRequest $request, Business $business): RedirectResponse
    {
        $business = Business::create($request->validated());

        $business->tags()->sync($request->input('tags'));

        return redirect(route('business.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business): View
    {
        return view('business.detail')->with('business', $business);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business): View
    {
        return view('business.edit')->with([
            'business' => $business,
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessRequest $request, Business $business): RedirectResponse
    {
        $business->update($request->validated());

        $business->tags()->sync($request->input('tags'));

        return redirect(route('business.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        $business->delete();

        return redirect(route('business.index'));
    }
}
