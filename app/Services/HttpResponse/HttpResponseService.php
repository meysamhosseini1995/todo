<?php

namespace App\Services\HttpResponse;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HttpResponseService
{
    public function success(mixed $result, string $message = null, int $code = Response::HTTP_OK): JsonResponse
    {
        return new JsonResponse([
            'status'  => 'Success',
            'message' => $message ?? __("Processing was done successfully"),
            'data'    => $result,
        ], $code);
    }

    public function error(array $errors = [], string $message = null, int $code = Response::HTTP_UNPROCESSABLE_ENTITY): JsonResponse
    {
        return new JsonResponse([
            'status'  => 'Error',
            'message' => $message ?? __("Your data is not validated correctly"),
            'errors'  => $errors,
        ], $code);
    }

    public function unAuthorized(): JsonResponse
    {
        return new JsonResponse([
            "status"  => "unAuthorized",
            "message" => __("Your authentication is invalid"),
            'errors'  => [
                'user' => [__('Credentials not match')]
            ],
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function accessDenied(): JsonResponse
    {
        return new JsonResponse([
            'status'   => "accessDenied",
            'messages' => __("You do not have access to this section"),
        ], Response::HTTP_FORBIDDEN);
    }

    public function notFound(): JsonResponse
    {
        return new JsonResponse([
            'status'   => 'notFound',
            'messages' => __("The result of your request was not found"),
        ], Response::HTTP_NOT_FOUND);
    }
}
