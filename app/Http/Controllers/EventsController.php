<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function index()
    {
        try {
            $result = Slider::where('status', 1)->orderBy('id', 'DESC')->get();
            if ($result) {
                return response()->json([
                    'status' => 'success',
                    'data' => en($result),
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'     => 'failure',
                'message'   => 'Problem Fetching Events...Error:' . $e->getMessage()
            ], 400);
        }
    }
}
