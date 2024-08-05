<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function index()
    {
        try {
            $search_text = $_GET['query'];
            $result1 = DB::select("SELECT * FROM impLinks WHERE status=1 and NOW() between fromDate AND toDate and heading LIKE '%" . $search_text . "%'");
            $result2 = DB::select("SELECT * FROM circular WHERE status=1 and  NOW() between fromDate AND toDate and heading LIKE '%" . $search_text . "%'");
            $result = array_merge($result1, $result2);
            return response()->json([
                'status'     => 'success',
                'data'   => $result
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'     => 'failure',
                'message'   => 'Problem Fetching Latest Updates...Error:' . $e->getMessage()
            ], 400);
        }
    }
}
