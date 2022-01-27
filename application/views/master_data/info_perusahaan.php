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
              <button type="button" data-toggle="modal" data-target="#cetakpdf" class="btn btn-warning mr-2"><i class="fas fa-print mr-2"></i></i>Cetak PDF</button>
              <a href="<?= base_url() ?>/master_data/tambah_perusahaan">
                <div class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah Info</div>
              </a>
            </div>

          </div>
          <div class="card-body">
            <div class="d-flex">
              <div class="form-group">
                <label>Periode Akuntansi</label>
                <form action="<?php base_url() ?>info_perusahaan" enctype="multipart/form-data" method="post">
                  <div class="d-flex align-items-center">

                    <input type="date" class="form-control mr-3" name="mulai" value="<?= $tgl['selesai'] ?>">
                    <h6 class="mr-3 my-0 weight-normal">
                      s/d
                    </h6>
                    <input type="date" class="form-control mr-3" name="selesai" value="<?= $tgl['selesai'] ?>">
                    <button class="btn btn-primary d-flex align-items-center" type="submit">
                      <i class="fas fa-sort-amount-up mr-2"></i>
                      Filter
                    </button>

                  </div>
                </form>
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
                      <td class="text-center"><?= $i++ ?></td>
                      <td><?= $ps['nama'] ?></td>
                      <td><?= $ps['alamat'] ?></td>
                      <td><?= $ps['npwp'] ?></td>
                      <td class="d-flex">
                        <button type="button" data-toggle="modal" data-target="#detail-info<?= $ps['id'] ?>" class="btn btn-info d-flex align-items-center">
                          <i class="fas fa-info-circle mr-2"></i>
                          Detail
                        </button>
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
<div class="modal fade" id="cetakpdf" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Cetak PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="">
          <div class="form-group">
            <label>Tanggal Mulai</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-calendar"></i>
                </div>
              </div>
              <input type="date" class="form-control" name="mulai">
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Selesai</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-calendar"></i>
                </div>
              </div>
              <input type="date" class="form-control" name="selesai">
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-danger waves-effect mr-3 d-flex" data-dismiss="modal">
              <i class="fas fa-times my-auto mr-2"></i>
              Batal
            </button>
            <button type="submit" class="btn btn-primary waves-effect d-flex">
              <i class="fas fa-print my-auto mr-2"></i>
              Cetak
            </button>
          </div>


        </form>
      </div>
    </div>
  </div>
</div>
<?php foreach ($perusahaan as $ps) : ?>
  <div class="modal fade" id="detail-info<?= $ps['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">Detail Perusahaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="">
            <div class="form-group">
              <label>Nama Perusahaan</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-building"></i>
                  </div>
                </div>
                <input type="text" class="form-control" value="<?= $ps['nama'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-map-marked-alt"></i>
                  </div>
                </div>
                <input type="text" class="form-control" value="<?= $ps['alamat'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label>NPWP</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-file-alt"></i>
                  </div>
                </div>
                <input type="text" class="form-control" value="<?= $ps['npwp'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label>Diinput Tanggal</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-calendar"></i>
                  </div>
                </div>
                <input type="text" class="form-control" value="<?= $ps['tanggal'] ?>" readonly>
              </div>
            </div>
            <div class="d-flex w-100 justify-content-center">
              <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>