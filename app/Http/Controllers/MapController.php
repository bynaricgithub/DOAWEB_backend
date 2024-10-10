<?php

namespace App\Http\Controllers;

use App\Models\LatLongSourceList;
use App\Models\Map;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MapController extends Controller
{
    public function index()
    {
        try {
            $result = LatLongSourceList::get();
            $result = Map::get();
            if ($result) {
                return response()->json([
                    'status'     => 'success',
                    'data' => en($result),
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'     => 'failure',
                'message'   => 'Problem Fetching Map...Error:' . $e->getMessage()
            ], 400);
        }
    }
}
