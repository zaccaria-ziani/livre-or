<?php session_start(); ?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Page de connexion</title>
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

</ul>
</nav>
    </header>
        <main>
        <?php
    
    
            $connexion = mysqli_connect("localhost", "root","", "livreor");
            $requete = "SELECT * FROM utilisateurs";
            $query = mysqli_query($connexion, $requete);
            $result = mysqli_fetch_all($query);
            $cmp= false ;

if(isset($_POST['password']))
{
    $password = $_POST['password'];
    $hash = password_hash ($password,PASSWORD_BCRYPT,array('cost'=>12));
}
        
            if(isset($_POST['connexion']) == true)
            {
                foreach($result as $key => $value)
                {
                    if($result[$key][1] == $_POST['login'] && password_verify($password,$hash))
                    {
                        $cmp = true;
                        $_SESSION['id'] = $result[$key][0] ;
                       
                    }
                    
                    
                    
                }
                if($cmp == true)
                {
                    
                    $_SESSION['login'] = $_POST['login'];
                    header("Location: index.php");
                }
                else
                {
                   ?> <div  id='divconnexion'>Login ou mot de passe incorrect</div> <?php 
                }
            }
            if(!isset($_SESSION['login'])):?>
                <div class='formulaireconnexion'>

                    <h1 id='titreconnexion'>Connexion</h1>

                    <form method='POST' action='connexion.php'>
                        <div class='infoconnexion'>
                            <label for='login'>Login :<br> </label> 
                            <input type='text' name='login' required><br><br>
                            <label for='password'>Mot de passe :<br></label><input type='password' name='password' required><br><br>
                            <input type='submit' value='Connexion' name='connexion'>
                        </div>
                    </form>
                </div>
            
            <?php else: ?>
            
                <div  id='divconnexion'><br>Vous etes connecté </div>
           
            <?php endif ; ?>
            
            <?php mysqli_close($connexion); ?>


        </main>

    </body>
   



<footer class="footerco">
   <p class="copyright"> Copyright 2019 Coding School | All Rights Reserved | Project by Zac |</p>
</footer>
</html>


