<?php

namespace App\Http\Controllers;

use App\Models\Regional_offices;
use Illuminate\Http\Request;

class RegionalOfficeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $result = Regional_offices::where('status', 1)->where('region', $request->region)->get();
            if ($result) {
                return response()->json([
                    'status'     => 'success',
                    'data' => en($result),
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'     => 'failure',
                'message'   => 'Problem Fetching Latest Updates...Error:' . $e->getMessage()
            ], 400);
        }
    }
}
