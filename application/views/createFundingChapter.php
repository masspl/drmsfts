
<?php echo $header;?>
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
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <h3 class="page-title">
                       Funding Chapter
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url() ?>drm#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                        </li>
                        <li><a href="<?php echo base_url() ?>fundingChapter/mapFunding/">Funding Chapter</a><span class="divider-last">&nbsp;</span></li>
                        <!-- <li><a href="/fts/administration/deallocate_fund/">Deallocate Funding Chapter</a><span class="divider-last ">&nbsp;</span></li> -->
                    </ul>
                </div>
            </div>
            <!-- END PAGE HEADER-->
            
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORM widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <!-- <h4><i class="icon-upload"></i>Select Funding Chapter,Region,Anchal to Deallocate School</h4> -->
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo base_url() ?>fundingChapter/createChapter" class="form-horizontal" method="POST" enctype="multipart/form-data" onsubmit="">
                              
                                <div class="control-group">
                                  <span class="control-label">Chapter Name&nbsp;&nbsp;&nbsp;</span>
                                  <span><input type="text" name="chapter" value="" id="chapter"></span>
                              
                              </div>

                                <div class="form-actions">
                                  <img id="submitLoading" style="display:none;" src="<?=base_url()."assets/img/loading.gif"?>" alt="">
                                  <input type="submit" name="submitThread" id="submit" class="btn btn-success" value="Submit">
                                </div>
                            </form>
                            <?php if(count($chapterDetails)>0){?>
                            <table class="table control-group">
                                <h3>Funding Chapter</h3>
                                <thead style="">
                                  <tr>
                                    <th>Sl.No</th>
                                    <th>Chapter Name</th>
                                  </tr>
                              </thead>
                                <tbody>
                                    <?php $i=1;foreach ($chapterDetails as $key => $value) {?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $value['mfc_desc']?></td>
                                        </tr>
                                    <?php $i++;} ?>
                                </tbody>
                                    
                                </table> 
                            <?php } ?>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM widget-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<?php echo $forminputJS; ?>

<?php echo $footer; ?>
