<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2019/1/22
 * Time: 15:38
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ParameterJson extends Model
{
    protected $table = 'json';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;      //10_30，开启时间戳

    /**
     * define a $primaryKey property to override this convention.
     * the primary key is an incrementing integer value
     *
     * @var int
     */
    protected $primaryKey = 'aid';

}