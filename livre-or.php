<?php   session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Livre-Or</title>
    <link rel="stylesheet" href="livre-or.css">
    <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">

</head>
<body class="body">
<header>
<nav id="barrenav">
<ul id="barrenav2">
<?php 
if (isset($_SESSION['login'])):
?>  
        <li><a href="http://localhost/livre-or/index.php">Index</a></li>
        <li><a href="http://localhost/livre-or/profil.php">Profil</a></li> 
        <li><a href="http://localhost/livre-or/commentaires.php">Commentaires</a></li>
        <li><a href="http://localhost/livre-or/livre-or.php">Livre-or</a></li>
      <form method="POST" action="index.php"><input type="submit" id="deco" value="Deconnexion" name="deconnexion"><a href=""></a></form></li>
           
       
        
       
            <?php if(isset($_POST["deconnexion"])):
                                session_unset();
                                session_destroy();
                                header('location:index.php');
                                endif; ?>
                        <?php else: ?>
                            <li><a href="http://localhost/livre-or/index.php">Index</a></li>
        <li><a href="http://localhost/livre-or/inscription.php">Inscription</a></li>
        <li><a href="http://localhost/livre-or/connexion.php">Connexion</a></li>
        <li><a href="http://localhost/livre-or/commentaires.php">Commentaires</a></li>
        <li><a href="http://localhost/livre-or/livre-or.php">Livre-or</a></li>
       
       
        <?php endif; ?>  
</div></li>
    </ul>
</nav>
</header>

        <main>
            <h1 class="livre-or">Livre Or</h1>
            <div id="com-livre-or">
            <?php
  
                $connexion = mysqli_connect("localhost", "root", "", "livreor");
                $log = "SELECT id,login FROM utilisateurs";
                $com = "SELECT * FROM commentaires ORDER by date DESC";
                $query = mysqli_query($connexion, $com);
                $resultat = mysqli_fetch_all($query);
                $query2 = mysqli_query($connexion, $log);
                $resultat2 = mysqli_fetch_all($query2);    
                $i = 0; 
                while($i < count($resultat))
                {
                    $i2 = 0;
                    while($i2 < count($resultat2))
                    {
                        if($resultat[$i][2] == $resultat2[$i2][0])
                        {
                            $date = $resultat[$i][3];
                            $date2 = date("d-m-Y à H:i:s",strtotime($date)) ?>


                            <section class='post'>
                            <div id="post2">Posté par <?php echo $resultat2[$i2][1]." le ".$date2 ?>'<br/></div>
                            <div id="post2"><?php echo $resultat[$i][1] ?><br/><br/></div>
                            <br><br>
                            </section>

                        <?php 
                        }
                        $i2++;
                    }
                    $i++;
                }
            ?>

            </div>
        </main>

        <footer> 
   <p class="copyright"> Copyright 2019 Coding School | All Rights Reserved | Project by Zac |</p>
</footer>
</body>
</html>
