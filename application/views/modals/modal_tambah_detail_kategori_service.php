<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Detail Data Kategori</h3>

  <form id="form-tambah-kategori_service_detail" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input value="<?php echo $dataKategoriID->id_kategori ?>" type="hidden" class="form-control" placeholder="Nama Jenis Service" name="id_kategori" aria-describedby="sizing-addon2">
      <input type="text" class="form-control" placeholder="Nama Jenis Service" name="detail_kategori_service" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>