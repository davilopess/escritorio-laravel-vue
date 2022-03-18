<?php

namespace App\Http\Controllers;

use App\Models\Peticao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PeticaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queries = ['search', 'page'];
        return Inertia::render('Peticao/Index', [
            'peticao' => Peticao::filter($request->only($queries))->paginate()->withQueryString(),
            'filters' => $request->all($queries),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Peticao/Create');
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
            'description' => 'required|string|min:3|max:255',
            'value' => 'required|numeric',
            'date' => 'required',
        ]);

        Peticao::create([
            'description' => $request->description,
            'value' => $request->value,
            'date' => $request->date,
            'note' =>$request->note,
        ]);

        return Redirect::route('peticao.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peticao  $peticao
     * @return \Illuminate\Http\Response
     */
    public function show(Peticao $peticao)
    {
        return Inertia::render('Peticao/Show', compact('peticao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peticao  $peticao
     * @return \Illuminate\Http\Response
     */
    public function edit(Peticao $peticao)
    {
        return Inertia::render('Peticao/Edit',  compact('peticao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peticao  $peticao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peticao $peticao)
    {
        $request->validate([
            'description' => 'required|string|min:3|max:255',
            'value' => 'required|numeric',
            'date' => 'required',
        ]);

        $peticao->update($request->all());

        return Redirect::route('peticao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peticao  $peticao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peticao $peticao)
    {
        $peticao->delete();

        return back();
    }
}
