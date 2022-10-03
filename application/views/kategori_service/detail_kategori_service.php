<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<!-- <div class="col-md-12 well"> -->
  
<?php if ($this->session->flashdata('success')): ?>
        <div class="box-body">
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
        <?php endif; ?>  

<div class="box">
  <div class="box-header">
    <div class="col-md-2" style="padding: 0;">
      <button data-id="<?php echo $dataKategoriID->id_kategori; ?>" class="form-control btn btn-primary tambah-dataDetailKategori" data-toggle="modal" data-target="#tambah-kategori_service_detail"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
      <a href="<?php echo site_url('Kategori_service')?>" class="btn btn-tosca"><i class="fa fa-fw fa-arrow-left"></i></a>
    </div>
    
  </div>

  <div class="box box-body">
      <table id="list-data" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis Service</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="data-kategori_service_detail">
          <?php
            $no = 1;
            foreach ($dataKategoriDetail as $kategori_detail) {
              ?>
              <tr>
                <td style="min-width:230px;"><?php echo $no++; ?></td>
                <td><?php echo $kategori_detail->detail_kategori_service; ?></td>
                <td class="text-center" style="min-width:230px;">
                  <button class="btn btn-warning update-dataKategori" data-id="<?php echo $kategori_detail->id_detail_kategori; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                  <button class="btn btn-danger konfirmasiHapus-kategori_service" data-id="<?php echo $kategori_detail->id_detail_kategori; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                </td>
              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
  </div>
</div>  
<?php echo $modal_tambah_detail_kategori_service; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKategori', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>

  <!-- <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div> -->
<!-- </div> -->

<script type="text/javascript">
  $(document).ready(function() { $('#tabel-detail_kategori').DataTable(); } );
</script>
