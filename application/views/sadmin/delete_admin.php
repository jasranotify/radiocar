<?php
mysql_query("update tbl_admin set flag='0' where code_admin='$id'");
mysql_query("update tbl_login set flag='0' where user_id='$id'");



?>
<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">