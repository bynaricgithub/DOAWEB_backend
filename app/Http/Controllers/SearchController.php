<?php

namespace App\Http\Controllers;

use App\Models\Circular;
use App\Models\ImpLinks;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search_text = de($request->search_text);

            $result1 = ImpLinks::where('status', 1)
                ->where('fromDate', '<=', Carbon::now())
                ->where('toDate', '>=', Carbon::now())
                ->where('heading', 'like', '%' . $search_text . '%')
                ->get();

            $result2 = Circular::where('status', 1)
                ->where('fromDate', '<=', Carbon::now())
                ->where('toDate', '>=', Carbon::now())
                ->where('heading', 'like', '%' . $search_text . '%')
                ->get();

            $result = $result1->merge($result2);

            return response()->json([
                'status' => 'success',
                'data' => en($result),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'     => 'failure',
                'message'   => 'Problem Fetching Latest Updates...Error:' . $e->getMessage()
            ], 400);
        }
    }
}
