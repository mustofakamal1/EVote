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
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Vote Now</li>
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
    foreach($field as $fi):?>
    <h2><?php echo $fi->field ?> Votes</h2>
        <?php 
        foreach($position as $pos):?>
        <h3><?php echo $pos->position ?></h3>
        <!-- Vote List -->   
        <div class="card-deck">
            <?php foreach($candidate as $vote): 
            if($vote->field_id == $fi->id && $vote->position_id == $pos->id):?>
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <?php foreach($users as $us): 
                    if($vote->user_id == $us->id):?>
                <h3><?php echo $us->name ?></h3>
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
                    <h1><?php echo $sum ?></h1>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <?php 
                if(false):?>
                <a href="<?php echo base_url("u_dashboard/vote_list_field/$vote->id"); ?>" class="small-box-footer">Vote Now <i class="fas fa-arrow-circle-right"></i></a>
                <?php 
                else: ?>
                <a href="<?php echo base_url("u_dashboard/result/"); ?>" class="small-box-footer">Cek Hasil <i class="fas fa-arrow-circle-right"></i></a>
                <?php 
                endif;?>
            </div>
            </div>
            <?php endif;?>
        <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->