<?php echo $header;?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!--    <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />-->
<!--    <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />-->
<!--    <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />-->
<!--    <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />-->
    <!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo  base_url();?>assets/pages/css/tourlist.css" rel="stylesheet" type="text/css" />
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
                    <h1>Administrator
                        <small>edit Admin information</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->


            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="javascript:;">Admin</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Edit</span>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->

            <!-- BEGIN PAGE BASE CONTENT -->
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                            </div>

                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Administrator Info</a>
                                </li>

                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">Change Password</a>
                                </li>

                            </ul>

                        </div>

                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <form action="<?php echo base_url();?>admin/user/adminprofile" method="post">

                                        <div class="form-group">
                                            <label>
                                                Email
                                            </label>
                                            <input type="text" required value="<?php echo $admin->CONTACT_EMAIL;?>" class="form-control input-lg"  id="adminEmail" name="adminEmail" placeholder="Email address">
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                Whatsapp
                                            </label>
                                            <input type="text" required value="<?php echo $admin->WHAT_APP;?>" class="form-control input-lg"  id="adminWhatapp" name="adminWhatapp" placeholder="Whatsapp Number">
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn green-jungle"> Change Profile</button>
                                        </div>

                                    </form>
                                </div>

                                <div class="tab-pane" id="tab_1_2">
                                    <div id="alertContainer" class="margin-top-10 margin-bottom-10">

                                    </div>
                                      <form method="post" id="formPassword">

                                            <div class="form-group">
                                                <label>
                                                    Password
                                                </label>
                                                <input type="password" class="form-control input-lg"  id="adminPassword" name="adminPassword" placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                                <label>
                                                    Confirm Password
                                                </label>
                                                <input type="password" class="form-control input-lg"  id="adminConfirmPassword" name="adminConfirmPassword" placeholder="Confirm Password">
                                            </div>

                                            <div class="form-actions">
                                                <button type="button" id="btChangePassword" class="btn green-jungle"> Change Password</button>
                                            </div>

                                      </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
    <?php echo $footer;?>
    <script src="<?php echo base_url();?>assets/pages/scripts/dashboard.js" type="text/javascript"></script>
    <script src="<?php echo  base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo  base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/pages/scripts/adminedit.js" type="text/javascript"></script>
</body>
</html>
