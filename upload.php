<?php

    session_start();
    
    if (!isset($_SESSION['verified'])) {
        header("Location: index");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Schematic Upload</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Oxygen:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="style/index.css" />
        
        <link rel="icon" type="image/x-icon" href="style/favicon.webp">
	</head>

	<body>

        <div class="form-box">
                <img src="style/logo.webp" class="img" alt="">
                <br><br><br>
                <?php
                    if (isset($_GET['success'])) {
                        echo '
                            <p class="success">Schematic successfully uploaded!</p>
                            <br>
                            <p class="success" style="font-size: 20px;">It can sometimes take up to a minute to get into the server.</p>
                            <br><br>
                        ';
                    }
                ?>
                <form action="scripts/upload.php" method="post" enctype="multipart/form-data">
                    <h2>Schematic Upload</h2>
                    <br><br><br>
                    <label for="file-upload" class="custom-file-upload">
                        <i class="fa fa-upload"></i> Select File
                    </label>
                    <input onchange="fileUpdate(this)" id="file-upload" name="file-upload" type="file" accept=".schematic"/>
                    <br><br>
                    <div id="fileList">

                    </div>
                    <br><br><br>
                    <button>Upload</button>
                </form>
                <p>© Dannus x Octovon</p>
            </div>
        </div>

        <script>
            function fileUpdate(input) {
                if (input.files && input.files[0]) {
                    Array.from(input.files).forEach(file => {
                        if (file.size > 1000000) {
                            alert("File too large! (Max 1MB)");
                            input.value = "";
                            return;
                        }

                        if (!file.name.endsWith(".schematic")) {
                            alert("File must be a .schematic file!");
                            input.value = "";
                            return;
                        }

                        var p = document.createElement("p");
                        p.innerHTML = file.name;
                        document.getElementById("fileList").appendChild(p);
                    });
                }
            }
        </script>

	</body>
</html>