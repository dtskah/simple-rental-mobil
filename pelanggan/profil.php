<div class="row">
  <div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading"><h3 class="text-center">Profil</h3></div>
        <div class="panel-body">
            <?php if (isset($_SESSION['is_pelanggan'])): ?>
                <?php if ($query = $connection->query("SELECT * FROM pelanggan WHERE id_pelanggan=$_SESSION[id_pelanggan]")): ?>
                    <?php while ($data = $query->fetch_assoc()): ?>
                        <form>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input disabled="on" type="text" name="nama" class="form-control" value="<?=$data['nama']?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input disabled="on" type="email" name="email" class="form-control" value="<?=$data['email']?>">
                            </div>
                            <div class="form-group">
                                <label for="no_telp">Telpon</label>
                                <input disabled="on" type="text" name="no_telp" class="form-control" value="<?=$data['no_telp']?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input disabled="on" type="text" name="username" class="form-control" value="<?=$data['username']?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input disabled="on" type="text" name="alamat" class="form-control" value="<?=$data['alamat']?>">
                            </div>
                        </form>
                    <?php endwhile ?>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="text-center">Riwayat Sewa</h3></div>
      <div class="panel-body">
        <?php if ($query = $connection->query("SELECT * FROM transaksi WHERE id_pelanggan=$_SESSION[id_pelanggan]")): ?>
            <?php $no = 1; ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Total Bayar</th>
                        <th>Lama Sewa</th>
                        <th>Jaminan</th>
                        <th>Tanggal Sewa</th>
                        <th>Tanggal Tempo Order</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = $query->fetch_assoc()): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td>Rp.<?=number_format($data['total_harga'])?>,-</td>
                            <td><?=$data['lama']?> Hari</td>
                            <td><?=$data['jaminan']?></td>
                            <td><?=$data['tgl_sewa']?></td>
                            <td><?=$data['jatuh_tempo']?></td>
                            <td>
                              <?php if ($data['konfirmasi'] == 0): ?>
                                  <a href="?page=konfirmasi&id=<?= $data['id_transaksi'] ?>" class="btn btn-success btn-xs">Konfirmasi</a>
                              <?php endif ?>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>