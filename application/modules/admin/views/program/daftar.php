<?php
if(!empty($program))
{
	?>
	<div class="box box-warning">
	  <div class="box-header with-border">
	    <h3 class="box-title">Program <?php echo $lpk['title'] ?></h3>

	    <div class="box-tools pull-right">
	      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	      </button>
	    </div>
	  </div>
	  <!-- /.box-header -->
	  <div class="box-body">
			<div class="timeline-item">
	      <div class="timeline-body" style="text-align: center;">
	      	<?php foreach ($program as $key => $value): ?>
	      		<div class="col-md-3">
	          	<div class="panel panel-default">
	          		<div class="panel-body" style="padding: 0;">
	          			<span class="label pull-right bg-blue">lpk</span>
	          			<img src="<?php echo image_module('lpk',$value['id'].'/'.$value['foto']) ?>" alt="" style="object-fit: cover; width: 100%;height:150px;">
	          			<hr>
	          			<span class="product-description">
	                	<a href="<?php echo base_url('home/lpk/program_detail/'.$value['id'].'/'.urlencode(str_replace(' ','-',$value['title']))) ?>"><b><?php echo $value['title'] ?></b></a>
	              	</span>
	              	<center><a href="<?php echo base_url('admin/program/register/'.esg_encrypt($value['id'])) ?>" class="btn btn-success"><i class="fa fa-plus"></i> Daftar</a></center>
	          		</div>
	          	</div>
	      		</div>
	      	<?php endforeach ?>
	      </div>
	    </div>
	  </div>
	  <div class="box-footer">
	  </div>
	</div>
	<?php
}
if (empty($lpk))
{
	$bisnis = $this->esg->get_config('lpk_config');
	msg('Maaf Anda belum terdaftar dalam '.$bisnis['title'].' silahkan daftar ke salah satu '.$bisnis['title'].' yg tersedia <a href="'.base_url('home/lpk/list').'" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Daftar</a> ','danger');
}