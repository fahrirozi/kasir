<div class="col-md-12">

            <div class="card card-primary">
              <div class="card-header py-2 bg-light d-flex">
                <h5 class="card-title text-primary font-weight-bold mr-auto"><?= $subjudul ?></h5>
               
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-10 input-group">
                                <input type="date" name="tgl" id="tgl" class="form-control">
                                <span class="input-group-append">
                                    <button onclick="ViewTabelLaporan()" class="btn btn-primary">
                                        <i class="fas fa-file-alt">View Laporan</i>
</button>
                                    <button  onclick="PrintLaporan()" class="btn btn-success">
                                    <i class="fas fa-print">Print Laporan</i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <hr>
                        <div class="Tabel">

                        </div>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
</div>

<script>
    function ViewTabelLaporan()
    {
        let tgl = $('#tgl').val();
        if (tgl == "") {
            Swal.fire('Tanggal Belum di Pilih');
        } else {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Laporan/ViewLaporanHarian') ?>",
            data: {
                tgl: tgl,
            },
            dataType: "JSON", 
            success: function(response) {
                if (response.data) {
                    $('.Tabel').html(response.data)
                }
            }
        });
    }
    }

    function PrintLaporan() {
        let tgl = $('#tgl').val();
        if (tgl == "") {
            Swal.fire('Tanggal Belum di Pilih');
        } else {
            NewWin = window.open('<?= base_url('Laporan/PrintLaporanHarian') ?>/'+tgl,'NewWin','toolbar*no',);
        }
    }
</script>