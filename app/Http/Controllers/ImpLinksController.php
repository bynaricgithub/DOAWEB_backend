<?php

namespace App\Http\Controllers;

use App\Models\ImpLinks;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ImpLinksController extends Controller
{
    public function index()
    {
        try {
            $result = ImpLinks::where('status', 1)
                ->whereDate('fromDate', '<=', Carbon::now())
                ->whereDate('toDate', '>=', Carbon::now())
                ->get();
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
}
