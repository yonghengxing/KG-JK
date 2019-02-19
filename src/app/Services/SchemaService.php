<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/27
 * Time: 15:19
 */

namespace App\Services;


use App\Models\Schema;

class SchemaService extends BaseService
{
    function __construct(Schema $schema){
        $this->model = $schema;
    }

    function getSchemaBySearch($text){
        $schemas = $this->model->where("stype",'like','%'.$text.'%')->orWhere("property",'like','%'.$text.'%')->get();
        return $schemas;

    }

    function deleteAutoDatabase(){
        $ret = $this->model->where('isauto','1')->delete();

        return $ret;
    }
}
