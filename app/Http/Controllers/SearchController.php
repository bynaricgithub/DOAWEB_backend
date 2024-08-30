<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function index(Request $request)
	{
		try {
			$search_text = $request['query'];
			$result1 = DB::select("SELECT * FROM latestUpdates WHERE status=1 AND heading LIKE '%" . $search_text . "%'");
			$result2 = DB::select("SELECT * FROM circular WHERE status=1 AND heading LIKE '%" . $search_text . "%'");
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
