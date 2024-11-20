<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller

{
    /**
     * success response method.
     *
     * @return JsonResponse
     */
    public function sendResponse($result, $message): JsonResponse // Cambiado a JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 404): JsonResponse // Cambiado a JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}