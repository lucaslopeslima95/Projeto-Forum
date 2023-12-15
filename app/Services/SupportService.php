<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService{

    public function __construct(
        protected SupportRepositoryInterface $repository
    ){}

    public function getAll(string $filter=null):array{
        return $this->repository->getAll($filter);
    }
    public function paginate(
        int $page = 1,
        int $totalPerpage = 15,
         string $filter=null
    ){
        return $this->repository->paginate(
            page:$page,
            totalPerpage:$totalPerpage,
            filter:$filter
            );
    }
    public function findOne(string $id):stdClass|null{
        return $this->repository->findOne($id);
    }

    public function delete($id):void{
        $this->repository->delete($id);
    }

    public function new(CreateSupportDTO $supportDto):stdClass{
        return $this->repository->new($supportDto);
    }

    public function update(UpdateSupportDTO $dto):stdClass|null{
        return $this->repository->update($dto);
    }


}
