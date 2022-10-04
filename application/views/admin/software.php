<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Barang</button>

    <table class="table table-boardered">
        <tr>
            <th>NAMA</th>
            <th>BAGIAN</th>
            <th>JABATAN</th>
            <th>KELUHAN</th>
            <th>NO TICKET</th>
            <th>NO ASSET</th>
            <th>TIPE PENGAJUAN</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        
        foreach($software as $soft): ?>

        <tr>
            <td><?php echo $soft->nama ?></td>
            <td><?php echo $soft->bagian ?></td>
            <td><?php echo $soft->jabatan ?></td>
            <td><?php echo $soft->keluhan ?></td>
            <td><?php echo $soft->no_tiket ?></td>
            <td><?php echo $soft->no_aset ?></td>
            <td><?php echo $soft->tipe_pengajuan ?></td>
            <td><div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div></td>
            <td><div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div></td>
        </tr>

        <?php endforeach ; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Form Instalasi Software</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_barang/tambah_aksi'; ?>" 
          method="post" enctype="multipart/form-data">
        
            <div class="form-grup">
                <label for="">No Ticket</label>
                <input type="text" name="nama_brg" class="form-control">
            </div>
            <div class="form-grup">
                <label for="">No Request</label>
                <input type="text" name="keterangan" class="form-control">
            </div>


            <div class="form-grup">
                <div class="justify-content-center">
                    <h5 class="justify-content-center">Requestor</h5>
                </div>
                <label for="">Kategori</label>
                <select name="kategori" class="form-control">
                    <option>peralatan kantor</option>
                    <option>peralatan sekolah</option>
                    <option>tinta print</option>
                    <option>alat tulis</option>
                </select>
                <!-- <input type="text" name="kategori" class="form-control"> -->
            </div>
            <div class="form-grup">
                <label forN="">Harga</label>
                <input type="text" name="harga" class="form-control">
            </div>
            <div class="form-grup">
                <label for="">Stok</label>
                <input type="text" name="stok" class="form-control">
            </div>
            <div class="form-grup">
                <label for="">Gambar Produk</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="SUBMIT" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>