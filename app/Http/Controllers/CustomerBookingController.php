<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;

class CustomerBookingController extends Controller
{
    public function index(Request $request) { return $request->user()->bookings()->with('service')->get(); }
    public function store(BookingRequest $request) {
        $booking = Booking::create([
            'user_id'=>$request->user()->id,
            'service_id'=>$request->service_id,
            'booking_date'=>$request->booking_date,
            'status'=>'pending'
        ]);
        return response()->json($booking,201);
    }
}
