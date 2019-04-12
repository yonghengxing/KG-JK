<?php

namespace App\Services;


use App\Models\Status;

class StatusService extends BaseService
{
    function __construct(Status $status){
        $this->model = $status;
    }

    function datasrcStatusActive(){
        $this->model->datasrc_status = 1;
        $this->model->save();
    }
    
    function datasrcStatusDone(){
        $this->model->datasrc_status = 0;
        $this->model->save();
    }
    
    
    function datasrcStatusShow()
    {
        $status = $this->model->orderBy('id','desc')->first()->datasrc_status;
        return $status;
    }
    
    function schemaStatusActive(){
        $this->model->schema_status = 1;
        $this->model->save();
    }
    
    function schemaStatusDone(){
        $this->model->schema_status = 0;
        $this->model->save();
    }
   
    function schemaStatusShow()
    {
        $status = $this->model->orderBy('id','desc')->first()->schema_status;
        return $status;
    }
    
    
    function modelStatusActive(){
        $this->model->model_status = 1;
        $this->model->save();
    }
    
    function modelStatusDone(){
        $this->model->model_status = 0;
        $this->model->save();
    }
    
    function modelStatusShow()
    {
        $status = $this->model->orderBy('id','desc')->first()->model_status;
        return $status;
    }
}