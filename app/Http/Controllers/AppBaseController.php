<?php

namespace App\Http\Controllers;

use App\Lib\FastResponse;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Server(url="/api")
 * @OA\Info(
 *   title="InfyOm Laravel Generator APIs",
 *   version="1.0.0"
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{

    /**
     * @param $result
     * @param string $message
     * @return JsonResponse
     */
    public function sendResponse($result, string $message = "成功"): \Illuminate\Http\JsonResponse
    {
        return FastResponse::success($result, $message);
    }

    /**
     * @param string $error
     * @param int $httpCode
     * @param int $code
     * @return JsonResponse
     */
    public function sendError(string $error, int $httpCode = 400, int $code = 400): \Illuminate\Http\JsonResponse
    {

        return FastResponse::error($error, $code, $httpCode);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function sendSuccess(string$message = '成功'): \Illuminate\Http\JsonResponse
    {
        return FastResponse::success([], $message);
    }
}
