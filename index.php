<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Schematic Upload</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Oxygen:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="style/index.css" />
        
        <link rel="icon" type="image/x-icon" href="style/favicon.webp">
	</head>

	<body>

        <div class="form-box">
            <img src="style/logo.webp" class="img" alt="">
            <br><br><br>
            <?php
                if (isset($_GET['error'])) {
                    echo '
                        <p class="error">Wrong password!</p>
                        <br><br>
                    ';
                }
            ?>
            <form action="scripts/check.php" method="post" id="login">
                <div class="form-value">
                    <h2>Schematic Upload</h2>
                    <div id="inputbox" class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input id="password" name="password" type="password" required>
                        <label id="label" for="password">Password</label>
                    </div>
                </div>
            </form>
            <?php
                if (isset($_GET['error'])) {
                    echo '
                        <script>document.getElementById("inputbox").style.borderBottom = "2px solid red";</script>
                        <script>document.getElementById("label").style.color = "red";</script>
                    ';
                }
            ?>

            <button id="submit" onclick="submit()">Log in</button>
            <p>© Dannus x Octovon</p>

            <div class="overlay" id="overlay">
                <div class="overlay__inner">
                    <div class="overlay__content"><span class="spinner"></span></div>
                </div>
            </div>
        </div>

        <script>
            function submit() {

                document.getElementById("overlay").style.display = "block";
                setTimeout(function() {
                    document.getElementById("login").submit();
                }, 500);
            }
        </script>
        
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</body>
</html>