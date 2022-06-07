<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    public function sendResponse($result = [], $message):JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message
        ];

        if(!empty($result)){
            $response['data'] = $result;
        }
        return response()->json(
            $response, Response::HTTP_OK);
    }

    public function sendError($error, $errorMessages = [], $code = Response::HTTP_NOT_FOUND):JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
