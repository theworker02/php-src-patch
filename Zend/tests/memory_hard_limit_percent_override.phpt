--TEST--
memory_hard_limit_percent supports explicit values and restores its default
--FILE--
<?php
var_dump(ini_get('memory_hard_limit_percent'));
var_dump(ini_set('memory_hard_limit_percent', '150'));
var_dump(ini_get('memory_hard_limit_percent'));
var_dump(ini_set('memory_hard_limit_percent', '125'));
var_dump(ini_get('memory_hard_limit_percent'));
ini_restore('memory_hard_limit_percent');
var_dump(ini_get('memory_hard_limit_percent'));
?>
--EXPECT--
string(2) "-1"
string(2) "-1"
string(3) "150"
string(3) "150"
string(3) "125"
string(2) "-1"
