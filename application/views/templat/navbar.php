<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <?php if($this->session->userdata('ID_USER')){ ?>
      <span class="brand-text font-weight-light "><?php echo $this->session->userdata('NAMA'); ?></span>
      <button href="" class="btn btn-small bg-warning">
					<?php echo anchor('Welcome/logout', '<i class="nav-icon fas fa-sign-out-alt"></i> Logout'); ?>  </button>
					<?php } else { ?>
						<?php echo anchor('Welcome', 'Login'); ?>
						<?php } ?> 
    </ul>

  </nav>