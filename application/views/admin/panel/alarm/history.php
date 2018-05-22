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
                    <h1>History
                        <small> alarm history </small>
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
                    <span class="active">Alarm</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">History</span>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->

            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-blue">
                                History
                            </div>

                        </div>

                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="tbAlarmHistory">
                                <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> From </th>
                                    <th> To </th>
                                    <th> Phone </th>
                                    <th> Os </th>
                                    <th> Time </th>
                                    <th> Result </th>
<!--                                    <th> </th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php for($i = 0 ; $i < count($alarmHistory); $i++){?>
                                    <tr class="odd gradeX">
                                        <td> <?php echo $i+1;?> </td>
                                        <td> <?php echo $alarmHistory[$i]['FROM_NAME'];?></td>
                                        <td> <?php echo $alarmHistory[$i]['TO_NAME'];?> </td>
                                        <td> <?php echo $alarmHistory[$i]['PHONE'];?> </td>
                                        <td>
                                            <?php if (intval($alarmHistory[$i]['USER_OS']) == 0):?>
                                                <span><i class="fa fa-android font-green"></i> Android </span>
                                            <?php else:?>
                                                <span><i class="fa fa-apple font-green"></i> iPhone </span>
                                            <?php endif;?>
                                        </td>
                                        <td> <?php echo date('F j, Y', intval($alarmHistory[$i]['CREATED_AT']))?> </td>

                                        <td>
                                            <?php if(intval($alarmHistory[$i]['SUCCESS']) == 0):?>
                                                <span class="label label-warning"> Failed </span>
                                            <?php else:?>
                                                <span class="label label-success"> Success </span>
                                            <?php endif;?>
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
    <script src="<?php echo  base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="<?php echo  base_url();?>assets/global/plugins/datatables/datatables.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/pages/scripts/history.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>
