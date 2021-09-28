<?php

namespace App\Controllers;

use App\Models\User_model;

class Client extends BaseController
{
    private $userid;

    public function __construct()
    {
        $son = session();
        $session = $son->getTempdata();
        if (isset($session['user_id'])) 
        {
            $this->userid = $session['user_id'];
        } else 
        {
            return redirect()->to(base_url());
            die();
        }

        if (!isset($session["user_type"])) {
            return redirect()->to(base_url());
            die();
        } else if ($session['user_type'] == 'yogiccoach') 
        {
            return redirect()->to(base_url() . "yogiccoach");
            die();
        } else if ($session['user_type'] != "member") 
        {
            return redirect()->to(base_url());
            die();
        }

        $getmodel = new User_model();
        $member = $getmodel->get_data('users', ['fld_id' => $this->userid]);
        if ($member->getNumRows() > 0) {
            $row = $member->getRowArray();
            $timezone = $row['fld_timezone'];

        }
        date_default_timezone_set($timezone);
    }


    public function index()
    {
        return view('client/dashboard');
    }

    public function coaching_session()
    {
        $getmodel = new User_model();
        $data["coaching_forms"] = $getmodel->get_coaching_forms($this->userid);
        $data['marketing_forms'] = $getmodel->get_marketing_forms($this->userid);
        return view('client/coaching_session', $data);
    }

    public function Daily_Accountability_Score()
    {
        return view('client/das');
    }

    public function event_calendar()
    {
        $getmodel = new User_model();
        $data["coaching_forms"] = $getmodel->get_coaching_forms($this->userid);
        $data['marketing_forms'] = $getmodel->get_marketing_forms($this->userid);
        return view('client/event_calendar', $data);
    }

    public function insert_event()
    {
        $data = array(
            'title' => $_POST['title'],
            'start_event' => $_POST['start'],
            'end_event' => $_POST['end'],
            'user_id' => $this->userid,
            'fld_description' => $_POST['description'],
        );
        $getmodel = new User_model();
        $getmodel->eventinsert($data);        
    }

    public function load_event()
    {
        $data = array();
        $getmodel = new User_model();
        $result = $getmodel->get_dataresult('events', ['user_id' => $this->userid]);
        foreach ($result->getResult() as $row) {
            $data[] = array(
                'id'   => $row->id,
                'title'   => $row->title,
                'start'   => $row->start_event,
                'end'   => $row->end_event
            );
        }
        echo json_encode($data);
    }

    public function Wheel_of_life()
    {
        return view('client/Wheel_of_life');
    }

    public function Negative_Energy_Detox()
    {
        return view('client/Negative_Energy_Detox');
    }

    public function Gratitude_Journal()
    {
        return view('client/Gratitude_Journal');
    }

    public function chakra_reading()
    {
        return view('client/chakra_reading');
    }

    public function Intention_Setting()
    {
        return view('client/Intention_Setting');
    }
    public function Library()
    {
        return view('client/Library');
    }
    public function reports()
    {
        return view('client/reports');
    }
}
