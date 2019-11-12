<?php include 'header.php'; ?>
<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
        <!-------------------------------------Datatables----->
        <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="frontend/css/dataTables.bootstrap.min.css">
		<!-------------------------------------Datatables----->
        <!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
        <div class="main-content-area">
            <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
            <section class="section-padding-80 white" id="questions">
                <div class="container">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="jumbotron text-center">
                                <h1 class="service_title">Product Information</h1>
                            </div>
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Position</th>
										<th>Office</th>
										<th>Age</th>
										<th>Start date</th>
										<th>Salary</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Tiger Nixon</td>
										<td>System Architect</td>
										<td>Edinburgh</td>
										<td>61</td>
										<td>2011/04/25</td>
										<td>$320,800</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>Name</th>
										<th>Position</th>
										<th>Office</th>
										<th>Age</th>
										<th>Start date</th>
										<th>Salary</th>
									</tr>
								</tfoot>
							</table>
                        </div>                        
                    </div>
                    <!-- Row End -->
                </div>
                <!-- end container -->
            </section>
            <!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->
        </div>
        <!-- =-=-=-=-=-=-= Main Area End =-=-=-=-=-=-= -->
<?php include 'footer.php'; ?>
        