<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "eapoteka_db";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{

            printf("Konekcija neuspesna: %s\n", $this->dblink->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

	function ubaci($data) {
		$mysqli = new mysqli("localhost", "root", "", "eapoteka_db");
		$cols = '(naziv, opis, slika, cena, kategorijaID)';

		$naziv = mysqli_real_escape_string($this->dblink,$data['naziv']);
		$opis = mysqli_real_escape_string($this->dblink,$data['opis']);
		$cena = mysqli_real_escape_string($this->dblink,$data['cena']);
		$kategorijaID = mysqli_real_escape_string($this->dblink,$data['kategorija']);
		$slika = mysqli_real_escape_string($this->dblink,$data['slika']);

		$values = "('".$naziv."','".$opis."','".$slika."',".$cena.",".$kategorijaID.")";

		$query = 'INSERT into lekovi '.$cols. ' VALUES '.$values;

		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}


		function ubaciKorisnika($data) {
			$mysqli = new mysqli("localhost", "root", "", "eapoteka_db");
			$cols = '(imePrezime, username, password, korisnickaUloga)';

			$imePrezime = mysqli_real_escape_string($this->dblink,$data['imePrezime']);
			$username = mysqli_real_escape_string($this->dblink,$data['username']);
			$password = mysqli_real_escape_string($this->dblink,$data['password']);


			$values = "('".$imePrezime."','".$username."','".$password."','korisnik')";

			$query = 'INSERT into korisnik '.$cols. ' VALUES '.$values;

			if($mysqli->query($query))
			{
				$this ->result = true;
			}
			else
			{
				$this->result = false;
			}
			$mysqli->close();
		}

		function kupiLek($data) {
					$mysqli = new mysqli("localhost", "root", "", "eapoteka_db");
					$cols = '(lekID, korisnikID, daLiJeObavljena, datum)';

					$lekID = mysqli_real_escape_string($this->dblink,$data['lekID']);
					$korisnikID = mysqli_real_escape_string($this->dblink,$data['korisnikID']);

					$values = "(".$lekID.",".$korisnikID.",0,'".date('Y-m-d H:i:s')."')";

					$query = 'INSERT into kupovina '.$cols. ' VALUES '.$values;

					if($mysqli->query($query))
					{
						$this ->result = true;
					}
					else
					{
						$this->result = false;
					}
					$mysqli->close();
		}



	function vratiKategorije() {
		$mysqli = new mysqli("localhost", "root", "", "eapoteka_db");
		$q = 'SELECT * FROM kategorijalekova';
		$this ->result = $this->dblink->query($q);
		$mysqli->close();
	}

	function vratiLekove() {
		$mysqli = new mysqli("localhost", "root", "", "eapoteka_db");
		$q = 'SELECT * FROM lekovi l join kategorijalekova kl on l.kategorijaID = kl.kategorijaID';
		$this ->result = $this->dblink->query($q);
		$mysqli->close();
	}


	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
