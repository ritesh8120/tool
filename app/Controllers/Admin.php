<?php

namespace App\Controllers;

use App\Models\User_model;

class Admin extends BaseController
{
    private $modulelist;
    private $adminid;
    private $moduleMultiRow = array();

    public function __construct()
    {
        $son = session();
        $session = $son->getTempdata();

        if (isset($session['user_id'])) {

            $this->adminid = $session['user_id'];
        } else {
            redirect(base_url());
            die();
        }

        if (!isset($session["user_type"])) {
            redirect(base_url());
            die();
        } else if ($session['user_type'] == "client") {
            redirect(base_url() . "client");
            die();
        } else if ($session['user_type'] == "coach") {
            redirect(base_url());
            die();
        }

        if (isset($session["ModuleList"]) && sizeof($session["ModuleList"]) > 0) {
            $this->modulelist = $session["ModuleList"];
            $this->moduleMultiRow = $session["moduleMultiRow"];
        } else {
            $this->modulelist = array(
                "wheeloflife_record" => "Wheel of life"
            );

            // $user_model = new User_model();
            // $coaching_forms = $user_model->get_marketing_forms($this->adminid, '', true);

            // foreach ($coaching_forms->getResult() as $form) {
            //     $this->modulelist[$form->table_name] = 'Marketing Form - ' . $form->title;
            //     if ($form->multirow == "1")
            //         array_push($this->moduleMultiRow, $form->table_name);
            // }

            $session["ModuleList"] = $this->modulelist;
            $session["moduleMultiRow"] = $this->moduleMultiRow;
        }
    }

    public function index()
    {
        return view('admin/dashbord');
    }
}
