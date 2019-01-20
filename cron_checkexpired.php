<?php
include "db.php";
function _log($str) {
    $log_file_name = dirname(__FILE__) . DIRECTORY_SEPARATOR."cron_checkexpired.log";
    $info = date("Y-m-d H:i:s") . "|" . $str . "\n";
    print($info);
    file_put_contents($log_file_name, $info, FILE_APPEND);
}

_log("reset check expired cron batch runned");
mysqli_query($conn,"update tbl_user set cron_check_expireddate_flag='0'");
?>