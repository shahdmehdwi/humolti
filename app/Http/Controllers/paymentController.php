<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments= Payment::all();
        return response()->json(['data'=> $payments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $input= $request->validate([
                'type'=>'required',
                'state'=>'required',
            ]);
            Payment::create($input);
            return response()->json(['message'=>'creating new payment successfully']);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=>'Error creating new payment'],500);
        }
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payments = Payment::findOrFail($id);
        return response()->json(['data'=>$payments]);
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