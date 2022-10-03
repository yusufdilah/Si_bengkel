<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-kategori_service"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Kategori Service</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-kategori_service">

      </tbody>
    </table>
  </div>
</div>

<!-- <?php echo $modal_tambah_kategori_service; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKategori', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?> -->
