<?php
namespace App\Services;

use App\Models\Kg_datasrc;

class DBSrcService extends BaseService{
    function __construct(Kg_datasrc $kg_datasrc){
        $this->model = $kg_datasrc;
    }

    function getDBSrcBySearch($text){
        $dbsrc = $this->model->where("dataSource",'like','%'.$text.'%')->get();
        return $dbsrc;
    }

}