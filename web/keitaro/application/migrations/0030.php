<?php
use Core\Model\Shard;
use Component\Settings\Service\SettingsService;
use Services\ShardService;


class Migration_30 extends Migration {

    const DESCRIPTION_RU = 'Добавление device_model и device_type';

    const DESCRIPTION_EN = 'Add device_model and device_type';

    public static function up()
    {
        $result = ShardService::getBetween(SettingsService::instance()->getDatetime(), new DateTime('+5 days'));

        $prefix = self::getDb()->getPrefix();
        foreach ($result as $item) {
            $sql = "ALTER TABLE `{$prefix}stats_{$item->get('date')}` ADD `device_type` VARCHAR( 30 ) NULL DEFAULT NULL AFTER `operator` ,
                ADD `device_model` VARCHAR( 200 ) NULL DEFAULT NULL AFTER `device_type` ";
            self::silentExecute($sql);
        }
    }
}