<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 553px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header border-transparent">
            <h3 class="card-title">User List</h3>

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
            <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NPM</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <!-- <th>Password</th> -->
                    <th>Majors</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                <!-- <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="badge badge-success">Shipped</span></td>
                    <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                </tr> -->
                <?php foreach ($users as $object) : ?>
                    <tr>
                        <td><?php echo $object->id ?></td>
                        <td><?php echo $object->npm ?></td>
                        <td><?php echo $object->name ?></td>
                        <td><?php echo $object->phone ?></td>
                        <td><?php echo $object->email ?></td>
                        <!-- <td><?php echo $object->password ?></td> -->
                        <td><?php echo $object->majors_id ?></td>
                        <td><?php echo $object->role_id ?></td>
                        <td class="project-actions text-right">
                          <a class="btn btn-danger btn-sm" href="<?php echo base_url("a_dashboard/del_user/$object->id"); ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="<?php echo base_url(); ?>a_dashboard/add_user" class="btn btn-sm btn-info float-left">Add User</a>
            </div>
            <!-- /.card-footer -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->