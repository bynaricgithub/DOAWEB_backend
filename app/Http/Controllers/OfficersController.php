<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OfficersController extends Controller
{
    public function index()
    {
        try {
            $result = DB::select("SELECT * FROM msbte_officers  WHERE status=1");
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