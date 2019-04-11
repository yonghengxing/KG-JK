<?php
namespace App\Services;

use App\Models\Kg_datasrc;

class DBSrcService extends BaseService{
    function __construct(Kg_datasrc $kg_datasrc){
        $this->model = $kg_datasrc;
    }

    function getDBSrcBySearch($text){
        $dbsrc = $this->model->where("dataSource",'like','%'.$text.'%')->orWhere("dbname",'like','%'.$text.'%')
            ->orWhere("updated_at",'like','%'.$text.'%')->orWhere("created_at",'like','%'.$text.'%')
            ->orWhere("dbname_real",'like','%'.$text.'%')->get();
        return $dbsrc;
    }

}