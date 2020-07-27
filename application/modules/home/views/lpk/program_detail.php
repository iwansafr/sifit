<?php
if(!empty($data))
{
	?>
	<div class="box box-primary">
	  <div class="box-header with-border">
	    <h3 class="box-title"><?php echo $data['title'] ?></h3>
	    <div class="box-tools pull-right">
	      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	      </button>
	    </div>
	  </div>
	  <div class="box-body">
			<div class="timeline-item">
	      <div class="timeline-body" style="text-align: center;">
					<h1><?php echo $data['title'] ?></h1>
					<center>
						<img src="<?php echo image_module('lpk_program',$data['id'].'/'.$data['foto']) ?>" alt="">
					</center>
					<hr>
					<?php echo $data['description'] ?>
	      </div>
	    </div>
			<hr>
			<div class="panel panel-default">
				<div class="panel-heading">
					Persyaratan
				</div>
				<div class="panel-body">
					<?php echo $data['syarat']; ?>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Detail
				</div>
				<div class="panel-body">
					<table class="table table-hover">
						<tr>
							<td>
								lama kursus
							</td>
							<td>
								: <?php echo $data['lama_kursus']; ?> Bulan
							</td>
						</tr>
						<tr>
							<td>
								Jadwal
							</td>
							<td>
								: <?php echo $data['lama_kursus']; ?>
							</td>
						</tr>
						<tr>
							<td>
								Biaya Pembayaran Pertama
							</td>
							<td>
								: <?php echo 'Rp,- '. number_format($data['pembayaran_1'],2,',','.'); ?>
							</td>
						</tr>
						<tr>
							<td>
								Biaya Pembayaran Kedua
							</td>
							<td>
								: <?php echo 'Rp,- '. number_format($data['pembayaran_2'],2,',','.'); ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php if (!empty($data['lain_lain'])): ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						Keternagan Lain-lain
					</div>
					<div class="panel-body">
						<?php echo $data['lain_lain']; ?>
					</div>
				</div>
			<?php endif ?>
	  </div>
	  <div class="box-footer">
	  	<?php if (check_role('siswa') || empty($_SESSION[base_url('_logged_in')])): ?>
		  	<?php if (!empty($_SESSION[base_url('_logged_in')])): ?>
		  		<a href="<?php echo base_url('admin/program/register/'.esg_encrypt($data['id'])); ?>" class="btn btn-success btn-lg"><i class="fa fa-user-plus"></i> Join</a>
		  	<?php else: ?>
		  		<?php msg('Silahkan Daftar Akun/Login Terlebih Dahulu agar bisa join program ini','warning') ?>
		  		<a href="<?php echo base_url('home/member/daftar') ?>" class="btn btn-success btn-lg"><i class="fa fa-plus-circle"></i> Daftar</a>
		  		<a href="<?php echo base_url('admin/login/?redirect_to=').base_url('home/lpk/program_detail/'.$data['id'].'/'.urlencode(str_replace(' ','-',$data['title']))) ?>" class="btn btn-success btn-lg"><i class="fa fa-sign-in"></i> Login</a>
		  	<?php endif ?>
	  	<?php endif ?>
	  </div>
	</div>
	<?php
}