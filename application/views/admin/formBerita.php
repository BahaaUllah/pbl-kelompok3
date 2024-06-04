  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">

          <div class="box box-primary" id="modal-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Berita</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach($berita as $row) : ?>
            <form role="form" action="<?php echo base_url('admin/berita/add'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="about">Judul</label>
                  <input type="text" name="judul" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="misi">Isi</label>
                  <textarea style="height: 80px" class="form-control" name="isi"></textarea>
                </div>
                <div>
                <label for="about">Gambar</label>
                  <input type="file" name="gambar" class="form-control">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="<?php echo base_url('admin/berita'); ?>" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
            <?php endforeach; ?>

          </div>
        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->