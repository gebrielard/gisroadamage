<?php

namespace App\Http\Controllers;

use App\Models\RoadDamage;
use Illuminate\Http\Request;

class RoadDamageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roaddamages = RoadDamage::latest()->paginate(5);
        return view('roaddamages.index', compact('roaddamages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roaddamages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kota' => 'required',
            'kabupaten'=>'required',
            'lebar_jalan'=>'required',
            'riwayat_banjir'=>'required'
        ]);

        RoadDamage::create($request->all());

        return redirect()->route('roaddamages.index')
            ->with('success', 'Road Damage created succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoadDamage  $roadDamage
     * @return \Illuminate\Http\Response
     */
    public function show(RoadDamage $roadDamage)
    {
        return view('roaddamages.show', compact('roadDamage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoadDamage  $roadDamage
     * @return \Illuminate\Http\Response
     */
    public function edit(RoadDamage $roadDamage)
    {
        return view('roaddamages.edit', compact('roadDamage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoadDamage  $roadDamage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoadDamage $roadDamage)
    {
        $request->validate([
            'kota' => 'required',
            'kabupaten'=>'required',
            'lebar_jalan'=>'required',
            'riwayat_banjir'=>'required'
        ]);
        $roadDamage->update($request->all());

        return redirect()->route('roaddamages.index')
            ->with('success', 'Road Damage updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoadDamage  $roadDamage
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoadDamage $roadDamage)
    {
        $roadDamage->delete();

        return redirect()->route('roaddamages.index')
            ->with('success', 'Road Damage deleted succesfully.');
    }
}
