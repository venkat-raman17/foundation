<?php
session_start();
$_SESSION['admin']=="";
session_unset();
?>
<script language="javascript">
document.location="index.php";
</script>