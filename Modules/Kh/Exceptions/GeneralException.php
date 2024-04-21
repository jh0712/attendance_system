<?php

namespace Modules\Kh\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class GeneralException extends Exception
{
    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @return void
     */
    public function report()
    {
        $exception = isset($this->exception->exception)? $this->exception->exception:$this->exception;
        $this->sendEmail($exception);
        // Log::error($exception);
    }

    /**
     * Send email to developer group
     * @param \Exception $e
     */
    private function sendEmail(Exception $exception)
    {
        $user = null;
        //@todo Find a better way to do this
        if (Schema::hasTable('users')) {
            $user = auth()->guard('api')->user()? auth()->guard('api')->user(): auth()->user();
        }

        $request = request();
        $path    = $request->path();
        $input   = $request->all();

        $config = config('blackwell.exception');
        if ($config['to']['address']) {
            // $data = [
            //     'error'   => $exception,
            //     'path'    => $path,
            //     'user_id' => $user ? $user->id : null,
            //     'input'   => $input
            // ];
            $user_id = $user ? $user->id : null;
            Log::error('path : ' . $path . PHP_EOL . 'user_id : ' . $user_id . PHP_EOL . 'error :' . $exception);

            // Mail::send('blackwell::mail.exception', $data, function ($message) use ($config) {
            //     $email = explode(',', $config['to']['address']);
            //     $subject = str_replace(':env', strtoupper(config('app.env')), $config['subject']);
            //     $message->from($config['from']['email'], $config['from']['name'])
            //         ->to($email)
            //         ->subject($subject);
            // });
        }
    }
}
