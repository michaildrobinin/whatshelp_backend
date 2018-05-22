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
                        <small>edit user information</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->


            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="javascript:;">User</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url()."admin/user/ulist"?>">List</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Edit</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active"> <?php echo $profileObject['NICK_NAME'];?> </span>
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
                                    <a href="#tab_1_1" data-toggle="tab"> Profile Info </a>
                                </li>

                                <li>
                                    <a href="#tab_1_2" data-toggle="tab"> Change Status </a>
                                </li>

                                <li>
                                    <a href="#tab_1_3" data-toggle="tab"> Contacts </a>
                                </li>

<!--                                <li>-->
<!--                                    <a href="#tab_1_4" data-toggle="tab"> SOS Setting </a>-->
<!--                                </li>-->

                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="row">
<!--                                        name email phone number -->
                                        <div class="col-sm-12">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-user"></i>Profile information
                                                    </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label>
                                                                First Name
                                                            </label>
                                                            <input type="text" value="<?php echo $profileObject['FIRST_NAME'];?>" class="form-control input-lg"
                                                                   disabled id="userFirstName" name="userFirstName" placeholder="First Name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>
                                                                Last Name
                                                            </label>
                                                            <input type="text" value="<?php echo $profileObject['LAST_NAME'];?>" class="form-control input-lg" disabled id="userSecondName" name="userSecondName" placeholder="Last Name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>
                                                                Email Address
                                                            </label>
                                                            <input type="text" value="<?php echo $userObject['USER_EMAIL'];?>" class="form-control input-lg" disabled id="userEmailAddress" name="userEmailAddress" placeholder="Email Address">
                                                        </div>


                                                        <div class="form-group">
                                                            <label>
                                                                Phone Number
                                                            </label>
                                                            <input type="text" value="<?php echo $profileObject['PHONE'];?>" class="form-control input-lg" disabled id="userPhoneNumber" name="userPhoneNumber" placeholder="Phone Number">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>
                                                                Job
                                                            </label>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" disabled class="md-radiobtn" <?php if(intval($profileObject['JOB']) == 0) { echo 'checked';}?> id="jobOption1"  name="shirtOption" value="0" >
                                                                        <label for="jobOption1">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Unemployeed </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" disabled class="md-radiobtn" <?php if(intval($profileObject['JOB']) == 1) { echo 'checked';}?> id="jobOption2"  name="shirtOption" value="1" >
                                                                        <label for="jobOption2">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Student </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" disabled class="md-radiobtn" <?php if(intval($profileObject['JOB']) == 2) { echo 'checked';}?> id="jobOption3"  name="shirtOption" value="2" >
                                                                        <label for="jobOption3">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Worker </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" disabled class="md-radiobtn" <?php if(intval($profileObject['JOB']) == 3) { echo 'checked';}?> id="jobOption4"  name="shirtOption" value="3" >
                                                                        <label for="jobOption4">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Employee </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" disabled class="md-radiobtn" <?php if(intval($profileObject['JOB']) == 4) { echo 'checked';}?> id="jobOption5"  name="shirtOption" value="4" >
                                                                        <label for="jobOption5">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Manager </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" disabled class="md-radiobtn" <?php if(intval($profileObject['JOB']) == 5) { echo 'checked';}?> id="jobOption6"  name="shirtOption" value="5" >
                                                                        <label for="jobOption6">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Teacher </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" disabled class="md-radiobtn" id="jobOption7" <?php if(intval($profileObject['JOB']) == 6) { echo 'checked';}?>  name="shirtOption" value="6" >
                                                                        <label for="jobOption7">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Other </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label>
                                                                Title of Study
                                                            </label>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" <?php if(intval($profileObject['TITLE_STUDY']) == 0) { echo 'checked';}?> class="md-radiobtn" id="studyOption1" disabled name="studyOption" value="0" >
                                                                        <label for="studyOption1">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Scuola </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" <?php if(intval($profileObject['TITLE_STUDY']) == 1) { echo 'checked';}?> class="md-radiobtn" id="studyOption2" disabled name="studyOption" value="1" >
                                                                        <label for="studyOption2">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Superiore </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="md-radio">
                                                                        <input type="radio" <?php if(intval($profileObject['TITLE_STUDY']) == 2) { echo 'checked';}?> class="md-radiobtn" id="studyOption3" disabled name="studyOption" value="2" >
                                                                        <label for="studyOption3">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Universita </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>
                                                                sport
                                                            </label>
                                                            <input type="text" value="<?php echo $profileObject['SPORT'];?>" class="form-control input-lg" disabled id="userSport" name="userSport" placeholder="User Favor Sport">
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="md-checkbox-inline">
                                                                <div class="md-checkbox">
                                                                    <input type="checkbox" disabled <?php if(intval($profileObject['MARRIED']) == 1) { echo 'checked';}?> class="md-check" id="marryCheck"  name="marryCheck" value="2" >
                                                                    <label for="marryCheck">
                                                                        <span></span>
                                                                        <span class="check"></span>
                                                                        <span class="box"></span> Married </label>
                                                                </div>

                                                            </div>
                                                        </div>


                                                        <div class="form-group">

                                                                <div class="md-checkbox-inline">
                                                                    <div class="md-checkbox">
                                                                        <input type="checkbox" disabled <?php if(intval($profileObject['TERMS_ALLOW']) == 1) { echo 'checked';}?> class="md-check" id="agreeCheck"  name="agreeCheck" value="2" >
                                                                        <label for="agreeCheck">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span> Accept Terms & Conditions and "Subscribe" </label>
                                                                    </div>

                                                                </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PERSONAL INFO TAB -->

                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    <div id="alertContainer1" class="margin-top-10 margin-bottom-10">

                                    </div>
                                    <form method="post" id="approveForm">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-3">
                                                    <div class="md-radio">
                                                        <input type="radio" <?php if(intval($userObject['ACTIVE']) == 0) { echo 'checked';}?> class="md-radiobtn" id="approveOption1"  name="approveOption" value="2" >
                                                        <label for="approveOption1">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Approve </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="md-radio">
                                                        <input type="radio" class="md-radiobtn" <?php if(intval($userObject['ACTIVE']) == 1) { echo 'checked';}?> id="approveOption2"  name="approveOption" value="2" >
                                                        <label for="approveOption2">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Deny </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end profile-settings-->
                                        <div class="margin-top-10">
                                            <button id="submitApprove" data-value="userid" class="btn green margin-right-10" type="button"> Save Changes </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PRIVACY SETTINGS TAB -->

                                <!-- ASSIGNED TOURISM TAB -->
                                <div class="tab-pane" id="tab_1_3">
                                    <div class="row">
                                        <table class="table table-striped table-bordered table-hover" id="tbContact">
                                            <thead>
                                                <tr>
                                                    <th> No. </th>
                                                    <th> Nick Name </th>
                                                    <th> Name </th>
                                                    <th> Phone </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i = 0 ; $i < count($contactObject); $i++){?>
                                                    <tr class="odd gradeX">
                                                        <td> <?php echo $i+1;?> </td>
                                                        <td> <?php echo $contactObject[$i]['NICK'];?> </td>
                                                        <td> <?php echo $contactObject[$i]['NAME'];?> </td>
                                                        <td> <?php echo $contactObject[$i]['PHONE'];?> </td>
                                                        <td>
                                                            <a href="<?php echo base_url();?>admin/user/uedit/<?php echo $contactObject[$i]['ID'];?>" class="btn btn-link btn-success btn-block">Detail</a>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- ASSIGNED TOURISM TAB -->


<!--                                <div class="tab-pane" id="tab_1_4">-->
<!---->
<!--                                    <div class="row">-->
<!--                                        <!--                                        name email phone number -->
<!--                                        <div class="col-sm-12">-->
<!--                                            <div class="portlet box green">-->
<!--                                                <div class="portlet-title">-->
<!--                                                    <div class="caption">-->
<!--                                                        <i class="fa fa-gear"></i>Setting-->
<!--                                                    </div>-->
<!--                                                    <div class="tools">-->
<!--                                                        <a href="javascript:;" class="collapse"> </a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="portlet-body">-->
<!--                                                    <div class="row">-->
<!--                                                        <table class="table table-striped table-bordered table-hover">-->
<!--                                                            <tbody>-->
<!--                                                                <tr>-->
<!--                                                                    <td>-->
<!--                                                                        <div class="md-checkbox">-->
<!--                                                                            <input type="checkbox" checked class="md-check" id="PreferOption1"  name="PreferOption1" value="2" >-->
<!--                                                                            <label for="PreferOption1">-->
<!--                                                                                <span></span>-->
<!--                                                                                <span class="check"></span>-->
<!--                                                                                <span class="box"></span> </label>-->
<!--                                                                        </div>-->
<!--                                                                    </td>-->
<!--                                                                    <td>-->
<!--                                                                        Contact 1-->
<!--                                                                    </td>-->
<!--                                                                    <td>-->
<!--                                                                        Contact 1 User Name-->
<!--                                                                    </td>-->
<!--                                                                    <td>-->
<!--                                                                        Contact 1 User Phone-->
<!--                                                                    </td>-->
<!--                                                                </tr>-->
<!---->
<!--                                                                <tr>-->
<!--                                                                    <td>-->
<!--                                                                        <div class="md-checkbox">-->
<!--                                                                            <input type="checkbox" checked class="md-check" id="PreferOption2"  name="PreferOption2" value="2" >-->
<!--                                                                            <label for="PreferOption2">-->
<!--                                                                                <span></span>-->
<!--                                                                                <span class="check"></span>-->
<!--                                                                                <span class="box"></span> </label>-->
<!--                                                                        </div>-->
<!--                                                                    </td>-->
<!--                                                                    <td>-->
<!--                                                                        Contact 2-->
<!--                                                                    </td>-->
<!--                                                                    <td>-->
<!--                                                                        Contact 2 User Name-->
<!--                                                                    </td>-->
<!--                                                                    <td>-->
<!--                                                                        Contact 2 User Phone-->
<!--                                                                    </td>-->
<!--                                                                </tr>-->
<!--                                                                <tr>-->
<!--                                                                    <td>-->
<!--                                                                        <div class="md-checkbox">-->
<!--                                                                            <input type="checkbox" class="md-check" id="PreferOption3"  name="PreferOption3" value="2" >-->
<!--                                                                            <label for="PreferOption3">-->
<!--                                                                                <span></span>-->
<!--                                                                                <span class="check"></span>-->
<!--                                                                                <span class="box"></span></label>-->
<!--                                                                        </div>-->
<!--                                                                    </td>-->
<!--                                                                    <td>-->
<!--                                                                        Distance Settings (m)-->
<!--                                                                    </td>-->
<!--                                                                    <td>-->
<!--                                                                        Distance Value 1-->
<!--                                                                    </td>-->
<!--                                                                    <td>-->
<!--                                                                        Distance Value 2-->
<!--                                                                    </td>-->
<!--                                                                </tr>-->
<!--                                                            </tbody>-->
<!--                                                        </table>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->

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
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo  base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="<?php echo  base_url();?>assets/global/plugins/datatables/datatables.js" type="text/javascript"></script>
    <script src="<?php echo  base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo  base_url();?>assets/pages/scripts/useredit.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>
