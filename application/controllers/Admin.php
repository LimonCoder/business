<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Website');
        $this->load->model('Location_db');
        $this->load->model('Trade_model');
        $logged_in =  $this->session->userdata('logged_in');
        $user_name = $this->session->userdata('username');
        if (!isset($user_name) && $logged_in != TRUE){
            redirect('login',"location");

        }
    }


    public function index()
    {
        $data['total_lience'] = $this->Trade_model->total_trade_lience();
        $data['total_amount'] = $this->Website->total_amount()->balance;
        $this->load->view('pages/header');
        $this->load->view('deshboard',$data);
        $this->load->view('pages/footer');
    }

    public function trade_application(){
        $data['trans_id'] = $this->Website->genarate_tin_id();
        $data['district'] = $this->Location_db->get_district();
        $data['business_type'] = $this->db->get('business_type')->result();
        $data['account_name'] = $this->Website->get_account();
        $this->load->view('pages/header');
        $this->load->view('trade_lience/trade_licence_application',$data);
        $this->load->view('pages/footer');


    }

    public function trade_application_action(){
        extract($_POST);
        $patner_info = array();
        $login_user = array();
        $fee = (int) $_POST['tin_no'];
        $vat_fee = (int) $this->Location_db->get_tax($_POST['district_name']);
        $total_fee = ($fee * ($vat_fee / 100)) + $fee;
        $track_id = $this->Website->gen_trackid();
        $check_track_id = $this->Website->checking_trackid($track_id);


        if (!empty($_POST['patner_name_en'][0])) {
            for ($i = 0; $i < count($_POST['patner_name_en']); $i++) {
                $data = array(
                    "track_id" => $check_track_id,
                    "en_name" => $_POST['patner_name_en'][$i],
                    "bn_name" => (isset($_POST['patner_name_bn'][$i])) ? $_POST['patner_name_bn'][$i] : null,
                    "number" => (isset($_POST['patner_mobile_number'][$i])) ? $_POST['patner_mobile_number'][$i] : null,
                    "password" => $this->Website->genarate_password()
                );
                $parner_log = array(
                    "user_name" =>$_POST['patner_name_en'][$i],
                    "password" => (isset($_POST['patner_mobile_number'][$i])) ? md5($_POST['patner_mobile_number'][$i]) : 12345,
                    "phone" => (isset($_POST['patner_mobile_number'][$i])) ? $_POST['patner_mobile_number'][$i] : null,
                    "app_trackid" => $check_track_id,
                    "status" => 3
                );

                $patner_info[] = $data;
                $login_user[] = $parner_log;

            }
        }


        $busnies_info = array(
            "name_en" => $this->input->post('owner_name_en'),
            "name_bn" => $this->input->post('owner_name_bn'),
            "b_name" => $this->input->post('business_name'),
            "b_type" => $this->input->post('type_of_organization'),
            "number" => $this->input->post('owner_number'),
            "district_id" => $this->input->post('district_name'),
            "sub_district_id" => $this->input->post('sub_district_name'),
            "village_name" => $this->input->post('village_name'),
            "track_id" =>$check_track_id,
            "image" => (!empty($_FILES['owner_photo']['name']))?$this->Website->image_validation('owner_photo'):NULL,
            "signature" =>(!empty($_FILES['owner_signature']['name']))?$this->Website->image_validation('owner_signature'):NULL,
            "status" =>1,
            "create_by_ip" => $this->input->ip_address()

        );

        $main_user = array(
            "user_name" =>$this->input->post('owner_name_en'),
            "password" => (isset($_POST['owner_number'])) ? md5($_POST['owner_number']) : 12345,
            "phone" => (isset($_POST['owner_number'])) ? $_POST['owner_number'] : null,
            "app_trackid" => $check_track_id,
            "status" => 2
        );

        $money = array(
            "trackid" => $check_track_id,
            "sonod_no" => $this->input->post('owner_no'),
            "b_type" => $this->input->post('type_of_organization'),
            "acc_type" => $this->input->post('account_type'),
            "fee" => $fee,
            "vat" =>number_format(($fee * ($vat_fee / 100)),2),
            "total_fee"=> $total_fee,
            "genarate_data" => date('Y-m-d')

        );

        // start transaction
        $this->db->trans_start();
        $this->db->insert("personalinfo",$busnies_info);
        $this->db->insert("admin_users",$main_user);
        $insert_id = $this->db->insert_id();
        if (count($patner_info) >0):
        $this->db->insert_batch("patnerinfo",$patner_info);
        $this->db->insert_batch("admin_users",$login_user);
        endif;
        $this->db->insert("money",$money);
        $this->Website->update_account($total_fee,$this->input->post('account_type'));
        $this->db->insert("trade_sonodno",array("sonod_no"=>$this->input->post('owner_no')));
        $this->db->insert("table_trackingid",array("tracking_id" =>$check_track_id));
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $this->db->trans_commit();
            echo json_encode(array("status"=> "falid", "message"=> "Fail to sync data with live"));
        }

        // Finally complete the transaction
        $this->db->trans_commit();

        echo json_encode(array("status"=> "success", "message"=> "Successfully data sync with master","trackid"=>$check_track_id));


    }

    // trade_licence_applicent_list //
    public function trade_appliction_list(){
        $this->load->view('pages/header');
        $this->load->view('trade_lience/tradelicence_application_list');
        $this->load->view('pages/footer');
    }
    
    
    public function trade_application_list_action(){
        $serial_no = 1;
        $fetch_data = $this->Trade_model->make_datable();
        $personal_info = array();
        foreach ($fetch_data as $row){
            $sub_array = array();
            $sub_array[] = $serial_no++;
            if($row->image != null){
                $sub_array[] = '<td><img src="./assets/img/'.$row->image.'" alt="" width="50" height="50"></td>';
            }else{
                $sub_array[] = '<td><img src="./assets/img/profile.png" alt="" width="50" height="50"></td>';
            }
            $sub_array[] = $row->name_en;
            $sub_array[] = $row->track_id;
            $sub_array[] = $row->sonod_no;
            $sub_array[] = $row->business_name;
            $sub_array[] = date("d-m-Y", strtotime($row->genarate_data));
            $sub_array[] = '<a href="Admin/certificate/'.$row->track_id.'" class="btn btn-primary btn-lg  bangla_certificate"  data-trackid="\'+value.trackid+\'" style="font-size: 15px;margin-left: 20px">বাংলা</a> <button class="btn btn-lg  btn-warning " style="font-size: 15px;margin-left: 5px">ইংরেজী</button>';
            if($this->session->userdata('is_status') != 3){
                $sub_array[] = '<button class="btn btn-danger btn-lg trade_delete" data-trackid ="'.$row->track_id.'" style="font-size: 15px;margin-left: 5px">Delete</button>';
            }
            $personal_info[] = $sub_array;
        }


        $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"          =>      $this->Trade_model->get_all_data(),
            "recordsFiltered"     =>     $this->Trade_model->get_filtered_data(),
            "data"                    =>     $personal_info
        );
        echo json_encode($output);

    }


    // single person trade_licence_applicent_delete //
    public function trade_applicent_delete(){
        $trackid = $_POST['id'];
        $result = $this->Trade_model->single_trade_delete($trackid);
        echo json_encode($result);
    }


    // trade_licence_certificate_view
    public function certificate(){

        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf([
            'margin_top' => 20,
            'margin_left' => 7,
            'margin_right' => 8,
            'mirrorMargins' => true,
            'format'=>'A4',
            'orientation'=>'P',
            'fontDir' => array_merge($fontDirs, ['/fonts']),
            'fontdata' => $fontData + [
                'solaimanlipi' => [
                    'R' => 'SolaimanLipi.ttf',
                    'useOTL' => 0xFF,
                ]
            ],
            'default_font' => 'solaimanlipi'
        ]);
        $id = $this->uri->segment(3);
        $data['personalinfo'] = $this->Trade_model->trade_personal_info($id);
        $data['money'] = $this->Trade_model->trade_money($id);
        $data['patners'] = $this->Trade_model->trade_patner_info($id);
        $html = 	$this->load->view('trade_lience/trade_lience_certificate',$data,true);
        //
        //

        //		$html = '<table border="1" style=" border-collapse: collapse">
        //				<tr>
        //				<td><p style="font-family: solaimanlipi;"> সিকিউরিটি ভেরিফিকেশন ফরম </p></td>
        //				<td><p style="font-family: solaimanlipi;">  ফরম </p></td>
        //				<td><p style="font-family: solaimanlipi;"> সি ভেরিফিকেশন </p></td>
        //				<td><p> English </p></td>
        //</tr>
        //			</tab
        $mpdf->WriteHTML($html);
        $mpdf->Output();




    }

    // location add for tax //
    public function bd_location(){
        $data['district'] = $this->Location_db->get_district();
        $this->load->view('pages/header');
        $this->load->view('bd_location',$data);
        $this->load->view('pages/footer');
    }
    
    

    // location form validation //
    public function location_form_action(){


        $info = array(
            "parent_id" =>($this->input->post("district_id") != "")?$this->input->post("district_id"):NULL,
            "name" => $this->input->post("name"),
            "type" => $this->input->post("type"),
            "tax" => ($this->input->post("tax") != "")?$this->input->post("tax"):NULL,
            "create_by_ip" => $this->input->ip_address()
        );

        $res = $this->Website->add_location($info);
        echo json_encode(array("key"=> $res));
    }

    // location_list //
    public function location_list(){
        header("Content-Type: application/json");
        $serial_no = 1;
        $fetch_data = $this->Location_db->make_datable();

        $location_list = array();
        foreach ($fetch_data as $row){
            $sub_array = array();
            $sub_array[] = $serial_no++;
            $sub_array[] = $row->district_name;
            $sub_array[] = $row->upozila_name;
            $sub_array[] = $row->tax.(isset($row->tax)?'%':'');
            $sub_array[] = '<button type="button" name="update" id="update"  class="btn btn-warning btn-xs">Edit</button>
							<button type="button" name="delete" id="delete"  class="btn btn-danger btn-xs">Delete</button>';
            $location_list[] = $sub_array;
        }


        $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"          =>      $this->Location_db->get_all_data(),
            "recordsFiltered"     =>     $this->Location_db->get_filtered_data(),
            "data"                    =>     $location_list
        );
        echo json_encode($output);


    }

    // get district for tax //
    public function get_district(){
        $res = $this->Location_db->get_district();
        $html = '<option value="">Select</option>';
        foreach ($res as $row){
            $html .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $html;


    }

    // get sub_district by district //
    public function get_sub_district(){
        extract($_POST);
        $res = $this->Location_db->get_upozila($id);
        echo $res;
    }
    
    
    // test my code //
    public function test(){
       print_r($this->Website->get_account());
    }

    // user logout //
    public function logout(){
        $this->Website->logout_history();
        $this->session->sess_destroy();
        redirect("login","location");
    }
}

?>
