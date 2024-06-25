<section class="content-header">
    <h1>
        Data Unit
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="far fa-address-book"></i></a></li>
        <li class="active">data unit</li>
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
                        <th>Nama Unit</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Update By</th>
                        <th>Update Date</th>
                        <th>Computer</th>
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
                            <label for="nama">Nama Unit</label>
                            <input type="text" id ="unit" name="unit" class="form-control"></input>
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
                            <input type="text" name="idunit_edit" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="unit">Nama Unit</label>
                            <input type="text" id ="unit_edit" name="unit_edit" class="form-control"></input>
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
<script type="text/javascript">
    $(document).ready(function() {
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
                    url: "<?php echo base_url() . 'Unit/table'; ?>",
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
            var id_unit = $(this).attr('data-id');
            var status = confirm('Yakin ingin menghapus?');
            if (status) {
                $.ajax({
                    url: '<?php echo base_url(); ?>Unit/hapusData',
                    type: 'POST',
                    data: {
                        id_unit: id_unit
                    },
                    success: function(response) {
                        tampil_data();
                    }
                })
            }
        })
        $("#btn_add_data").on('click', function() {
            var unit = $('input[name="unit"]').val();
            if (unit.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Nama Unit',
                    text: 'Belum diisi'
                });
             }else {
                $.ajax({
                    url: '<?php echo base_url(); ?>Unit/tambahData',
                    type: 'POST',
                    data: {
                        unit:unit
                    },
                    success: function(response) {
                        $('input[name="unit"]').val("");
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
                url: '<?php echo base_url(); ?>Unit/ambilDataByid',
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $("#editModal").modal('show');
                    $('input[name="idunit_edit"]').val(response[0].id_unit);
                    $('input[name="nama_unit_edit"]').val(response[0].nama_unit);
                }
            })
        });

        //Meng-Update Data
        $("#btn_update_data").on('click', function() {
            var id_unit = $('input[name="idunit_edit"]').val();
            var unit = $('input[name="unit_edit"]').val();
            if (unit.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Nama Unit',
                    text: 'Belum diisi'
                });
             }else {
                $.ajax({
                    url: '<?php echo base_url(); ?>Unit/perbaruiData',
                    type: 'POST',
                    data: {
                        id_unit:id_unit,
                        unit:unit
                    },
                    success: function(response) {
                        $('input[name="unit_edit"]').val("");
                        $('input[name="idunit_edit"]').val("");
                        $("#editModal").modal('hide');
                        tampil_data();

                    }
                })
            }
        });
    });
</script>