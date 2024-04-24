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
            'monthly_flights' => 'required|numeric',
            'monthly_km' => 'required|numeric'
         ]);

        # Carbon footprint calculation
        $carbonFootprint = 0;

        $carbonFootprint += $request->filled('monthly_electric') ? $request->monthly_electric * 0.53 : 0;

        $carbonFootprint += $request->filled('monthly_gas') ? $request->monthly_gas * 1.8 : 0;

        $carbonFootprint += $request->filled('monthly_oil') ? $request->monthly_oil * 2.34 : 0;

        $carbonFootprint += $request->filled('monthly_flights') ? ($request->monthly_flights * 0.285) * ($request->filled('monthly_flights') ? $request->monthly_km : 0) : 0;

        // The total carbon footprint
        $totalCarbonFootprint = $carbonFootprint;

        # Return response or redirect as needed
        return back()->with("status", "CO2 prodotto nell'ultimo mese: {$totalCarbonFootprint}Kg.");
    }
}
