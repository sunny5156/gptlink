<?php

declare (strict_types=1);
namespace App\Model;

use App\Model\Repository\CdkGroupTrait;
use Aimilink\ModelLibrary\Hyperf\PageableTrait;
use Aimilink\ModelLibrary\Hyperf\SearchableTrait;
use Aimilink\ModelLibrary\Hyperf\WhenWithTrait;
use Hyperf\DbConnection\Model\Model;
class CdkGroup extends Model
{
    use CdkGroupTrait, SearchableTrait, WhenWithTrait, PageableTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected ?string $table = 'cdk_group';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['name', 'num', 'package_id', 'price', 'remark'];
    public function package()
    {
        return $this->hasOne(Package::class, 'id', 'package_id');
    }
}