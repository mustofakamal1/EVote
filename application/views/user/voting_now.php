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
      <form method="post" action="<?php echo base_url("u_dashboard/votes/$id"); ?>" id="can">
      <?php
      foreach($position as $pos): 
        foreach($candidate as $cand): 
          if($pos->id == $cand->field_id): ?>
            <h1><?php echo $pos->position ?></h3>
            <div class="card-deck">
              <?php 
              foreach($candidate as $can):
                foreach($users as $us): 
                  if($us->id == $can->user_id && $can->field_id == $id && $can->position_id == $pos->id):?>
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner"> 

                          <h1><?php echo $us->name ?></h1>
                          <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="<?php echo $can->id?>" name="<?php echo $pos->id ?>" value="<?php echo $can->id?>" checked>
                              <label for="<?php echo $can->id?>">
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                      </div>
                    </div>
              <?php
                  endif;
                endforeach; 
              endforeach; ?>
            </div>
      <?php
              break;
            endif;
          endforeach; 
        endforeach; ?>
        </form>
        <a type="submit" onclick="document.getElementById('can').submit();" class="small-box-footer">I Vote This! <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->