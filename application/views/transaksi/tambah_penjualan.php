<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            Tambah Transaksi
                        </h4>

                    </div>
                    <div class="card-body">
                        <form action="<?php base_url() ?>save_barang" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="namaBarang">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">No Transaksi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-drafting-compass"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="namaBarang">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="">Pelanggan</label>
                                        <div class="input-group">
                                            <select type="text" class="form-control select2" name="jenisBarang">
                                                <option value="">Pilih Pelanggan</option>
                                                <?php foreach ($pelanggan as $plg) : ?>
                                                    <option value="<?php echo $plg['nama'] ?>"><?php echo $plg['nama'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="">Keterangan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keterangan">
                                        </div>

                                    </div>

                                </div>
                            </div>



                        </form>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Detail Transaksi
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group mb-0">
                                    <label for="">Kode Barang</label>

                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group mb-0">
                                    <label for="">Harga</label>

                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group mb-0">
                                    <label for="">Kuantitas</label>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-0">
                                    <label for="">Total</label>

                                </div>
                            </div>
                        </div>
                        <div class="dynamic-wrap" id="dynamic_field">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group my-2">
                                        <select type="text" class="form-control select2" name="kode[]">
                                            <option value="">Pilih Barang</option>
                                            <?php foreach ($barang as $brg) : ?>
                                                <option value="<?php echo $brg['kodeBarang'] ?>"><?php echo $brg['kodeBarang'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group my-2">

                                        <input type="text" class="form-control" name="harga[]">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group my-2">

                                        <input type="number" class="form-control" name="kuantitas[]">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group my-2">

                                        <input type="text" class="form-control" name="total[]">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="form-group d-flex mt-3">
                            <button class="btn btn-primary d-flex align-items-center" type="submit"><i class="fas fa-check mr-2"></i>Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- <script src="<?= base_url() ?>assets/bundles/select2/dist/js/select2.full.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function() {

    // });
    $(function() {
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };
        $('#harga').keyup(function() {
            $(this).val(format($(this).val()));
        });
    });
</script>
<script type="text/javascript">
    // $(document).ready(function() {
    //     console.log('hehe');
    //     var i = 1;

    //     $('#btn-add').click(function() {
    //         i++;
    //         // console.log("ss");
    //         // a = `<div class="row" id="row' + i + '"><div class="col-3"><div class="form-group my-2"><select type="text" class="form-control select2" name="kode[]"><option value="">Pilih Barang</option><?php foreach ($barang as $brg) : ?><option value="<?php echo $brg['kodeBarang'] ?>"><?php echo $brg['kodeBarang'] ?></option><?php endforeach ?></select></div></div><div class="col-3"><div class="form-group my-2"><input type="text" class="form-control" name="harga[]"></div></div><div class="col-2"><div class="form-group my-2"><input type="number" class="form-control" name="kuantitas[]"></div></div><div class="col-3"><div class="form-group my-2"><input type="text" class="form-control" name="total[]"></div></div><div class="col-1 d-flex align-items-center justify-content-start p-0"><button class="btn btn-warning rounded-circle" type="button" id="' + i + '"><span class="fas fa-minus"></span></button></div></div></div>`;
    //         $('#dynamic_field').append('<div class="row" id="row' + i + '"><div class="col-3"><div class="form-group my-2"><select type="text" class="form-control selectric" name="kode[]"><option value="">Pilih Barang</option><?php foreach ($barang as $brg) : ?><option value="<?php echo $brg['kodeBarang'] ?>"><?php echo $brg['kodeBarang'] ?></option><?php endforeach ?></select></div></div><div class="col-3"><div class="form-group my-2"><input type="text" class="form-control" name="harga[]"></div></div><div class="col-2"><div class="form-group my-2"><input type="number" class="form-control" name="kuantitas[]"></div></div><div class="col-3"><div class="form-group my-2"><input type="text" class="form-control" name="total[]"></div></div><div class="col-1 d-flex align-items-center justify-content-start p-0"><button class="btn btn-warning rounded-circle btn_remove" type="button" id="' + i + '"><span class="fas fa-minus"></span></button></div></div></div>');
    //     });

    //     $(document).on('click', '.btn_remove', function() {
    //         var button_id = $(this).attr("id");
    //         $('#row' + button_id + '').remove();
    //     });
    // });
</script>