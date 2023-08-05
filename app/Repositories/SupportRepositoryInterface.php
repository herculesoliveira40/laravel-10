<?php 

namespace App\Repositories;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
// use App\DTO\;
use stdClass;

interface SupportRepositoryInterface
{
    public function getSupportAll(string $filter = null) : array;
    public function getSupportOne(int $id) : stdClass | null;
    public function delete(int $id) : void;
    public function new(CreateSupportDTO $dto) : stdClass;
    public function update(UpdateSupportDTO $dto) : stdClass | null;
}
