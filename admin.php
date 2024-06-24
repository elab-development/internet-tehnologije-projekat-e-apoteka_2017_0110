<?php include("init.php");

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Apoteka</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Ruda:400,900,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/prettyphoto/css/prettyphoto.css" rel="stylesheet">
  <link href="lib/hover/hoverex-all.css" rel="stylesheet">
  <link href="lib/jetmenu/jetmenu.css" rel="stylesheet">
  <link href="lib/owl-carousel/owl-carousel.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style2.css" rel="stylesheet">

<style type="text/css">
  #grafik{
    margin-bottom: 20px;
  }
  </style>
  </head>
  <body>


  <?php include 'heder.php'; ?>
	<div class="features">
		<div class="container">
			<div class="text-center">
				<div class="dm-icon-effect-1" data-effect="slide-bottom">
					<h2>Novi lek</h2>
          <form method="post" action="upload.php" enctype="multipart/form-data">
            <div class="form-group">
  								  <label for="naziv" class="cols-sm-2 control-label">Naziv</label>
  									  <div class="cols-sm-10">
  										  <div class="input-group">
  											  <span class="input-group-addon"><i class="fa fas fa-font"></i></span>
  											  <input type="text" class="form-control" name="naziv"  placeholder="Naziv" id="naziv" />
  									  	</div>
  								  	</div>
  							</div>

  							<div class="form-group">
                
  								<label for="opis" class="cols-sm-2 control-label">Opis</label>
  									<div class="cols-sm-10">
  										<div class="input-group">
  											<span class="input-group-addon"><i class="fa fas fa-align-justify"></i></span>
  											<input type="text" class="form-control" name="opis" placeholder="Opis" id="opis" />
  										</div>
  									</div>
  							</div>
                <div class="form-group">
  								<label for="cena" class="cols-sm-2 control-label">Cena</label>
  									<div class="cols-sm-10">
  										<div class="input-group">
  											<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
  											<input type="number" class="form-control" name="cena" min="1"  placeholder="Cena" id="cena" />
  										</div>
  									</div>
  							</div>

                <div class="form-group">
                  <label for="kategorija" class="cols-sm-2 control-label">Kategorija</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fas fa-ambulance"></i></span>
                        <select name="kategorija" class="form-control">
                					<?php
                            $path = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
                						$curl_zahtev = curl_init("{$path}/rest/kategorije.json");
                						curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
                						$curl_odgovor = curl_exec($curl_zahtev);
                						$json_objekat=json_decode($curl_odgovor, true);
                						curl_close($curl_zahtev);
                						$kategorije = $json_objekat;
                						foreach($kategorije as $kategorija):
                					?>
                						<option value="<?php echo($kategorija['kategorijaID']);?>"><?php echo($kategorija['nazivKategorije']);?></option>
                					<?php endforeach; ?>
                				</select>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="file" class="cols-sm-2 control-label">Slika</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa far fa-image"></i></span>
                        <input type="file" class="form-control" name="file" placeholder="Ubacite sliku leka" id="file" />
                      </div>
                    </div>
                </div>
                  <div class="form-group ">
                    <input type="submit" class="btn btn-lg " value="Sačuvaj">
                  </div>
              </form>
              
				</div>
				<div class="dm-icon-effect-1" data-effect="slide-bottom">
          <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Naziv leka</th>
                    <th>Opis</th>
                    <th>Ime kupca</th>
                    <th>Datum kupovine</th>
                    <th>Potvrda</th>
                    <th>Potvrdi kupovinu</th>
                    <th>Obriši zahtev</th>
                  </tr>
                  <tbody>
                    <?php
                      $kLek = $db->rawQuery('select * from lekovi l join kategorijalekova kl on l.kategorijaID=kl.kategorijaID join kupovina k on k.lekID = l.lekID join korisnik kor on k.korisnikID = kor.korisnikID');
                      foreach ($kLek as $kl) {
                        ?>
                          <tr>
                              <td><?php echo($kl['naziv']); ?></td>
                              <td><?php echo($kl['opis']); ?></td>
                              <td><?php echo($kl['imePrezime']); ?></td>
                              <td><?php echo($kl['datum']); ?></td>
                              <td><?php if($kl['daLiJeObavljena']==1) {echo('Potvrđen/a');}else{echo('Nije potvrđen/a');}; ?></td>
                              <td><button role="button" class="btn btn-info" onclick="potvrdi(<?php echo($kl['kupovinaID']); ?>)">Potvrdi</button></td>
                              <td><button role="button" class="btn btn-danger" onclick="obrisi(<?php echo($kl['kupovinaID']); ?>)">Obriši</button></td>

                          </tr>

                        <?php
                      }

                    ?>

                  </tbody>
                </table>
                <div id="odgovorAdmin"> </div>
				</div>
				<div class="dm-icon-effect-1" data-effect="slide-bottom">
                <div id="grafik"> </div>
				</div>
			</div>
		</div>
	</div>


  <?php include 'footer2.php'; ?>

    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/functions.js"></script>
	<script>wow = new WOW({}).init();</script>
  <script>
  	function potvrdi(kupovinaID){

      		var podaci = "kupovinaID=" + kupovinaID ;

      				$.ajax({
      					method: "get",
      					url: "potvrdi.php",
      					data: podaci,
      					success: function(data){
      						$("#odgovorAdmin").html(data);
      				}
      			});
      	}

    function obrisi(kupovinaID){

      		var podaci = "kupovinaID=" + kupovinaID ;

      				$.ajax({
      					method: "get",
      					url: "obrisiKupovinu.php",
      					data: podaci,
      					success: function(data){
      						$("#odgovorAdmin").html(data);
      				}
      			});
      	}

      	</script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load('visualization', '1', {'packages':['corechart']});
            google.setOnLoadCallback(crtajGrafik);
            function crtajGrafik() {
              var jsonData = $.ajax({
              url: "grafik.php",
              dataType:"json",
              async: false
            }).responseText;
            var data = new google.visualization.DataTable(jsonData);
            var options = {'title':'Grafik - Lekovi/Kategorija',
        	    titleTextStyle: {
        		textAlign: 'center',
                color: 'black',
              	fontSize: 32},
              	  'width':1200,
                    'height':600,
              	  legend: {
                      textStyle: {
              			color: 'black'
                      }
                  },
        	  };
         var chart = new google.visualization.PieChart(document.getElementById('grafik'));
            chart.draw(data,  options);

          }

</script>
</body>
</html>
