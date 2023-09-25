<?php

namespace App\Http\Dto;

use App\Model\Task;
use Aimilink\Dto\Dto;
use Hyperf\Validation\Rule;
// use Aimilink\HyperfExt\Dto;
/**
 * @property int $user_id
 * @property string $icon
 * @property string $name
 * @property string $prompt
 * @property string $system
 * @property string $status
 * @property string $sort
 */
class TaskDto extends Dto
{
    protected array $fillable = [
        'type', 'title', 'desc', 'platform', 'share_image', 'rule', 'package_id'
    ];

    public function getFillableData(): array
    {
        return [
            'title' => $this->getItem('title'),
            'desc' => $this->getItem('desc'),
            'platform' => 'h5,pc',
            'share_image' => $this->getItem('share_image'),
            'rule' => Task::RULE[$this->getItem('type')],
            'package_id' => $this->getItem('package_id'),
        ];
    }

    public function whereByType(): array
    {
        return [
            'type' => $this->getItem('type'),
        ];
    }

}
