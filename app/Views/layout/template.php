<!doctype html>
<html lang="en">
  <head>
  	<title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?= $this->include('/layout/link.php') ?>
    
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="index.html" class="logo">D'</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="/"><span class="fa fa-home"></span> Home</a>
          </li>
          
          <li>
            <!-- <i class=""></i> -->
            <a href="/logout"><span class="ion ion-log-out"></span> Logout</a>
          </li>
        </ul>

        <div class="footer">
        	<p>
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
		    	</p>
        </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item <?= $tab == 'Home' ? 'active' : '' ?>">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item <?= $tab == 'Biblio' ? 'active' : '' ?>">
                    <a class="nav-link" href="/biblio/index">Biblio</a>
                </li>
                <li class="nav-item <?= $tab == 'Koleksi' ? 'active' : '' ?>">
                    <a class="nav-link" href="/koleksi/index">Koleksi Biblio</a>
                </li>
                <li class="nav-item <?= $tab == 'Member' ? 'active' : '' ?>">
                    <a class="nav-link" href="/member/index">Member</a>
                </li>
                <li class="nav-item <?= $tab == 'Peminjaman' ? 'active' : '' ?>">
                    <a class="nav-link" href="/peminjaman/index">Riwayat Peminjaman</a>
                </li>
                <li class="nav-item <?= $tab == 'Pengembalian' ? 'active' : '' ?>">
                    <a class="nav-link" href="/pengembalian/index">Pengembalian</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <?= $this->renderSection('content'); ?>;

        
      </div>
		</div>

    <script>

      function previewImage()
      {
        const sampul = document.querySelector("#img");
        const image = document.querySelector(".img-preview");

        const filesampul = new FileReader();
        filesampul.readAsDataURL(sampul.files[0]);

        filesampul.onload = function(e){
          image.src = e.target.result;
        }

      }

        
    </script>

    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="<?= base_url('js/jquery.min.js'); ?>"></script>
    <!-- <script src="js/popper.js"></script> -->
    <script src="<?= base_url('js/popper.js') ?>"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <!-- <script src="js/main.js"></script> -->
    <script src="<?= base_url('js/main.js') ?>"></script>

    
  </body>
</html>