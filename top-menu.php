<?php require_once("config.php")?>
<link rel="manifest" href="pwa/manifest.webmanifest">
<script src="bootstrap-4.3.1-dist/js/jquery-3.2.1.min.js"></script>
<script src="bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
<div class="header header-fixed header-logo-center">
        <a href="index.php" class="header-title"><?php echo $config['Company_name'];?></a>
		<a href="#" class="back-button header-icon header-icon-1"><i class="fas fa-3x fa-arrow-left"></i></a>
		<a href="logout.php" data-toggle-theme-switch class="header-icon header-icon-4">خروج</a>
</div>