<?php

declare (strict_types=1);
namespace App\Model;

use App\Model\Repository\MemberOauthTrait;
use App\Model\Repository\OrderTrait;
use Aimilink\ModelLibrary\Hyperf\PageableTrait;
use Aimilink\ModelLibrary\Hyperf\SearchableTrait;
use Hyperf\DbConnection\Model\Model;
class MemberOauth extends Model
{
    use MemberOauthTrait, SearchableTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected ?string $table = 'member_oauth';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['member_id', 'platform', 'openid', 'unionid', 'nickname', 'avatar', 'appid'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}