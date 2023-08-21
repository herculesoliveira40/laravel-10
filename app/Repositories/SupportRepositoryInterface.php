<?php 

namespace App\Repositories;

use App\DTO\Supports\{CreateSupportDTO, UpdateSupportDTO};
// use App\DTO\Supports\;
use stdClass;

interface SupportRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null) : PaginationInterface;
    public function getSupportAll(string $filter = null) : array;
    public function getSupportOne(int $id) : stdClass | null;
    public function delete(int $id) : void;
    public function new(CreateSupportDTO $dto) : stdClass;
    public function update(UpdateSupportDTO $dto) : stdClass | null;
}
