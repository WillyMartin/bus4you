<?php
use Core\Model\Shard;
use Component\Settings\Service\SettingsService;
use Services\ShardService;


class Migration_37 extends Migration {

    const DESCRIPTION_RU = 'Добавление extra_param_[1-7] и sub_id_[1,3-4] в keitaro_stats_*';

    const DESCRIPTION_EN = 'Add additional extra_param_[1-7] and new sub_id_[1,3-4] keitaro_stats_*';

    public static function up()
    {
        $result = ShardService::instance()->getBetween(SettingsService::instance()->getDatetime(), new \DateTime('+5 days'));
        $prefix = self::getDb()->getPrefix();
        foreach ($result as $item) {
            $sql = "ALTER TABLE `{$prefix}stats_{$item->get('date')}`
                ADD `sub_id_1` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `sub_id_2` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `sub_id_3` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `sub_id_4` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `extra_param_1` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `extra_param_2` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `extra_param_3` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `extra_param_4` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `extra_param_5` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `extra_param_6` VARCHAR( 255 ) NULL DEFAULT NULL,
                ADD `extra_param_7` VARCHAR( 255 ) NULL DEFAULT NULL
                ";
            self::silentExecute($sql);
        }
    }
}