<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    public function getnumrow($email)
    {
        $builder = $this->db->table('users');
        $data = $builder->select('*')
            ->where('fld_email',$email)
            ->get();
        return $data->getNumRows();
    }

    public function getinsert($data)
    {
        $builder = $this->db->table('users');
        $builder->insert($data);
        return $this->db->insertID();
    }
    public function checkotp($data)
    {
        $builder = $this->db->table('users');
        $data = $builder->select('*')
            ->where(array('fld_id'=> $data['id'] , 'fld_rand_code' => $data['otp']))
            ->get();
        return $data->getNumRows();
    }

    public function updateotp($data)
    {
        $builder = $this->db->table('users');
        $builder->set(array('fld_rand_code'=> '', 'fld_varification'=>'1', 'fld_status'=>'1'));
        $builder->where('fld_id', $data['id']);
        $builder->update();
    }

    public function login($data)
    {
        $builder = $this->db->table('users');
        if($data['username'] != "" &&  $data['password'])
        {
            $where = "(fld_username ='" . $data['username'] . "' OR fld_email ='" . $data['username'] . "') AND fld_password ='" . md5($data['password']) . "'";
            $geLoginQuery = $builder->select('*')
                ->where($where)
                ->get();

            if ($geLoginQuery->getNumRows() == 0) 
            {
                $response['status'] = 0;
                $response['redirect'] = 'login';
                $response['message'] = 'Invalid username or password';
                $response['data'] = array();
            } else 
            {
                $userRow = $geLoginQuery->getRowArray();
                // print_r($userRow);
                if ($userRow['fld_varification'] == '0') 
                {
                    $response['status'] = 0;
                    $response['message'] = "<i class='fa fa-warning'></i>&nbsp;Your Email address is not verified yet.<br><br> <button type='button' class='btn btn-block btn-primary' onclick='javascript:return resentverificaion(this);' data-loading-text=\"<i class='fa fa-spinner fa-spin '></i>\">Resend Verification e-mail</button>";
                    $response['redirect'] = '';
                    $response['data'] = array();
                } else if ($userRow['fld_status'] = '1') 
                {
                    $newdata = array(
                        'username' => $data['username'],
                        'user_id' => $userRow['fld_id'],
                        'user_type' => $userRow['fld_user_type'],
                        'varification_code' => $userRow['fld_varification'],
                        'user_timezone' => $userRow["fld_timezone"],
                        'logged_in' => TRUE
                    );
                    // print_r($userRow);
                    $response['status'] = 1;
                    $response['redirect'] = strtolower($userRow['fld_user_type']);
                    $response['message'] = 'Logged in successfully.';
                    $response['data'] = $newdata;
                } else 
                {
                    $response['status'] = 0;
                    $response['redirect'] = 'login';
                    $response['message'] = 'You are account is temporarily suspended please contact Administrator for re-activate it.';
                    $response['data'] = array();
                }
            }
        }else
        {
                $response['status'] = 0;
                $response['redirect'] = 'login';
                $response['message'] = 'Required parameters missing.';
                $response['data'] = array();
        }
        return $response;
    }

    public function get_data($table,$where)
    {
       return $this->db->table($table)->getWhere($where)->getRowArray();
    }

    public function get_dataresult($table, $where)
    {
        $gets = $this->db->table($table)->getWhere($where);
        return $gets;
    }
    
    public function get_coaching_forms($_userid, $form_view = '', $showAll = false)
    {
        $builder = $this->db->table('coaching_forms AS F');
        $builder->select('F.*, UF.id As RecID, IFNULL(UF.fld_user_id,' . $_userid . ') as fld_user_id, UF.assign_date, UF.completed_date, UF.status, UF.last_modified');
        $builder->join('coaching_form_user AS UF', 'F.id = UF.fld_form_id and fld_user_id =' . $_userid,  $showAll ? 'left' : '');
        $builder->orderBy("F.sort_order");

        if ($form_view != '') {
            $builder->where(array("F.view_name" => $form_view));
        }
        $builder->where(array("F.isactive" => "1"));

        $result = $builder->get();
        return $result->getResult();
    }

    public function get_marketing_forms($_userid, $form_view = '', $showAll = false)
    {
        $builder = $this->db->table('marketing_forms AS F');
        $builder->select('F.*, UF.id As RecID, IFNULL(UF.fld_user_id,' . $_userid . ') as fld_user_id, UF.assign_date, UF.completed_date, UF.status, UF.last_modified');
        $builder->join('marketing_form_user AS UF', 'F.id = UF.fld_form_id and fld_user_id =' . $_userid,  $showAll ? 'left' : '');
        $builder->orderBy("F.sort_order");

        if ($form_view != '') {
            $builder->where(array("F.view_name" => $form_view));
        }
        $builder->where(array("F.isactive" => "1"));

        $result = $builder->get();
        return $result->getResult();
    }

    public function eventinsert($data)
    {
        $builder = $this->db->table('events');
        $builder->insert($data);
    }

    public function insertdata($table,$data)
    {
        $builder = $this->db->table($table);
        $builder->insert($data);
    }
}