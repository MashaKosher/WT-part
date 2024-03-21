<?php
$sum = 0;

function list_files($path)
{
    if($path[mb_strlen($path)-1] != '/'){
        $path.='/';
    }

    $files = [];
    $dh = opendir($path);
    while (($file = readdir($dh))!=false){
        if($file != '.' && $file != '..' && !is_dir($path.$file) && $file[0] != '.' ){
            $files[] = $path.$file;
            global $sum;
            $sum += filesize($path.$file);
        } elseif (is_dir($path.$file) && $file != '.' && $file != '..'){
            $arr = list_files($path.$file);
            var_dump($arr);
            foreach($arr as $elem){
                $files[] = $elem;
            }
        }
    }
    closedir($dh);
    return $files;
}


$path = "./test";
print_r(list_files($path));

print "Суммареый размер файлов: $sum КБ\n";
