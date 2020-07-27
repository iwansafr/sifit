<?php
if(!empty($data['data']))
{
	$bisnis = $this->esg->get_config('lpk_config');
	?>
	<div class="box box-warning">
	  <div class="box-header with-border">
	    <h3 class="box-title">Data <?php echo $bisnis['title'];?></h3>

	    <div class="box-tools pull-right">
	      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	      </button>
	    </div>
	  </div>
	  <!-- /.box-header -->
	  <div class="box-body">
			<div class="timeline-item">
	      <div class="timeline-body" style="text-align: center;">
	      	<?php foreach ($data['data'] as $key => $value): ?>
	      		<div class="col-md-3">
	          	<div class="panel panel-default">
	          		<div class="panel-body" style="padding: 0;">
	          			<span class="label pull-right bg-blue"><?php echo $bisnis['title'];?></span>
	          			<img src="<?php echo image_module('lpk',$value['id'].'/'.$value['image']) ?>" alt="" style="object-fit: cover; width: 100%;height:150px;">
	          			<hr>
	          			<span class="product-description">
	                	<a href="<?php echo base_url('home/lpk/detail/'.$value['id'].'/'.urlencode(str_replace(' ','-',$value['title']))) ?>"><b><?php echo $value['title'] ?></b></a>
	              	</span>
	          		</div>
	          	</div>
	      		</div>
	      	<?php endforeach ?>
	      </div>
	    </div>
	  </div>
	  <div class="box-footer">
			<?php echo $data['pagination'];?>
	  </div>
	</div>
	<?php
}