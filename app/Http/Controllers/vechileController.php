<?php

namespace App\Http\Controllers;

use App\Models\Vechile;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class vechileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vechiles= Vechile::all();
        return response()->json(['data'=> $vechiles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $input= $request->validate([
                'type'=>'required',
                'licensePlate'=>'required',
            ]);
            Vechile::create($input);
            return response()->json(['message'=>'creating new vechile successfully']);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=>'Error creating new vechile'],500);
        }
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vechiles = Vechile::findOrFail($id);
        return response()->json(['data'=>$vechiles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}