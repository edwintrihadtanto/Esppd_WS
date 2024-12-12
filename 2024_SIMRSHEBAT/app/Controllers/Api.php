<?php

namespace App\Controllers;

abstract class Api  extends BaseController{
    public function __construct()
    {
        $this->db =  db_connect();
        $this->simrs=db_connect('simrs');
    }
        
    protected function evalParam($input, $listParam) {
        $ada = true;
        
        foreach ($listParam as $param) {
            if(isset($input->$param)){
                $input->$param = str_replace("'", "''", $input->$param);
            }else{
                $ada = false;
            }
        }
        if($ada){
            return true;
        }else{
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "Data tidak lengkap";
            $this->hasil($output);
            exit();
        }
    }


    protected function hasil($param) {
        echo json_encode($param);
    } 
}
