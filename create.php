<?php
require_once('./initialize.php');
// require_once('./peope.php');
$operation = new Operation();
$operation->create($_POST);

?>