<?php

namespace App\Http\Controllers;

use App\Models\Circular;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CircularController extends Controller
{
    public function index()
    {
        try {
            $result = Circular::where('status', 1)->whereRaw("NOW() BETWEEN `fromDate` and `toDate`")
                ->orderBy('fromDate', 'DESC')->get();

            if ($result) {
                return response()->json([
                    'status'     => 'success',
                    'data' => en($result),
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'     => 'failure',
                'message'   => 'Problem Fetching Circulars...Error:' . $e->getMessage()
            ], 400);
        }
    }

    public function getAll()
    {
        try {
            $result = Circular::orderBy('fromDate', 'desc')->get();
            if ($result) {
                return response()->json([
                    'status' => 'success',
                    'message' => "circular list fetched successfully",
                    'data' => en($result),
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'     => 'failure',
                'message'   => 'Problem Fetching Circulars...Error:' . $e->getMessage()
            ], 400);
        }
    }
}
