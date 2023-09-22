<?php

declare (strict_types=1);
namespace App\Model;

use App\Model\Repository\ChatGptModelCountTrait;
use Hyperf\DbConnection\Model\Model;
class ChatGptModelCount extends Model
{
    use ChatGptModelCountTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected ?string $table = 'chat_gpt_model_count';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['chat_gpt_model_id', 'likes', 'uses'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];
    protected string $keyType = 'string';
    protected string $primaryKey = 'chat_gpt_model_id';
    public bool $incrementing = false;
    public bool $timestamps = false;
    public const USER_MODEL_CACHE_COUNT = 'user_chat_model_count';
    public const USER_MODEL_CACHE_COUNT_TTL = 72;
    /**
     * @return \Hyperf\Database\Model\Relations\HasOne
     */
    public function chatGptModel()
    {
        return $this->hasOne(ChatGptModel::class, 'id', 'chat_gpt_model_id');
    }
}