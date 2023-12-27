<?php

namespace App\Models;

use App\Casts\dateCast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    /**
     * @var int|mixed|string|null
     */

    protected $fillable = ['user_id','todo_body','is_completed'];


    protected $casts = [
        'is_completed' => 'boolean',
        'created_at' => dateCast::class,
        'updated_at' => dateCast::class,
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
