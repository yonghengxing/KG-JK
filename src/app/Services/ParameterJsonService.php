<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2019/1/22
 * Time: 15:40
 */

namespace App\Services;


use App\Models\ParameterJson;

class ParameterJsonService extends BaseService
{
    function __construct(ParameterJson $parameterJson){
        $this->model = $parameterJson;
    }



}