<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tepoz</title>
    <link rel="stylesheet" href="index.css">
    <?php
        session_start();
        if(isset($_SESSION['error'])){
            ?>
            <script>
                window.onload = function(){
                    <?php if($_SESSION['error']==1)
                        echo "alert('username atau password salah');";
                    elseif($_SESSION['error'] == 2)
                        echo "alert('Masuk dengan akses yang tidak valid');";
                    else 
                    ?>
                }
            </script>
            <?php
        }
        session_destroy();
    ?>
    
</head>
<body>
    <div id="box">
        <form action="functionPHP/controAccess.php" method="POST">
            <table>
                <tr>
                    <td>
                        <div>
                            <img id="gambar" src="logobaru.png" alt="">
                        </div>
                    </td>
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