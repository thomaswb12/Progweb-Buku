<?php 
    session_start();
    if(isset($_SESSION["id"]) && isset($_SESSION["control"])){
        if($_SESSION["control"]==4){
            echo '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <?php 
                        session_start();
                        if(isset($_SESSION["position"])){
                            
                        }
                    ?>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="HRDDefault.css" type="text/css">
                    <div id="gantiHead">
                    </div>
                    <script type="text/javascript" src="../jquery-3.3.1.min.js"></script>
                    <script src="HRDDefault.js"></script>
                    <script src="jquery.session.js" ></script>
                    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
                </head>
                <body>
                    <header>';include "Template/header.php";
                echo '</header>
                    <article>';include "Template/aside.php";
                echo '<div id="konten">';
                echo '    </div>
                    </article>
                    <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
                </body>
                </html>';
            }
            else{
                $_SESSION['error'] = 4;
                header("location:../index.php");
            }
        }
        else{
            $_SESSION['error'] = 4;
            header("location:../index.php");
        }
    ?>