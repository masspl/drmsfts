<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Donor extends Admin_Controller {


public function donorAllocation()
{
	$donoridlist = $this->db->query("SELECT * FROM mst_donor ")->result_array();
      $this->data["donoridlist"] = $donoridlist;
      $this->load->view("donor_allocation",$this->data);
}

public function mapDonorSchool()
{
    $donorId=$this->input->post('donorId');
    $fund=$this->input->post('fund');
    $anchal=$this->input->post('anchal');
    $region=$this->input->post('region');
    $getDonor=$this->db->query("SELECT * FROM mst_donor where md_code='{$donorId}'")->result_array();
    $getFundingChapter=$this->db->query("SELECT * FROM mst_funding_chapter where mfc_id='{$fund}'")->result_array();
    $getSchoolDetails=$this->getSchoolByAnchalCodeORDonor($anchal,$fund);
    $this->data['fund']=$getFundingChapter;
    $this->data['anchal']=$anchal;
    $this->data['region']=$region;
    $this->data['getDonor']=$getDonor;
    $this->data['schoolDetails']=$getSchoolDetails;
   $this->load->view("mapDonorSchool",$this->data);
}

public function mapDonor(){
          $schoolData=array();
          $donor=$this->input->post('donor');
          $schoolData=json_decode($this->input->post('schoolData'));
          foreach ($schoolData as $school) {
         
                $this->db->trans_start();
                $this->db->query("UPDATE mst_sif_details SET msd_md_code ='$donor' WHERE msd_school_code LIKE '$school' ");
                if ($this->db->trans_status() === FALSE) {
                
                $this->db->trans_rollback();
                } 
                else {
                    $this->db->trans_commit();
                  }

            }
          }
public function donorDeAllocation(){
    $donoridlist = $this->db->query("SELECT * FROM mst_donor ")->result_array();
      $this->data["donoridlist"] = $donoridlist;
      $this->load->view("donor_deallocation",$this->data);
   
}
public function findDonorSchool()
{
    $donorId=$this->input->post('donorId');
    $fund=$this->input->post('fund');
    $anchal=$this->input->post('anchal');
    $region=$this->input->post('region');
    $getDonor=$this->db->query("SELECT * FROM mst_donor where md_code='{$donorId}'")->result_array();
    $getFundingChapter=$this->db->query("SELECT * FROM mst_funding_chapter where mfc_id='{$fund}'")->result_array();
    $getSchoolDetails=$this->getSchoolByAnchalCodeORDonor($anchal,$fund,$donorId);
    $this->data['fund']=$getFundingChapter;
    $this->data['anchal']=$anchal;
    $this->data['region']=$region;
    $this->data['getDonor']=$getDonor;
    $this->data['schoolDetails']=$getSchoolDetails;
   $this->load->view("donorSchoolDeallocation",$this->data);
}

}
?>