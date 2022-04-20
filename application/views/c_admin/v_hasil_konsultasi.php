<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
		</div>
		<?php endif; ?>
<!-- DataTables Example -->
<a type="button" class="btn btn-primary text-white my-2" href="<?= site_url('admin/Konsultasi') ?>"><i class="fas fa-plus"></i>
			Tambah Data</a>
			<a type="button" class="btn btn-secondary text-white my-2" href="<?= site_url('admin/Konsultasi/playbayes') ?>">
			HITUNG NAIVE BAYES</a>
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
                    <th>SISWA</th>
					<th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($hasil as $s): ?>
                <tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td >
					<?php echo $s->NAMA_SISWA ?>
				</td>
				<td colspan="3">
				<a class="btn btn-small" href="<?= site_url('admin/Hasil_Konsultasi/detail/'.$s->ID_SISWA) ?>"><i class="fas fa-file"></i> DETAIL </a>
					<a class="btn btn-small" data-toggle="modal" data-target="#editdata<?= $s->ID_HASIL ?>"><i class="fas fa-edit"></i> Edit </a>
					<a onclick="deleteConfirm('<?php echo site_url('admin/Hasil_Konsultasi/delete/'.$s->ID_HASIL) ?>')"
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
			<form action="<?php echo site_url('admin/Hasil_Konsultasui') ?>" method="post" enctype="multipart/form-data" >
			<div class="form-group">
			<label for="ID_USER"> ID USER*</label>
			<input class="form-control <?php echo form_error('ID_USER') ? 'is-invalid':'' ?>"
				type="text" name="ID_USER" placeholder="ID_USER" />
			<div class="invalid-feedback">
				<?php echo form_error('ID_USER') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="MINAT">MINAT*</label>
			<input class="form-control <?php echo form_error('MINAT') ? 'is-invalid':'' ?>"
				type="text" name="MINAT" placeholder="MINAT" />
			<div class="invalid-feedback">
				<?php echo form_error('MINAT') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="KETERANGAN">KETERANGAN*</label>
			<input class="form-control <?php echo form_error('KETERANGAN') ? 'is-invalid':'' ?>"
				type="text" name="KETERANGAN" placeholder="KETERANGAN" />
			<div class="invalid-feedback">
				<?php echo form_error('KETERANGAN') ?>
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
	<div class="modal fade" id="editdata<?= $s->ID_HASIL ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('admin/Hasil_Konsultasi/edit') ?>" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="ID_HASIL" value="<?php echo $s->ID_HASIL?>" />

			<div class="form-group">
				<label for="ID_USER">ID_USER*</label>
				<input class="form-control <?php echo form_error('ID_USER') ? 'is-invalid':'' ?>"
				type="text" name="ID_USER" placeholder="ID_USER" value="<?php echo $s->ID_USER?>" />
				<div class="invalid-feedback">
				<?php echo form_error('ID_USER') ?>
				</div>
			</div>

			<div class="form-group">
			<label for="MINAT">MINAT*</label>
			<input class="form-control <?php echo form_error('MINAT') ? 'is-invalid':'' ?>"
				type="text" name="MINAT" placeholder="MINAT" value="<?php echo $s->MINAT ?>" />
			<div class="invalid-feedback">
				<?php echo form_error('MINAT') ?>
			</div>
			</div> -->

			<!-- <div class="form-group">
			<label for="KETERANGAN"> KETERANGAN*</label>
			<input class="form-control <?php echo form_error('KETERANGAN') ? 'is-invalid':'' ?>"
				type="text" name="KETERANGAN" placeholder="KETERANGAN" value="<?php echo $s->KETERANGAN ?>" />
			<div class="invalid-feedback">
				<?php echo form_error('KETERANGAN') ?>
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