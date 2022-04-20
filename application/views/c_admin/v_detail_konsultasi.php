<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
		</div>
		<?php endif; ?>
<!-- DataTables Example -->
<a type="button" class="btn btn-primary text-white my-2" href="<?= base_url('admin/Hasil_konsultasi')?>">
			kembali</a>
        
			
			<div class="card mb-3">
          <div class="card-header">
            
            <i class="fas fa-table"></i>
            Tabel <?= $sub; ?></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>No</th>
                    <th>SISWA</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($siswa as $s): ?>
                <tr>
				<td>
					<?php echo $no++; ?>
				</td>
				
				<td >
					<?php echo $s->NAMA_SISWA ?>
				</td>
				</tr>
				<?php endforeach; ?>
            </tbody>
              </table>
            </div>
          </div>
        </div>

		<div class="card mb-3">
          <div class="card-header">
            
            <i class="fas fa-table"></i>
            Tabel <?= $sub2; ?></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
					<th>No</th>
                    <th>BAKAT</th>
                    <th>HASIL HITUNG</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($detail as $s): ?>
                <tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td >
					<?php echo $s->BAKAT_MINAT ?>
				</td>
				<td>
					<?php echo $s->HASIL_HITUNG ?>
				</td>
				</tr>
				<?php endforeach; ?>
            </tbody>
              </table>
            </div>
          </div>
        </div>