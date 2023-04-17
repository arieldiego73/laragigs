<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        return view('listings.index')
            ->with('listings', Listing::latest()->filter(request(['tag', 'search']))->paginate(4));
    }

    // Show a single listing
    public function show(Listing $listing) {
        return view('listings.show')
            ->with('listing', $listing);
    }

    // Show create form
    public function create() {
        return view('listings.create');
    }

    // Show edit form
    public function edit(Listing $listing) {
        return view('listings.edit')
            ->with('listing', $listing);
    }

    // Create a listing
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $validated['user_id'] = auth()->id();

        Listing::create($validated);
        return redirect('/')->with('message', 'A gig is created succesfully!');
    }

    // Update a listing
    public function update(Request $request, Listing $listing) {
        $validated = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($validated);
        return back()->with('message', 'A gig is updated succesfully!');
    }

    // Delete a listing
    public function destroy(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'A gig is deleted succesfully!');
    }
}