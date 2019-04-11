<?php
namespace App\Services;

use App\Models\Kg_db;

class DBService extends BaseService{
    function __construct(Kg_db $kg_db){
        $this->model = $kg_db;
    }

    function getDBBySearch($text){
        $db = $this->model->where("name",'like','%'.$text.'%')->orWhere("dbname",'like','%'.$text.'%')
            ->orWhere("created_at",'like','%'.$text.'%')->orWhere("updated_at",'like','%'.$text.'%')
            ->orWhere("IP",'like','%'.$text.'%')->orWhere("createdname",'like','%'.$text.'%')
            ->orWhere("updatename",'like','%'.$text.'%')->get();

        return $db;
    }

}