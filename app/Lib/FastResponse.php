<?php

namespace App\Lib;

use Illuminate\Http\JsonResponse;
use InfyOm\Generator\Utils\ResponseUtil;

class FastResponse
{

    /**
     * @param $data
     * @param string $message
     * @return JsonResponse
     */
    public static function success($data, string $message = "成功"): JsonResponse
    {
        return response()->json(self::buildSuccess($data, $message));
    }

    /**
     * @param $data
     * @param $message
     * @return array
     */
    public static function buildSuccess($data, $message): array
    {
        return [
            "success" => true,
            "message" => $message,
            "data" => $data
        ];
    }

    /**
     * @param $message
     * @param $code
     * @return array
     */
    public static function buildError($message, $code): array
    {
        return [
            "success" => false,
            "message" => $message,
            "code" => $code
        ];
    }

    /**
     * @param string $msg
     * @param int $code
     * @param int $httpCode
     * @return JsonResponse
     */
    public static function error(string $msg = "处理失败", int $code = 1, int $httpCode = 400): JsonResponse
    {
        return response()->json(self::buildError($msg, $code), $httpCode);
    }


    /**
     * @return JsonResponse
     */
    public static function forbidden(): JsonResponse
    {
        return response()->json(self::buildError("禁止该操作", 403), 403);
    }
}
