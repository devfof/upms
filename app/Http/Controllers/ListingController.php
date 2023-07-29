<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::where('status', '!=', 0)->latest()->filter(request(['contributors', 'search']))->paginate(6)
        ]);
    }

    //Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Show workspace
    public function workspace(Listing $listing)
    {
        return view('listings.workspace', [
            'listing' => $listing,
            'works' => Workspace::all()
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('listings.create');
    }

    // Show code Create Form
    public function create_code()
    {
        return view('listings.create_code');
    }

    // Show file upload Form
    public function file_up()
    {
        return view('listings.file_up');
    }

    // Store Listing Data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'contributors' => 'required',
            'project_subject' => 'required',
            // 'status' => 'required',
            'description' => 'required'
        ]);

        // if ($request->hasFile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }
        $formFields['status'] = 0;
        $formFields['final_submission'] = 0;
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Project created successfully!');
    }

    // Store code
    public function store_code(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);
        $formFields['type'] = 'Code';
        $formFields['listing_id'] = auth()->id();

        Workspace::create($formFields);

        return redirect('/')->with('message', 'Code created successfully!');
    }

    // Store file
    public function store_file(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required'
        ]);

        $formFields['type'] = 'File';
        $formFields['listing_id'] = auth()->id();

        if ($request->hasFile('link')) {
            // $formFields['link'] = $request->file('link')->store('files', 'public');
            $file = $request->file('link');
            $extension = $file->getClientOriginalExtension(); // get the file extension
            $filePath = $file->storeAs('files', uniqid() . '.' . $extension, 'public'); // store the file with a unique filename that includes the extension
            $formFields['link'] = $filePath;
        }

        Workspace::create($formFields);

        return redirect('/')->with('message', 'Code created successfully!');
    }

    // Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'contributors' => 'required',
            'project_subject' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);

        // if ($request->hasFile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        $listing->update($formFields);

        return back()->with('message', 'Project updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage Listings
    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

    // shared Listings
    public function shared()
    {
        $studentId = auth()->user()->student_id;
        $listings = DB::table('listings')
            ->whereRaw("FIND_IN_SET('$studentId', contributors)")
            ->get();

        return view('listings.shared', [
            'listings' => $listings
        ]);
    }
}
