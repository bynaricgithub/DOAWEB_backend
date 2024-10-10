<?php

namespace App\Http\Controllers;

use App\Models\LatestUpdate;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LatestUpdateController extends Controller
{
    public function news()
    {
        try {
            $result = News::get();
            if ($result) {
                return response()->json([
                    'status'     => 'success',
                    'data'   => en($result)
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'     => 'failure',
                'message'   => 'Problem Fetching news ...Error:' . $e->getMessage()
            ], 400);
        }
    }



    public function index()
    {
        try {
            $result = LatestUpdate::where('status', 1)->where('fromDate', '<=', Carbon::now())->where('toDate', '>=', Carbon::now())->get();
            if ($result) {
                return response()->json([
                    'status'     => 'success',
                    'data'   => en($result)
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
                    'status' => 'success',
                    'message' => "Last updated date fetched successfully",
                    'data' => en($date),
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
