<?php
namespace App\Interfaces;

use Exception;

interface ResponseRepositoryInterface {
    public function error_response(Exception $e, array $errors = [], $error_code = 500);
}