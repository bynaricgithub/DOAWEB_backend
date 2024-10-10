<?php

namespace App\Http\Controllers;

use App\Models\HomeMenu;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomemenuController extends Controller
{
    public function index()
    {
        try {
            $result = HomeMenu::where('status', 1)->get();
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
