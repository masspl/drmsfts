<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sif extends Admin_Controller {


public function sifEdit()
{
        $regionlist = $this->db->query("SELECT * FROM mst_sif_details GROUP BY msd_region_name")->result_array();
      $this->data["regionlist"] = $regionlist;
      $this->load->view("sif_edit",$this->data);
}

public function edit_page($sanchcode=""){
      $sql ="SELECT * FROM mst_sif_details LEFT JOIN mst_funding_chapter ON mfc_id=msd_mfc_id LEFT JOIN mst_donor ON msd_md_code=md_code WHERE msd_sanch_code LIKE '{$sanchcode}' GROUP BY msd_school_name";
      $schoolList=$this->db->query($sql)->result_array();
      $this->data['schoolList']=$schoolList;
      $this->data['sanchcode']=$sanchcode;
      $this->load->view("edit_page",$this->data);
    }

    public function edit_values($sanchcode="",$schoolcode=""){
        $sql ="SELECT * FROM mst_sif_details WHERE msd_school_code LIKE '{$schoolcode}' GROUP BY msd_school_name";
        $schoolList=$this->db->query($sql)->result_array();
        $this->data['schoolList']=$schoolList;
        $this->data['schoolcode']=$schoolcode;
        $this->data['sanchcode']=$sanchcode;
        $this->load->view("edit_values",$this->data);
      }

     public function uploadSifEditdata($sanchcode=""){
          $schoolData=array();
          $schoolData=($_POST);
                $this->db->trans_start();
               $sql="UPDATE mst_sif_details SET msd_csr ='{$schoolData['msd_csr']}',msd_Teacher ='{$schoolData['msd_Teacher']}',msd_teacher_sex ='{$schoolData['msd_teacher_sex']}',msd_Boys ='{$schoolData['msd_Boys']}',msd_Girls ='{$schoolData['msd_Girls']}',msd_total ='{$schoolData['msd_total']}',msd_date_of_opening ='{$schoolData['msd_date_of_opening']}',msd_population ='{$schoolData['msd_population']}',msd_Literacy_Rate_Male ='{$schoolData['msd_Literacy_Rate_Male']}',msd_Literacy_Rate_Female ='{$schoolData['msd_Literacy_Rate_Female']}',msd_Vidyalaya_Samity_Pramukh ='{$schoolData['msd_Vidyalaya_Samity_Pramukh']}',msd_Nearest_Railway_Station ='{$schoolData['msd_Nearest_Railway_Station']}',msd_Distance_Of_Vidyalaya_From_Cluster ='{$schoolData['distanceFromCluster']}',msd_Distance_Cluster_From_Rly_Station ='{$schoolData['msd_Distance_Cluster_From_Rly_Station']}',msd_VCF_Name ='{$schoolData['msd_VCF_Name']}',msd_VCF_Phone ='{$schoolData['msd_VCF_Phone']}',msd_SCF_Name ='{$schoolData['msd_SCF_Name']}',msd_SCF_Email ='{$schoolData['msd_SCF_Email']}',msd_SCF_Phone ='{$schoolData['msd_SCF_Phone']}',msd_Date_Of_Updation ='{$schoolData['msd_Date_Of_Updation']}',msd_sif_update ='{$schoolData['msd_sif_update']}' WHERE msd_school_code LIKE '{$schoolData['msd_school_code']}'";
                $this->db->query($sql);
                if ($this->db->trans_status() === FALSE) {
	                $this->db->trans_rollback();
                } 
                else {
                    $this->db->trans_commit();
                  }
                  redirect('sif/edit_page/'.$sanchcode);

        }

        public function sifUpload($isUpload=0)
        {
            $regionlist = $this->db->query("SELECT * FROM mst_sif_details GROUP BY msd_region_name")->result_array();
            $this->data["regionlist"] = $regionlist;
            $this->load->view("sifUpload",$this->data);   
        }

        public function uploadSifData(){
            $region=$this->input->post('region');
            $anchal=$this->input->post('anchal');
            $sanch=$this->input->post('sanch');
            $this->load->view('sifUploadData',$this->data);

        }
}
?>