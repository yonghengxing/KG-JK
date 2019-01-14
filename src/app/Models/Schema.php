<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/27
 * Time: 15:18
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Schema extends Model
{
    protected $table = 'schema';

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
    protected $primaryKey = 'sid';

}