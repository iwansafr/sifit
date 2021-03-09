<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Content Terbaru</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="timeline-item">
      <div class="timeline-body" style="text-align: center;">
        <?php if (!empty($home['content'])): ?>
          <?php foreach ($home['content'] as $key => $value): ?>
            <div class="col-md-3">
              <div class="panel panel-default">
                <a href="<?= content_link($value['slug']) ?>">
                  <div class="panel-body" style="padding: 0;">
                    <img src="<?php echo image_module('content',$value) ?>" alt="" style="object-fit: cover; width: 100%;height:150px;">
                    <span class="label pull-right bg-blue">new</span>
                    <hr>
                    <span class="product-description text-black">
                      <?php echo $value['title'] ?>
                    </span>
                  </div>
                </a>
              </div>
            </div>  
          <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>