<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders= Order::all();
        return response()->json(['data'=> $orders]);
    }
    public function store(Request $request)
    {
        try{
            $input= $request->validate([
                'pickUpLocation'=>'required',
                'deliveryLocation'=>'required',
                'required|numeric', // Ensure the price is a valid number
            ]);
            Order::create($input);
            return response()->json(['message'=>'creating new order successfully']);
        }
        catch(Exception $e)
        {
            return response()->json(['message'=>'Error creating new order'],500);
        }
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders = Order::findOrFail($id);
        return response()->json(['data'=>$orders]);
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