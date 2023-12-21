<?php include ('header.php') ;
?>
<?php
session_start();
//Le serveur vérifie si l'utilisateur  est déjà connecté
if ($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['connexion'])){
    
    //Je recupereles donnees du formulaires

    $pseudo = $_POST['pseudo'];
    $pwd = $_POST['pwd'];

    //J'effectue un enregistrement, je me connecte et je fais la verification de la connection a la base de donnee

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "profil";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("La connexion à la base de donnée a échouée : " . $conn->connect_error);
    }

    // je prepare la requete pour recuperer les infos
    $sql = "SELECT pseudo FROM utilisateurs WHERE pseudo = ? AND pwd = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $pseudo, $pwd);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        //Des que les identifiants sont valides
        $row = $result->fetch_assoc();
        $_SESSION['pseudo'] = $row['pseudo'];

        //Je redirige l'utilisateur vers ne page securisee

        header("Location: pagge_securisee.php");
        exit();
    } else {
        //Identifiants invalides, afficher un message d'erreur
        $message_erreur = "Identifiants invalides. Veuillez réessayer.";
    }

    //Fermer la connexion a la base de donnees
    $stmt->close();
    $conn->close();

}
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="stylesprojet.css">
    <title>Apprendre à trader</title>
</head>
<body>

<div class="div12">
    <form class="contact" id="contact" action="connexion.php" method="post">
        <h2>S'identifier</h2><br>
            <div class="div13">
                <fieldset>
                    <label for="pseudo">Pseudo*</label><br>
                    <input type="text"  id="pseudo" name="pseudo" required><br>
                </fieldset>
            </div>
            <div class="div13">
                <fieldset>
                    <label for="pwd">Mot de passe*</label><br>
                    <input type="password" id="pwd" name="pwd" minlength="8" required>
                </fieldset>
            </div>
                <input class="connecter" type="submit">Se connecter</button>
            <div class="div14">
                <a href="enregistrer.html">
                <span class="compte">Besoin d’un compte ?</span><span class="enregistrer">S'enregistrer</span>
                </a>
            </div>
               
            
    </form>
</div>

</body>
<footer class="py-3 my-4">
<ul class="nav justify-content-center border-bottom pb-3 mb-3">
  <li class="nav-item"><a href="index.html" class="nav-link px-2 text-body-secondary" _msttexthash="111306" _msthash="14">Acceuil</a></li>
  <li class="nav-item"><a href="Leçons.html" class="nav-link px-2 text-body-secondary" _msttexthash="326092" _msthash="15">Leçons</a></li>
  <li class="nav-item"><a href="Quizz.html" class="nav-link px-2 text-body-secondary" _msttexthash="95446" _msthash="16">Quizz</a></li>
  <li class="nav-item"><a href="Mur.html" class="nav-link px-2 text-body-secondary" _msttexthash="363909" _msthash="17">Mur</a></li>
  <li class="nav-item"><a href="point.html" class="nav-link px-2 text-body-secondary" _msttexthash="97383" _msthash="18">Point</a></li>
  <li class="nav-item"><a href="cadeau.html" class="nav-link px-2 text-body-secondary" _msttexthash="111306" _msthash="14">cadeaux</a></li>
  <li class="nav-item"><a href="Profil.html" class="nav-link px-2 text-body-secondary" _msttexthash="326092" _msthash="15">Profil</a></li>
  <li class="nav-item"><a href="abonner.html" class="nav-link px-2 text-body-secondary" _msttexthash="95446" _msthash="16">abonner</a></li>      
</ul>
<p class="text-center text-body-secondary" _msttexthash="327002" _msthash="19">© 2023 Société, Inc</p>
</footer>


