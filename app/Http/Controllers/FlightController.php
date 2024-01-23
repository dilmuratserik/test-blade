<?php

namespace App\Http\Controllers;

use App\DTO\FlightData;
use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function getAllFlights()
    {
        $flights = Flight::all();
        return response()->json($flights);
    }
    public function addFlight(Request $request)
    {
        $flight = new Flight;
        $flight->from = $request->from;
        $flight->to = $request->to;
        $flight->depart = $request->depart;
        $flight->arrival = $request->arrival;
        $flight->save();

        return response()->json(['message' => 'Flight added successfully!']);
    }
    public function findLongestRoute(Request $request)
    {
        $flights = Flight::all();
        $longestRoute = null;
        $maxDuration = 0;

        foreach ($flights as $firstFlight) {
            foreach ($flights as $secondFlight) {
                if ($firstFlight->to == $secondFlight->from &&
                    Carbon::parse($firstFlight->arrival) <= Carbon::parse($secondFlight->depart)) {
                    $duration = Carbon::parse($secondFlight->arrival)->diffInSeconds(Carbon::parse($firstFlight->depart));
                    if ($duration > $maxDuration) {
                        $maxDuration = $duration;
                        $longestRoute = [
                            new FlightData($firstFlight->from, $firstFlight->to, $firstFlight->depart, $firstFlight->arrival),
                            new FlightData($secondFlight->from, $secondFlight->to, $secondFlight->depart, $secondFlight->arrival)
                        ];
                    }
                }
            }
        }

        return response()->json($longestRoute);
    }
}
