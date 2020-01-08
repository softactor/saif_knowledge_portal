<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">        
        <h1>
            Complain
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Complain</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class='row'>
            <div class='col col-md-12'>
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="complainer">Mobile<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="complainer" placeholder="Enter Complainer Phone" id='search_text' onkeyup="autosearch()" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="complainer">Name<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="complainer_name" placeholder="Enter Complainer Name" id='search_text' value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="complain details">Address<span class="required_text"></span></label>
                                <textarea class="form-control" id="complainer_address" name="complainer_address" rows="3"></textarea>
                            </div>
                        </div>
                    </div>                
                    <div class="row">                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Complain Division<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="complain_division" placeholder="Enter Complain Division" id='complain_division' value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Department<span class="required_text"></span></label> 
                                <input type="text" class="form-control" name="department" placeholder="Enter Department" id='search_text' value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Category<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="category" placeholder="Enter Category" id='search_text' value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Complain Type<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="complain_type" placeholder="Enter Complain Type" id='search_text' value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="role">Address Division<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="address_division" placeholder="Enter Address Division" id='search_text' value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="role">Address District<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="address_district" placeholder="Enter Address District" id='search_text' value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="role">Address Upazila<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="address_upazila" placeholder="Enter Address Upazila" id='search_text' value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="role">Address Union<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="address_union" placeholder="Enter Address Union" id='search_text' value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pwd">Assign To<span class="required_text"></span></label>
                                <input type="text" class="form-control" name="assign_to" placeholder="Enter Assign To" id='search_text' value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="complain details">Complain<span class="required_text"></span></label>
                                <textarea class="form-control" id="details" name="complain_details" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pwd">Priority<span class="required_text"></span></label>
                                <select class="form-control" id='priority_id' name="priority_id">
                                    <option value="">Select</option>
                                    <option value="1">High Priority</option>
                                    <option value="2">Medium Priority</option>
                                    <option value="3">Normal Priority</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">           
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>