<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
		</div>
		<?php endif; ?>
<!-- DataTables Example -->
<!-- <a type="button" class="btn btn-primary text-white my-2" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus"></i>
			Tambah Data</a>
        <div class="card mb-3">
          <div class="card-header"> -->
            <!-- <?php echo var_dump($coba)?> -->
            <i class="fas fa-table"></i>
            TABEL <?= $judul; ?></div>
			<form action="<?php echo site_url('user/Konsultasi') ?>" method="post" enctype="multipart/form-data" >
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
				<tr>
				
					<div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="ID_SISWA">BAKAT MINAT</label>
                </div>
              <select class="custom-select <?php echo form_error('ID_SISWA') ? 'is-invalid':'' ?>" name="ID_SISWA"> 
                  <?php foreach ($siswa as $j3): ?>
                  <option value="<?php echo $j3->ID_SISWA ?>"><?php echo $j3->NAMA_SISWA ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
					
				</tr>
                  <tr>
					  <th>No</th>
                    <th>PERTANYAAN</th>
					<th>IYA/TIDAK</th>
                    
                    <!-- <th>AKSI</th> -->
                  </tr>
                </thead>

                <tbody>
				

                <?php $no=1; foreach ($usr as $s): ?>
                <tr>
					
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $s->KUSONER ?>
				</td>
				<td width="150">
				<div class="form-group">
              <!-- <label class="input-group-text" for="Y/T"></label> -->
              <div class="form-check">
                
                <input class="form-check-input <?php echo form_error('K'.$s->ID_KUSONER) ? 'is-invalid':'' ?>" type="radio" value="Y" name="K<?= $s->ID_KUSONER ?>">
                <label class="form-check-label" for="K<?= $s->ID_KUSONER ?>"> Ya </label>
              </div>
              <div class="form-check">
              <input class="form-check-input <?php echo form_error('K'.$s->ID_KUSONER) ? 'is-invalid':'' ?>" type="radio" value="T" name="K<?= $s->ID_KUSONER ?>">
                <label class="form-check-label" for="K<?= $s->ID_KUSONER ?>"> Tidak </label>
                <div class="invalid-feedback">
                  <?php echo form_error('K'.$s->ID_KUSONER) ?>
                </div>
              </div>
              </div>
				</td>
				<!-- <td colspan="2">
					<a class="btn btn-small" data-toggle="modal" data-target="#editdata<?= $s->ID_KUSONER ?>"><i class="fas fa-edit"></i> Edit </a>
					<a onclick="deleteConfirm('<?php echo site_url('user/Siswa/delete/'.$s->ID_KUSONER) ?>')"
					href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus </a>
				</td> -->
				</tr>
				<?php endforeach; ?>
			
            </tbody>
			
              </table>
            </div>
          </div>
		  <button type="submit" class="btn btn-lg btn-success float-right">KONSUL </button>
			</form>
        </div>


<!-- Modal Tambah Data -->
	<!-- <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('user/Kusoner') ?>" method="post" enctype="multipart/form-data" >
			
			<div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="ID_SISWA">BAKAT MINAT</label>
                </div>
              <select class="custom-select <?php echo form_error('ID_SISWA') ? 'is-invalid':'' ?>" name="ID_SISWA"> 
                  <option selected>Pilih...</option>
                  <?php foreach ($bakat as $j3): ?>
                  <option value="<?php echo $j3->ID_SISWA ?>"><?php echo $j3->BAKAT_MINAT ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

			<div class="form-group">
			<label for="KUSONER">KUSONER*</label>
			<input class="form-control <?php echo form_error('KUSONER') ? 'is-invalid':'' ?>"
				type="text" name="KUSONER" placeholder="KUSONER" />
			<div class="invalid-feedback">
				<?php echo form_error('KUSONER') ?>
			</div>
			</div>

			
			
			<button type="submit" class="btn btn-success">Save</button>
			</form>
			</div>
			<div class="modal-footer">
			<div class="card-footer small text-muted">
		<h5>field tanda * Harus Di isi</h5>
		</div>
			</div>
		</div>
		</div>
	</div> -->

	<!-- Modal Edit Data -->
	<!-- <?php $no=1; foreach ($usr as $s): ?>
	<div class="modal fade" id="editdata<?= $s->ID_KUSONER ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('user/Kusoner/edit') ?>" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="ID_KUSONER" value="<?php echo $s->ID_KUSONER?>" />

			<div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="ID_SISWA">Jam Pelajaran</label>
                </div>
              <select class="custom-select <?php echo form_error('ID_SISWA') ? 'is-invalid':'' ?>" name="ID_SISWA"> 
                  <option selected>Pilih...</option>
                  <?php foreach ($bakat as $j6): ?>
                  <option value="<?php echo $j6->ID_SISWA ?>"<?php if ($s->ID_SISWA == $j6->ID_SISWA){echo "selected";} ?>><?php echo $j6->WAKTU ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

			<div class="form-group">
			<label for="KUSONER">KUSONER*</label>
			<input class="form-control <?php echo form_error('KUSONER') ? 'is-invalid':'' ?>"
				type="text" name="KUSONER" placeholder="KUSONER" value="<?php echo $s->KUSONER ?>" />
			<div class="invalid-feedback">
				<?php echo form_error('KUSONER') ?>
			</div>
			</div>

			
			<button type="submit" class="btn btn-success">Save</button>
			</form>
			</div>
			<div class="modal-footer">
			<div class="card-footer small text-muted">
		<h5>field tanda * Harus Di isi</h5>
		</div>
			</div>
		</div>
		</div>
	</div>
	<?php endforeach; ?> -->