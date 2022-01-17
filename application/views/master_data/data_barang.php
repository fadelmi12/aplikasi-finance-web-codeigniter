<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            Data Barang
                        </h4>
                        <div class="d-flex">
                            <div class="btn btn-warning mr-2"><i class="fas fa-print mr-2"></i></i>Cetak PDF</div>
                            <a href="<?= base_url() ?>master_data/tambah_barang">
                                <div class="btn btn-success mr-2"><i class="fas fa-plus-circle mr-2"></i>Tambah Data</div>
                            </a>
                            <div class="btn btn-light"><i class="fas fa-plus-circle mr-2"></i>Tambah Jenis</div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>

                                    <tr>
                                        <th class="text-center">
                                            Kode
                                        </th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>

                                        <th>Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($barang as $br) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $br['kodeBarang'] ?>
                                            </td>
                                            <td><?= $br['nama'] ?></td>
                                            <td>
                                                <?= $br['namaJenis'] ?>
                                            </td>
                                            <td>
                                                <?= $br['keterangan'] ?>
                                            </td>
                                            <td>
                                                Rp <?= number_format($br['harga'], 0, ",", ",") ?>

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