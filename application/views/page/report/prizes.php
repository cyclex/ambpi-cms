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
            <?php if ($isAdmin) { ?>
        <button class='btn btn-success pull-right' style='margin:10px' data-toggle='modal' data-target='#import'>Upload Hadiah</button>
        <?php } ?>
            <div class="row">
                <div class="col-sm-10">
                    <div class="box-body table-responsive cs2">
                       
                        <table class="table table-striped table-bordered nowrap" id="table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hadiah</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="col-sm-2">
                <div class="alert alert-info" style="margin: 20px;">
                      <h3>Persentase Redeem Valid</h3><hr>
                      <h2><?php echo $percentage['percentage']; ?>%</h2>
                  </div>
                </div>
            </div>
            
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Upload Hadiah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo base_url('Job_c/create/upload'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">File .xlsx</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="file" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <a class="btn btn-warning" href="<?php echo base_url('assets/template-hadiah.xlsx') ?>" target="_blank">Download Template</a>
                        <input type="submit" class="btn btn-success pull-right" value="Upload">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#table').DataTable({
            "searching": false,
            "serverSide": true,
            "processing": true,
            "paging":true,
            "ajax": {
                "url": "<?php echo base_url('ajax/Report_c/getDataPrize'); ?>"
            },
            "lengthMenu": [[50, 100, 200, 500, -1], [50, 100, 200, 500, "All"]],
            "deferRender": true,
            "scrollX": true,
            "order":[],
            "pagingType": "simple_numbers",
            "columns": [{
                    data: 'sequenceNumber',"orderable": false
                },
                {
                    data: 'prize',"orderable": false
                }
            ],
            "dom": 'lBfrtip',
            "buttons": [
                'copyHtml5',
                {
                    "extend": 'excelHtml5',
                    "title": '',
                    "messageTop": 'Urutan Hadiah',
                    "messageBottom": '',
                    "orientation": 'landscape',
                    exportOptions: {
                        columns: [0, 1],
                    }
                }
            ],
            "scrollY": '60vh',
            "scrollCollapse": true,
            "columnDefs": [],
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