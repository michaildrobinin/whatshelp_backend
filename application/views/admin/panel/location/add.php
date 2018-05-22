<?php echo $header;?>

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
                        <small> add </small>
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
                    <span class="active">Add location</span>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->

            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row" id="alertContainer">

            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="portlet green box">
                        <div class="portlet-title">
                            <div class="caption">
                                Input information
                            </div>
                        </div>

                        <div class="portlet-body">
                            <form role="form" id="formAddress">
                                <div class="form-group">
                                    <label class="font-red"> Address* </label>
                                    <div class="input-group">

                                        <div class="input-group-control">
                                            <input required type="text" id="txtAddressInput" class="form-control input-md" placeholder="Address">
                                        </div>
                                        <span class="input-group-btn btn-right">
                                            <button id="btSearchButton" class="btn blue-madison">Search</button>
                                        </span>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="font-red"> Name* </label>
                                    <input required type="text" class="form-control input-md" id="txtLocationName" placeholder="Location Name">
                                </div>


                                <div class="form-group">
                                    <label class="font-red"> Description of location* </label>
                                    <textarea required class="form-control input-md" placeholder="Description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"> Type of location </label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="md-radio">
                                                <input type="radio" class="md-radiobtn" checked id="groupOption1"  name="shirtOption" value="0" >
                                                <label for="groupOption1">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Shop </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="md-radio">
                                                <input type="radio" class="md-radiobtn" id="groupOption2"  name="shirtOption" value="1" >
                                                <label for="groupOption2">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Group </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="md-radio">
                                                <input type="radio" class="md-radiobtn" id="groupOption3"  name="shirtOption" value="2" >
                                                <label for="groupOption3">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Other </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <button type="submit"  class="btn btn-success btn-block"> Add location </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col col-sm-12 col-md-4">
                    <div class="portlet red box">
                        <div class="portlet-title">
                            <div class="caption">
                                View on Map
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="gmaps margin-bottom-15" style="width: 100%;" id="disp_map">

                            </div>
                        </div>
                    </div>
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
    <script src="https://maps.google.com/maps/api/js?key=<?php echo $this->config->item('google_map_key');?>"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/gmaps/gmaps.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/pages/scripts/location_add.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>
