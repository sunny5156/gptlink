<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 */
class ConsumeChat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected ?string $table = 'cunsume_chat';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['user_id', 'prompt', 'prompt_tokens', 'completion_tokens', 'total_tokens', 'created_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];
    public bool $timestamps = false;
}