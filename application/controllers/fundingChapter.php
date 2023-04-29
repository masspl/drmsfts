<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class fundingChapter extends Admin_Controller {


public function index(){
  $chapterDetails=$this->db->query('select * from mst_funding_chapter where mfc_status =0')->result_array();
  $this->data['chapterDetails']=$chapterDetails;
$this->load->view('createFundingChapter',$this->data);
}

public function createChapter()
  {
    $chapter=$this->input->post('chapter');
    $sql="INSERT INTO `mst_funding_chapter`(`mfc_id`, `mfc_desc`, `mfc_status`) VALUES ('','$chapter',0)";
    $query=$this->db->query($sql);
    redirect('fundingChapter');
  }


public function mapFunding(){
      $fundlist = $this->db->query("SELECT * FROM mst_funding_chapter WHERE mfc_status = 0 GROUP BY mfc_desc")->result_array();
      $this->data["fundlist"] = $fundlist;

        $chapterDetails=$this->db->query('select * from mst_monitoring_chapter where mmc_status =0')->result_array();
        $this->data['chapterDetails']=$chapterDetails;

      $regionlist = $this->db->query("SELECT * FROM mst_sif_details GROUP BY msd_region_name")->result_array();
      $this->data["regionlist"] = $regionlist;

      $this->load->view("map_funding",$this->data);
    }

    public function mapFundingSchool($fundingchapter='', $anchal='', $region='')
    {
      $fundingchapter=$this->input->post('fundingchapter');
      $monitoringchapter=$this->input->post('monitoringchapter');
      $anchal=$this->input->post('anchal');
      $region=$this->input->post('region');



      $getFundingChapter=$this->db->query("SELECT * FROM mst_funding_chapter where mfc_id='{$fundingchapter}'")->result_array();
      $getMonitoringChapter=$this->db->query("SELECT * FROM mst_monitoring_chapter where mmc_id='{$monitoringchapter}'")->result_array();
      
      $getSchoolDetails=$this->getSchoolByAnchalCodeORFundingChapter($anchal);
      // print_r($getSchoolDetails);
      // die;
      $this->data['fundingchapter']=$getFundingChapter;
      $this->data['monitoringchapter']=$getMonitoringChapter;
      $this->data['schoolDetails']=$getSchoolDetails;
      $this->data['anchal']=$anchal;
      $this->data['region']=$region;


    $this->load->view("mapFundingSchool",$this->data);
    }

    public function uploadFundingChapter(){
          $schoolData=array();
          $fundingChapter=$this->input->post('fundingchapter');
          $monitoringchapter=$this->input->post('monitoringchapter');
          $schoolData=json_decode($this->input->post('schoolData'));
          foreach ($schoolData as $school) {
         
                $this->db->trans_start();
                $this->db->query("UPDATE mst_sif_details SET msd_mfc_id ='$fundingChapter', msd_mmc_id='$monitoringchapter' WHERE msd_school_code LIKE '$school' ");
                if ($this->db->trans_status() === FALSE) {
                
                $this->db->trans_rollback();
                } 
                else {
                    $this->db->trans_commit();
                  }

            }
          }

         public function fcDeallocation(){
           $fundlist = $this->db->query("SELECT * FROM mst_funding_chapter WHERE mfc_status = 0 GROUP BY mfc_desc")->result_array();
            $this->data["fundlist"] = $fundlist;

            $regionlist = $this->db->query("SELECT * FROM mst_sif_details GROUP BY msd_region_name")->result_array();
            $this->data["regionlist"] = $regionlist;

            $this->load->view("mapFundingDeallocation",$this->data);
          }
           public function findFundingSchool($fundingchapter='', $anchal='', $region='')
            {
              $fundingchapter=$this->input->post('fundingchapter');
              $anchal=$this->input->post('anchal');
              $region=$this->input->post('region');



              $getFundingChapter=$this->db->query("SELECT * FROM mst_funding_chapter where mfc_id='{$fundingchapter}'")->result_array();
              
              $getSchoolDetails=$this->getSchoolByAnchalCodeORFundingChapter($anchal,$fundingchapter);
              // print_r($getSchoolDetails);
              // die;
              $this->data['fundingchapter']=$getFundingChapter;
              $this->data['schoolDetails']=$getSchoolDetails;
              $this->data['anchal']=$anchal;
              $this->data['region']=$region;


            $this->load->view("fundingSchoolDeallocation",$this->data);
            }
}
?>