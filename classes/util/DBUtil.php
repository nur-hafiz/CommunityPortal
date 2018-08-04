<?php
class DBUtil
{
    public static function getConnection(){
        $config = ConfigUtil::getConfig();
        $conn = new mysqli($config->mysqlServer, $config->mysqlUser, $config->mysqlPassword,$config->mysqlDB);
        return $conn;
    }
}