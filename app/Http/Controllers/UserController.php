<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User_Tracker;
use Exception;

class UserController extends Controller
{
    public function getUserVisitCount()
    {
        try {

            $res = User_Tracker::count();

            return response()->json([
                'status' => 'success',
                'message' => 'Visitor Count fetched successfully',
                'data' => $res
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failure',
                'message' => $e->getMessage(),
                'data' => ''
            ], 500);
        }
    }
    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip();
    }


    public function saveVisitorCount(Request $request)
    {

        $ip = $this->getIp();
        $res = User_Tracker::select('id', 'ip', 'count')->where('ip', $ip)->first();
        if ($res && $res->id) {
            $res->count = $res->count + 1;
            $res->save();
        } else {

            User_Tracker::create(['ip' => $ip, 'count' => 1]);
        }

        return response()->json([
            'status'     => 'success',
            'message'   => 'Counter Save Successfully'
        ], 200);
    }
}
