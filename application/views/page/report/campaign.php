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
                <table class="table table-striped table-bordered nowrap" id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Campaign Name</th>
                            <th>Start Date</th>
                            <th>Expired Date</th>
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

<?php if ($isAdmin) { ?> 
<!-- Modal -->
<div class="modal fade" id="editCampaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Campaign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('Campaign_c/update'); ?>" method="post">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Start Date</label>
                            <div class="col-sm-8">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" name="start" id="mStart" readonly />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">End Date</label>
                            <div class="col-sm-8">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" name="end" id="mEnd" readonly />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-success pull-right" value="Simpan">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {

        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            sideBySide: true,
            ignoreReadonly:true
        });

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            sideBySide: true,
            ignoreReadonly:true
        });
        
        // Datapicker 
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
        });

        var table = $('#table').DataTable({
            "searching": false,
            "serverSide": true,
            "processing": true,
            "paging":true,
            "ajax": {
                "url": "<?php echo base_url('ajax/Report_c/getDataCampaign'); ?>",
            },
            "lengthMenu": [[50, 100, 200, 500, -1], [50, 100, 200, 500, "All"]],
            "deferRender": true,
            "scrollX": true,
            "order": [
                [2, "desc"]
            ],
            "pagingType": "simple_numbers",
            "columns": [
                {
                    data: 'retail',orderable: false
                },
                {
                    data: 'startDate',orderable: true
                },
                {
                    data: 'endDate',orderable: false
                }
            ],
            "dom": 'lBfrtip',
            "buttons": [],
            "scrollY": '60vh',
            "scrollCollapse": true,
            "columnDefs": [{
                "targets": 3,
                "render": function (data, type, row, meta) {

                    var btn = '';
                    <?php if ($isAdmin){ ?> 
                        btnEdit = '<a data-id="' + row.id + '" data-name="' + row.retail + '" data-start="' + row.startDate + '" data-end="' + row.endDate + '" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editCampaign">Edit</a> ';
                    <?php }?>
                    return btn.concat(btnEdit);
                }
            }]
        });

        table.draw();

        $('#btn_search').click(function() {
            if ($('#column').val() == ""){
                alert("Please choose your options");
            }
            $('#table').DataTable().ajax.reload();
        });

        $('#btn_clear').click(function() {
            $('#column').val("");
            $('#keyword').val("");
            $('#from').val("");
            $('#to').val("");
        });

        $('#editCampaign').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var start = button.data('start');
            var end = button.data('end');
            var modal = $(this);

            modal.find('#mID').val(id);
            modal.find('#mStart').val(start);
            modal.find('#mEnd').val(end);
        });

    });
</script>