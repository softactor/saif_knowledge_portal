<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        <footer class="footer-area">
            <!--Footer-->
            <div class="footer-copyright">
                <div class="auto-container clearfix">
                    <!--Copyright-->
                    <div class="copyright text-center">Copyright 2019 &copy; Developed By <a target="_blank" href="frontend/#">Saif Powertec Ltd-IT Division</a> All Rights Reserved</div>
                </div>
            </div>
        </footer>
        <!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
        <script src="admin/js/site_url.js"></script>
        <script src="frontend/js/jquery.min.js"></script>
        <!-- Bootstrap Core Css  -->
        <script src="frontend/js/bootstrap.min.js"></script>
		
		
		<!-- Jquery Smooth Scroll  -->
		<!------------------------------------Datatables----->
        <script src="frontend/js/jquery.dataTables.min.js"></script>
        <script src="frontend/js/dataTables.bootstrap.min.js"></script>
		
		<script>
				$(document).ready(function() {
				$('#example').DataTable( {
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
				} );
			} );
		</script>
		<!-------------------------------------Datatables----->
        <!-- Jquery Smooth Scroll  -->
        <script src="frontend/js/jquery.smoothscroll.js"></script>
        <!-- Jquery Easing -->
        <script type="text/javascript" src="frontend/js/easing.js"></script>
        <!-- Jquery Counter -->
        <script src="frontend/js/jquery.countTo.js"></script>
        <!-- Jquery Waypoints -->
        <script src="frontend/js/jquery.waypoints.js"></script>
        <!-- Jquery Appear Plugin -->
        <script src="frontend/js/jquery.appear.min.js"></script>
        <!-- Carousel Slider  -->
        <script src="frontend/js/carousel.min.js"></script>
        <!-- Jquery Parallex -->
        <script src="frontend/js/jquery.stellar.min.js"></script>
        <!--Style Switcher -->
        <script src="frontend/js/bootstrap-dropdownhover.min.js"></script>
        <script type="text/javascript">
            function get_product_details(id, table){
                if(id){
                    var url   =   baseUrl + "admin/function/product_process.php?process_type=get_product_details_modal_data";  
                    var ajaxParam = {
                        id          : id,
                        table       : table,
                        fieldName   : 'id'
                    };
                    $.ajax({
                        url     : url,
                        type    : 'POST',
                        dataType: 'html',
                        data    : ajaxParam,
                        success: function (response) {
                            $('#productDetailsModal').modal('show');
                            $('#productDetailsBody').html(response);
                        }
                    });
                }
            }
            function get_showroom_details(id, table){
                if(id){
                    var url   =   baseUrl + "admin/function/showroom_process.php?process_type=get_showroom_details_modal_data";  
                    var ajaxParam = {
                        id          : id,
                        table       : table,
                        fieldName   : 'id'
                    };
                    $.ajax({
                        url     : url,
                        type    : 'POST',
                        dataType: 'html',
                        data    : ajaxParam,
                        success: function (response) {
                            $('#showroomDetailsModal').modal('show');
                            $('#showroomDetailsBody').html(response);
                        }
                    });
                }
            }
        </script>
    </body>
</html>
<?php include 'frontend/modal/product_details_modal.php'; ?>
<?php include 'frontend/modal/showroom_details_modal.php'; ?>