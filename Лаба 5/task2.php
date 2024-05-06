<?php

$sum = 0;

class FileSystemObject
{

    function __construct($directory)
    {
        global $sum;
        $sum = 0;
        $this->directory = $directory;
        self::showFileSystem($directory);
        echo "Total file size: ".$sum." КБ\n";
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
                global $sum;
                $sum += filesize($path . $file);
                $size = filesize($path . $file);
                echo "File:".$path.$file." and size in KB: $size\n";
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
