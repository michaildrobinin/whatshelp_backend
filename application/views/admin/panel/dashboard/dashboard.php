<?php echo $header;?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!--    <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />-->
<!--    <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />-->
<!--    <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />-->
<!--    <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />-->
    <!-- END PAGE LEVEL PLUGINS -->

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
                    <h1>Dashboard
                        <small>dashboard & statistics</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->

            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Dashboard</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->

            <!-- BEGIN PAGE BASE CONTENT -->
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-android"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?php echo $totalAndroid;?>">0</span>
                            </div>
                            <div class="desc"> Android Users </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-apple"></i>
                        </div>

                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?php echo $totalApple;?>">0</span> </div>
                            <div class="desc"> iPhone Users </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?php echo $totalLocation;?>">0</span>
                            </div>
                            <div class="desc"> Total Locations </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->



            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="portlet box blue-madison">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-users"></i>
                                <span class="caption-subject uppercase">Recent Registered User</span>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" ></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="tbUserList">
                                <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Name </th>
                                    <th> Phone </th>
                                    <th> Email </th>
                                    <th> Os </th>
                                    <th> Date </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for($i = 0 ; $i < count($recentUser); $i++){?>
                                    <tr>
                                        <td> <?php echo $i+1;?> </td>
                                        <td> <?php echo $recentUser[$i]['NAME'];?></td>
                                        <td> <?php echo $recentUser[$i]['PHONE'];?> </td>
                                        <td> <?php echo $recentUser[$i]['USER_EMAIL'];?> </td>
                                        <th>
                                            <?php if (intval($recentUser[$i]['OS']) == 0):?>
                                                <span><i class="fa fa-android font-green"></i> Android </span>
                                            <?php else:?>
                                                <span><i class="fa fa-apple font-green"></i> iPhone </span>
                                            <?php endif;?>

                                        </th>
                                        <td> <?php echo date('F j, Y', intval($recentUser[$i]['CREATED_AT']))?> </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="portlet box red-flamingo">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bell"></i>
                                <span class="caption-subject uppercase">Recent Alarm</span>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" ></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="tbUserList">
                                <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> From </th>
                                    <th> To </th>
                                    <th> Location </th>
                                    <th> Success </th>
                                    <th> Date </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php for($i = 0 ; $i < count($recentCall); $i++){?>
                                        <tr>
                                            <td> <?php echo $i+1;?> </td>
                                            <td> <?php echo $recentCall[$i]['FROM_NAME']?> </td>
                                            <td> <?php echo $recentCall[$i]['TO_NAME']?> </td>
                                            <td> <?php echo $recentCall[$i]['LOCATION_ADDR']?> </td>
                                            <td>
                                                <?php if(intval($recentCall[$i]['SUCCESS']) == 0):?>
                                                    <span class="label label-warning"> Failed </span>
                                                <?php else:?>
                                                    <span class="label label-success"> Success </span>
                                                <?php endif;?>
                                            </td>
                                            <td> <?php echo date('F j, Y h:m:s', intval($recentCall[$i]['CREATED_AT']))?> </td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-map"></i>
                                <span class="caption-subject font-blue uppercase">Total Locations</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="dashboard_map" style="height: 500px;" class="gmaps margin-bottom-15" data-lat="0" data-lot="0">

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
    <script src="<?php echo base_url();?>assets/pages/scripts/dashboard.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>
