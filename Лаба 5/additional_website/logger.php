<?php


class Logger
{
    const FILE_TYPE = "file";
    const CONSOLE_TYPE = "console";
    const ALL_TYPE = "all";

    function __construct($type, $path=NULL)
    {
        $this->type = $type;
        $this->path = $path;
        if ($path != NULL){
            $this->fd = fopen("$path", "w+");
        }
    }

    function log($message)
    {
        $date = date('l jS \of F Y h:i:s A');
        if ($this->type == Logger::FILE_TYPE){
            fwrite($this->fd, $date.' '.$message."\n");
        } elseif ($this->type == Logger::CONSOLE_TYPE){
            echo $date.' '.$message."\n";
        }elseif ($this->type == Logger::ALL_TYPE){

            if ($this->path != NULL){
                fwrite($this->fd, $date.' '.$message."\n");
            }
            echo $date.' '.$message."\n";
        }
    }

    function __destruct()
    {
        if ($this->path != NULL){
            fclose($this->fd);
        }

    }
}

// $a = new Logger(Logger::FILE_TYPE, "4.log");
// $a->log("Первое сообщение");
// $a->log("Второе сообщение");