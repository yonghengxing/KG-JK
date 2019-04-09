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
            ->orWhere("endlabel",'like','%'.$text.'%')->get();
        return $relations;

    }
    
    function deleteAutoRelation(){
        $ret = $this->model->where('isauto','1')->delete();

        return $ret;
    }
    function deleteRelationByName($databaseName){
        //删除数据源时自动删除相应的关系。
        $this->model->where('startlabel','$databaseName')->orWhere('endlabel','$databaseName')
            ->orWhere('startlabel','like',$databaseName.'_%')->orWhere('endlabel','like',$databaseName.'_%')->delete();

    }

}