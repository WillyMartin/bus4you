<?php
use Core\Model\Shard;

class Migration_67 extends Migration {

    const DESCRIPTION_RU = 'Изменение структуры таблиц stats (datetime, revenue, cost, stream_id, destination и другие)';

    const DESCRIPTION_EN = 'Update structure of stat tables (datetime, revenue, cost, stream_id, destination и другие)';

    public static function up()
    {
        $shards = Shard::all();
        foreach ($shards as $shard) {
            $count = self::getDb()->getOne('SELECT count(*) FROM ' . self::getDb()->getPrefix() . 'stats_'.$shard->getDate());

            if ((!$shard->getVersion() || version_compare($shard->getVersion(), '7.0') == -1)) {
                $sql = 'ALTER TABLE ' . self::getDb()->getPrefix() . 'stats_' . $shard->getDate() . '
                    ADD `datetime` DATETIME NULL DEFAULT NULL,
                    ADD `campaign_id` int(11) NOT NULL,
                    ADD `stream_id` INT UNSIGNED NOT NULL,
                    ADD `destination` VARCHAR(250) DEFAULT NULL,
                    ADD `isp` VARCHAR(100) DEFAULT NULL,
                    ADD `connection_type` VARCHAR(10) DEFAULT NULL,
                    ADD `referrer` varchar(255) DEFAULT NULL,
                    ADD `unique_campaign` tinyint(1) NOT NULL DEFAULT 0,
                    ADD `unique_stream` tinyint(1) NOT NULL DEFAULT 0,
                    ADD `geo_resolved` tinyint(1) NOT NULL DEFAULT 0,
                    ADD `device_resolved` tinyint(1) NOT NULL DEFAULT 0,
                    ADD `isp_resolved` tinyint(1) NOT NULL DEFAULT 0,
                    ADD `revenue` DECIMAL(13, 4) DEFAULT 0.00,
                    ADD `cost` DECIMAL(13, 4) DEFAULT 0.00,
                    CHANGE `time` `time` INT( 11 ) NULL DEFAULT NULL,
                    CHANGE `group_id` `group_id` INT( 11 ) NULL DEFAULT NULL,
                    CHANGE `date` `date` DATE NULL DEFAULT NULL,
                    CHANGE `country` `country` CHAR( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
                ';
                self::silentExecute($sql);

                $shard->setVersion(TDS_VERSION)->save();

                $sql = 'UPDATE ' . self::getDb()->getPrefix() . 'stats_' . $shard->getDate() . ' SET
                    datetime = FROM_UNIXTIME(`time`),
                    campaign_id = group_id,
                    stream_id = moved_to_stream,
                    destination = moved_to_url,
                    referrer = referer,
                    geo_resolved = 1,
                    device_resolved = 1,
                    isp_resolved = 1';
                self::execute($sql);
            }
        }
    }
}