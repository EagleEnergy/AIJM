﻿<?php
require_once'fonctions.php';
require 'authentification_verification.php'; // Page authentifiee


$response = $sql->query('SELECT * from imprimante WHERE idImprimante=\''.$_GET['id'].'\'');
while ($donnees = $response->fetch())
{
		
	$marque=$donnees['Marque'];
	$modele=$donnees['Modele'];
	$type=$donnees['Type'];
	$nombre=$donnees['Nombre'];
	$stocknoir=$donnees['QuantNoir'];
	$stocktroiscouleurs=$donnees['QuantTroiscouleurs'];
	$stockmagenta=$donnees['QuantMagenta'];
	$stockjaune=$donnees['QuantJaune'];
	$stockcyan=$donnees['QuantCyan'];
	$reftrois=$donnees['RefTroiscouleurs'];
	$refnoir=$donnees['RefNoir'];
	$refmagenta=$donnees['RefMagenta'];
	$refjaune=$donnees['RefJaune'];
	$refcyan=$donnees['RefCyan'];
	$Fnom=$donnees['FournisseurNom'];
	$Ftel=$donnees['FournisseurTel'];
	$Fmail=$donnees['FournisseurMail'];
	$Furl=$donnees['FournisseurUrl'];
}

echo '<h1>'.$marque.' '.$modele.'</h1><br><br>';
echo '<h2>Consommables:</h2>';

echo'<form method="post" action="accueil.php?page=update_stocks">';
echo '<table>';
echo '<tr>
<th>Couleur</th>
<th>Référence</th>
<th>Stocks</th></tr>';

if ($type=="NOIR")
{
	echo '<tr>
	<td>Noir</td>
	<td>'.$refnoir.'</td>
	<td><input type="number" name="stocknoir" value="'.$stocknoir.'"></td></tr>
	<input type="hidden" name="type" value="NOIR "/>';
}

elseif ($type=="TROISCOULEURS")
{
	echo '<tr>
	<td>Noir</td>
	<td>'.$refnoir.'</td>
	<td><input type="number" name="stocknoir" value="'.$stocknoir.'"></td>
	<tr><td>Trois Couleurs</td>
	<td>'.$reftrois.'</td>
	<td><input type="number" name="stocktroiscouleurs" value="'.$stocktroiscouleurs.'"></td></tr>
	<input type="hidden" name="type" value="TROISCOULEURS "/>';
}

elseif ($type=="COULEURS")
{
	echo '<tr>
	<td>Noir</td>
	<td>'.$refnoir.'</td>
	<td><input type="number" name="stocknoir" value="'.$stocknoir.'"></td>
	<tr><td>Magenta</td>
	<td>'.$refmagenta.'</td>
	<td><input type="number" name="stockmagenta" value="'.$stockmagenta.'"></td>
	<tr><td>Jaune</td>
	<td>'.$refjaune.'</td>
	<td><input type="number" name="stockjaune" value="'.$stockjaune.'"></td>
	<tr><td>Cyan</td>
	<td>'.$refcyan.'</td>
	<td><input type="number" name="stockcyan" value="'.$stockcyan.'"></td></tr>
	<input type="hidden" name="type" value="COULEURS "/>';
	
	
}


echo '</table><br><br>
<input type="hidden" name="id" value="'.$_GET['id'].'"/>
<input type="submit" value="Mettre à jour"/>
</form>';

echo '<h2>Coordonnées Fournisseur:</h2>';
echo '<p>Nom: '.$Fnom.'<br>
Téléphone: '.$Ftel.'<br>
E-mail: '.$Fmail.'<br>
Site Web: <a href="'.$Furl.'">'.$Furl.'</a><br>
<button><a  href="accueil.php?page=edit_fournisseur&amp;id='.$_GET['id'].'">Modifier</a></button></p>';



$response = $sql->query('SELECT * from imprimante_emplacement WHERE idImprimante=\''.$_GET['id'].'\'');
if ($response)
{
	echo '<h2>Salles:</h2>';
	echo '<table>';
	echo '<tr>
	<th>Salle</th>
	<th>Nom</th></tr>';
	while ($donnees = $response->fetch())
	{
		
		echo '<tr><td>'.$donnees['Salle'].'</td>
		<td>'.$donnees['ImpNom'].'</td></tr>';
	}	
}

?>