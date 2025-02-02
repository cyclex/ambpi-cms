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
                            <th>Hadiah</th>
                            <th>Total Hadiah</th>
                            <th>Terpakai</th>
                            <th>Sisa</th>
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
                "url": "<?php echo base_url('ajax/Report_c/getDataSummary'); ?>"
            },
            "deferRender": true,
            "scrollX": true,
            "order": [
                [3, "desc"]
            ],
            "pagingType": "simple_numbers",
            "columns": [
                {
                    data: 'Prize',orderable: false
                },
                {
                    data: 'Total',orderable: false
                },
                {
                    data: 'Used',orderable: false
                },
                {
                    data: 'Available',orderable: true
                }
            ],
            "dom": 'lBfrtip',
            "buttons": [],
            "scrollY": '60vh',
            "scrollCollapse": true,
            "columnDefs": []
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

    });
</script>