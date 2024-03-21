<?php
$max_len = 0;
$arr_len = count($argv);
for ($i = 1; $i < $arr_len; $i++) {
    if (strlen($argv[$i]) > $max_len) {
        $max_len = strlen($argv[$i]);
    }
}

for ($i = 1; $i < $arr_len; $i++) {
    if (strlen($argv[$i]) == $max_len) {
        print "$argv[$i]\n";
    }
}

print "Максимальная длина: $max_len\n";
