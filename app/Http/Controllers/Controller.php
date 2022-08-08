<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function apiResponse($status, $content = null)
    {
        $response = [];

        if (isset($content)) {
            $response['content'] = $content;
        }

        if ($status === 200) {
            $response['description'] = 'Successful operation';
        }

        if (empty($response)) {
            $response = null;
        }

        return response()->json($response, $status, [], JSON_PRETTY_PRINT);
    }
}
