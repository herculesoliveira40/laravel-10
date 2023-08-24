<?php

namespace App\Services;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService
{

    public function __construct( protected SupportRepositoryInterface $repository) 
    {

    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null) 
    {
        return $this->repository->paginate(
            page: $page ,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );
    }

    public function findSupportAll(string $filter = null) : array
    {
        return $this->repository->findSupportAll($filter);
    }

    public function findSupportOne(int $id) : stdClass | null
    {
        return $this->repository->findSupportOne($id);
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