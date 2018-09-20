<?php
class Migration_85 extends Migration {

    const DESCRIPTION_RU = 'Перенос данных ips в ip_sessions';

    const DESCRIPTION_EN = 'Copy data from ips to ip_sessions';

    public static function up()
    {
        $dateTime = \Component\Settings\Service\SettingsService::instance()->getDatetime();
        $expiresAt = clone $dateTime;
        $expiresAt->modify('+1 day');
        $expiresAt = $expiresAt->format('Y-m-d H:i:s');
        $date = $dateTime->format('Y-m-d');
        $timeStamp = $dateTime->getTimestamp();
        $prefix = self::getDb()->getPrefix();
        $sql = "SELECT * FROM {$prefix}ips WHERE `date` = '" . $date . "' ORDER BY ip";

        $currentIp = null;
        $payloadTemplate = array(
            'campaigns' => array(),
            'streams' => array(),
            'time' => $timeStamp
        );
        $payload = $payloadTemplate;

        foreach (self::execute($sql) as $row) {
            if (empty($currentIp)) {
                $currentIp = $row['ip'];
            }

            if ($currentIp != $row['ip']) {
                self::_save($currentIp, $payload, $expiresAt);
                $payload = $payloadTemplate;
                $currentIp = $row['ip'];
            }

            $payload['campaigns'][$row['campaign_id']] = $timeStamp;
            $payload['streams'][$row['stream_id']] = $timeStamp;
        }

        if (count($payload['campaigns'])) {
            self::_save($currentIp, $payload, $expiresAt);
        }
    }

    protected static function _save($ip, $payload, $expiresAt)
    {
        $prefix = self::getDb()->getPrefix();
        $json = \Core\Json\json_encode($payload);
        $sql = "INSERT IGNORE INTO {$prefix}ip_sessions (ip, expires_at, payload)
                    VALUES ('{$ip}', '{$expiresAt}', '{$json}')";
        self::execute($sql);
    }
}