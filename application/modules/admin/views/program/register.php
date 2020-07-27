<?php
if(!empty($program_member))
{
	$data = json_decode($program_member['param'],1);
	?>
	<div class="box-body">
		<div class="timeline-item">
      <div class="timeline-body" style="text-align: center;">
      	<h3><?php echo $data['title'] ?></h3>
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
							: <?php echo 'Rp,- '. number_format($data['pembayaran_1'],2,',','.'); ?> | <a href="<?php echo base_url('admin/program/pembayaran/1/'.esg_encrypt($program_member['id'])) ?>" class="btn btn-sm btn-success"><i class="fa fa-money"></i> Bayar</a>
						</td>
					</tr>
					<tr>
						<td>
							Biaya Pembayaran Kedua
						</td>
						<td>
							: <?php echo 'Rp,- '. number_format($data['pembayaran_2'],2,',','.'); ?> | <a href="<?php echo base_url('admin/program/pembayaran/2/'.esg_encrypt($program_member['id'])) ?>" class="btn btn-sm btn-success"><i class="fa fa-money"></i> Bayar</a>
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
	<?php
}