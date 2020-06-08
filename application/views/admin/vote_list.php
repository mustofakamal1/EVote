<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 553px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vote List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vote List</li>
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
            <h3 class="card-title">Vote List</h3>

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
                    <th>Nama Pemilihan</th>
                    <th>State</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($field as $object) : ?>
                    <tr>
                        <td><?php echo $object->id ?></td>
                        <td><?php echo $object->field ?></td>
                        <td><?php echo ($object->state)?"Active":"Not Active" ?></td>
                        <td class="project-actions text-right">
                          <a href="<?php echo base_url("a_dashboard/change_field/$object->id/$object->state"); ?>"
                          <?php if($object->state): ?>
                            class="btn btn-danger btn-sm">
                            <i class="fas fa-stop-circle">
                              </i>
                              Stop Vote
                          <?php else: ?>
                            class="btn btn-success btn-sm">
                            <i class="fas fa-check">
                              </i>
                              Activate Vote
                          <?php endif ?>
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
              <a href="<?php echo base_url(); ?>a_dashboard/add_vote" class="btn btn-sm btn-info float-left">Add User</a>
            </div>
            <!-- /.card-footer -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->