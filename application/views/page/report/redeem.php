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
        <div class="box-header with-border">
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <div class="row" style="margin-bottom:10px;">
                <div class="col-sm-2">
                    <input type='text' readonly id='from' class="datepicker form-control" placeholder='From date'>
                </div>
                <div class="col-sm-2">
                    <input type='text' readonly id='to' class="datepicker form-control" placeholder='To date'>
                </div>
                <div class="col-sm-2">
                    <select name="column" id="column" require class="form-control">
                        <option value="">Pilih</option>
                        <option value="name">Nama</option>
                        <option value="msisdn">MSISDN</option>
                        <option value="profession">Profesi</option>
                        <option value="county">Kota</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type='text' id='keyword' class="form-control" placeholder='Keyword' require>
                </div>
                <div class="col-sm-2">
                    <button id="btn_search" type="button" class="btn btn-info">Search</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#download">Download</button>
                </div>
            </div> 
        </div>
        <!-- /.box-body -->
    </div>

        <!-- Default box -->
        <div class="box">
            <div class="box-body table-responsive cs2">
                <table class="table table-striped table-bordered nowrap" id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>MSISDN WA</th>
                            <th>Profesi</th>
                            <th>Kota</th>
                            <th>Tanggal Submit</th>
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
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">Nama</label>
                            <div class="col-sm-8">
                                <p id="name"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">No Whatsapp</label>
                            <div class="col-sm-8">
                                <p id="msisdn"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">Kota</label>
                            <div class="col-sm-8">
                                <p id="county"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">NIK</label>
                            <div class="col-sm-8">
                                <p id="nik"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">Profesi</label>
                            <div class="col-sm-8">
                                <p id="profession"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">Hadiah</label>
                            <div class="col-sm-8">
                                <p id="prize"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">Tanggal Submit</label>
                            <div class="col-sm-8">
                                <p id="redeemDate"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">Struk</label>
                            <div class="col-sm-8">
                                <p id="struk"></p>
                                <input type="hidden" class="form-control" id="redeem_id">
                            </div>
                        </div>
                        <?php if ($isAdmin) { ?>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">Nominal Pembelian</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" required id="amount" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 control-label">Catatan</label>
                            <div class="col-sm-8">
                                <textarea id="notes" class="form-control"></textarea>
                            </div>
                        </div>
                        <? } ?>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                        <?php if ($isAdmin) { ?>
                        <button type="submit" class="btn btn-info pull-right" data-dismiss="modal" style="margin-left: 10px;" id="btn_approve">Approve</button>
                        <button type="submit" class="btn btn-danger pull-right" data-dismiss="modal" id="btn_reject">Reject</button>
                        <?php } ?>
                    </div>
                    <!-- /.box-footer -->
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Download Data Redeem</h4>
            </div>
            <div class="modal-body">
                    <div class="box-body">
                        <div class="row form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Tanggal Mulai</label>
                            <div class="col-sm-8">
                                <input type='text' readonly id='from2' class="datepicker form-control" placeholder='From date'>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Tanggal Akhir</label>
                            <div class="col-sm-8">
                                <input type='text' readonly id='to2' class="datepicker form-control" placeholder='From date'>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success pull-right" value="Request" id="btn_download">Request</button>
                    </div>
                    <!-- /.box-footer -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        // Function to get current date in YYYY-MM-DD format
      function getCurrentDate() {
          let today = new Date();
          let yyyy = today.getFullYear();
          let mm = String(today.getMonth() + 1).padStart(2, '0'); // Month (01-12)
          let dd = String(today.getDate()).padStart(2, '0'); // Day (01-31)
          return `${yyyy}-${mm}-${dd}`;
      }

      // Set default values for date inputs
      $("#from").val(getCurrentDate());
      $("#to").val(getCurrentDate());
      $("#from2").val(getCurrentDate());
      $("#to2").val(getCurrentDate());

        var table = $('#table').DataTable({
            "searching": false,
            "serverSide": true,
            "processing": true,
            "paging":true,
            "ajax": {
                "url": "<?php echo base_url('ajax/Report_c/getDataRedeem'); ?>",
                'data': function(data) {
                    // Read values
                    var from_date = $("#from").val();
                    var to_date = $("#to").val();
                    var column = $("#column").val();
                    var keyword = $("#keyword").val();

                    // Append to data
                    data.from = from_date;
                    data.to = to_date;
                    data.column = column;
                    data.keyword = keyword;
                },
            },
            "lengthMenu": [[50, 100, 200, 500, -1], [50, 100, 200, 500, "All"]],
            "deferRender": true,
            "scrollX": true,
            "pagingType": "simple_numbers",
            "columns": [
                {data: 'name',orderable: false},{data: 'name',orderable: false},{data: 'msisdn',orderable: false},{data: 'profession',orderable: false},{data: 'county',orderable: false},{data: 'dateRedeem',orderable: false},{data: 'name',orderable: false}
            ],
            "dom": 'lBfrtip',
            "buttons": [],
            "scrollY": '60vh',
            "scrollCollapse": true,
            "columnDefs": [{
                "targets": 6,
                "render": function (data, type, row, meta) {
                    var btn = '<a data-id="' + row.redeem_id + '" class="btn btn-xs btn-info" data-toggle="modal" data-target="#detail">Detail</a> ';
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

        $('#btn_search').click(function() {
            $('#table').DataTable().ajax.reload();
        });

        $('#detail').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var modal = $(this);

            getDetailRedeem(id);
        });

        $('#btn_approve').click(function() {
            approveRedeem();
        });

        $('#btn_reject').click(function() {
            rejectRedeem();
        });

        $("#btn_download").click(function() {
            let fromDate = $("#from2").val();
            let toDate = $("#to2").val();

            // Validate if fromDate or toDate is empty
            if (!fromDate || !toDate) {
                alert("Please select both start and end dates.");
                return; // Stop execution if validation fails
            }

            // Call API
            let formData = new FormData();
            formData.append("from", fromDate);
            formData.append("to", toDate);

            $.ajax({
                url: "<?php echo base_url('Job_c/create/download_redeem'); ?>", // Ensure this resolves correctly
                method: "POST",
                processData: false,  // Important: Prevent jQuery from processing the data
                contentType: false,  // Important: Prevent jQuery from setting content-type
                data: formData,
                success: function(response) {
                    $("#download").modal("hide");
                    alert("Your request has been successfully submitted!");
                },
                error: function(xhr, status, error) {
                    alert("Failed to submit request. Please try again.");
                }
            });
        });

        function getDetailRedeem(id){
            // Call API
            let formData = new FormData();
            formData.append("id", id);

            $.ajax({
                url: "<?php echo base_url('ajax/Report_c/getDetailRedeem'); ?>", // Ensure this resolves correctly
                method: "POST",
                processData: false,  // Important: Prevent jQuery from processing the data
                contentType: false,  // Important: Prevent jQuery from setting content-type
                data: formData,
                success: function(response) {
                    $("#name").text(response.name);
                    $("#msisdn").text(response.msisdn);
                    $("#county").text(response.county);
                    $("#nik").text(response.nik);
                    $("#profession").text(response.profession);
                    $("#prize").text(response.prize);
                    $("#redeemDate").text(response.dateRedeem);
                    $('#redeem_id').val(response.id);
                },
                error: function(xhr, status, error) {
                    alert("Failed to submit request. Please try again.");
                }
            });
        }

        function approveRedeem(){
            let id = $("#redeem_id").val();
            let notes = $("#notes").val();
            let amount = $("#amount").val();

            // Call API
            let formData = new FormData();
            formData.append("id", id);
            formData.append("amount", amount);
            formData.append("notes", notes);
            formData.append("approved", true);

            $.ajax({
                url: "<?php echo base_url('ajax/Report_c/approveRedeem'); ?>", // Ensure this resolves correctly
                method: "POST",
                processData: false,  // Important: Prevent jQuery from processing the data
                contentType: false,  // Important: Prevent jQuery from setting content-type
                data: formData,
                success: function(response) {
                    $("#download").modal("hide");
                    alert("Your request has been successfully submitted!");
                    $('#table').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    alert("Failed to submit request. Please try again.");
                }
            });
        }

        function rejectRedeem(){
            let id = $("#redeem_id").val();
            let notes = $("#notes").val();
            let amount = $("#amount").val();

            // Call API
            let formData = new FormData();
            formData.append("id", id);
            formData.append("amount", amount);
            formData.append("notes", notes);
            formData.append("approved", false);

            $.ajax({
                url: "<?php echo base_url('ajax/Report_c/approveRedeem'); ?>", // Ensure this resolves correctly
                method: "POST",
                processData: false,  // Important: Prevent jQuery from processing the data
                contentType: false,  // Important: Prevent jQuery from setting content-type
                data: formData,
                success: function(response) {
                    $("#download").modal("hide");
                    alert("Your request has been successfully submitted!");
                    $('#table').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    alert("Failed to submit request. Please try again.");
                }
            });
        }

    });
</script>