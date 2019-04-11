<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/28
 * Time: 17:00
 */

namespace App\Services;


use App\Models\Relation;

class RelationService extends BaseService
{
    function __construct(Relation $relation){
        $this->model = $relation;
    }

    function getRelationBySearch($text){
        $relations = $this->model->where("typelabel",'like','%'.$text.'%')->orWhere("startlabel",'like','%'.$text.'%')
            ->orWhere("endlabel",'like','%'.$text.'%')->orWhere("createname",'like','%'.$text.'%')
            ->orWhere("updated_at",'like','%'.$text.'%')->orWhere("created_at",'like','%'.$text.'%')
            ->orWhere("updatename",'like','%'.$text.'%')->get();
        return $relations;


    }
    
    function deleteAutoRelation(){
        $ret = $this->model->where('isauto','1')->delete();

        return $ret;
    }
    function deleteRelationByName($databaseName){
        //????????????????
        $this->model->where('startlabel','$databaseName')->orWhere('endlabel','$databaseName')
            ->orWhere('startlabel','like',$databaseName.'_%')->orWhere('endlabel','like',$databaseName.'_%')->delete();

    }

}