<!-- Content Wrapper. Contains page content -->
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
              <li class="breadcrumb-item"><a href="#">User List</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"><!-- card -->
        <div class="card card-warning">
            <div class="card-header">
            <h3 class="card-title">Edit Candidate</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="<?php echo base_url(); ?>a_dashboard/put_edit_candidate/" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>User</label>
                            <select class="form-control" name="user_id">
                              <option value="<?php echo $id?>"><?php echo $name ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Field</label>
                            <select class="form-control" name="field_id">
                              <?php foreach ($field as $object) : 
                                $string = ($object->id == $f_id)?"SELECTED":"";
                                ?>
                                <option <?php echo $string?> value="<?php echo $object->id ?>"><?php echo $object->field ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Position</label>
                            <select class="form-control" name="position_id">
                              <?php foreach ($position as $object) : 
                                  $string = ($object->id == $p_id)?"SELECTED":"";
                                  ?>
                                <option <?php echo $string?> value="<?php echo $object->id ?>"><?php echo $object->position ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->