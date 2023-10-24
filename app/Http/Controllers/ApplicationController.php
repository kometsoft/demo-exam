<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('applications.index', [
            'applications' => Application::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $options = [
            [
                'id' => 1,
                'name' => 'Pilihan 1'
            ],
            [
                'id' => 2,
                'name' => 'Pilihan 2'
            ]
        ];

        $options = collect([
            (object)[
                'id' => 1,
                'name' => 'Pilihan 1'
            ],
            (object)[
                'id' => 2,
                'name' => 'Pilihan 2'
            ]
        ]);

        $newVariable = 1;

        return view('applications.edit', [
            'application' => new Application(),
            'options' => $options,
            'newVariable' => $newVariable
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        dd($request->all());

        Application::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'is_enabled' => $request->input('is_enabled'),
        ]);

        return to_route('application.index')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('applications.edit', [
            'application' => $application
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
