<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/28
 * Time: 15:06
 */

namespace App\Services;

use App\Models\Entity;

class EntityService extends BaseService
{
    function __construct(Entity $entity){
        $this->model = $entity;
    }

    function getEntityBySearch($text){
        $entities = $this->model->where("showname",'like','%'.$text.'%')->orWhere("property",'like','%'.$text.'%')->get();
        return $entities;

    }

}