<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $ex
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $ex)
    {
        parent::report($ex);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param Exception $ex
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $ex)
    {
        if($ex instanceof NotFoundHttpException) {
            return response()->view('errors.404', ['ex' => $ex], 404);
        }

        if($ex instanceof ServiceUnavailableHttpException) {
            return response()->view('errors.503', ['ex' => $ex], 503);
        }

        return parent::render($request, $ex);
    }
}
