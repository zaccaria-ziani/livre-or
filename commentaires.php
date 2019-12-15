<?php session_start(); ?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Commentaire</title>
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
    
            $connexion = mysqli_connect("localhost", "root","", "livreor");
                            
            if(isset($_POST["comment"]))
            {
                $comment=$_POST["comment"];
            }      
            else 
            {
                $comment="";
            }   
    
           
            if (!empty($_SESSION['login'])): ?> 
            
                <div class='commentaires'>
                    <form  class='formco' action='commentaires.php' method='post'>

                            <textarea class="textarea" type='text'  placeholder='Votre commentaire' rows='31' cols='74' name='comment' id='comment' resize:none required></textarea><br>

                            <input type='submit' value='Envoyer' name='confirm' />
                    </form>
                </div>
            

            <?php else: ?>
            
                <div id='com'>Vous n'êtes pas connecté<br>Vous devez être connecté pour pouvoir commenter</div>
                <img id="gifno" src="photos/not-connected.gif" alt="disconnected">

            <?php endif; ?>


            
            <?php if (isset($_POST['confirm']))
                {
                    
                    if (!empty($_POST['comment'])) 
                    {     
                        
                        date_default_timezone_set("Europe/Paris");
                         // Crée la requête
                        $requete = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$comment','".$_SESSION['id']."','".date("Y-m-d H:i:s")."')";
                                        
                     
                         // Exécute la requête d'insertion du message
                       $query = mysqli_query($connexion, $requete);
                       
                    }
                }
            ?>  

        </main>

        <footer >

    
   <p class="copyright"> Copyright 2019 Coding School | All Rights Reserved | Project by Zac |</p>
</footer>
</html>
 </body>
 </html>
