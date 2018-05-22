<?php echo $header;?>
<link href="<?php echo  base_url();?>assets/global/plugins/datatables/datatables.css" rel="stylesheet" type="text/css" />
<link href="<?php echo  base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">

<?php echo $topbar;?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php echo $sidebar;?>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Locations
                        <small> list </small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->

            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="javascript:;">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Location</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">List</span>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->

            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-blue">
                                List of Locations
                            </div>

                        </div>

                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="tbLocationList">
                                <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Name </th>
                                    <th> Address </th>
                                    <th> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for($i = 0 ; $i < count($locations); $i++){?>
                                    <tr class="odd gradeX">
                                        <td> <?php echo $i+1;?> </td>
                                        <td> <?php echo $locations[$i]['LOCATION_NAME'];?> </td>
                                        <td> <?php echo $locations[$i]['ADDRESS'];?> </td>
                                        <td>
                                            <button data-value="<?php echo $locations[$i]['ID']?>" class="btn btn-circle btn-icon-only blue ">
                                                <i class="fa fa-map-marker"></i> </button>
                                        </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

                <div class="col col-sm-12 col-md-6">
                    <form role="form" id="formInfo" method="post" action="<?php echo base_url();?>admin/map/updatelocation">

                            <div class="form-group">
                                <label>
                                    Location name
                                </label>
                                <input type="text" required class="form-control input-lg" id="locationName" name="locationName" placeholder="Location Name">
                            </div>
                            <input type="hidden" id="locationId">
                            <div class="form-group">
                                <label>
                                    Address
                                </label>
                                <input type="text" required class="form-control input-lg" disabled id="locationAddress" name="locationAddress" placeholder="Address">
                            </div>

                            <div class="form-group">
                                <label>
                                   Description
                                </label>
                                <textarea type="text" required  rows="3" class="form-control input-lg" id="locationDescription" name="locationDescription" placeholder="Description of location"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label"> Type of location </label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="md-radio">
                                            <input type="radio" class="md-radiobtn" id="groupOption1"  name="groupOption" value="0" >
                                            <label for="groupOption1">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Shop </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-radio">
                                            <input type="radio" class="md-radiobtn" id="groupOption2"  name="groupOption" value="1" >
                                            <label for="groupOption2">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Group </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-radio">
                                            <input type="radio" class="md-radiobtn" id="groupOption3"  name="groupOption" value="2" >
                                            <label for="groupOption3">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Other </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class=" col-md-12 ">
                                        <a type="submit" value="Update" class="btn green btn-block"> Edit </a>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>

            </div>

            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

    <?php echo $footer;?>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo  base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="<?php echo  base_url();?>assets/global/plugins/datatables/datatables.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/pages/scripts/location_list.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>
