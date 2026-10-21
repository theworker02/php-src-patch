--TEST--
GH-24497: memory_hard_limit_percent reports its automatic default
--FILE--
<?php
var_dump(ini_get('memory_hard_limit_percent'));
$settings = ini_get_all();
var_dump($settings['memory_hard_limit_percent']['global_value']);
var_dump($settings['memory_hard_limit_percent']['local_value']);
?>
--EXPECT--
string(2) "-1"
string(2) "-1"
string(2) "-1"
