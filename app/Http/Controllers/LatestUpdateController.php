<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LatestUpdateController extends Controller
{
    public function index()
    {
        try {
            $result = DB::select("SELECT * FROM latestUpdates  WHERE status=1 and  NOW() between fromDate AND toDate");
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
    public function getLastUpdateDate()
    {
        try {
            $result = DB::select(
                "SELECT MAX(maxDate) as 'lastUpdatedDate' FROM 
                ( 
                    SELECT MAX(updated_at) as 'maxDate' FROM latestUpdates 
                    UNION SELECT MAX(updated_at) as 'maxDate' FROM impLinks 
                    UNION SELECT MAX(updated_at) as 'maxDate' FROM circular 
                    UNION SELECT MAX(updated_at) as 'maxDate' FROM board
                    UNION SELECT MAX(updated_at) as 'maxDate' FROM council
                    UNION SELECT MAX(updated_at) as 'maxDate' FROM homemenu
                    UNION SELECT MAX(updated_at) as 'maxDate' FROM msbte_officers
                    UNION SELECT MAX(updated_at) as 'maxDate' FROM slider
                ) my_tab;"
            );
            if ($result) {
                $date = $result[0]->lastUpdatedDate ? Carbon::createFromFormat('Y-m-d H:i:s', $result[0]->lastUpdatedDate, 'UTC')->getPreciseTimestamp(3) : '';
                return response()->json([
                    'status'     => 'success',
                    'message' => "Last updated date fetched successfully",
                    'data'   => $date
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