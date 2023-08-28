<?php

    $files = "";

    $path = dirname(__FILE__)."/uploads";
    $dir = new DirectoryIterator($path);
    foreach ($dir as $file) {
        if (!$file->isDot()) {
            $files = $files.basename($file).",";
        }
    }

    echo $files;

?>