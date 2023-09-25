<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('complaints.index', [
            'complaints' => Complaint::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('complaints.edit', [
            'complaint' => new Complaint()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplaintRequest $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
        ]);

        Complaint::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'is_enabled' => $request->input('is_enabled'),
        ]);

        return to_route('complaint.index')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        return view('complaints.edit', [
            'complaint' => $complaint
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        // 1. Validation
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
        ]);

        // 2. Store to database
        $complaint->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'is_enabled' => $request->input('is_enabled'),
        ]);

        // 3. Redirect user to specific page
        return back()->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return back()->with('success', 'Record deleted successfully');
    }
}
