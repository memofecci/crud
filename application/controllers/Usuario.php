<?php

class Usuario extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model ('Usuario_model');
        $this->load->model('Ciudad_model');
        $this->load->helper('url');   
        $this->load->librery('session');
        if($this->session->userdata('login')){
            
        }else{
            redirect(base_url() . "index.php/logins");
        }
    }
    public function index(){
        $data["usuario"]=  $this->Usuario_model->list_all();
        $this->load->view('Usuario_index',$data);
    }
    
    public function nuevo(){
        $data["ciudad"]=  $this->Ciudad_model->list_all();
        $this->load->view('Usuario_nuevo', $data);
    }
    public function save(){
        $nombre=$this->input->post('nombre');
        $apepat=$this->input->post('apepat');
        $ciudad_id=  $this->input->post('ciudad_id');
        $this->Usuario_model->save($nombre,$apepat,$ciudad_id);
        redirect('Usuario');
    }
    public function  delete ($usuario_id){
        $this->Usuario_model->delete($usuario_id);
        redirect('Usuario');
    }
    public function detail($usuario_id){
    $data["Usuario"]=  $this->Usuario_model->find_by_id($usuario_id);
    $this->load->view('Usuario_detail',$data);
        
    }
    public function edit($usuario_id){
        $data['ciudad']=$this->Ciudad_model->list_all();
        $data['usuario']=$this->Usuario_model->find_by_id($usuario_id);
        $this->load->view('usuario_edit',$data);
    }
    public function update(){
        $usuario_id=  $this->input->post('usuario_id');
        $nombre=$this->input->post('nombre');
        $apepat=$this->input->post('apepat');
        $ciudad_id=  $this->input->post('ciudadlista');
        $this->Usuario_model->edit($usuario_id,$nombre,$apepat,$ciudad_id);
        redirect('Usuario');
    }
    
}