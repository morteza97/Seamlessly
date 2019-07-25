<?php

namespace App\Http\Controllers;

use App\ScientificReference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScientificReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count=3-(ScientificReference::where('user_id',3/*Auth::id()*/)->count());
        if ($count==0){
            return redirect(route('alumni_index'));
        }
        return view('scientific_reference.create',compact('count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate(ScientificReference::role());

        $count = count($request['first_name']);
        $userId = Auth::id();
        //return $request;

        for ($i = 0; $i < $count; $i++) {
            ScientificReference::create([
                'first_name' => $request['first_name'][$i],
                'last_name' => $request['last_name'][$i],
                'relation_type' => $request['relation_type'][$i],
                'acquaintance_method' => $request['acquaintance_method'][$i],
                'acquaintance_time' => $request['acquaintance_time'][$i],
                'reference_job' => $request['reference_job'][$i],
                'address' => $request['address'][$i],
                'phone' => $request['phone'][$i],
                'user_id' => $userId,
            ]);
        }

        return redirect(route('alumni_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScientificReference  $scientificReference
     * @return \Illuminate\Http\Response
     */
    public function show(ScientificReference $scientificReference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScientificReference  $scientificReference
     * @return \Illuminate\Http\Response
     */
    public function edit(ScientificReference $scientificReference)
    {
        return view('scientific_reference.edit',compact('scientificReference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScientificReference  $scientificReference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScientificReference $scientificReference)
    {
        $request->validate(ScientificReference::role());
        $scientificReference->update($request->all());

        return redirect('alumni/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScientificReference  $scientificReference
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScientificReference $scientificReference)
    {
        //
    }
}
