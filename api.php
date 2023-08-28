<?php

    $files = "";

    $path = dirname(__FILE__)."/uploads";
    $dir = new DirectoryIterator($path);
    foreach ($dir as $file) {
        if (!$file->isDot()) {
            $files = $files.basename($file).",";
        }
    }

    $Obj = new stdClass();
    $Obj->files = $files;

    $JSON = json_encode($Obj);

    echo $JSON;

?>