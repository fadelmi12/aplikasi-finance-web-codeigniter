<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4>
              Saldo Awal
            </h4>
            <a href="<?= base_url() ?>master_data/tambah_saldo">
              <div class="btn btn-success"><i data-feather="plus-circle" class="mr-2" style="width: 20px;height: 20px;"></i>Tambah Saldo</div>
            </a>

          </div>
          <div class="card-body">
            <div class="d-flex">
              <div class="form-group">
                <label>Periode Akuntansi</label>
                <div class="d-flex align-items-center">
                  <input type="date" class="form-control mr-3" placeholder="Tanggal Mulai">
                  <h6 class="mr-3 my-0 weight-normal">
                    s/d
                  </h6>
                  <input type="date" class="form-control mr-3" placeholder="Tanggal Mulai">
                  <div class="btn btn-primary d-flex align-items-center">
                    <i class="fas fa-sort-amount-up mr-2"></i>
                    Filter
                  </div>
                </div>
              </div>

            </div>
            <div class="table-responsive">
              <table class="table  table-hover table-striped" id="table-1" style="width:100%;">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th >Kode Akun</th>
                    <th>Jenis Akun</th>
                    <th>Nama Akun</th>
                    <th>Saldo Akhir</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($akun as $ak) : ?>
                    <tr>
                      <td class="text-center"><?php echo $i++ ?></td>
                      <td><?= $ak['kodeAkun'] ?></td>
                      <td><?= $ak['jenisAkun'] ?></td>
                      <td><?= $ak['namaAkun'] ?></td>
                      <td>Rp <?= number_format($ak['saldoAkhir'] , 0, ",", ",") ?></td>
                      <td>
                        <div class="btn btn-info">Detail</div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>