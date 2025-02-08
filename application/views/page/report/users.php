<style type="text/css">
    ul {
        margin-top: 10px;
    }

    a.report {
        color: black;
    }
</style>

<div class="content-wrapper" style="min-height: 1126.3px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $menu; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $menu; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php
        if ($notif) { ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-<?php echo $notif['ALERT']; ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $notif['INFO']; ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Default box -->
        <div class="box">
            <div class="box-body table-responsive cs2">
            <button class='btn btn-success pull-right' style='margin:10px' data-toggle='modal' data-target='#newUser'>Create User</button> 
                <table class="table table-striped table-bordered nowrap" id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('User_c/update'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" id="mUsername" class="form-control" name="username" readonly>
                                <input type="hidden" id="mID" name="id">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">New Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="****" type="password" name="new" required id="new2" oninput="checkPasswords2()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Confirmation Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="****" type="password" name="conf" required id="conf2" oninput="checkPasswords2()">
                                <p class="help-block" id="message2" style="color: red;"></p>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-success pull-right" value="Simpan" id="submit2" disabled>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Create User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('User_c/create'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Role</label>
                            <div class="col-sm-8">
                                <select name="level" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <?php 
                                        foreach ($this->config->item('role') as $key => $value) {
                                            echo "<option value='".$value."'>".$value."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">New Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="****" type="password" name="new" required id="new3" oninput="checkPasswords3()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Confirmation Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="****" type="password" name="conf" required id="conf3" oninput="checkPasswords3()">
                                <p class="help-block" id="message3" style="color: red;"></p>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-success pull-right" value="Simpan" id="submit3" disabled>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        var msg = "'Are you sure you want to delete this data'";

        var table = $('#table').DataTable({
            "searching": false,
            "serverSide": true,
            "processing": true,
            "paging":true,
            "ajax": {
                "url": "<?php echo base_url('ajax/Report_c/getDataUser'); ?>"
            },
            "lengthMenu": [[50, 100, 200, 500, -1], [50, 100, 200, 500, "All"]],
            "deferRender": true,
            "scrollX": true,
            "order": [
                [3, "desc"]
            ],
            "pagingType": "simple_numbers",
            "columns": [{
                    data: 'rNum'
                },
                {
                    data: 'username',orderable: false
                },
                {
                    data: 'level',orderable: false
                },
                {
                    data: 'createdAt',orderable: true
                }
            ],
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                {
                    "extend": 'excelHtml5',
                    "title": '',
                    "messageTop": 'User Accounts',
                    "messageBottom": '',
                    "orientation": 'landscape',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                }
            ],
            "scrollY": '60vh',
            "scrollCollapse": true,
            "columnDefs": [{
                "targets": 4,
                "render": function (data, type, row, meta) {

                    var btn = "";
                    var btnDelete = "";
                    var btnEdit = '<a data-id="' + row.id + '" data-username="' + row.username + '" data-level="' + row.level + '" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editUser">Change Password</a> ';
                    if (row.username != '<?php echo $this->session->userdata('USERNAME'); ?>'){
                        var btnDelete = '<a class="btn btn-xs btn-danger" onclick="return confirm('+msg+')" href="<?php echo base_url('User_c/delete/'); ?>'+row.id+'">Delete</a>';
                    }
                    
                    return btn.concat(btnEdit, btnDelete);
                }
            }],
            "rowCallback": function(row, data, index) {
                var pageInfo = table.page.info();
                var pageNumber = pageInfo.page;
                var pageSize = pageInfo.length;
                var rowNumber = pageNumber * pageSize + index + 1;
                $('td:eq(0)', row).html(rowNumber);
            }
        });

        table.draw();

        $('#editUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var username = button.data('username');
            var level = button.data('level');
            var modal = $(this);

            modal.find('#mID').val(id);
            modal.find('#mUsername').val(username);
            // modal.find('#mLevel').val(level);
        });

    });
</script>