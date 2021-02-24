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
						<img src="<?php echo image_module('lpk',$data['id'].'/'.$data['image']) ?>" alt="">
					</center>
					<hr>
					<?php echo $data['description'] ?>
					<hr>
					<?php if (check_role('siswa') || empty($_SESSION[base_url('_logged_in')])): ?>
						<center><a href="<?php echo base_url('home/member/daftar/'.$data['id']) ?>" class="btn btn-success btn-lg"><i class="fa fa-user-plus"></i> Daftar</a></center>
					<?php endif ?>
	      </div>
	    </div>
	  </div>
	  <div class="box-footer">
			<h3>program</h3>
			<div class="timeline-item">
	      <div class="timeline-body" style="text-align: center;">
	      	<div class="row">
		      	<?php foreach ($program as $key => $value): ?>
		      		<div class="col-md-3">
			      		<div class="panel panel-default">
		          		<div class="panel-body" style="padding: 0;">
		          			<span class="label pull-right bg-blue">program</span>
		          			<img src="<?php echo image_module('lpk_program',$value['id'].'/'.$value['foto']) ?>" alt="" style="object-fit: cover; width: 100%;height:150px;">
		          			<hr>
		          			<span class="product-description">
		                	<a href="<?php echo base_url('home/lpk/program_detail/'.$value['id'].'/'.urlencode(str_replace(' ','-',$value['title']))) ?>"><b><?php echo $value['title'] ?></b></a>
		              	</span>
		          		</div>
		          	</div>
		      		</div>
		      	<?php endforeach ?>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
	<?php
}