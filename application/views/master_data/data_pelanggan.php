<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            Data Pelanggan
                        </h4>
                        <div class="d-flex">
                            <div class="btn btn-warning mr-2"><i class="fas fa-print mr-2"></i></i>Cetak PDF</div>
                            <a href="<?= base_url() ?>master_data/tambah_pelanggan">
                                <div class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah Data</div>
                            </a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10px">
                                            #
                                        </th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>Status</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($pelanggan as $plg) { ?>
                                        <tr>

                                            <td class="text-center">
                                                <?= $i++ ?>
                                            </td>
                                            <td><?= $plg['nama'] ?></td>
                                            <td>
                                                <?= $plg['alamat'] ?>
                                            </td>
                                            <td>
                                                <?= $plg['no_telp'] ?>
                                            </td>
                                            <td>
                                                <?= $plg['status'] ?>
                                            </td>
                                            <td class="d-flex">
                                                <div class="btn btn-primary d-flex align-items-center mr-2">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    Edit
                                                </div>
                                                <div class="btn btn-danger d-flex align-items-center">
                                                    <i class="far fa-trash-alt mr-2"></i>
                                                    Hapus
                                                </div>
                                            </td>


                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>