<?php
namespace App\Services;

use App\Models\Kg_db;

class DBService extends BaseService{
    function __construct(Kg_db $kg_db){
        $this->model = $kg_db;
    }
}