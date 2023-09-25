<?php

namespace App\Http\Dto;

use App\Model\Task;
use Aimilink\Dto\Dto;
// use Aimilink\HyperfExt\Dto;

/**
 * @property int $user_id
 * @property int $task_id
 * @property string $type
 * @property string $package_name
 * @property string $expired_day
 * @property string $num
 */
class TaskRecordDto extends Dto
{
    protected array $fillable = [
        'user_id', 'task_id', 'type', 'package_name', 'expired_day', 'num'
    ];

    public function getFillableData(): array
    {
        return [
            'user_id' => $this->getItem('user_id'),
            'task_id' => $this->getItem('task_id'),
            'type' => $this->getItem('type'),
            'package_name' => $this->getItem('package_name'),
            'expired_day' => $this->getItem('expired_day'),
            'num' => $this->getItem('num'),
        ];
    }

}
