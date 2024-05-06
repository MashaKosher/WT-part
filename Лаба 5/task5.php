<?php

$link = new mysqli("localhost","debian-sys-maint","Z5ZEGCR4WPvBdQed");

print_r($link->host_info."\n");
print_r("Current mysql version: ".$link->server_info."\n");