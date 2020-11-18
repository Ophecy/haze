<?php
include_once('inc/config.php');

// récupération des données
$json = file_get_contents(API_URL);
$jsonDecoded = json_decode($json, true);

// connexion db
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

foreach ($jsonDecoded as $key => $value) {
	if (preg_match("/2020-[0-1][0-9]-[0-3][0-9] [0-2][0-9]:00:00/", $key)) {
		$sql = "SELECT `name` FROM `data` WHERE `name` LIKE ?";
		$req = $pdo->prepare($sql);
		$req->execute([$key]);
		$existing = $req->fetchAll();
		if (count($existing) == 0) {

			// insertion des temperatures
			$sql = "INSERT INTO `temperature` (`2m`, `sol`, `500hpa`, `850hpa`) VALUES (?,?,?,?)";
			$params = [
				$value['temperature']['2m'] - 273.15,
				$value['temperature']['sol'] - 273.15,
				$value['temperature']['500hPa'],
				$value['temperature']['850hPa']
			];
			$req = $pdo->prepare($sql);
			$req->execute($params);
			$tempID = $pdo->lastInsertId();

			// insertion des nebulosites
			$sql = "INSERT INTO `nebulosite` (`haute`, `moyenne`, `basse`, `totale`) VALUES (?,?,?,?)";
			$params = [
				$value['nebulosite']['haute'],
				$value['nebulosite']['moyenne'],
				$value['nebulosite']['basse'],
				$value['nebulosite']['totale']
			];
			$req = $pdo->prepare($sql);
			$req->execute($params);
			$nebID = $pdo->lastInsertId();

			// inseertion des datas
			$sql = "INSERT INTO `data` (`temperature`, `pression`, `pluie`, `pluie_convective`, `humidite`, `vent_moyen`, `vent_rafale`, `vent_direction`, `iso_zero`, `risque_neige`, `cape`, `nebulosite`, `name`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
			echo "$key : $nebID $tempID <br>";
			$params = [
				$tempID,
				$value['pression']['niveau_de_la_mer'],
				$value['pluie'],
				$value['pluie_convective'],
				$value['humidite']['2m'],
				$value['vent_moyen']['10m'],
				$value['vent_rafales']['10m'],
				$value['vent_direction']['10m'],
				$value['iso_zero'],
				$value['risque_neige'],
				$value['cape'],
				$nebID,
				$key
			];
			$req = $pdo->prepare($sql);
			$req->execute($params);
		} else echo " data for $key already in base <br>";
	} else echo "not data $key skipped <br>";
}
