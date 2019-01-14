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
        $relationTypes = $this->model->where("relationlabel",'like','%'.$text.'%')->get();
        return $relationTypes;

    }

}