<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Article
 * @package App\Domains\Article\Models
 */
class Service extends Model
{
//    use SoftDeletes;

    public const STATUS_ENABLED = 'enabled';
    public const STATUS_DISABLED = 'disabled';
    /**
     * @var string[]
     */
    protected $fillable = [
        'code_type',
        'name',
        'price',
        'number_of_price',
    ];

    /**
     * @var string[]
     */
    protected $dates = [];


    /**
     * @return mixed
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getNameCodeType()
    {
        return ucfirst(str_replace('_', ' ', $this->code_type));
    }
}
