<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2019/1/4
 * Time: 14:24
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RelationType extends Model
{
    protected $table = 'relationtype';

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
    protected $primaryKey = 'tid';

}