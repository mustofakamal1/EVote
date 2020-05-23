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
            <h3 class="card-title">Add User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="<?php echo base_url(); ?>a_dashboard/post_add_user/" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                        <label>NPM</label>
                        <input type="number" class="form-control" placeholder="NPM" name = npm>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Nama" name = name>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="number" class="form-control" placeholder="No. Telepon (+62)" name = phone>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name = email>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name = password>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select class="form-control" name="majors_id">
                              <?php foreach ($majors as $object) : ?>
                                <option value="<?php echo $object->id ?>"><?php echo $object->major ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role_id">
                              <?php foreach ($role as $object) : ?>
                                <option value="<?php echo $object->id ?>"><?php echo $object->name ?></option>
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