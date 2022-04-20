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
                    <th>ID SISWA</th>
                    <th>ID BAKAT MINAT </th>
					<th>IYA</th>
					<th>TIDAK</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($usr as $s): ?>
                <tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $s->ID_SISWA ?>
				</td>
				<td width="150">
					<?php echo $s->ID_BAKAT_MINAT ?>
				</td>
				<td>
					<?php echo $s->IYA ?>
				</td>
				<td>
					<?php echo $s->TIDAK ?>
				</td>
				<td colspan="2">
					<a class="btn btn-small" data-toggle="modal" data-target="#editdata<?= $s->ID_DUMP ?>"><i class="fas fa-edit"></i> Edit </a>
					<a onclick="deleteConfirm('<?php echo site_url('admin/Dump/delete/'.$s->ID_DUMP) ?>')"
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
			<form action="<?php echo site_url('admin/Dump') ?>" method="post" enctype="multipart/form-data" >
			<div class="form-group">
			<label for="ID_SISWA">ID SISWA*</label>
			<input class="form-control <?php echo form_error('ID_SISWA') ? 'is-invalid':'' ?>"
				type="text" name="ID_SISWA" placeholder="ID_SISWA" />
			<div class="invalid-feedback">
				<?php echo form_error('ID_SISWA') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="ID_BAKAT_MINAT">ID BAKAT MINAT*</label>
			<input class="form-control <?php echo form_error('ID_BAKAT_MINAT') ? 'is-invalid':'' ?>"
				type="text" name="ID_BAKAT_MINAT" placeholder="ID_BAKAT_MINAT" />
			<div class="invalid-feedback">
				<?php echo form_error('ID_BAKAT_MINAT') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="IYA">IYA*</label>
			<input class="form-control <?php echo form_error('IYA') ? 'is-invalid':'' ?>"
				type="text" name="IYA" placeholder="IYA" />
			<div class="invalid-feedback">
				<?php echo form_error('IYA') ?>
			</div>
            </div>

			<div class="form-group">
			<label for="TIDAK">TIDAK*</label>
			<input class="form-control <?php echo form_error('TIDAK') ? 'is-invalid':'' ?>"
				type="text" name="TIDAK" placeholder="TIDAK" />
			<div class="invalid-feedback">
				<?php echo form_error('TIDAK') ?>
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
	<div class="modal fade" id="editdata<?= $s->ID_DUMP ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('admin/Dump/edit') ?>" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="ID_DUMP" value="<?php echo $s->ID_DUMP?>" />

			<div class="form-group">
				<label for="ID_SISWA">NAMA SISWA*</label>
				<input class="form-control <?php echo form_error('ID_SISWA') ? 'is-invalid':'' ?>"
				type="text" name="ID_SISWA" placeholder="ID_SISWA" value="<?php echo $s->ID_SISWA?>" />
				<div class="invalid-feedback">
				<?php echo form_error('ID_SISWA') ?>
				</div>
			</div>

			<div class="form-group">
			<label for="ID_BAKAT_MINAT">ID_BAKAT_MINAT*</label>
			<input class="form-control <?php echo form_error('ID_BAKAT_MINAT') ? 'is-invalid':'' ?>"
				type="text" name="ID_BAKAT_MINAT" placeholder="ID_BAKAT_MINAT" value="<?php echo $s->ID_BAKAT_MINAT ?>" />
			<div class="invalid-feedback">
				<?php echo form_error('ID_BAKAT_MINAT') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="IYA"> IYA*</label>
			<input class="form-control <?php echo form_error('IYA') ? 'is-invalid':'' ?>"
				type="text" name="IYA" placeholder="IYA" value="<?php echo $s->IYA ?>" />
			<div class="invalid-feedback">
				<?php echo form_error('IYA') ?>
			</div>
            </div>

			<div class="form-group">
			<label for="TIDAK"> TIDAK*</label>
			<input class="form-control <?php echo form_error('TIDAK') ? 'is-invalid':'' ?>"
				type="text" name="TIDAK" placeholder="TIDAK" value="<?php echo $s->TIDAK ?>" />
			<div class="invalid-feedback">
				<?php echo form_error('TIDAK') ?>
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