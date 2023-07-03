<section class="content-header">
  <h1>
    <?= $title ?>
  </h1>
  <br>
</section>

<div class="row">
  <div class="col-sm-12">
    <div class="box box-success box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data <?= $title ?></h3>

        <div class="box-tools pull-right">
          <a href="<?= base_url('ruangan/add') ?>" class="btn btn-box-tool"><i class="fa fa-plus">Add</i></a>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php

        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-success role="alert">';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }
        ?>

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="50px" class="text-center">No</th>
              <th>Gedung</th>
              <th>Ruangan</th>
              <th width="150px" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($ruangan as $key => $value) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['gedung'] ?></td>
                <td><?= $value['ruangan'] ?></td>
                <td class="text-center">
                  <a class="btn btn-warning btn-sm btn-flat"></i></a>
                  <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_ruangan'] ?>"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->

    </div>
  </div>
</div>