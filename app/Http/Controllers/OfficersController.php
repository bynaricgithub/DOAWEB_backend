<?php

namespace App\Http\Controllers;

use App\Models\MsbteOfficer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OfficersController extends Controller
{
    public function index()
    {
        try {
            $result = MsbteOfficer::where('status', 1)->get();
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
