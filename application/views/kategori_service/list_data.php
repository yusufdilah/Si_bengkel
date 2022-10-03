<?php
  $no = 1;  
  foreach ($dataKategori as $kategori) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td style="min-width:230px;"><?php echo $kategori->kategori_service; ?></td>
      
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataKategori" data-id="<?php echo $kategori->id_kategori; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-kategori_service" data-id="<?php echo $kategori->id_kategori; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        <!-- <button class="btn btn-info detail-dataKategori" data-id="<?php echo $kategori->id_kategori; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button> -->
        <a class="btn btn-primary" href="<?php echo site_url('kategori_service/detail/'.$kategori->id_kategori) ?>"><i class="fa fa-fw fa-eye" title="Detail"></i></a>

      </td>
    </tr>
    <?php
  }
?>