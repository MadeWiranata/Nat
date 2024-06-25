<section class="content-header">
  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php foreach ($karyawan as $row) : ?>
                <h3><?= $row->karyawan; ?></h3>
                <?php endforeach; ?>
                <p>Jumlah Karyawan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
             <!-- <a href="" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php foreach ($login as $row) : ?>
                <h3><?= $row->login; ?></h3>
                <?php endforeach; ?>

                <p>Jumlah Login</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
             <!-- <a href="" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php foreach ($unit as $row) : ?>
                <h3><?= $row->unit; ?></h3>
                <?php endforeach; ?>

                <p>Jumlah Unit</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!--<a href="" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php foreach ($jabatan as $row) : ?>
                <h3><?= $row->jabatan; ?></h3>
                <?php endforeach; ?>

                <p>Jumlah Jabatan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!--<a href="" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>

        
      </section>
      </div>
</section>