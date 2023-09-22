<?php

declare (strict_types=1);
namespace App\Model;

use App\Model\Repository\MemberPackageRecordTrait;
use Aimilink\ModelLibrary\Hyperf\PageableTrait;
use Aimilink\ModelLibrary\Hyperf\SearchableTrait;
use Aimilink\ModelLibrary\Hyperf\WhenWithTrait;
use Hyperf\DbConnection\Model\Model;
/**
 */
class MemberPackageRecord extends Model
{
    use MemberPackageRecordTrait, PageableTrait, SearchableTrait, WhenWithTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected ?string $table = 'member_package_record';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['user_id', 'package_id', 'package_name', 'identity', 'channel', 'type', 'code', 'expired_day', 'num'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];
    public bool $timestamps = false;
    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'user_id');
    }
}