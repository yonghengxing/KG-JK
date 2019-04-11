<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2019/1/4
 * Time: 14:25
 */

namespace App\Services;


use App\Models\RelationType;

class RelationTypeService extends BaseService
{
    function __construct(RelationType $relationType){
        $this->model = $relationType;
    }

    function getRelationTypeBySearch($text){
        $relationTypes = $this->model->where("rlabel",'like','%'.$text.'%')
            ->orWhere("updated_at",'like','%'.$text.'%')->orWhere("created_at",'like','%'.$text.'%')
            ->orWhere("rname",'like','%'.$text.'%')->orWhere("createname",'like','%'.$text.'%')
            ->orWhere("updatename",'like','%'.$text.'%')->get();
        return $relationTypes;

    }

}