<?php

namespace App\Controllers;
use App\Models\User_model;

class Registration extends BaseController
{
    public function index()
    {
        return view('site/registration');
    }

    public function submit_form()
    {
        $session = session();
        $data['error_message'] = "";
        $data['success_message'] = "";
        $data['id'] = "";

            $first_name = $this->request->getPost('first_name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $confirmpassword = $this->request->getPost('confirm_password');
            $rand_code = rand(100000, 999999);
            $_SESSION['email'] = $email;

            $getmodel = new User_model();
            $getData = $getmodel->getnumrow($email);

        //validate username
        // $getData = $this->db->get_where('users', array('fld_email' => $email));
            if ($getData > 0) 
            {
                $data['error_message'] = "This email address is already registered with us.";
                $data['success_message'] = '0';
                $data['id'] = '';
            } else
            {
                $newData = array(
                    'fld_first_name' => $first_name,
                    'fld_last_name' => '',
                    'fld_email' => $email,
                    'fld_username' => $first_name,
                    'fld_password' => md5($password),
                    'fld_user_type' => 'client',
                    'fld_create_by' => 'direct',
                    'fld_status' => '0',
                    'fld_rand_code' => $rand_code,
                    'fld_varification' => '0',
                    'fld_added_date' => time(),
                    'fld_modified_date' => ''
                );
                $insert = $getmodel->getinsert($newData);
                $data['error_message'] = "";
                $data['id'] = $insert;
                $data['success_message'] = '1';
                // $insert_id = $this->db->insert_id();
                // if ($this->db->affected_rows()) {

                    //add teacher default working timing
                    // $ea_userSetting = array(
                    //     'fld_userid' => $insert_id,
                    //     'working_plan' => '{"monday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"tuesday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"wednesday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"thursday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"friday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"saturday":null,"sunday":null}',
                    //     'notifications' => '1',
                    //     'google_sync' =>  0,
                    //     'google_calendar' => null,
                    //     'google_token' => null,
                    //     'sync_past_days' => '5',
                    //     'sync_future_days' => '5'
                    // );
                    // $this->db->insert('ea_user_settings', $ea_userSetting);

                    // $ea_categories = array(
                    //     'fld_userid' => $insert_id,
                    //     'name' => 'Free Services',
                    //     'description' => 'Free Services'
                    // );
                    // $this->db->insert('ea_service_categories', $ea_categories);
                    // $cat_id = $this->db->insert_id();

                    // $ea_services = array(
                    //     'name' => $insert_id,
                    //     'duration' => '30',
                    //     'price' => '0',
                    //     'currency' => '$',
                    //     'description' => '',
                    //     'id_service_Categories' => $cat_id
                    // );
                    // $this->db->insert('ea_services', $ea_services);

                    // $massage = "<head><meta http-equiv='Content-Type' content='text/html; charset=windows-1252'><meta name='GENERATOR' content='MSHTML 11.00.10570.1001'></head><body bgcolor='#ffffff'><strong></strong><strong> </strong><strong></strong><table width='600' align='center' id='TbHeader' bgcolor='#400080' border='0' cellspacing='0' cellpadding='4'><tr><td align='center' id='TdHeader' bgcolor='#400080'><p align='center'><font color='#ffffff' face='Arial, Helvetica, sans-serif' size='6'><strong>Welcome</strong></font></p></td></tr></table><table width='600' align='center' id='TbBodyRow' border='0' cellspacing='0' cellpadding='0'><tr><td id='TdBodyRow' valign='top' bgcolor='#ffffff'><table width='100%' id='TbBody' bgcolor='#ffffff' border='0' cellspacing='0' cellpadding='4'><tr><td align='center' id='TdBody' bgcolor='#ffffff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p align='left'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='3'><strong>Hi " . $first_name . "&nbsp;<font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='3'>&nbsp;</font></strong></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p align='justify' style='margin-right: 0px;'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='3'>Thanks for getting started with MyportalX!<br>To start using MyportalX click on the link below to verify your email address.<br><br>Your One Time Password is -" . $rand_code . "</font></p><br></font></font></font></p><p align='left'><br></p></td></tr></table></td></tr></table><strong></strong><strong></strong><strong> </strong><table width='600' align='center' id='TbFooter' bgcolor='#eea000' border='0' cellspacing='0' cellpadding='4'><tr><td align='center' id='TdFooter' bgcolor='#eea000'><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><span style='color: rgb(0, 52, 89); line-height: inherit; font-size: inherit; font-weight: bold; text-decoration: inherit;'><span style='color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: inherit; text-decoration: inherit;'><br></span></span></div><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><span style='color: rgb(0, 52, 89); line-height: inherit; font-size: inherit; font-weight: bold; text-decoration: inherit;'><span style='color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: inherit; text-decoration: inherit;'>Regards,</span>,<br style='color: rgb(0, 52, 89);'></span></div><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><span style='color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: bold; text-decoration: inherit;'>Team MyportalX</span></div><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><span style='color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: bold; text-decoration: inherit;'><br></span></div></div></td></tr></table></body>";
                    // $subject = "You’re almost there!";
                    // $header = "From:" . $this->config->item('mail_from') . "\r\n";
                    // $header .= "MIME-Version: 1.0\r\n";
                    // $header .= "Content-type: text/html\r\n";
                    // $retval = mail($email, $subject, $massage, $header);
                    // $success_message = "success";
                    // $time = strtotime("now");
                    // $this->db->query("INSERT INTO `mys_status`(`user_id`,`ustatus`) VALUES ('" . $insert_id . "','" . $time . "')");
                // }
            }
            echo json_encode($data);
    }
    public function verify()
    {
        $data['error_message'] = "";
        $data['success_message'] = "";

        $datas['otp'] = $this->request->getPost('otp');
        $datas['id'] = $this->request->getPost('fld_id');
        $getmodel = new User_model();
        $getData = $getmodel->checkotp($datas);
        if ($getData > 0)
        {
            $data['error_message'] = "";
            $data['success_message'] = "1";
            $getmodel->updateotp($datas);
        }
        else{
            $data['error_message'] = "Please check OTP";
            $data['success_message'] = "0";
        }
        echo json_encode($data);
    }
}
