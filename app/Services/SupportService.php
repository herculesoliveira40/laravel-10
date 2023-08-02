<?php

namespace App\Services;

use stdClass;

class SupportService
{
    protected $repository;

    public function __construct() 
    {

    }

    public function getSupportAll(string $filter = null) : array
    {
        return $this->repository->getSupportAll($filter);
    }

    public function getSupportOne(int $id) : stdClass | null
    {
        return $this->repository->getSupportOne($id);
    }

    public function New(string $subject, string $status, string $body) : stdClass
    {
        return $this->repository->New($subject, $status, $body);
    }

    public function delete(int $id) 
    {
        $this->repository->delete($id);
    }

    public function update(int $id, string $subject, string $status, string $body) : stdClass
    {
        return $this->repository->update($id, $subject, $status, $body);
    }

}