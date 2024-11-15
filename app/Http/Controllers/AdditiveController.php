<?php

namespace App\Http\Controllers;

use App\Models\Additive;
use App\Http\Requests\StoreAdditiveRequest;
use App\Http\Requests\UpdateAdditiveRequest;
use App\Models\AdditiveDetail;

class AdditiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdditiveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $lang, String $name, String $code, int $id)
    {
        $lang = app()->getLocale();

        $additive = Additive::findOrFail($id);
        $additives = AdditiveDetail::where('additive_e_code', $additive->additive_e_code)
                        ->orderBy('display_order','asc')->get();
        $categories = AdditiveDetail::where('additive_e_code', $additive->additive_e_code)
        ->groupBy('food_category_level')
        ->orderBy('display_order','asc')->get();
        $additive->visit_count = $additive->visit_count + 1;
        $additive->save();
        $topAdditives = Additive::orderBy('visit_count', 'desc')
                    ->limit(5)
                    ->get();
        $previousAdditive = Additive::where('id', '<', $additive->id)
            ->orderBy('id', 'desc')
            ->first();
            
        $nextAdditive = Additive::where('id', '>', $additive->id)
            ->orderBy('id', 'asc')
            ->first();
        return view('additives.show', compact('additives','categories','additive','topAdditives','previousAdditive','nextAdditive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Additive $additive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdditiveRequest $request, Additive $additive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Additive $additive)
    {
        //
    }
}
