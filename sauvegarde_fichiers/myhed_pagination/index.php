<?php
 
 $bdd = new PDO('mysql:host=localhost;dbname=autojaune_jr_exo','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


// On défnit le nombre d'élement qu'on veut dans une page
$nbrElementParPage = 25;
//On récupère tous ce qu'il y'a dans la base de données
$query = $bdd->query("SELECT * FROM t_constructeur");
//On compte le nombre d'élement que la requête nous retourne
$count = $query->rowCount();

var_dump($count);

//On compte ensuite le nombre de page qu'on estime pouvoir avoir à partir de notre nombre élement par page et le nombre de donnée qu'il y'a dans la bdd
// la fonction ceil nous sert à nous retourner un nombre entier et non un nombre à virgule
$nbrDePage = ceil($count/$nbrElementParPage);

// ici nous testons notre variable de page en GET
//Si elle existe, si elle n'est pas vide , si elle correspond bien à une valeur décimale 
// si elle ne dépasse pas le nombre de page
//si elle n'est pas inférieur au nombre de page
if(isset($_GET['page']) && !empty($_GET['page']) && ctype_digit($_GET['page'])){

	//ici nous nosu assurons bien que la page retourner est bien une valeur entière encore une fois
	$_GET['page'] = intval($_GET['page']);

	$pageCourante = $_GET['page'];
}else{

	//si la variable $_GET['page'] n'existe pas alors on va directement l'associé à la page 1 pour ne pas avoir d'érreur
	$pageCourante = 1;
}

// Ici nous définissons le départ avec la page courante au premier à bord quand $_GET['page'] sera égale à 1 le départ sera à 0 quand elle vaudra 2 aussi 

$depart = ($pageCourante-1)*$nbrElementParPage;
var_dump($pageCourante-1);


$query = $bdd->query("SELECT DISTINCT * FROM t_constructeur LIMIT $depart,$nbrElementParPage");

while($data = $query->fetch()){

	echo $data['constructeur'].'<br>';
	echo $data['pais'].'<br>';
}

for($i = 1; $i <= $nbrDePage; $i++){

	echo'<a href="index.php?page='.$i.'">'.$i.'</a>';
}