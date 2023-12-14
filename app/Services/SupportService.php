<?php

namespace App\Services;

use stdClass;

class SupportService{

    protected $repository;

    public function __construct(){

    }

    public function getAll(string $filter=null):array{
        return $this->repository->getAll($filter);
    }
    public function findOne(string $id):stdClass|null{
        return $this->repository->findOne($id);
    }

    public function delete($id):void{
        $this->repository->delete($id);
    }

    public function new(string $subsject,string $status,string $body):stdClass{
        return $this->repository->new($subsject, $status, $body);
    }

    public function update(string $id,string $subsject,string $status,string $body):stdClass|null{
        return $this->repository->update($id,$subsject, $status, $body);
    }


}
