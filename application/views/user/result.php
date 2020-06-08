<?php
// print_r($field);
// print_r($candidate);
?>
<div class="content-wrapper" style="min-height: 553px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Result</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Result</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <?php 
    foreach($field as $fi):
    if (!$fi->state): continue; endif;?>
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title"><?php echo $fi->field ?> Votes</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <?php 
        foreach($position as $pos):?>
          <div class="callout callout-info">
            <h2><?php echo $pos->position ?></h2>
          <!-- </div> -->
        <!-- Vote List -->   
        <div class="card-deck">
            <?php foreach($candidate as $vote): 
            if($vote->field_id == $fi->id && $vote->position_id == $pos->id):?>
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <?php foreach($users as $us): 
                    if($vote->user_id == $us->id):
                    $image = "assets/user/profile/$us->id.jpg";?>
                    <h1>
                    <!-- <a href="#"><?php echo $us->name ?></a></h1> -->
                  <h1><?php echo $us->name ?></h1>
                    <div class="image">
                      <img src="<?php echo base_url(); ?><?php echo $image?>" class="img-circle elevation-2" alt="User Image" width="70%" height="70%">
                    </div>
                  <?php
                    endif;
                    endforeach; ?>
                
                  <!-- <p>New Orders</p> -->
                    <?php 
                    $sum = 0;
                    foreach($vote_history as $vo): 
                    if($vo->candidate_id == $vote->id):?>
                    <?php $sum++ ?>
                    <?php
                    endif;
                    endforeach; ?>
                    <h1>Jumlah Pemilih: <?php echo $sum ?></h1>
                </div>
            </div>
            </div>
            <?php endif;?>
        <?php endforeach; ?>
        </div>
        </div>
        <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->