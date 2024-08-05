<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ImpLinksController extends Controller
{
    public function index()
    {
        try {
            $result = DB::select("SELECT * FROM impLinks WHERE status=1 and  NOW() between fromDate AND toDate");
            if ($result) {
                return response()->json([
                    'status'     => 'success',
                    'data'   => $result
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
