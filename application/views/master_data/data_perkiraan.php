<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            Data Perkiraan Akun
                        </h4>
                        <div class="d-flex">
                            <a href="<?=base_url()?>master_data/tambah_akun">
                        
                            <div class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah Akun</div>
                            </a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-hover table-striped" id="table-1" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th width="10px" rowspan="2">No</th>
                                        <th rowspan="2">Nama Akun</th>
                                        <th rowspan="2">Kode Akun</th>
                                        <th rowspan="2">Keterangan</th>
                                        <th colspan="2" class="text-center">Saldo</th>
                                        <th rowspan="2">Aksi</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($akun as $ak) :?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?=$ak['namaAkun'] ?></td>
                                        <td><?=$ak['kodeAkun'] ?></td>
                                        <td><?=$ak['jenisAkun'] ?></td>
                                        <td><?=$ak['debit'] ?></td>
                                        <td><?=$ak['kredit'] ?></td>
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