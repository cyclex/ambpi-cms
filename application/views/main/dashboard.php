<div class="content-wrapper" style="min-height: 916px;">
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
      <!-- Info boxes -->
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
            <!-- <h3 class="box-title">Laporan Penukaran Hadiah</h3> -->
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
                  <button id="btn_search" type="button" class="btn btn-info">Search</button>
              </div>
          </div> 
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
     <!-- Default box -->
     <div class="box">
        <div class="box-body">
          <div class="row">
              <div class="col-sm-3">
                  <div class="alert alert-info">
                      <h3>Submit Struk</h3><hr>
                      <h2 id="totalSubmit"><?php echo $data['totalSubmit']; ?></h2>
                  </div>
              </div>
              <div class="col-sm-3">
                  <div class="alert alert-success">
                      <h3>Data Valid</h3><hr>
                      <h2 id="totalValid"><?php echo $data['totalValid']; ?></h2>
                  </div>
              </div>
              <div class="col-sm-3">
                  <div class="alert alert-warning">
                      <h3>Data Invalid</h3><hr>
                      <h2 id="totalInvalid"><?php echo $data['totalInvalid']; ?></h2>
                  </div>
              </div>
              <div class="col-sm-3">
                  <div class="alert alert-danger">
                      <h3>Waiting Validation</h3><hr>
                      <h2 id="totalPending"><?php echo $data['totalPending']; ?></h2>
                  </div>
              </div>
          </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
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

        $("#btn_search").click(function() {
            let fromDate = $("#from").val();
            let toDate = $("#to").val();

            if (!fromDate || !toDate) {
                alert("Please select both dates.");
                return;
            }

            // Call API
            let formData = new FormData();
            formData.append("from", fromDate);
            formData.append("to", toDate);

            $.ajax({
                url: "<?php echo base_url('usage/1'); ?>", // Ensure this resolves correctly
                method: "POST",
                processData: false,  // Important: Prevent jQuery from processing the data
                contentType: false,  // Important: Prevent jQuery from setting content-type
                data: formData,
                success: function(response) {
                  if (response && response.totalSubmit !== undefined) {
                      $("#totalSubmit").text(response.totalSubmit);
                      $("#totalValid").text(response.totalValid);
                      $("#totalInvalid").text(response.totalInvalid);
                      $("#totalPending").text(response.totalPending);
                  }
                },
                error: function(xhr, status, error) {
                    alert("Failed to fetch data.");
                }
            });
        });

        // Clear input fields
        $("#btn_clear").click(function() {
            $("#from").val("");
            $("#to").val("");
        });
    });
</script>