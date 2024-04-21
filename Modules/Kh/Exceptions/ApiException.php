<?php

namespace Modules\Kh\Exceptions;

use Modules\Kh\Response\ApiResponse;

class ApiException extends GeneralException
{
    use ApiResponse;

    protected $message;

    public function __construct(\Exception $exception, $message = '')
    {
        parent::__construct($message, 0, null);
        $this->exception = $exception;
        $this->message   = empty($message)? __('s_validation.oops something went wrong'):$message;
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return $this->respondErrors($this->message);
    }

    /**
     * Get the laravel exception
     *
     * @return  Exception
     */
    public function getException()
    {
        return $this->exception;
    }
}
