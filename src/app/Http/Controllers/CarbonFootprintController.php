<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarbonFootprintController extends Controller
{
    public function index()
    {
        return view('carbon-footprint.index');
    }
    public function estimate(Request $request)
    {
        # Validation
        $request->validate([
            'monthly_electric' => 'required|numeric',
            'monthly_gas' => 'required|numeric',
            'monthly_oil' => 'required|numeric',
            'total_mileage' => 'required|numeric',
            'flights_short' => 'required|numeric',
            'flights_long' => 'required|numeric',
            'recycle_newspaper' => 'required|in:yes,no',
            'recycle_aluminum' => 'required|in:yes,no',
         ]);

        # Carbon footprint calculation
        $carbonFootprint = 0;

        // Multiply monthly electric bill by 105
        $carbonFootprint += $request->filled('monthly_electric') ? $request->monthly_electric * 105 : 0;

        // Multiply monthly gas bill by 105
        $carbonFootprint += $request->filled('monthly_gas') ? $request->monthly_gas * 105 : 0;

        // Multiply monthly oil bill by 113
        $carbonFootprint += $request->filled('monthly_oil') ? $request->monthly_oil * 113 : 0;

        // Multiply total yearly mileage on your car by 0.79
        $carbonFootprint += $request->filled('total_mileage') ? $request->total_mileage * 0.79 : 0;

        // Multiply the number of flights (4 hours or less) by 1,100
        $carbonFootprint += $request->filled('flights_short') ? $request->flights_short * 1100 : 0;

        // Multiply the number of flights (4 hours or more) by 4,400
        $carbonFootprint += $request->filled('flights_long') ? $request->flights_long * 4400 : 0;

        // Add 184 if you do NOT recycle newspaper
        $carbonFootprint += $request->filled('recycle_newspaper') && strtolower($request->recycle_newspaper) === 'no' ? 184 : 0;

        // Add 166 if you do NOT recycle aluminum and tin
        $carbonFootprint += $request->filled('recycle_aluminum') && strtolower($request->recycle_aluminum) === 'no' ? 166 : 0;

        // The total carbon footprint
        $totalCarbonFootprint = $carbonFootprint;

        # Return response or redirect as needed
        return back()->with("status", "Carbon Footprint: {$totalCarbonFootprint}");
    }
}
