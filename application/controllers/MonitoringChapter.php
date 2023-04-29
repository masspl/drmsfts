<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MonitoringChapter extends Admin_Controller {

public function index(){
	$chapterDetails=$this->db->query('select * from mst_monitoring_chapter where mmc_status =0')->result_array();
	$this->data['chapterDetails']=$chapterDetails;
$this->load->view('createMonitoringChapter',$this->data);
}

	public function createChapter()
	{
		$chapter=$this->input->post('chapter');
		$sql="INSERT INTO `mst_monitoring_chapter`(`mmc_id`, `mmc_desc`, `mmc_status`) VALUES ('','$chapter',0)";
		$query=$this->db->query($sql);
		redirect('monitoringChapter');
	}

	public function mapMonitoring(){
      $fundlist = $this->db->query("SELECT * FROM mst_monitoring_chapter WHERE mmc_status = 0 ")->result_array();
      $this->data["fundlist"] = $fundlist;

      $regionlist = $this->db->query("SELECT * FROM mst_sif_details GROUP BY msd_region_name")->result_array();
      $this->data["regionlist"] = $regionlist;

      $this->load->view("map_monitoring",$this->data);
    }

    public function mapMonitoringSchool($monitoringchapter='', $anchal='', $region='')
    {
      $monitoringchapter=$this->input->post('monitoringchapter');
      $anchal=$this->input->post('anchal');
      $region=$this->input->post('region');



      $getFundingChapter=$this->db->query("SELECT * FROM mst_monitoring_chapter where mmc_id='{$monitoringchapter}'")->result_array();
      
      $getSchoolDetails=$this->getSchoolByAnchalCodeORMonitoringChapter($anchal);
      // print_r($getSchoolDetails);
      // die;
      $this->data['monitoringchapter']=$getFundingChapter;
      $this->data['schoolDetails']=$getSchoolDetails;
      $this->data['anchal']=$anchal;
      $this->data['region']=$region;


    $this->load->view("mapMonitoringSchool",$this->data);
    }

    public function uploadMonitoringChapter(){
          $schoolData=array();
          $monitoringChapter=$this->input->post('monitoringchapter');
          $schoolData=json_decode($this->input->post('schoolData'));
          foreach ($schoolData as $school) {
         
                $this->db->trans_start();
                $this->db->query("UPDATE mst_sif_details SET msd_mmc_id ='$monitoringChapter' WHERE msd_school_code LIKE '$school' ");
                if ($this->db->trans_status() === FALSE) {
                
                $this->db->trans_rollback();
                } 
                else {
                    $this->db->trans_commit();
                  }

            }
          }

         public function mcDeallocation(){
           $fundlist = $this->db->query("SELECT * FROM mst_monitoring_chapter WHERE mmc_status = 0")->result_array();
            $this->data["fundlist"] = $fundlist;

            $regionlist = $this->db->query("SELECT * FROM mst_sif_details GROUP BY msd_region_name")->result_array();
            $this->data["regionlist"] = $regionlist;

            $this->load->view("mapMonitoringDeallocation",$this->data);
          }
           public function findMonitoringSchool($monitoringchapter='', $anchal='', $region='')
            {
              $monitoringchapter=$this->input->post('monitoringchapter');
              $anchal=$this->input->post('anchal');
              $region=$this->input->post('region');



              $getFundingChapter=$this->db->query("SELECT * FROM mst_monitoring_chapter where mmc_id='{$monitoringchapter}'")->result_array();
              
              $getSchoolDetails=$this->getSchoolByAnchalCodeORMonitoringChapter($anchal,$monitoringchapter);
              // print_r($getSchoolDetails);
              // die;
              $this->data['monitoringchapter']=$getFundingChapter;
              $this->data['schoolDetails']=$getSchoolDetails;
              $this->data['anchal']=$anchal;
              $this->data['region']=$region;


            $this->load->view("monitoringSchoolDeallocation",$this->data);
            }
}
?>