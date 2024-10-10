<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BoardController extends Controller
{
    public function index()
    {
        try {
            $result = Board::where('status', 1)->get();
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
