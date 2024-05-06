<?php

$file_hash = array();
$sum = 0;

class FileSystemObject
{

    function __construct($directory)
    {
        global $sum;
        $sum = 0;
        $this->directory = $directory;
        $test = self::showFileSystem($directory);
        
        echo "Total file size: ".$sum." КБ\n";
        // var_dump($this->test);
        foreach($test as $elem){
            echo "$elem \n";
        }

        $i = 0;
        $flag = false;
        $dup = array();
        while ($i < count($test)){
            $j = $i + 1;
            while ($j < count($test)){
                if(hash_file("md5", $test[$i]) == hash_file("md5", $test[$j]) ){
                    $flag = true;
                    $dup[] = $test[$j];
                    array_splice($test, $j, 1);
                }else{
                    $j += 1;
                }
            }


            $i+=1;
        }
        if (!$flag){
            echo "Нет дубликатов \n";
        }else{
            echo "Есть дубликаты \nМассив дубликатов:\n";
            var_dump($dup);
        }
    }

    function showFileSystem($path)
    {
        if ($path[mb_strlen($path) - 1] != '/') {
            $path .= '/';
        }

        $files = [];
        $dh = opendir($path);
        while (($file = readdir($dh)) != false) {
            if ($file != '.' && $file != '..' && !is_dir($path . $file) && $file[0] != '.') {
                $files[] = $path . $file;
                // echo'File: '. $file ."\n";
                global $sum, $file_hash;
                $sum += filesize($path . $file);
                $size = filesize($path . $file);
                // echo "File:".$path.$file." and size in KB: $size\n";
                $file_hash[] =  $path.$file;
            } elseif (is_dir($path . $file) && $file != '.' && $file != '..') {
                $arr = self::showFileSystem($path . $file);
                foreach ($arr as $elem) {
                    $files[] = $elem;
                }
            }
        }
        closedir($dh);
        return $files;
    }



}


$a = new FileSystemObject("./");

// var_dump($file_hash)
