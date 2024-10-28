<?php

namespace App\Http\Controllers;

use App\Models\driver;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class driverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers= Driver::all();
        return response()->json(['data'=> $drivers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $input= $request->validate([
                'email'=>'required | email',
                'password'=> 'required',
                'name'=> 'required',
                'phoneNumber'=> 'required',
                'location'=> 'required',
                'secondaryNumber' => 'nullable', // this line for the optional second number
            ]);
            Driver::create($input);
            return response()->json(['message'=>'creating new driver successfully']);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=>'Error creating new driver'],500);
        }
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drivers = Driver::findOrFail($id);
        return response()->json(['data'=>$drivers]);
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
