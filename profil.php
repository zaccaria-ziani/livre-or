<?php
session_start();
$connexion= mysqli_connect("localhost","root","","livreor");
$query="SELECT * from utilisateurs WHERE login = '".$_SESSION['login']."' ";
$result= mysqli_query($connexion, $query);
$row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
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
        <div class="formulaireprofil">
		<h1 id="titreprofil">Modifier votre profil </h1>
		<form action="profil.php" method="post">
				

				<div class="infoprofil">
					
					<label for="login">Login :<br> </label>
					<input type="text" name="login" id="login" required value="<?php echo $row['login']?>">

					<br>
					<br>

					<label for="password">Mot de passe :<br></label>
					<input type="password" name="password" id="password" required value="<?php// echo $row['password']?>">

					<br>
					<br>

					<input type="submit" value="Modifier" name="modifier" /><br>
				</div>

				
		</form>
		
    </div>
                        </main>
	<footer>
   <p class="copyright"> Copyright 2019 Coding School | All Rights Reserved | Project by Zac|<p>
</footer>

    
</body>
</html>

<?php 
	if(isset($_POST['modifier']))
	{
		$connexion = mysqli_connect("localhost", "root","", "livreor");
			$login = $_POST['login'] ;                   
			$requete3 = "SELECT login FROM utilisateurs WHERE login = '$login'";         
			$query3 = mysqli_query($connexion, $requete3);         
			$resultat3 = mysqli_fetch_all($query3);             
			if (!empty($resultat3))             
			{                 
				echo "Ce Login est déjà prit";             
			}             
			else
			{
				if($_POST['login'] != $row['login'])
				{
				   $connexion = mysqli_connect("localhost","root","","livreor");
				   $query = "UPDATE utilisateurs SET login = '".$_POST['login']."' WHERE utilisateurs.login='".$row['login']."'";
				   $result = mysqli_query($connexion, $query);
				   $_SESSION['login']=$_POST['login'];
				}
				if($_POST['password'] != $row['password'])
				{
				   $connexion = mysqli_connect("localhost","root","","livreor");
				   $query = "UPDATE utilisateurs SET password = '".$_POST['password']."' WHERE utilisateurs.password='".$row['password']."'";
				   $result = mysqli_query($connexion, $query);
				}
				header("Location: index.php");
			}
	             
	   
	}
?>
