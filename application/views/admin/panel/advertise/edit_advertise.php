<?php echo $header;?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo  base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
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
                    <h1>Advertisement
                        <small>edit advertisement</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->

            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <span class="active"> Advertisement </span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active"> Edit Advertisement</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <?php if(intval($error) == 1):?>
                <div class="row">

                    <div class="col-md-12">
                        <div class="alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            Failed to add new advertisement
                        </div>
                    </div>

                </div>
            <?php elseif (intval($error) == 2):?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            Successfully added new advertisement
                        </div>
                    </div>
                </div>
            <?php endif;?>

            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="<?php echo base_url();?>admin/tour/editsync" enctype="multipart/form-data" method="post">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Advertisement Link</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-link"></i>
                                            </span>
                                            <input type="text" name="adverLink" id="adverLink" class="form-control" placeholder="Advertisement link" value="Advertisement link">
                                        </div>
                                        <?php echo form_error('adverName', "<p class='text-danger'>","</p>" );?>
                                    </div>

                                    <div class="form-group">
                                        <label> Advertisement Description</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-sticky-note"></i>
                                            </span>
                                            <textarea  name="adverDescription" id="adverDescription" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-warning"> Advertisement Position in mobile application</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="md-radio">
                                                    <input type="radio" class="md-radiobtn" id="shirtOption5"  name="shirtOption" value="0" >
                                                    <label for="shirtOption5">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Bottom </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="md-radio">
                                                    <input type="radio" class="md-radiobtn" id="shirtOption6"  name="shirtOption" value="1" >
                                                    <label for="shirtOption6">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Top </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="md-radio">
                                                    <input type="radio" class="md-radiobtn" id="shirtOption7"  name="shirtOption" value="2" >
                                                    <label for="shirtOption7">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Full screen </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new" style="width: 300px; height: 150px;">
                                                <img src="http://via.placeholder.com/350x150" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="fileToUpload">
                                                </span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>

                                        <?php echo form_error('fileToUpload', "<p class='text-danger'>","</p>" );?>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">NOTE! </span>
                                            <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn blue">Change</button>
                                    <button type="reset" class="btn red">Clear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
            <!-- END CONTENT -->
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
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
</body>

</html>
