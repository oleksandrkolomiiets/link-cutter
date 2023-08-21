<?php

namespace App\Services\Contracts;

interface LinkServiceInterface
{
    public function visit(string $uuid): string;
}
