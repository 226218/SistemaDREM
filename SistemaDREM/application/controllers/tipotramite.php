<?php

class tipotramite extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('tipotramite_model', '', TRUE);
        $this->data['menutipotramite'] = 'tipotramite';
    }

    function index(){
	   $this->gerenciar();
    }

    function gerenciar(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'vTipotramite')){
           $this->session->set_flashdata('error','No tiene permiso para visualizar productos.');
           redirect(base_url());
        }

        $this->load->library('table');
        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/tipotramite/gerenciar/';
        $config['total_rows'] = $this->tipotramite_model->count('tipotramite');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config); 	

	    $this->data['results'] = $this->tipotramite_model->get('tipotramite','idtipotramite,nombretipotramite,descripciontipotramite,imagen','',$config['per_page'],$this->uri->segment(3));
       
	    $this->data['view'] = 'tipotramite/tipotramite';
       	$this->load->view('tema/topo',$this->data);
       
		
    }
	
    function adicionar() {

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'aTipotramite')){
           $this->session->set_flashdata('error','No tiene permiso para agregar productos.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('tipotramite') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

      
    $arquivo = $this->do_upload();
            $file = $arquivo['file_name'];
          
            $path = $arquivo['full_path'];
            $url = base_url().'assets/bpmtipotramite/'.$file;
            $tamanho = $arquivo['file_size'];
            $tipo = $arquivo['file_ext'];
        

if ($file== "") {

    $url= base_url().'assets/bpmtipotramite/imagenpordefecto.png';
}



            $data = array(
                'nombretipotramite' => set_value('nombretipotramite'),
                'descripciontipotramite' => set_value('descripciontipotramite'),
                'imagen' => $url
            );


            if ($this->tipotramite_model->add('tipotramite', $data) == TRUE) {
                $this->session->set_flashdata('success','Tipo de tramite agregado con éxito!');
                redirect(base_url() . 'index.php/tipotramite/adicionar/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
            }


        }
        $this->data['view'] = 'tipotramite/adicionarTipotramite';
        $this->load->view('tema/topo', $this->data);
     
    }

    function editar() {

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'eTipotramite')){
           $this->session->set_flashdata('error','No tiene permiso para editar este tipo de tramite.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';



        if ($this->form_validation->run('tipotramite') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {




             
    $arquivo = $this->do_upload();
            $file = $arquivo['file_name'];
          
            $path = $arquivo['full_path'];
            $url = base_url().'assets/bpmtipotramite/'.$file;
            $tamanho = $arquivo['file_size'];
            $tipo = $arquivo['file_ext'];
        

if ($file== "") {

    $url= base_url().'assets/bpmtipotramite/imagenpordefecto.png';
}

            $data = array(
                'nombretipotramite' => $this->input->post('nombretipotramite'),
                'descripciontipotramite' => $this->input->post('descripciontipotramite'),
                'imagen' => $url
            );

            if ($this->tipotramite_model->edit('tipotramite', $data, 'idtipotramite', $this->input->post('idtipotramite')) == TRUE) {
                $this->session->set_flashdata('success','Tipo de Tramite editado con éxito!');
                redirect(base_url() . 'index.php/tipotramite/editar/'.$this->input->post('idtipotramite'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';
            }
        }

        $this->data['result'] = $this->tipotramite_model->getById($this->uri->segment(3));

        $this->data['view'] = 'tipotramite/editarTipotramite';
        $this->load->view('tema/topo', $this->data);
     
    }


    function visualizar() {
      
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'vTipotramite')){
           $this->session->set_flashdata('error','No tiene permiso para visualizar productos.');
           redirect(base_url());
        }

        $this->data['result'] = $this->tipotramite_model->getById($this->uri->segment(3));

        if($this->data['result'] == null){
            $this->session->set_flashdata('error','Producto no encontrado.');
            redirect(base_url() . 'index.php/tipotramite/editar/'.$this->input->post('idtipotramite'));
        }

        $this->data['view'] = 'tipotramite/visualizarTipotramite';
        $this->load->view('tema/topo', $this->data);
     
    }
	
    function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'dTipotramite')){
           $this->session->set_flashdata('error','No tiene permiso para eliminar productos.');
           redirect(base_url());
        }

        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Error al intentar eliminar el producto.');            
            redirect(base_url().'index.php/tipotramite/gerenciar/');
        }


            $this->db->where('idtipotramite', $id);
         
          
            $tipotramite = $this->db->get('tipotramite')->result();
            
          
            if($tipotramite==null)
            {
           

                        $this->tipotramite_model->delete('tipotramite','idtipotramite',$id); 

                        $this->session->set_flashdata('success','Tipo de tramite eliminado con éxito!');            
                        redirect(base_url().'index.php/area/');

            }


            if($tipotramite != null){


 foreach ($tipotramite as $v) {
                 $this->db->select('*');
                 $this->db->where('tipotramite_id',  $id);
                $this->db->from('documentos');

                if( $this->db->get()->result()!=null)
                {
                    break;


                }

                            else   {
           

                        $this->tipotramite_model->delete('tipotramite','idtipotramite',$id); 

                        $this->session->set_flashdata('success','Tipo de Tramite eliminado con éxito!');            
                        redirect(base_url().'index.php/tipotramite/');

            }

                }
                 

            $this->session->set_flashdata('error','Este Tipo de Tramite ha sido utilizado para un documento, por ende no se puede eliminar!');            
            redirect(base_url().'index.php/tipotramite/');

     
    }
    }

  public function do_upload(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'aTipotramite')){
          $this->session->set_flashdata('error','No tiene permiso para agregar archivos.');
          redirect(base_url());
        }
    

        $config['upload_path'] = './assets/bpmtipotramite/';
        $config['allowed_types'] = 'jpg|jpeg|pdf|png|JPG|JPEG|PNG';
           $config['max_size'] = '1000000'; //10 MB limite
        $config['max_width']  = '1024000';
        $config['max_height']  = '768000';
        $config['encrypt_name'] = true;



        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
             $error2 = array('error' => $this->upload->display_errors());

         if($_FILES['userfile']['error'] != 4)
    {
        return false;
    }
        }
        else
        {
            //$data = array('upload_data' => $this->upload->data());
            return $this->upload->data();
        }
    }


}



