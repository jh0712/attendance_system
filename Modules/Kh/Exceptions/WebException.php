<?php

namespace Modules\Kh\Exceptions;

class WebException extends GeneralException
{
    protected $exception    = '';
    protected $url          = '';
    protected $errorMessage = '';

    public function __construct(\Exception $exception)
    {
        parent::__construct('', 0, null);
        $this->exception = $exception;
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
        if (empty($this->url)) {
            abort(500);
        }

        return redirect($this->url)->with('error', $this->errorMessage);
    }

    public function redirectTo($url)
    {
        $this->url = $url;

        return $this;
    }

    public function withMessage($message)
    {
        $this->errorMessage = $message;

        return $this;
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
