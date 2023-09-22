<?php

namespace App\Http\Dto;

use Aimilink\HyperfExt\Dto;

/**
 * @property string $parent_code 父级 code
 * @property int $member_id 会员 id
 */
class UserRegisterTaskDto extends Dto
{
    protected array $fillable = [
        'parent_code', 'member_id'
    ];


}
