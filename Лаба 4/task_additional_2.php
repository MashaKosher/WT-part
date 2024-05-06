<?php

class FileSystemObject
{

    const TYPE = ["B", "KB", "MB", "GB"];

    function __construct($filename, $filesize, $filetype, $type)
    {
        $this->filename = $filename;
        $this->filesize = $filesize;
        $this->filetype = $filetype;
        $this->type = $type;

        $start = array_search($this->type, FileSystemObject::TYPE);

        $filesize = $this->filesize;
        for ($i = $start - 1; $i >= 0; $i--) {
            $filesize = round($filesize * 1024, 2);
            $type = FileSystemObject::TYPE[$i];
            echo "Размер файла $filename.$filetype в $type: $filesize\n";
        }
        echo "____________________________\n";
        $filesize = $this->filesize;
        for ($i = $start + 1; $i < count(FileSystemObject::TYPE); $i++) {
            $filesize = round($filesize / 1024, 3);
            $type = FileSystemObject::TYPE[$i];
            echo "Размер файла $filename.$filetype в $type: $filesize\n";
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
                global $sum;
                $sum += filesize($path . $file);
                $size = filesize($path . $file)/1024/1024;
                echo "File: $path.$file and size in MB: $size\n";
            } elseif (is_dir($path . $file) && $file != '.' && $file != '..') {
                $arr = showFileSystem($path . $file);
                foreach ($arr as $elem) {
                    $files[] = $elem;
                }
            }
        }
        closedir($dh);
        return $files;
    }

}


$a = new FileSystemObject("Test", 6552, "txt", "KB");
$a->showFileSystem("./");