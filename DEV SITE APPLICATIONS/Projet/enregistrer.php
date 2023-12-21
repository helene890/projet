<?php include ('header.php') ;
?>
<?php
//Je verifie si le formulaire d'enregistrement a ete soumis
if ($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['utilisateur'])) {
//Je recupere les valeurs dans le formulaire
$pseudo = $_POST['pseudo'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$pwd = $_POST['pwd'];
// Je verifie les donnees inscrites pour voir si tous est en accords (formulaire, base de donnee et liste ci-dessus)

//J'effectue la connexion de la base de donnee

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profil";

//Je me connect a ma base de donnee sinon message d'erreur

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion à la base de donnée a echouée : " . $conn->connect_error);
}

// ici je prepare la requete pour pouvoir inserer mes donnees

$sql = "INSERT INTO utilisateur (pseudo, nom, prenom, adresse, tel, mail, pws) VALUES (0, $pseudo, $nom, $prenom, $addresse, $tel, $mail, $pwd)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $pseudo, $nom, $prenom, $adresse, $tel, $mail, $pws);
$stmt->execute();

//Je ferme la connexion

$stmt->close();
$conn->close();

//ici je redirige l'utilisateur vers la page de connexion

header("Location: connexion.html");
exit();
}

?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="stylesprojet.css">
    <title>Apprendre à trader</title>
</head>
<body>
    <div class="div17">
        <form class="div19" action="/enregistrer.php" method="post" autocomplete="on" style="width: 50%;">
           
            <label for="pseudo">Pseudo*</label><br>
            <input type="text"  id="pseudo" name="pseudo" required><br>

            <label for="nom">Nom*</label><br>
            <input type="text" id="nom" name="nom" required><br>

            <label for="prenom">Prénom*</label><br>
            <input type="text" id="prenom" name="prenom" required><br>

            <label for="addresse">Addresse*</label><br>
            <input type="text" id="addresse" name="addresse" required><br>

            <label for="tel">Numéro de téléphone</label><br>
            <input type="tel" id="tel" name="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"><br>

            <label for="mail">Email*</label><br>
            <input type="email" id="mail" name="mail" required><br>

            <label for="pwd">Mot de passe*</label><br>
            <input type="password" id="pwd" name="pwd" minlength="8"><br>

            <button class="btn btn-primary" type="submit" style="width: 100%;margin-top: 3%;">S'enregistrer</button>
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

