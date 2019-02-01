<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kg_db extends Model{
    protected $table = 'db';
    protected $primaryKey = 'dbId';
    
    public $timestamps = true;
}