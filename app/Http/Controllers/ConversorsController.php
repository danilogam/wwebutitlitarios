<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversorsController extends Controller
{
    public function index()
    {
        return view('conversor-unidades');
    }

    public function converter(Request $request)
    {
        $value = floatval($request->input('value'));
        $from  = $request->input('fromUnit');
        $to    = $request->input('toUnit');

        // Fatores de conversão para METROS (base)
        $units = [
            "inches"        => 0.0254,
            "centimeters"   => 0.01,
            "meters"        => 1,
            "kilometers"    => 1000,
            "millimeters"   => 0.001,
            "feet"          => 0.3048,
            "miles"         => 1609.34,
            "micrometers"   => 1e-6,
            "nanometers"    => 1e-9,
            "nauticalMiles" => 1852,
            "yards"         => 0.9144,
        ];

        if (!isset($units[$from]) || !isset($units[$to])) {
            return response()->json([
                "error" => "Unidade inválida."
            ], 400);
        }

        // Converte primeiro para METROS
        $valueInMeters = $value * $units[$from];

        // Converte de METROS para a unidade final
        $convertedValue = $valueInMeters / $units[$to];

        return response()->json([
            "result" => $convertedValue
        ]);
    }
}
