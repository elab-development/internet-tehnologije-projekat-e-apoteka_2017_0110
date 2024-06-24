<header class="header">
<link rel="stylesheet" href="css/colors/pomegranate.css">
<div class="topbar clearfix">
    <div class="container">
      <div class="col-lg-12 text-right">
        <div class="social_buttons">
          <a href="https://www.facebook.com/fon.bg.ac.rs" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
          <a href="https://twitter.com/Univerzitet_BG" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
          <a href="https://www.instagram.com/fon_bg/" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <!-- end container -->
	</div>
    <div class="container">
      <div class="site-header clearfix">
        <div class="col-lg-3 col-md-3 col-sm-12 title-area">
          <div class="site-title" id="title">
            <a href="index.php" title="">
              <h4>E<span>APOTEKA</span></h4>
            </a>
          </div>
        </div>
        <!-- title area -->
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div id="nav" class="right">
            <div class="container clearfix">
              <ul id="jetmenu" class="jetmenu blue">
                <li class = "index"><a href="index.php">Početna</a>
                </li>
                <li class = "onama"><a href="onama.php">O nama</a>
                </li>
                <li class = "vesti"><a href="vesti.php">Vesti</a>
                </li>
                <?php
                    if(!empty($_SESSION['korisnik'])){ 
                      if($_SESSION['korisnik']['korisnickaUloga']=='korisnik'){
                        ?>
                          <li calss = "kupi"><a href="kupi.php">Kupi lek</a></li>
                      <?php
                    }
                      if($_SESSION['korisnik']['korisnickaUloga']=='admin'){
                          ?>
                            <li class = "admin"><a href="admin.php">Administrator</a></li>
                          <?php
                      }

                      ?>
                        <li><a href="logout.php">Logout</a></li>
                      <?php
                    }else{
                      ?>
                      <li class = "registracijaKorisnika" ><a  href="registracijaKorisnika.php">Registracija</a></li>
                      <li class = "loginKorisnika"><a href="loginKorisnika.php">Login</a></li>
                      <?php
                    }
               ?>
              </ul>
            </div>
          </div>
          <!-- nav -->
        </div>
        <!-- title area -->
      </div>
      <!-- site header -->
      
    </div>
    <!-- end container -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        
        $(document).ready(()=>{
            
            var path = window.location.pathname;
            var page = path.split("/").pop();
            page = page.substring(0, page.length - 4);
            console.log( page );
            $('.'+page).addClass('active')
       
        });
    </script>
  </header>
  <!-- end header -->