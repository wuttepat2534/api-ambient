<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ExceptionRender
{
    /**
     * Render the exception into an HTTP response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'error' =>  class_basename($this),
            'message' => $this->message
        ], $this->code);
    }
}
