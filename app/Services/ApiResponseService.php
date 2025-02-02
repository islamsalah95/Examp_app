<?php

namespace App\Services;

class ApiResponseService
{
    /**
     * Return a success response.
     *
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data = null, string $message = 'Success', int $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * Return an error response.
     *
     * @param string $message
     * @param int $statusCode
     * @param mixed $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(string $message = 'Error', int $statusCode = 400, $errors = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $statusCode);
    }

    /**
     * Return a validation error response.
     *
     * @param mixed $errors
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function validationError($errors, string $message = 'Validation Error')
    {
        return $this->error($message, 422, $errors);
    }

    /**
     * Return a not found response.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFound(string $message = 'Resource Not Found')
    {
        return $this->error($message, 404);
    }

    /**
     * Return an unauthorized response.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function unauthorized(string $message = 'Unauthorized')
    {
        return $this->error($message, 401);
    }

    /**
     * Return a forbidden response.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbidden(string $message = 'Forbidden')
    {
        return $this->error($message, 403);
    }

    /**
     * Return a server error response.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function serverError(string $message = 'Internal Server Error')
    {
        return $this->error($message, 500);
    }
}