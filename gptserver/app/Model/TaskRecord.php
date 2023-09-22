<?php

declare (strict_types=1);
namespace App\Model;

use App\Model\Repository\TaskRecordTrait;
use Carbon\Carbon;
use Aimilink\ModelLibrary\Hyperf\PageableTrait;
use Aimilink\ModelLibrary\Hyperf\SearchableTrait;
use Aimilink\ModelLibrary\Hyperf\WhenWithTrait;
use Hyperf\Database\Model\Events\Creating;
use Hyperf\DbConnection\Model\Model;
class TaskRecord extends Model
{
    use TaskRecordTrait, PageableTrait, SearchableTrait, WhenWithTrait;
    public const IS_READ_Y = 1;
    public const IS_READ_N = 2;
    public const IS_READ = [self::IS_READ_Y => '已读', self::IS_READ_N => '未读'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected ?string $table = 'task_record';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['task_id', 'user_id', 'type', 'package_name', 'expired_day', 'num', 'is_read'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];
    public function package()
    {
        return $this->hasOne(Package::class, 'id', 'package_id');
    }
    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'user_id');
    }
}