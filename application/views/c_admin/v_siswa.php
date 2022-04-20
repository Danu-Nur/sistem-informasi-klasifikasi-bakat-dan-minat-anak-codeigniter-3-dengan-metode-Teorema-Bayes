<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
		</div>
		<?php endif; ?>
<!-- DataTables Example -->
<a type="button" class="btn btn-primary text-white my-2" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus"></i>
			Tambah Data</a>
        <div class="card mb-3">
          <div class="card-header">
            
            <i class="fas fa-table"></i>
            Tabel <?= $judul; ?></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NAMA SISWA</th>
                    <th>KELAS</th>
                    <th>JENIS KELAMIN</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($usr as $s): ?>
                <tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $s->NAMA_SISWA ?>
				</td>
				<td width="150">
					<?php echo $s->KELAS ?>
				</td>
				<td>
					<?php echo $s->JK ?>
				</td>
				<td colspan="2">
					<a class="btn btn-small" data-toggle="modal" data-target="#editdata<?= $s->ID_SISWA ?>"><i class="fas fa-edit"></i> Edit </a>
					<a onclick="deleteConfirm('<?php echo site_url('admin/Siswa/delete/'.$s->ID_SISWA) ?>')"
					href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus </a>
				</td>
				</tr>
				<?php endforeach; ?>
            </tbody>
              </table>
            </div>
          </div>
        </div>


<!-- Modal Tambah Data -->
	<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('admin/Siswa') ?>" method="post" enctype="multipart/form-data" >
			<div class="form-group">
			<label for="NAMA_SISWA">NAMA SISWA*</label>
			<input class="form-control <?php echo form_error('NAMA_SISWA') ? 'is-invalid':'' ?>"
				type="text" name="NAMA_SISWA" placeholder="NAMA_SISWA" />
			<div class="invalid-feedback">
				<?php echo form_error('NAMA_SISWA') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="KELAS">KELAS*</label>
			<input class="form-control <?php echo form_error('KELAS') ? 'is-invalid':'' ?>"
				type="text" name="KELAS" placeholder="KELAS" />
			<div class="invalid-feedback">
				<?php echo form_error('KELAS') ?>
			</div>
			</div>

			<div class="form-group">
              <label class="input-group-text" for="JK">Jenis Kelamin*</label>
              <div class="form-check">
                
                <input class="form-check-input <?php echo form_error('JK') ? 'is-invalid':'' ?>" type="radio" value="L" name="JK">
                <label class="form-check-label" for="JK"> L </label>
              </div>
              <div class="form-check">
              <input class="form-check-input <?php echo form_error('JK') ? 'is-invalid':'' ?>" type="radio" value="P" name="JK">
                <label class="form-check-label" for="JK"> P </label>
                <div class="invalid-feedback">
                  <?php echo form_error('JK') ?>
                </div>
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

	<!-- Modal Edit Data -->
	<?php $no=1; foreach ($usr as $s): ?>
	<div class="modal fade" id="editdata<?= $s->ID_SISWA ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('admin/Siswa/edit') ?>" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="ID_SISWA" value="<?php echo $s->ID_SISWA?>" />

			<div class="form-group">
				<label for="NAMA_SISWA">NAMA SISWA*</label>
				<input class="form-control <?php echo form_error('NAMA_SISWA') ? 'is-invalid':'' ?>"
				type="text" name="NAMA_SISWA" placeholder="NAMA_SISWA" value="<?php echo $s->NAMA_SISWA?>" />
				<div class="invalid-feedback">
				<?php echo form_error('NAMA_SISWA') ?>
				</div>
			</div>

			<div class="form-group">
			<label for="KELAS">KELAS*</label>
			<input class="form-control <?php echo form_error('KELAS') ? 'is-invalid':'' ?>"
				type="text" name="KELAS" placeholder="KELAS" value="<?php echo $s->KELAS ?>" />
			<div class="invalid-feedback">
				<?php echo form_error('KELAS') ?>
			</div>
			</div>

			<div class="form-group">
              <label class="input-group-text" for="JK">Jenis Kelamin*</label>
              <div class="form-check">
                
                <input class="form-check-input <?php echo form_error('JK') ? 'is-invalid':'' ?>" type="radio" value="L" <?php if ($s->JK == 'L') {echo "cheked";} ?> name="JK">
                <label class="form-check-label" for="JK"> L </label>
              </div>
              <div class="form-check">
              <input class="form-check-input <?php echo form_error('JK') ? 'is-invalid':'' ?>" type="radio" value="P" <?php if ($s->JK == 'P') {echo "cheked";} ?> name="JK">
                <label class="form-check-label" for="JK"> P </label>
                <div class="invalid-feedback">
                  <?php echo form_error('JK') ?>
                </div>
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
	<?php endforeach; ?>