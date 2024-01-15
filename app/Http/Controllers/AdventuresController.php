<?php

namespace App\Http\Controllers;

use App\Http\Requests\Adventures\StoreAdventureRequest;
use App\Models\Adventure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class AdventuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Resources/AdventureCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdventureRequest $request
     * @return \Inertia\Response
     */
    public function store(StoreAdventureRequest $request): \Inertia\Response
    {
        $adventure = new Adventure;
        $adventure->fill($request->validated());
        $adventure->save();

        return Inertia::render('Admin/ResourcesIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param Adventure $adventure
     * @return void
     */
    public function show(Adventure $adventure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Adventure $adventure
     * @return void
     */
    public function edit(Adventure $adventure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Adventure $adventure
     * @return void
     */
    public function update(Request $request, Adventure $adventure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Adventure $adventure
     * @return void
     */
    public function destroy(Adventure $adventure)
    {
        //
    }
}
