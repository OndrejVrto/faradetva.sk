<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register() {
        $this->reportable(function (Throwable $e) {
            Log::channel('slack')->error($e->getMessage(),[
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'code' => $e->getCode(),
            ]);
        });
    }

    /**
     * Report or log an exception.
     */
    public function report(Throwable $e)
    {
        // Some exceptions don't have a message
        $exception_message = (!empty($e->getMessage()) ? trim($e->getMessage()) : 'App Error Exception');
        // Log message
        $log_message = '['.$e->getCode().'] "'.$exception_message.'" on line ['.$e->getLine().'] of file "'.$e->getFile().'"';

        if (!config('app.debug')) {
            Log::error($log_message);
        } else {
            parent::report($e);
        }
    }
}
