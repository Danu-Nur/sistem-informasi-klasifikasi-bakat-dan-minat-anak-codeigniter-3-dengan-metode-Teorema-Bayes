<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <!-- <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol> -->

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-6 col-lg-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fm fa-comments"></i>
                </div><div class="ml-5"><h3><?= $this->db->count_all('tb_siswa'); ?></h3></div>
                <div class="ml-5"><h4>SISWA</h4></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Siswa') ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-arrow-circle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-id-badge"></i>
                </div><div class="ml-5"><h3><?= $this->db->count_all('tb_bakat_minat'); ?></h3></div>
                <div class="ml-5"><h3>BAKAT MINAT</h3></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href=" <?php echo base_url('admin/Bakat_Minat') ?> ">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-arrow-circle-right"></i>
                </span>
              </a>
            </div>
          </div>

          

          
        </div>

      </div>
      <!-- /.container-fluid -->


  <!-- /#wrapper -->