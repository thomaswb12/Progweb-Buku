<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script>
        
    </script>
</head>
<body>
    <div id="box">
        <form action="controAccess.php" method="POST">
            <table>
                <tr>
                    <td><img id="gambar" src="logobaru.png" alt=""></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="username" name="id"></td>
                </tr>
                <tr>
                    <td><input type="password" placeholder="password" name="password"></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td><input id="login" type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>