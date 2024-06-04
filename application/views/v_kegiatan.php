<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets') ?>/user/css/materialize.min.css"  media="screen,projection"/>

      <!-- my css -->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets') ?>/user/css/style.css">

      <style type="text/css">
        .parallax-container{
          height: 400px;
        }

        .active{
          background-color: #B8860B;
          color: #fff;
        }

        .clients h3{
          text-shadow: 2px 2px 4px rgba(0,0,0,1);
        }

        .warna{
          background-color: #DAA520;
        }
      </style>

      <!--Let browser know website is optimized for mobile-->
    <title><?php echo $title; ?></title>
</head>
<body>
     <!-- navbar -->
     <div class="navbar-fixed">
        <nav class="warna">
          <div class="logo">
            <div class="container">
              <div class="nav-wrapper">
                <div class="text-darken-3">
                <?php foreach($identitas as $idn) : ?>
                  <a href="" class="brand-logo">
                    <?php echo $idn->judul_website; ?>
                  </a>
                <?php endforeach; ?>
                <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                  <li><a class="list" href="#about">PROFILE DESA</a></li>
                  <li><a class="list" href="<?php echo base_url('admin/kegiatan/view_kegiatan'); ?>">KEGIATAN</a></li>
                  <li><a class="list" href="<?php echo base_url('admin/berita/view_berita'); ?>">BERITA</a></li>
                  <li><a class="list" href="#statistik">TRANSPARANSI</a></li>
                  <li><a href="<?php echo base_url('login'); ?>">LOGIN</a></li>
                </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>

      <!-- sidenav mobile nav-->
      <ul class="sidenav" id="mobile-nav">
      <li><a class="list" href="#about">PROFILE DESA</a></li>
      <li><a class="list" href="#kegiatan">KEGIATAN</a></li>
      <li><a class="list" href="#berita">BERITA</a></li>
      <li><a href="<?php echo base_url('login'); ?>">LOGIN</a></li>
      </ul>
    <h1>Ini Adalah Laman Kegiatan</h1>
    <section id="kegiatan" class="contact grey lighten-3 scrollspy">
        <div class="container">
          <h3 class="center light grey-text text-darken-3">KEGIATAN DESA</h3>
          <div class="row">
              <?php foreach($kegiatan as $row) { ?>
               <div class="col m4 s12">
                  <div class="card-panel center">
                    <img style="border-radius: 10%;" src="<?php echo base_url('assets/user/img/'.$row->gambar) ?>" class="responsive-img materialboxed">
                    <h5><?php echo $row->judul; ?></h5>
                    <p>
                      <?php echo $row->isi; ?>
                    </p>
                  </div>
              </div>
              <?php } ?>
          </div>
        </div>
      </section>


       <!-- footer -->
       <footer class="yellow darken-3 white-text center">
        <p style="font-size: 15px;" class="flow-text">copyright KELOMPOK 3 <?php echo date('Y'); ?></p>
      </footer>


<!-- JAVASCRIPT -->

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="<?php echo base_url('assets') ?>/user/js/materialize.min.js"></script>

  <!-- sidenav -->
    <script>
     const sideNav = document.querySelectorAll('.sidenav');
     M.Sidenav.init(sideNav);
    </script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript">
      $(document).ready(function(){
       $('ul li a').click(function(){
       $('li a').removeClass("active");
       $(this).addClass("active");
            });
       });
     </script>
</body>
</html>