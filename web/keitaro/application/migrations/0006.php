<?php
use Core\Debug\DebugService;


class Migration_6 extends Migration {

    const DESCRIPTION_RU = 'Заменен "date" а "ip" в таблице ips';

    const DESCRIPTION_EN = 'Removed index "date" with "ip" in table ips';

    public static function up()
    {
        $db = self::getDb();
        $sql = "ALTER TABLE `{$db->getPrefix()}ips` DROP INDEX `date`, ADD INDEX `ip` ( `ip` )";
        try {
            $db->execute($sql);
        } catch (Exception $e) {
            DebugService::instance()->instance()->warn($e->getMessage());
        }
    }
}