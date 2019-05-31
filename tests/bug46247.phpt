--TEST--
Bug #46247 (fbird_set_event_handler() is allowing to pass callback without event)
--SKIPIF--
<?php include("skipif.inc"); ?>
--FILE--
<?php

require("firebird.inc");

$db = fbird_connect($test_base);

function test() { }

fbird_set_event_handler();

fbird_set_event_handler('test', 1);
fbird_set_event_handler($db, 'test', 1);
fbird_set_event_handler(NULL, 'test', 1);


fbird_set_event_handler('foo', 1);
fbird_set_event_handler($db, 'foo', 1);
fbird_set_event_handler(NULL, 'foo', 1);

?>
--EXPECTF--
Warning: Wrong parameter count for fbird_set_event_handler() in %s on line %d

Warning: fbird_set_event_handler(): supplied argument is not a valid Firebird link resource in %s on line %d

Warning: fbird_set_event_handler(): Callback argument foo is not a callable function in %s on line %d

Warning: fbird_set_event_handler(): Callback argument foo is not a callable function in %s on line %d

Warning: fbird_set_event_handler(): supplied argument is not a valid Firebird link resource in %s on line %d
