<?php

namespace App\Http\Controllers;

use App\Services\BasicRequestServiceInterface;
use Illuminate\Database\Eloquent\Model;

abstract class Controller
{
    protected Model $model;
//    protected BasicRequestServiceInterface $service;
//
//    public function __construct(BasicRequestServiceInterface $service)
//    {
//        $this->service = $service;
//    }

//    abstract public function getAll();
//    abstract public function getById($id);
//    abstract public function create();
//    abstract public function update($id);
//    abstract public function delete($id);

}
