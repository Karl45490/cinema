<?php
include '../conf_server.php';


if (!isset($_POST['titre']) || !isset($_POST['realisateur']) ||
!isset($_POST['genre']) || !isset($_POST['proprio'])) {
echo 'Pas de titre ou pas de realisateur ou pas de genre ou pas de proprio !';
} 
else {
// pour simplifier :
$titre = $_POST['titre'];
$realisateur = $_POST['realisateur'];
$genre = $_POST['genre'];
$proprio = $_POST['proprio'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}


// $sql = "INSERT INTO films (titre, realisateur, genre, proprio) VALUES ($titre,
// $realisateur, $genre, $proprio)";
$stmt = $conn->prepare("INSERT INTO films (titre, realisateur, genre, proprio) VALUES
(?, ?, ?, ?)");
$stmt->bind_param("ssss", $titre, $realisateur, $genre, $proprio);
$stmt->execute();
echo "Nouveaux enregistrements créés ";
$stmt->close();
$conn->close();
}


?>