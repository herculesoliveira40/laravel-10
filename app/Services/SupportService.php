<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService
{

    public function __construct( protected SupportRepositoryInterface $repository) 
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

    public function New(CreateSupportDTO $dto) : stdClass
    {
        return $this->repository->New($dto);
    }

    public function delete(int $id) 
    {
        $this->repository->delete($id);
    }

    public function update(UpdateSupportDTO $dto) : stdClass | null
    {
        return $this->repository->update($dto);
    }

}