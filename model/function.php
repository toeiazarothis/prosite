<?php
include('db.php');

function listeNouveauxContact(){
  $connexion = connectionDB();
  $texte = '';
  $listeNew = $connexion->query('SELECT * FROM `freelance`');
  while ($result = $listeNew->fetch()) {
    $texte .=
    '<tr>
      <td>'.$result['sexe'].'</td>
      <td>'.$result['nom'].'</td>
      <td>'.$result['prenom'].'</td>
      <td>0'.$result['tel'].'</td>
      <td>'.$result['mail'].'</td>
      <td>'.$result['message'].'</td>
      <td>'.$result['note'].'</td>
    </tr><br>';}
  return $texte;
}

function listeNouveauxClient(){
  $connexion = connectionDB();
  $texte = '';
  $listeNew = $connexion->query('SELECT * FROM `client`');
  while ($result = $listeNew->fetch()) {
    $texte .=
    '<tr>
      <td>'.$result['sexe'].'</td>
      <td>'.$result['nom'].'</td>
      <td>'.$result['prenom'].'</td>
      <td>0'.$result['tel'].'</td>
      <td>'.$result['mail'].'</td>
      <td>'.$result['note'].'</td>
    </tr><br>';}
  return $texte;
}
function ajoutEleve (){
  $connexion = connectionDB();

  $ajout = $connexion->exec('INSERT INTO `freelance`
    (`sexe`, `nom`, `prenom`, `tel`, `mail`, `message`)
    VALUES ("'.$_POST["sexe"].'",
            "'.$_POST["nom"].'",
            "'.$_POST["prenom"].'",
            "'.$_POST["tel"].'",
            "'.$_POST["mail"].'",
            "'.$_POST["message"].'")');

  if ($ajout == FALSE){
        exit('erreur');//echec envoie
	}

    return
    '<header class="bg bg-darkest-gray">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Bonjour Patrick!</div>
          <div class="intro-heading">Votre message à bien etait enregistrer</div>
          <a href="index.php" class="page-scroll btn btn-xl">Accueil</a>
        </div>
      </div>
    </header>';
}

function deplacerEleve(){
  $connexion = connectionDB();

  $modification = $connexion->query('UPDATE `freelance` SET `nom` = '.$_POST["moveEleve"].'');

  echo "Le contact a bien etait deplacer dans les clients de l'etablisement";
}
function supprimerEleve(){
  $connexion = connectionDB();

  $supprimer =$connexion->query('DELETE FROM `freelance` WHERE `nom` = '.$_POST["delEleve"].'');

  echo "Le contact est bien supprimer du systeme";
}
?>
