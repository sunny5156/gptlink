<?php

namespace App\Http\Dto;

use App\Model\Withdraw;
use Aimilink\HyperfExt\Dto;
use Hyperf\Snowflake\IdGeneratorInterface;

/**
 * @property $price
 */
class WithdrawalDto extends Dto
{
    protected array $fillable = [
        'price', 'channel', 'config',
    ];

    public function toModel($userId): array
    {
        return [
            'serial_no' => make(IdGeneratorInterface::class)->generate(),
            'price' => $this->getItem('price'),
            'channel' => $this->getItem('channel'),
            'config' => $this->getItem('config', []),
            'status' => Withdraw::STATUS_PADDING,
            'user_id' => $userId,
        ];
    }
}
