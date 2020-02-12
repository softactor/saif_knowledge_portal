  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="http://saifpowertecltd.com/">Saif Powertec LTD/</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="js/site_url.js"></script>
<script src="vendor/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="vendor/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="vendor/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="vendor/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendor/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="vendor/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- daterangepicker -->
<script src="vendor/bower_components/moment/min/moment.min.js"></script>
<script src="vendor/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="vendor/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="vendor/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vendor/bower_components/fastclick/lib/fastclick.js"></script>
<!-- CK Editor -->
<script src="vendor/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE App -->
<script src="vendor/dist/js/adminlte.min.js"></script>
<script src="js/sweetalert.js"></script>
<script type="text/javascript">
    function getDistrictByDivision(division_id){
        if(division_id){
            var ajaxParam = {
                division_id: division_id
            };
            $.ajax({
                url: baseUrl + "admin/function/address_ajax_process.php?process_type=getDistrictByDivision",
                type: 'POST',
                dataType: 'html',
                data: ajaxParam,
                success: function (response) {
                    $('#add_district_id').html(response);
                }
            });
        }
    }
    function getUpazilaByDistrict(district_id){
        if(district_id){
            var ajaxParam = {
                district_id: district_id
            };
            $.ajax({
                url: baseUrl + "admin/function/address_ajax_process.php?process_type=getUpazilaByDistrict",
                type: 'POST',
                dataType: 'html',
                data: ajaxParam,
                success: function (response) {
                    $('#add_upazila_id').html(response);
                }
            });
        }
    }
    function getUnionByUpazila(upazila_id){
        if(upazila_id){
            var ajaxParam = {
                upazila_id: upazila_id
            };
            $.ajax({
                url: baseUrl + "admin/function/address_ajax_process.php?process_type=getUnionByUpazila",
                type: 'POST',
                dataType: 'html',
                data: ajaxParam,
                success: function (response) {
                    $('#add_union_id').html(response);
                }
            });
        }
    }
  $(function () {
    $('#example1').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
    
    if($('#editor1').length) {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5();
        }
    })
    function confirm_delete_operation(delete_id, table){        
        swal({
            title               : "Are you sure?",
            type                : "warning",
            showCancelButton    : true,
            confirmButtonClass  : "btn-danger",
            confirmButtonText   : "Yes, delete it!",
            closeOnConfirm      : false
          },
          function(){
            var delete_row  =   "list_row_id_"+delete_id;  
            var deleteUrl   =   baseUrl + "admin/function/common_process.php?process_type=common_delete";  
            var ajaxParam = {
                delete_id   : delete_id,
                table       : table,
                fieldName   : 'id'
            };
            $.ajax({
                url     : deleteUrl,
                type    : 'POST',
                dataType: 'json',
                data    : ajaxParam,
                success: function (response) {
                    if(response.status  ==  "success"){
                        $('#'+delete_row).hide();
                        swal("Deleted!", response.message, "success");
                    }else{
                        swal("Fail to delete!", response.message, "error");
                    }
                }
            }); 
            
          });
    }
</script>
<script src="../get_data_table.js"></script>
</body>
</html>