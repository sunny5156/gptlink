<?php

declare (strict_types=1);
namespace App\Model;

use App\Model\Repository\ChatGptModelTrait;
use Aimilink\ModelLibrary\Hyperf\PageableTrait;
use Aimilink\ModelLibrary\Hyperf\SearchableTrait;
use Aimilink\ModelLibrary\Hyperf\WhenWithTrait;
use Hyperf\Database\Model\Events\Creating;
use Hyperf\DbConnection\Model\Model;
use Hyperf\Snowflake\IdGeneratorInterface;
use Hyperf\Utils\ApplicationContext;
class ChatGptModel extends Model
{
    use ChatGptModelTrait, PageableTrait, SearchableTrait, WhenWithTrait;
    const STATUS_ON = 1;
    const STATUS_OFF = 2;
    const STATUS = [self::STATUS_ON => '启用', self::STATUS_OFF => '关闭'];
    const PLATFORM_GPT = 1;
    const PLATFORM = [self::PLATFORM_GPT => 'gpt'];
    const SOURCE_PLATFORM = 1;
    const SOURCE = [self::SOURCE_PLATFORM => ' 平台'];
    const TYPE_DIALOGUE = 1;
    const TYPE = [self::TYPE_DIALOGUE => '对话'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected ?string $table = 'chat_gpt_model';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['icon', 'user_id', 'name', 'prompt', 'system', 'status', 'sort', 'platform', 'desc', 'remark', 'source', 'type'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = [];
    protected string $keyType = 'string';
    public bool $incrementing = false;
    /**
     * @param Creating $event
     * @return void
     */
    public function creating(Creating $event)
    {
        $this->id = self::getStringId();
    }
    /**
     * @return string
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function getStringId() : string
    {
        $container = ApplicationContext::getContainer();
        $generator = $container->get(IdGeneratorInterface::class);
        return substr(md5((string) $generator->generate()), -16);
    }
    /**
     * 用户
     *
     * @return \Hyperf\Database\Model\Relations\HasOne
     */
    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'user_id');
    }
    /**
     * 统计
     *
     * @return \Hyperf\Database\Model\Relations\HasOne
     */
    public function countData()
    {
        return $this->hasOne(ChatGptModelCount::class, 'chat_gpt_model_id', 'id');
    }
}