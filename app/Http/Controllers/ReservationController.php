<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation; 

class ReservationController extends Controller
{
    public function getBusReservations()
    {
        $reservations = Reservation::with('customer')->get(); // Assuming a customer relationship
        return response()->json(['reservations' => $Reservations]);
    }

    public function addReservation(Request $request)
    {
        $request->validate([
            'customer_id'         => ['required', 'exists:customers,id'], // Ensure customer exists
            'route'               => ['required', 'string', 'max:255'],
            'departure_terminal'  => ['required', 'string', 'max:255'],
            'arrival_terminal'    => ['required', 'string', 'max:255'],
            'departure_date_time' => ['required', 'date'],
            'arrival_date_time'   => ['required', 'date', 'after:departure_date_time'],
            'bus_type'            => ['nullable', 'string', 'max:50'],
            'seats'               => ['required', 'integer', 'min:1'],
            'price'               => ['required', 'numeric', 'min:0'],
            'notes'               => ['nullable', 'string'],
        ]);

        $Reservation = Reservation::create($request->all());

        return response()->json(['message' => 'Bus reservation added successfully', 'bus_reservation' => $busReservation]);
    }

    public function editReservation(Request $request, $id)
    {
        $request->validate([
            'customer_id'         => ['required', 'exists:customers,id'], // Ensure customer exists
            'route'               => ['required', 'string', 'max:255'],
            'departure_terminal'  => ['required', 'string', 'max:255'],
            'arrival_terminal'    => ['required', 'string', 'max:255'],
            'departure_date_time' => ['required', 'date'],
            'arrival_date_time'   => ['required', 'date', 'after:departure_date_time'],
            'bus_type'            => ['nullable', 'string', 'max:50'],
            'seats'               => ['required', 'integer', 'min:1'],
            'price'               => ['required', 'numeric', 'min:0'],
            'notes'               => ['nullable', 'string'],
        ]);

        $Reservation = Reservation::find($id);

        if (!$Reservation) {
            return response()->json(['message' => 'Bus reservation not found'], 404);
        }

        $Reservation->update($request->all());

        return response()->json(['message' => 'Bus reservation updated successfully', 'bus_reservation' => $busReservation]);
    }

    public function deleteReservation($id)
    {
        $Reservation = Reservation::find($id);

        if (!$Reservation) {
            return response()->json(['message' => 'Bus reservation not found'], 404);
        }

        $Reservation->delete();

        return response()->json(['message' => 'Bus reservation deleted successfully']);
    }
}
