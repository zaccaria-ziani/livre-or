<?php session_start()?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="livre-or.css">
    <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
    <title>Index</title>
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
        <li><a href="http://localhost/livre-or/commentaires.php">Commentaires</a></li>
        <li><a href="http://localhost/livre-or/connexion.php">Connexion</a></li>
        <li><a href="http://localhost/livre-or/livre-or.php">Livre-or</a></li>
       
       
        <?php endif; ?>  
</div></li>
    </ul>
</nav>
</header>

<main>
   
<?php 
if (isset($_SESSION['login'])):
?> 
<div id='divconnexion'><h1>Bienvenue dans votre espace de connexion<h1> <br> <?php echo $_SESSION['login']?></div>
                    <img src="photos/X5NY.gif" alt="welcome">
                   

                    <?php else: ?>
                        <h1 class="titreindex">L'espace</h1><br>
                    <section id="sec-ind">
                        <div class="div-presentation">
                            <p class="texte-presentation">
                                L'espace désigne les zones de l'Univers situées au-delà des atmosphères et des corps célestes. Il s'agit de l'étendue de densité quasi nulle qui sépare les astres. On parle aussi de vide spatial1. Selon les endroits de l'espace désignés, on le qualifie quelquefois d'espace cislunaire, interplanétaire, interstellaire (ou intersidéral) et intergalactique pour désigner plus précisément le vide spatial qui est délimité respectivement par le système Terre-Lune, les planètes, les étoiles et les galaxies.
                            </p>
                            
                            <img class="gif-solar-system" src="photos/solar-system.gif" alt="solar-system">
                            </div>

                        </div>
                        <div class="indexgif">
                            <img src="photos/indexgif.gif" alt="astronautegif">
                        </div>
                    </section>
                        <?php endif; ?>  


   
</main>
<footer> 
   <p class="copyright"> Copyright 2019 Coding School | All Rights Reserved | Project by Zac |</p>
</footer>

    
</body>
</html>




