<?php echo $header; ?>
<div id="container" class="row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div id="sidebar" class="nav-collapse collapse">

        <div class="sidebar-toggler hidden-phone"></div>

        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
                <input type="text" class="search-query" placeholder="Search" />
            </form>
        </div>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <?php echo $sidebar; ?>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div id="main-content">
         <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORM widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-upload"></i>school info</h4>
                        </div>
                        <div class="widget-body form" >
            <!-- BEGIN FORM  <?php echo $schoolcode; ?>-->
                        <form action="<?php echo base_url()?>users/uploadUserData" class="form-horizontal" method="POST" enctype="multipart/form-data">
                              <div class="control-group">
                                  <span class="control-label">USER NAME&nbsp;&nbsp;&nbsp;</span>
                                  <span><input type="text" name="username" value="" id="donorID"></span>
                              
                              </div>
                              <div class="control-group">
                                  <span class="control-label">PASSWORD&nbsp;&nbsp;&nbsp;</span>
                                  <span><input type="text" name="password"  id="donorID"></span>
                              
                              </div><div class="control-group">
                                  <span class="control-label">MOBILE NO.&nbsp;&nbsp;&nbsp;</span>
                                  <span><input type="text" name="mobile"  id="donorID"></span>
                              
                              </div><div class="control-group">
                                  <span class="control-label">EMAIL ID&nbsp;&nbsp;&nbsp;</span>
                                  <span><input type="text" name="email" id="donorID"></span>
                              
                              </div><div class="control-group">
                                  <span class="control-label">Admin for Monitoring Chapter&nbsp;&nbsp;&nbsp;</span>
                                  <span><input type="checkbox" name="user_roll_A" id="donorID"></span>
                              
                              </div>
                              <div class="control-group">
                                  <span class="control-label">Admin for Funding Chapter&nbsp;&nbsp;&nbsp;</span>
                                  <span><input type="checkbox" name="user_roll_B"  id="donorID"></span>
                              
                              </div><div class="control-group">
                                  <span class="control-label">Donor Admin&nbsp;&nbsp;&nbsp;</span>
                                  <span><input type="checkbox" name="user_roll_c"  id="donorID"></span>
                              </div>
                              <div class="control-group">
                                  <span class="control-label">Admin for Sif Edit&nbsp;&nbsp;&nbsp;</span>
                                  <span><input type="checkbox" name="user_roll_D"  id="donorID"></span>
                              </div>
                              <div class="form-actions">
                                  <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                                </div> 
                        </form>    
                      </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
</div>
</div>
<!-- END CONTAINER -->
<?php echo $forminputJS; ?>
<?php echo $footer; ?>