<?php

class Korisnik {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function registrujKorisnika($data) {

		$parameters = json_encode($data);
			$path = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
			$curl_zahtev = curl_init("{$path}/rest/ubaciKorisnika.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);

			if($json_objekat == "Uspesno ste registrovali korisnika!") {
				return true;
			}
			else {
				return false;
			}

	}

	public function login() {

		$k = $this->db->escape(trim($_POST['username']));
		$p = $this->db->escape(trim($_POST['password']));
		$params = Array($k,$p);

		$korisnik = $this->db->rawQuery("select * from korisnik WHERE username=? and password=?",$params);

		if(empty($korisnik)){
			return false;
		}else{
			$_SESSION['korisnik'] = $korisnik[0];
			return true;
		}


	}
}

?>
