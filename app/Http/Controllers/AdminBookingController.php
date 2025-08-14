<?php
namespace App\Http\Controllers;

use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function index() { return Booking::with('user','service')->get(); }
}
