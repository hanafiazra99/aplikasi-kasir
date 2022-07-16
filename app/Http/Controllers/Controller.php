<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function responseAlert($data,$success,$message = '')
    {
        $return_status = (($success) ? 'Valid' : 'Tidak Valid');

        $return = array('id' => $data, 'status' => $return_status, 'message' => $message);
        return response()->json($return);
    }
}
