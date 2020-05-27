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
      <!-- Vote List -->
      
      <div class="card-deck">
        <?php foreach($field as $vote): 
          $cek = 1;
          foreach($votes as $vot):
            if($vot->user_id == $user['id'] && $vot->field_id == $vote->id): 
              $cek = 0;
            endif;
          endforeach; ?>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $vote->field ?> Votes</h3>

              <!-- <p>New Orders</p> -->
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <?php 
            if($cek):?>
              <a href="<?php echo base_url("u_dashboard/vote_list_field/$vote->id"); ?>" class="small-box-footer">Vote Now <i class="fas fa-arrow-circle-right"></i></a>
            <?php 
            else: ?>
              <a href="<?php echo base_url("u_dashboard/result/"); ?>" class="small-box-footer">Cek Hasil <i class="fas fa-arrow-circle-right"></i></a>
            <?php 
            endif;?>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->