<?php session_start()?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="livre-or.css">
	<link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">

   
    <title>Inscription</title>
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
<div class="formulaireinscription">
		<h1 id="titreinscription">Inscription</h1>
		<form action="inscription.php" method="post">
				

				<div class="info">
					
					<label for="login">Login :<br> </label>
					<input type="text" name="login" id="login" required>

					<br>
					<br>

					<label for="prenom">Prenom :<br></label>
					<input type="text" name="prenom" id="prenom">

					<br>
					<br>


					<label for="nom">Nom :<br></label>
					<input type="text" name="nom" id="nom">

					<br>
					<br>

					<label for="password">Mot de passe :<br></label>
					<input type="password" name="password" id="password" required>

					<br>
					<br>


					<label for="confirmpassword">Confirmer mot de passe : <br></label>
					<input type="password" name="confirmpassword" id="confirmpassword" required>
					<br>
					<br>

					<input type="submit" value="Inscription" name="confirm" /><br>
				</div>

				
		</form>
		
	</div>
	

</body>
</html>


<?php
		if(isset($_POST["login"]))
		{
			$login=$_POST["login"];
		}      
		else 
		{
			$login="";
		}     
		if(isset($_POST["password"]))
		{
			$password=$_POST["password"];
			$hash = password_hash($_password,PASSWORD_BCRYPT,array('cost'=>12));
		}      
		else
		{
			$password="";
		}     
		
		if(isset($_POST['confirm']))
		{
		
			$connexion = mysqli_connect("localhost", "root","", "livreor");
			                    
			$requete3 = "SELECT login FROM utilisateurs WHERE login = '$login'";         
			$query3 = mysqli_query($connexion, $requete3);         
			$resultat3 = mysqli_fetch_all($query3);             
			if (!empty($resultat3))             
			{                 
				echo "<div id='false2'>Ce Login est déjà pris";
			}
			elseif($_POST["password"] != $_POST["confirmpassword"])            
			{                
				echo "<div id='false2'>Les mots de passe ne correspondent pas </div>";
			}                         
			else            
		 	{                
				$requete = "INSERT INTO utilisateurs (login, password) VALUES ('$login', '$hash')";
				$query = mysqli_query($connexion, $requete);             
				header('Location:connexion.php?id='.$_SESSION['id']);            
			}
		}
	
	?>
	
</main>
    
</body>
<footer> 
   <p class="copyright"> Copyright 2019 Coding School | All Rights Reserved | Project by Zac |</p>
</footer>
</html>





