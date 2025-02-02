<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 18.2.1
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> .</strong> All rights
    reserved.
</footer>


<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script>
    function checkPasswords() {
        var newPassword = document.getElementById('new').value;
        var confirmPassword = document.getElementById('conf').value;

    if (confirmPassword !== newPassword) {
            document.getElementById('message').innerText = 'Please input confirmation password correctly.';
            document.getElementById('submit').disabled = true;
        } else {
            document.getElementById('message').innerText = '';
            document.getElementById('submit').disabled = false;
        }
    }
</script>


<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" action="<?php echo base_url('change_password') ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="****" type="password" name="new" required id="new" oninput="checkPasswords()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Confirmation Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="****" type="password" name="conf" required id="conf" oninput="checkPasswords()">
                            <p class="help-block" id="message" style="color: red;"></p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success pull-right" value="Save" id="submit" disabled>
                </div>
                <!-- /.box-footer -->
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->



<!-- SlimScroll -->
<script src="<?php echo base_assets; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_assets; ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_assets; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_assets; ?>dist/js/demo.js"></script>

<link rel="stylesheet" href="<?php echo assets.'print/bootstrap-table.css'; ?>">
<script src="<?php echo assets.'print/bootstrap-table.js'; ?>"></script>
<script src="<?php echo assets.'print/bootstrap-table-print.js'; ?>"></script>

<link rel="stylesheet" href="<?php echo base_assets . 'dist/css/bootstrap-datepicker.min.css'; ?>">
<script src="<?php echo base_assets . 'dist/js/bootstrap-datepicker.min.js'; ?>"></script>

<script type="text/javascript" src="<?php echo bower; ?>moment/min/moment-with-locales.min.js"></script>
<script type="text/javascript"
        src="<?php echo bower; ?>eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet"
      href="<?php echo bower; ?>eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
<script type="text/javascript" src="<?php echo base_assets . 'dist/js/daterangepicker.min.js'; ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_assets . 'dist/css/daterangepicker.css'; ?>"/>

<script>

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true
        // immediateUpdates: true
    });

    this.addEventListener('install', function(event) {
        event.waitUntil(
            caches.open('v1').then(function(cache) {
                return cache.addAll([
                    'assets/datatables/css/fixedColumns.bootstrap.min.css',
                    'assets/datatables/css/select.dataTables.min.css',
                    'assets/datatables/css/dataTables.bootstrap.min.css',
                    'assets/print/bootstrap-table.css',
                    'bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
                    'assets/AdminLTE/dist/css/daterangepicker.css',
                    'assets/datatables/css/buttons.dataTables.min.css',
                    'assets/AdminLTE/dist/css/bootstrap-datepicker.min.css',
                    'assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css',
                    'assets/AdminLTE/dist/css/skins/_all-skins.min.css',
                    'assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css',
                    'assets/AdminLTE/dist/css/AdminLTE.min.css',
                    'assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css',
                    'assets/datatables/js/dataTables.bootstrap.min.js',
                    'assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
                    'assets/print/bootstrap-table-print.js',
                    'assets/datatables/js/dataTables.select.min.js',
                    'assets/AdminLTE/dist/js/adminlte.min.js',
                    'assets/datatables/js/dataTables.fixedColumns.min.js',
                    'assets/datatables/js/dataTables.fixedColumns.min.js',
                    'assets/AdminLTE/dist/js/demo.js',
                    'assets/datatables/js/dataTables.buttons.min.js',
                    'assets/datatables/js/buttons.html5.min.js',
                    'assets/AdminLTE/bower_components/fastclick/lib/fastclick.js',
                    'assets/AdminLTE/dist/js/daterangepicker.min.js',
                    'assets/AdminLTE/dist/js/bootstrap-datepicker.min.js',
                    'assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js',
                    'bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
                    'assets/sweetAlert/sweetalert.min.js',
                    'assets/datatables/js/jquery.dataTables.min.js',
                    'assets/AdminLTE/bower_components/jquery/dist/jquery-2.2.4.min.js',
                    'assets/datatables/js/jszip.min.js',
                    'assets/print/bootstrap-table.js',
                    'bower_components/moment/min/moment-with-locales.min.js',
                    'assets/datatables/js/vfs_fonts.js',
                    'assets/datatables/js/pdfmake.min.js'
                ]);
            })
        );
    });

</script>

</body>
</html>