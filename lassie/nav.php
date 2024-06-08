
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        Appointment Login
    </a>

      <div class="col-md-3 text-end">
        <?php 
            if (!isset($_SESSION['profile'])) {
                $line = new LineLogin();
                $link = $line->getLink();
        ?>
        <a href="<?php echo $link; ?>" class="btn btn-success me-2">Line Login</a>
        <?php } else { ?>
          <a href="#" class="cursor-pointer symbol symbol-50px symbol-md-55px">
            <img class="symbol symbol-circle symbol-30px symbol-md-35px" src="<?= $_SESSION['profile']->picture;?>" alt="user">
          </a>
          <a href="logout.php" class="btn btn-danger">Logout</a>
        <?php } ?>
        </div>
    </header>
  </div>