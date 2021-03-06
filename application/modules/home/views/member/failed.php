<?php if (!empty($_GET['back'])): ?>
	<a href="<?php echo $_GET['back'] ?>" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Kembali</a>
	<hr class="bg-info">
<?php endif ?>
<?php if (!empty($_GET['msg'])): ?>
	<?php msg(str_replace('_',' ',$_GET['msg']),'danger') ?>
<?php endif ?>