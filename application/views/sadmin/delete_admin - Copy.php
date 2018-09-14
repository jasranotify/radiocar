<?php
mysql_query("delete from tbl_admin where code_admin='$id'");
mysql_query("delete from tbl_login where user_id='$id'");



?>
<body onLoad="self.setTimeout('parent.parent.location.reload().GB_hide()', 60);">