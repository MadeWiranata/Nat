<section class="content-header">
    <h1>
        Data Karyawan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="far fa-address-book"></i></a></li>
        <li class="active">data karyawan</li>
    </ol>
</section>

<section class="content">
    <div class="panel panel-primary">
        <div class="panel-heading">

            <div>
                <button data-toggle="modal" data-target="#addModal" class="btn btn-success fa fa-plus"> Tambah Data</button>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="tbl_data" class="table table-striped table-hover custom-table text-nowrap table-bordered form-group" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Unit</th>
                        <th>Jabatan</th>
                        <th>Tanggal Masuk</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>
<section>
    <!-- Modal Tambah-->
    <div id="addModal" class="modal" role="dialog" data-backdrop="false">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id ="nama" name="nama" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id ="username" name="username" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id ="password" name="password" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="unit" style="width: 100%">Unit</label>
                            <select class="form-control select2" name="unit" id="unit" style="width:100%">
                                <option value="">-Pilih-</option>
                                <?php foreach ($unit as $row) : ?>
                                    <option value="<?= $row->id_unit; ?>"><?= $row->nama_unit; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan" style="width: 100%">Jabatan</label>
                            <select class="form-control select2" name="jabatan" id="jabatan" style="width:100%">
                                <option value="">-Pilih-</option>
                                <?php foreach ($jabatan as $row) : ?>
                                    <option value="<?= $row->id_jabatan; ?>"><?= $row->nama_jabatan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal</label>
                            <div class="input-group date" data-provide="datepicker" id="tanggal" data-date-format="yyyy-mm-dd">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <input class="form-control" name="tanggal" disabled>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success fa fa-floppy-o" id="btn_add_data"> Simpan</button>
                    <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"> Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Edit-->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Edit Data</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group" hidden="true">
                            <label for="id">ID</label>
                            <input type="text" name="idkaryawan_edit" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id ="nama_edit" name="nama_edit" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id ="password_edit" name="password_edit" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="unit" style="width: 100%">Unit</label>
                            <select class="form-control select2" name="unit_edit" id="unit_edit" style="width:100%">
                                <option value="">-Pilih-</option>
                                <?php foreach ($unit as $row) : ?>
                                    <option value="<?= $row->id_unit; ?>"><?= $row->nama_unit; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan" style="width: 100%">Jabatan</label>
                            <select class="form-control select2" name="jabatan_edit" id="jabatan_edit" style="width:100%">
                                <option value="">-Pilih-</option>
                                <?php foreach ($jabatan as $row) : ?>
                                    <option value="<?= $row->id_jabatan; ?>"><?= $row->nama_jabatan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal</label>
                            <div class="input-group date" data-provide="datepicker" id="tanggal_edit" data-date-format="yyyy-mm-dd">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <input class="form-control" name="tanggal_edit" disabled>
                            </div>
                        </div>
                       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success fa fa-floppy-o" id="btn_update_data"> Update</button>
                    <button type="button" class="btn btn-default fa fa-times" data-dismiss="modal"> Close</button>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    function inputAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $('#tanggal').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
    $('#tanggal_edit').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#unit").select2({
            placeholder: "Pilih Unit",
        });
        $("#unit_edit").select2({
            placeholder: "Pilih Unit",
        });
        $("#jabatan").select2({
            placeholder: "Pilih Jabatan",
        });
        $("#jabatan_edit").select2({
            placeholder: "Pilih Jabatan",
        });
        
        tampil_data();
        //Menampilkan Data di tabel
        function tampil_data() {
            var dataTable = $('#tbl_data').DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "ordering": false,
                "order": [],
                "ajax": {
                    url: "<?php echo base_url() . 'User/table'; ?>",
                    type: "POST"
                },
                "columnDefs": [{
                        "className": "dt-center",
                        "targets": "_all",
                    },
                    {
                        "className": "dt-head-center",
                        "targets": "_all",
                    },
                    {
                        "className": "dt-body-center",
                        "targets": "_all",
                    },

                ],
            });
        }
        //Hapus Data dengan konfirmasi
        $("#tbl_data").on('click', '.btn_hapus', function() {
            var id_karyawan = $(this).attr('data-id');
            var status = confirm('Yakin ingin menghapus?');
            if (status) {
                $.ajax({
                    url: '<?php echo base_url(); ?>User/hapusData',
                    type: 'POST',
                    data: {
                        id_karyawan: id_karyawan
                    },
                    success: function(response) {
                        tampil_data();
                    }
                })
            }
        })
        $("#btn_add_data").on('click', function() {
            var nama = $('input[name="nama"]').val();
            var username = $('input[name="username"]').val();
            var password = $('input[name="password"]').val();
            var unit = $('select[name="unit"] option:selected').val();
            var jabatan = $('select[name="jabatan"] option:selected').val();
            var tanggal = $('input[name="tanggal"]').val();
            if (nama.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Nama',
                    text: 'Belum diisi'
                });
             }else if (username.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Username',
                    text: 'Belum diisi'
                });
             }else if (password.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Password',
                    text: 'Belum diisi'
                });
             }else if (unit.length == 0) {
                Swal.fire({
                    type: 'warning',
                    title: 'Unit',
                    text: 'Belum dipilih'
                });
             }else if (jabatan.length == 0) {
                Swal.fire({
                    type: 'warning',
                    title: 'Jabatan',
                    text: 'Belum dipilih'
                });
             }else if (tanggal.length == 0) {
                Swal.fire({
                    type: 'warning',
                    title: 'Tanggal',
                    text: 'Belum diisi'
                });
             } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>User/tambahData',
                    type: 'POST',
                    data: {
                        nama:nama,
                        username:username,
                        password:password,
                        unit:unit,
                        jabatan:jabatan,
                        tanggal:tanggal
                    },
                    success: function(response) {
                       
                        $('input[name="nama"]').val("");
                        $('input[name="username"]').val("");
                        $('input[name="password"]').val("");
                        $('select[name="unit"]').val("");
                        $('select[name="jabatan"]').val("");
                        $('input[name="tanggal"]').val("");
                        $("#addModal").modal('hide');
                        tampil_data();

                    }
                })
            }

        });
        //Memunculkan modal edit
        $("#tbl_data").on('click', '.btn_edit', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '<?php echo base_url(); ?>User/ambilDataByid',
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $("#editModal").modal('show');
                    $('input[name="idkaryawan_edit"]').val(response[0].id_karyawan);
                    $('input[name="tanggal_edit"]').val(response[0].tanggal_masuk);
                    $('input[name="nama_edit"]').val(response[0].nama);
                    $("#unit_edit").select2().val(response[0].id_unit).trigger('change');
                    $("#jabatan_edit").select2().val(response[0].id_jabatan).trigger('change');
                }
            })
        });

        //Meng-Update Data
        $("#btn_update_data").on('click', function() {
            var id_karyawan = $('input[name="idkaryawan_edit"]').val();
            var nama = $('input[name="nama_edit"]').val();
            var password = $('input[name="password_edit"]').val();
            var unit = $('select[name="unit_edit"] option:selected').val();
            var jabatan = $('select[name="jabatan_edit"] option:selected').val();
            var tanggal = $('input[name="tanggal_edit"]').val();
            if (nama.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Nama',
                    text: 'Belum diisi'
                });
             }else if (username.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Username',
                    text: 'Belum diisi'
                });
             }else if (unit.length == 0) {
                Swal.fire({
                    type: 'warning',
                    title: 'Unit',
                    text: 'Belum dipilih'
                });
             }else if (jabatan.length == 0) {
                Swal.fire({
                    type: 'warning',
                    title: 'Jabatan',
                    text: 'Belum dipilih'
                });
             }else if (tanggal.length == 0) {
                Swal.fire({
                    type: 'warning',
                    title: 'Tanggal',
                    text: 'Belum diisi'
                });
             } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>User/perbaruiData',
                    type: 'POST',
                    data: {
                        id_karyawan:id_karyawan,
                        nama:nama,
                        password:password,
                        unit:unit,
                        jabatan:jabatan,
                        tanggal:tanggal
                    },
                    success: function(response) {
                       
                        $('input[name="nama_edit"]').val("");
                        $('input[name="idkaryawan_edit"]').val("");
                        $('input[name="password_edit"]').val("");
                        $('select[name="unit_edit"]').val("");
                        $('select[name="jabatan_edit"]').val("");
                        $('input[name="tanggal_edit"]').val("");
                        $("#editModal").modal('hide');
                        tampil_data();

                    }
                })
            }
        });
    });
</script>