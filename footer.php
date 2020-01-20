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
        load_product_data();
        load_showroom_data();
    });

    function load_product_data(division_id = "") {
        var dataTable = $('#product_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "admin/function/product_process.php?process_type=getFrontendProducts",
                type: "POST",
                dataType: 'json',
                data: {
                    division_id: division_id
                }
            },
            "columnDefs": [{
                "targets": [0, 1],
                "orderable": false,
            }, ],
            "lengthMenu": [
                [10, 250, 500, -1],
                [10, 250, 500, "All"]
            ]
        });
    }

    function get_division_wise_product_data(division_id) {
        $('#product_data').DataTable().destroy();
        if(division_id) {
            load_product_data(division_id);
        } else {
            load_product_data();
        }
    }
    function load_showroom_data(division_id = "") {
        var dataTable = $('#showroom_list').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "admin/function/showroom_process.php?process_type=getFrontendShowrooms",
                type: "POST",
                dataType: 'json',
                data: {
                    division_id: division_id
                }
            },
            "columnDefs": [{
                "targets": [0, 1],
                "orderable": false,
            }, ],
            "lengthMenu": [
                [10, 250, 500, -1],
                [10, 250, 500, "All"]
            ]
        });
    }

    function get_division_wise_showroom_data(division_id) {
        $('#showroom_list').DataTable().destroy();
        if(division_id) {
            load_showroom_data(division_id);
        } else {
            load_showroom_data();
        }
    }
</script>
<!-------------------------------------Datatables----->
<!-- Jquery Smooth Scroll  -->
<!--<script src="frontend/js/jquery.smoothscroll.js"></script>-->
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
<script src="frontend/js/faq_live_search.js"></script>
<script type="text/javascript">
    function get_product_details(id, table) {
        if (id) {
            var url = baseUrl + "admin/function/product_process.php?process_type=get_product_details_modal_data";
            var ajaxParam = {
                id: id,
                table: table,
                fieldName: 'id'
            };
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'html',
                data: ajaxParam,
                success: function(response) {
                    $('#productDetailsModal').modal('show');
                    $('#productDetailsBody').html(response);
                }
            });
        }
    }

    function get_showroom_details(id, table) {
        if (id) {
            var url = baseUrl + "admin/function/showroom_process.php?process_type=get_showroom_details_modal_data";
            var ajaxParam = {
                id: id,
                table: table,
                fieldName: 'id'
            };
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'html',
                data: ajaxParam,
                success: function(response) {
                    $('#showroomDetailsModal').modal('show');
                    $('#showroomDetailsBody').html(response);
                }
            });
        }
    }

    function getDivisionWiseFaq(division_id, table) {
        if (division_id) {
            var url = baseUrl + "admin/function/faq_process.php?process_type=get_division_wise_faq";
            var ajaxParam = {
                division_id: division_id,
                table: table,
                fieldName: 'id'
            };
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'html',
                data: ajaxParam,
                success: function(response) {
                    $('#accordion').html(response);
                }
            });
        }
    }
</script>
</body>

</html>
<?php include 'frontend/modal/product_details_modal.php'; ?>
<?php include 'frontend/modal/showroom_details_modal.php'; ?>