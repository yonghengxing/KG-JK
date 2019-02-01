<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kg_datasrc extends Model{
    protected $table = 'datasrc';
    protected $primaryKey = 'rid';
    
    public $timestamps = true;
}