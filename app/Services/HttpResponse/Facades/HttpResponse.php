<?php

namespace App\Services\HttpResponse\Facades;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method static JsonResponse success(mixed $result, string $message = "", int $code = Response::HTTP_OK)
 * @method static JsonResponse error(array $errors = [], string $message = "", int $code = Response::HTTP_UNPROCESSABLE_ENTITY)
 * @method static JsonResponse unAuthorized()
 * @method static JsonResponse accessDenied()
 * @method static JsonResponse notFound()
 */
class HttpResponse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'http-response';
    }
}
