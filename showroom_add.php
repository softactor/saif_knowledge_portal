<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Showroom
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Showroom</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="#" class="create_link"><i class="fa fa-list"></i> List</a>
                    </div>
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputQuestion">Showroom Name</label>
                                <input type="text" class="form-control" id="showroom_name" name="showroom_name" placeholder="Enter showroom name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Contact Person</label>
                                <input type="text" class="form-control" id="contact_person" placeholder="Enter contact person">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Contact Number</label>
                                <input type="text" class="form-control" id="contact_number" placeholder="Enter contact number">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
