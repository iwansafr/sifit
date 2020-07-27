<?php
if(!empty($data))
{
	$param = json_decode($data['param'],1);
	?>
	<div class="panel panel-default">
		<div class="panel-heading">Biodata <?php echo $status['title'] ?></div>
		<div class="panel-body">
			<table class="table">
				<tr>
					<td style="width: 30%;">Nama</td>
					<td>: <?php echo !empty($param['nama']) ? $param['nama'] :'-'; ?></td>
				</tr>
				<tr>
					<td style="width: 30%;">Email</td>
					<td>: <?php echo !empty($param['email']) ? $param['email'] :'-'; ?></td>
				</tr>
				<tr>
					<td style="width: 30%;">No Wa</td>
					<td>: <?php echo !empty($param['no_wa']) ? $param['no_wa'] :'-'; ?></td>
				</tr>
				<tr>
					<td style="width: 30%;">Alamat</td>
					<td>: <?php echo !empty($param['alamat']) ? $param['alamat'] :'-'; ?></td>
				</tr>
				<tr>
					<td style="width: 30%;">Username</td>
					<td>: <?php echo !empty($param['username']) ? $param['username'] :'-'; ?></td>
				</tr>
				<tr>
					<td style="width: 30%;">Jenis Kelamin</td>
					<td>: <?php echo $kelamin[$param['jenis_kelamin']] ?></td>
				</tr>
				<tr>
					<td style="width: 30%;">Status</td>
					<td>: <?php echo $status['title'] ?></td>
				</tr>
				<tr>
					<td style="width: 30%;">Foto Diri</td>
					<td>: <img class="img-responsive" src="<?php echo image_module('member',$param['name'].'/'.$param['image_foto_diri']) ?>" alt=""></td>
				</tr>
			</table>
		</div>
		<div class="panel-footer"></div>
	</div>
	<?php
}else{
	msg('mohon maaf data tidak ditemukan','danger');
}