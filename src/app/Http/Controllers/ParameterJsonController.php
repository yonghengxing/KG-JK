<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2019/1/22
 * Time: 15:41
 */

namespace App\Http\Controllers;

use App\Services\EntityService;
use App\Services\ParameterJsonService;
use App\Services\RelationTypeService;
use App\Services\SchemaService;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Relation;
use App\Services\RelationService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ParameterJsonController extends BaseController
{
    function __construct(ParameterJsonService $parameterJsonService)
    {
        $this->parameterJsonService = $parameterJsonService;

    }



}