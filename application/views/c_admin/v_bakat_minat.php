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
                    <th>BAKAT MINAT</th>
					<th>AKSI</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($usr as $b): ?>
                <tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $b->BAKAT_MINAT ?>
				</td>				
				<td colspan="2">
					<a class="btn btn-small" data-toggle="modal" data-target="#editdata<?= $b->ID_BAKAT_MINAT ?>"><i class="fas fa-edit"></i> Edit </a>
					<a onclick="deleteConfirm('<?php echo site_url('admin/Bakat_Minat/delete/'.$b->ID_BAKAT_MINAT) ?>')"
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
			<form action="<?php echo site_url('admin/Bakat_Minat') ?>" method="post" enctype="multipart/form-data" >
			<div class="form-group">
			<label for="BAKAT_MINAT"> BAKAT MINAT*</label>
			<input class="form-control <?php echo form_error('BAKAT_MINAT') ? 'is-invalid':'' ?>"
				type="text" name="BAKAT_MINAT" placeholder="BAKAT_MINAT" />
			<div class="invalid-feedback">
				<?php echo form_error('BAKAT_MINAT') ?>
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
	<?php $no=1; foreach ($usr as $b): ?>
	<div class="modal fade" id="editdata<?= $b->ID_BAKAT_MINAT ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('admin/Bakat_Minat/edit') ?>" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="ID_BAKAT_MINAT" value="<?php echo $b->ID_BAKAT_MINAT?>" />

			<div class="form-group">
				<label for="BAKAT_MINAT">BAKAT MINAT *</label>
				<input class="form-control <?php echo form_error('BAKAT_MINAT') ? 'is-invalid':'' ?>"
				type="text" name="BAKAT_MINAT" placeholder="BAKAT_MINAT" value="<?php echo $b->BAKAT_MINAT?>" />
				<div class="invalid-feedback">
				<?php echo form_error('BAKAT_MINAT') ?>
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