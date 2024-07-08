<?php

use App\Exceptions\Auth\UserNotAuthenticatedException;
use App\Exceptions\Common\MethodNotAllowedException;
use App\Exceptions\Common\RouteNotFoundException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        apiPrefix: '',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->authenticateSessions();
        $middleware->statefulApi();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->map(AuthenticationException::class, function (AuthenticationException $exception) {
        //     throw new UserNotAuthenticatedException();
        // });

        // $exceptions->map(NotFoundHttpException::class, function (NotFoundHttpException $exception) {
        //     throw new RouteNotFoundException();
        // });

        // $exceptions->map(MethodNotAllowedHttpException::class, function (MethodNotAllowedHttpException $exception) {
        //     throw new MethodNotAllowedException();
        // });
    })->create();
