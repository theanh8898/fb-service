<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Article
 * @package App\Domains\Article\Models
 */
class Order extends Model
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_DOING = 'doing';
    public const STATUS_DONE = 'done';

    /**
     * @var string[]
     */
    protected $fillable = [
        'link',
        'number_up',
        'content',
        'note',
        'service_id',
        'status',
        'user_id',
        'amount'
    ];

    /**
     * @var string[]
     */
    protected $dates = [];

    /**
     * @return mixed
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
