<?php

namespace App\Repositories;

use App\Interfaces\ResponseRepositoryInterface;
use Exception;

class ResponseRepository implements ResponseRepositoryInterface {
    public function error_response(Exception $e, array $errors = [], $error_code = 500) {
        if (count($errors) > 0) return response()->json(['message' => $e->getMessage(), 'errors' => $errors], $error_code);
        return response()->json(['message' => $e->getMessage()], $error_code);
    }
}