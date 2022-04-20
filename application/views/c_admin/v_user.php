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
                    <th>NAMA</th>
                    <th>PASSWORD</th>
                    <th>STATUS USER</th>
                 
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($usr as $p): ?>
                <tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $p->NAMA ?>
				</td>
				<td width="150">
					<?php echo $p->PASSW ?>
				</td>
				<td>
					<?php echo $p->STATUS_USER ?>
				</td>
				<td colspan="2">
					<a class="btn btn-small" data-toggle="modal" data-target="#editdata<?= $p->ID_USER ?>"><i class="fas fa-edit"></i> Edit </a>
					<a onclick="deleteConfirm('<?php echo site_url('admin/Login/delete/'.$p->ID_USER) ?>')"
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
			<form action="<?php echo site_url('admin/Login') ?>" method="post" enctype="multipart/form-data" >
			<div class="form-group">
			<label for="NAMA">NAMA*</label>
			<input class="form-control <?php echo form_error('NAMA') ? 'is-invalid':'' ?>"
				type="text" name="NAMA" placeholder="NAMA" />
			<div class="invalid-feedback">
				<?php echo form_error('NAMA') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="PASSW">Password*</label>
			<input class="form-control <?php echo form_error('PASSW') ? 'is-invalid':'' ?>"
				type="text" name="PASSW" placeholder="Password" />
			<div class="invalid-feedback">
				<?php echo form_error('PASSW') ?>
			</div>
			</div>

			<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="STATUS_USER">Status User</label>
			</div>
			<select class="custom-select <?php echo form_error('STATUS_USER') ? 'is-invalid':'' ?>" name="STATUS_USER"> 
				<option selected>Pilih...</option>
				<option value="ADMIN">ADMIN</option>
				<option value="USER">USER</option>
			</select>
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
	<?php $no=1; foreach ($usr as $p): ?>
	<div class="modal fade" id="editdata<?= $p->ID_USER ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('admin/Login/edit') ?>" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="ID_USER" value="<?php echo $p->ID_USER?>" />

			<div class="form-group">
				<label for="NAMA">NAMA*</label>
				<input class="form-control <?php echo form_error('NAMA') ? 'is-invalid':'' ?>"
				type="text" name="NAMA" placeholder="NAMA" value="<?php echo $p->NAMA ?>" />
				<div class="invalid-feedback">
				<?php echo form_error('NAMA') ?>
				</div>
			</div>

			<div class="form-group">
			<label for="PASSW">Password*</label>
			<input class="form-control <?php echo form_error('PASSW') ? 'is-invalid':'' ?>"
				type="text" name="PASSW" placeholder="Password" value="<?php echo $p->PASSW ?>" />
			<div class="invalid-feedback">
				<?php echo form_error('PASSW') ?>
			</div>
			</div>

			<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="STATUS_USER">Status User</label>
			</div>
			<select class="custom-select <?php echo form_error('STATUS_USER') ? 'is-invalid':'' ?>" name="STATUS_USER"> 
				<option value="ADMIN" <?php if ($p->STATUS_USER == "ADMIN"){echo "selected";} ?>>ADMIN</option>
				<option value="USER" <?php if ($p->STATUS_USER == "USER"){echo "selected";} ?>>USER</option>
			</select>
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