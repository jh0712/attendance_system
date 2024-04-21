<?php

namespace Modules\Kh\Response;

use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    /**
     * The exception thrown.
     *
     * @var \Throwable
     */
    protected $exception;

    /**
     * status code
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @param $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * Gets the value of statusCode.
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondSuccess($message, $data = [])
    {
        return $this->respond(
            ['data' => (object) $data, 'meta' => [
                'message' => $message
            ]
            ]
        );
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondErrors($message, $errors = [])
    {
        $response = Response::HTTP_BAD_REQUEST;

        return $this->setStatusCode($response)->respond(
            ['data' => (object) $errors, 'meta' => [
                'message' => $message
            ]
            ]
        );
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = '', $errors = [])
    {
        $response = Response::HTTP_NOT_FOUND;

        !$message ? $message = Response::$statusTexts[$response] : null;

        return $this->setStatusCode($response)->respond(
            ['data' => (object) $errors, 'meta' => [
                'message' => $message
            ]
            ]
        );
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnprocessableEntity($message = '', $errors = [])
    {
        $response = Response::HTTP_UNPROCESSABLE_ENTITY;

        !$message ? $message = Response::$statusTexts[$response] : null;

        return $this->setStatusCode($response)->respond(
            ['data' => (object) $errors, 'meta' => [
                'message' => $message
            ]
            ]
        );
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnauthorized($message = '', $errors = [])
    {
        $response = Response::HTTP_UNAUTHORIZED;

        return $this->setStatusCode($response)->respond(
            ['data' => (object) $errors, 'meta' => [
                'message' => $message
            ]
            ]
        );
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondForbidden($message = '', $errors = [])
    {
        $response = Response::HTTP_FORBIDDEN;

        return $this->setStatusCode($response)->respond(
            ['data' => (object) $errors, 'meta' => [
                'message' => $message
            ]
            ]
        );
    }

    /**
     * Sets the value of statusCode.
     *
     * @param int $statusCode the status code
     *
     * @return self
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }
}
