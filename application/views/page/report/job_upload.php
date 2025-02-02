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
                            <th>Nomor</th>
                            <th>Upload By</th>
                            <th>Jumlah Data</th>
                            <th>Tanggal Upload</th>
                            <th>Status</th>
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

<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#table').DataTable({
            "searching": false,
            "serverSide": true,
            "processing": true,
            "paging":true,
            "ajax": {
                "url": "<?php echo base_url('ajax/Report_c/getDataJob/upload'); ?>"
            },
            "lengthMenu": [[50, 100, 200, 500, -1], [50, 100, 200, 500, "All"]],
            "deferRender": true,
            "scrollX": true,
            "order":[],
            "pagingType": "simple_numbers",
            "columns": [
                {
                    data: 'author',"orderable": false
                },{
                    data: 'author',"orderable": false
                },{
                    data: 'totalRows',"orderable": false
                },{
                    data: 'createdAt',"orderable": false
                },{
                    data: 'jobStatus',"orderable": false
                },{
                    data: 'jobStatus',"orderable": false
                }
            ],
            "dom": 'lBfrtip',
            "buttons": [],
            "scrollY": '60vh',
            "scrollCollapse": true,
            "columnDefs": [{
                "targets": 5,
                "render": function (data, type, row, meta) {

                    var btn = '<a class="btn btn-xs btn-warning" href="<?php echo base_url('assets/files/'); ?>'+row.file+'" target="_blank">Download</a>';
                    
                    return btn;
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

    });
</script>