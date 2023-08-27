<?php
  $target_dir = "../uploads/";
  $target_file = $target_dir.basename($_FILES["file-upload"]["name"]);
  $uploadOk = 1;

  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars(basename($_FILES["file-upload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  $path = dirname(dirname(__FILE__))."/uploads";
  $dir = new DirectoryIterator($path);
  foreach ($dir as $file) {
    if (!$file->isDot()) {
      if (time()-filemtime($file->getPathname()) > 86400) {
        unlink($file->getPathname());
      }
    }
  }

  header("Location: ../upload?success=1");
?>