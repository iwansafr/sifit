<?php
if (!empty($data)) {
	$gym_paket = $this->db->get_where('gym_member_paket',['user_id'=>$user['id'],'gym_id'=>$data['id']])->row_array();
	// pr($gym_paket);
	$bayar = $this->db->get_where('gym_paket',['id'=>$gym_paket['gym_paket_id']])->row_array();
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			form bayar
		</div>
		<div class="panel panel-body">
			<table class="table">
				<tr>
					<td>paket</td>
					<td>: <?php echo $bayar['judul'] ?> </td>
				</tr>
				<tr>
					<td>harga</td>
					<td>: <?php echo $bayar['harga'] ?> </td>
				</tr>
			</table>
			<?php msg('silahkan transfer senilai nominal diatas via dana ke '.$data['hp'],'info') ?>
			<a href="https://wa.me/<?php echo $data['hp'].'?text=saya sudah transfer';?>" class="btn btn-success">Upload bukti transfer via WA</a>
		</div>
	</div>
	<?php
}