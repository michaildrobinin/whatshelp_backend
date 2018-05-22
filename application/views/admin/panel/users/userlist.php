
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
                    <h1>User Management
                        <small>list of users</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->
                <div class="page-toolbar">
                </div>
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="javascript;">User</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">List</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->

            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-user font-dark"></i>
                                <span class="caption-subject bold uppercase">Users</span>
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="tbUserList">
                                <thead>
                                    <tr>
                                        <th> No. </th>
                                        <th> Nick Name </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                        <th> City </th>
                                        <th> Os </th>
                                        <th> Date </th>
                                        <th> Contacts </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i = 0 ; $i < count($userList); $i++){?>
                                        <tr class="odd gradeX">
                                            <td> <?php echo $i+1;?> </td>
                                            <td> <?php echo $userList[$i]['NICKNAME'];?></td>
                                            <td> <?php echo $userList[$i]['NAME'];?> </td>
                                            <td> <?php echo $userList[$i]['USER_EMAIL'];?></td>
                                            <td> <?php echo $userList[$i]['PHONE'];?> </td>
                                            <td> <?php echo $userList[$i]['CITY'];?> </td>

                                            <td>
                                                <?php if(intval($userList[$i]['OS']) === 0):?>
                                                    <span><i class="fa fa-android font-green"></i> </span>
                                                <?php else:?>
                                                    <span><i class="fa fa-apple font-red"></i> </span>
                                                <?php endif;?>
                                            </td>
                                            <td> <?php echo date('F j, Y', intval($userList[$i]['CREATED_AT']))?> </td>
                                            <td> <button type="button" class="btn btn-circle">
                                                    <?php echo $userList[$i]['CONTACT'];?>
                                                </button> </td>
                                            <td>
                                                <a href="<?php echo base_url();?>admin/user/uedit/<?php echo $userList[$i]['ID']?>" class="btn btn-circle btn-icon-only blue ">
                                                    <i class="fa fa-folder-open"></i> </a>
                                                <a href="javascript:;" data-value="<?php echo $userList[$i]['ID']?>" class="btn btn-circle btn-icon-only red delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo  base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>assets/global/plugins/datatables/datatables.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>assets/pages/scripts/userlist.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>
