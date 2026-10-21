--TEST--
GH-24497: memory_hard_limit_percent exposes its automatic default
--FILE--
<?php
var_dump(ini_get('memory_hard_limit_percent'));
$directives = ini_get_all(null, true);
var_dump($directives['memory_hard_limit_percent']['global_value']);
var_dump($directives['memory_hard_limit_percent']['local_value']);
?>
--EXPECT--
string(2) "-1"
string(2) "-1"
string(2) "-1"
