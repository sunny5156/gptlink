<?php

declare (strict_types=1);
namespace App\Model;

use App\Model\Repository\MemberTrait;
use Aimilink\ModelLibrary\Hyperf\PageableTrait;
use Aimilink\ModelLibrary\Hyperf\SearchableTrait;
use Hyperf\DbConnection\Model\Model;
use Qbhy\HyperfAuth\AuthAbility;
use Qbhy\HyperfAuth\Authenticatable;
class Member extends Model implements Authenticatable
{
    use AuthAbility, SearchableTrait, PageableTrait, MemberTrait;
    const ACCOUNT_USERNAME = 1;
    const ACCOUNT_MOBILE = 2;
    const ACCOUNT_EMAIL = 3;
    const ACCOUNT_TYPE = [self::ACCOUNT_USERNAME => '用户名账号', self::ACCOUNT_MOBILE => '手机号账号', self::ACCOUNT_EMAIL => '邮件账号'];
    const IDENTITY_MEMBER = 1;
    const IDENTITY_SALESMAN = 2;
    const IDENTITY = [self::IDENTITY_MEMBER => '用户', self::IDENTITY_SALESMAN => '分销员'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected ?string $table = 'member';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['nickname', 'avatar', 'mobile', 'password', 'code', 'status', 'platform', 'source', 'account_type', 'parent_openid', 'balance', 'identity', 'ratio'];
    const PLATFORM_GPT = 1;
    const PLATFORM = [self::PLATFORM_GPT => 'system'];
    public const STATUS_NORMAL = 1;
    public const STATUS_DISABLE = 2;
    public const STATUS = [self::STATUS_NORMAL => '正常', self::STATUS_DISABLE => '禁用'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];
    /**
     * 订单
     *
     * @return \Hyperf\Database\Model\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
    /**
     * @return \Hyperf\Database\Model\Relations\HasMany
     */
    public function oauth()
    {
        return $this->hasMany(MemberOauth::class, 'member_id', 'id');
    }
    /**
     * @return \Hyperf\Database\Model\Relations\HasMany
     */
    public function customSalesmanOrder()
    {
        return $this->hasMany(SalesmanOrder::class, 'custom_id', 'id');
    }
}