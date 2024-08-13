<?php

namespace App\Services;

interface BasicRequestServiceInterface
{
    public function getAll(): array;
    public function getById($id): object;
    public function create($data): void;
    public function update($id, $data): void;
    public function delete($id): void;
}
