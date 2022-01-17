<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4>
              Info Perusahaan
            </h4>
            <div class="d-flex">
              <div class="btn btn-warning mr-2"><i class="fas fa-print mr-2"></i></i>Cetak PDF</div>
              <a href="<?=base_url() ?>/master_data/tambah_perusahaan">
                <div class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah Info</div>
              </a>
            </div>

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
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>NPWP</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($perusahaan as $ps) : ?>
                    <tr>
                      <td class="text-center"><?=$i++?></td>
                      <td><?= $ps['nama'] ?></td>
                      <td><?= $ps['alamat'] ?></td>
                      <td><?= $ps['npwp'] ?></td>
                      <td class="d-flex">
                        <div class="btn btn-info d-flex align-items-center">
                          <i class="fas fa-info-circle mr-2"></i>
                          Detail
                        </div>
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