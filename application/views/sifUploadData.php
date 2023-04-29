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
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <h3 class="page-title">
                        Upload Sif
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <a href=""><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                        </li>
                        <li><a href="#">Upload Sif</a><span class="divider-last">&nbsp;</span></li>
                    </ul>
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <?php if ($this->session->flashdata("success")): ?>
               <div class="alert alert-success">
                   <button class="close" data-dismiss="alert">×</button>
                   <?= $this->session->flashdata("success"); ?>
               </div>
           <?php endif; ?>
           <?php if ($this->session->flashdata("error")): ?>
               <div class="alert alert-error">
                   <button class="close" data-dismiss="alert">×</button>
                   <?= $this->session->flashdata("error") ?>
               </div>
           <?php endif; ?>
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORM widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-upload"></i> Upload Sif</h4>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo base_url() ?>sif/uploadSifData" class="form-horizontal" method="POST" enctype="multipart/form-data" onsubmit="showLoading();">
                             <div class="control-group">
                                  <label class="control-label">Region</label>
                                  <div class="controls">
                                      <select class="span6 region" name="region">
                                        <option value=""> -- SELECT -- </option>
                                       </select>
                                  </div>
                              </div>

                              <div class="control-group">
                                  <label class="control-label">Anchal</label>
                                  <div class="controls">
                                      <select class="span6 anchal" name="anchal">
                                        <option value=""> -- SELECT -- </option>
                                      </select>
                                  </div>
                              </div>
                              <div class="control-group">
                                  <label class="control-label">Sanch</label>
                                  <div class="controls">
                                      <select class="span6 sanch" name="sanch">
                                        <option value=""> -- SELECT -- </option>
                                      </select>
                                  </div>
                                  </div>

                                   <div class="control-group">
                                  <label class="control-label">Upsanch</label>
                                  <div class="controls">
                                      <select class="span6 upsanch" name="upsanch">
                                        <option value=""> -- SELECT -- </option>
                                      </select>
                                  </div>
                                  </div>

                                  <div class="control-group">
                                  <span class="control-label">School Code</span>
                                   <div class="controls">
                                    <input type="text" name="schoolCode" value="" id="schoolCode" >
                                    </div>
                                </div>

                                    <div class="control-group">
                                  <label class="control-label">Funding Chapter</label>
                                  <div class="controls">
                                      <select class="span6 fundingchapter" name="fundingchapter">
                                        <option value=""> -- SELECT -- </option>
                                      </select>
                                  </div>
                                  </div>

                                  <div class="control-group">
                                  <span class="control-label">School District</span>
                                    <input type="text" name="schoolDistrict" value="" id="schoolDistrict" >
                                    </div>

                                    <div class="control-group">
                                  <span class="control-label">Village Name</span>
                                    <input type="text" name="villagename" value="" id="villagename" >
                                    </div>

                                    <div class="control-group">
                                  <span class="control-label">Teacher</span>
                                    <input type="text" name="teacher" value="" id="teacher" >
                                    </div>

                                    <div class="control-group">
                                  <label class="control-label">Teacher Gender</label>
                                  <div class="controls">
                                      <select class="span6 teacherGender" name="teacherGender">
                                        <option value="Female"> Female </option>
                                        <option value="Male"> Male </option>
                                      </select>
                                  </div>
                                  </div>

                                   <div class="control-group">
                                  <span class="control-label">Boys</span>
                                    <input type="text" name="boys" value="" id="boys" >
                                    </div>

                                     <div class="control-group">
                                  <span class="control-label">Girls</span>
                                    <input type="text" name="girls" value="" id="girls" >
                                    </div>

                                    <div class="control-group">
                                  <span class="control-label">Total</span>
                                    <input type="text" name="total" value="" id="total" disabled>
                                    </div>

                                    <div class="control-group">
                                  <span class="control-label">Date of Opening</span>
                                    <input type="text" name="doo" value="<?php echo date("Y-m-d")?>" id="doo" disabled>
                                    </div>
                                    

                                    <div class="control-group">
                                  <span class="control-label">Population</span>
                                    <input type="text" name="population" value="" id="population" >
                                    </div>

                                    <div class="control-group">
                                  <span class="control-label">Literacy rate  male</span>
                                    <input type="text" name="lrm" value="" id="lrm" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">Literacy rate  female</span>
                                    <input type="text" name="lrf" value="" id="lrf" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">Vidyalay Samiti Pramukh</span>
                                    <input type="text" name="vsp" value="" id="vsp" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">Nearest Railway Station</span>
                                    <input type="text" name="nrs" value="" id="nrs" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">Distance Of Vidyalaya From Cluster</span>
                                    <input type="text" name="dovc" value="" id="dovc" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">Distance Of Cluster From Railway Station</span>
                                    <input type="text" name="docrs" value="" id="docrs" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">VCF Name</span>
                                    <input type="text" name="vcfn" value="" id="vcfn" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">VCF Phone</span>
                                    <input type="text" name="vcfp" value="" id="vcfp" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">SCF Name</span>
                                    <input type="text" name="scfn" value="" id="scfn" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">SCF Phone</span>
                                    <input type="text" name="scfp" value="" id="scfp" >
                                    </div>


                                    <div class="control-group">
                                  <span class="control-label">SCF Email</span>
                                    <input type="text" name="scfe" value="" id="doo" >
                                    </div>
                                <div class="form-actions">
                                  <img id="submitLoading" style="display:none;" src="<?=base_url()."assets/img/loading.gif"?>" alt="">
                                  <input type="submit" name="submitThread" id="submit" class="btn btn-success" value="Submit">
                                </div>
                            </form>
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
<script type="text/javascript">
  $(document).ready(function(){
    $("#downloadTemplate").click(function(e){
      e.preventDefault();
      window.location.href = BASE_URL+'assets/template/template.xls';
    });

 $(".region").change(function(){
                var regioncode=$(this).val();
                // alert(regioncode);
                $.ajax({
                    url: BASE_URL+"administration/getAnchalByRegionCodesif/"+regioncode+"/1", 
                    success: function(result){
                   // console.log(result);
                        $(".anchal").html(result);
                    }
                });
            });

$(".anchal").change(function(){
                var anchalcode=$(this).val();
                // alert(regioncode);
                $.ajax({
                    url: BASE_URL+"administration/getSanchByAnchalCodesif/"+anchalcode+"/1", 
                    success: function(result){
                   // console.log(result);
                        $(".sanch").html(result);
                    }
                });
            });

  });
</script>
<?php echo $footer; ?>
