<?php

class area extends CI_Controller {
    

    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('area_model','',TRUE);
            $this->data['menuarea'] = 'area';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'vArea')){
           $this->session->set_flashdata('error','No tiene permiso para visualizar area.');
           redirect(base_url());
        }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/area/gerenciar/';
        $config['total_rows'] = $this->area_model->count('area');
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
        
	    $this->data['results'] = $this->area_model->get('area','idarea,nombrearea,descripcionarea','',$config['per_page'],$this->uri->segment(3));
       	
       	$this->data['view'] = 'area/area';
       	$this->load->view('tema/topo',$this->data);
	  
       
		
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'aArea')){
           $this->session->set_flashdata('error','No tiene permiso para agregar area.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('area') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nombrearea' => set_value('nombrearea'),
                'descripcionarea' => set_value('descripcionarea'),
            );

            if ($this->area_model->add('area', $data) == TRUE) {
                $this->session->set_flashdata('success','Area agregado con éxito!');
                redirect(base_url() . 'index.php/area/adicionar/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ha ocurrido un error.</p></div>';
            }
        }
        $this->data['view'] = 'area/adicionarArea';
        $this->load->view('tema/topo', $this->data);

    }
        

    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'eArea')){
           $this->session->set_flashdata('error','No tiene permiso para editar area.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('area') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nombrearea' => $this->input->post('nombrearea'),
                'descripcionarea' => $this->input->post('descripcionarea'),
            );

            if ($this->area_model->edit('area', $data, 'idarea', $this->input->post('idarea')) == TRUE) {
                $this->session->set_flashdata('success','Area editado con éxito!');
                redirect(base_url() . 'index.php/area/editar/'.$this->input->post('idarea'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->area_model->getById($this->uri->segment(3));
        $this->data['view'] = 'area/editarArea';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'vArea')){
           $this->session->set_flashdata('error','No tiene permiso para visualizar area.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->area_model->getById($this->uri->segment(3));
        $this->data['view'] = 'area/visualizarArea';
        $this->load->view('tema/topo', $this->data);

        
    }
	
    public function excluir(){

            if(!$this->permission->checkPermission($this->session->userdata('permiso'),'dArea')){
               $this->session->set_flashdata('error','No tiene permiso para eliminar area.');
               redirect(base_url());
            }

  
            $id =  $this->input->post('id');

            if ($id == null){

                $this->session->set_flashdata('error','Error al intentar eliminar area.');            
                redirect(base_url().'index.php/area/gerenciar/');
            }



            $this->db->where('idareaactual', $id);
         
          
            $iteraciondocumento = $this->db->get('iteraciondocumento')->result();
            
          
            if($iteraciondocumento==null)
            {
           

                        $this->area_model->delete('area','idarea',$id); 

                        $this->session->set_flashdata('success','Area eliminado con éxito!');            
                        redirect(base_url().'index.php/area/');

            }


            if($iteraciondocumento != null){


 foreach ($iteraciondocumento as $v) {
                 $this->db->select('*');
                 $this->db->where('idareaactual',  $id);
                $this->db->from('iteraciondocumento');

                if( $this->db->get()->result()!=null)
                {
                    break;


                }

                            else   {
           

                        $this->area_model->delete('area','idarea',$id); 

                        $this->session->set_flashdata('success','Area eliminado con éxito!');            
                        redirect(base_url().'index.php/area/');

            }

                }
                 

            $this->session->set_flashdata('error','Esta Area ha sido utilizada para una secuencia, por ende no se puede eliminar!');            
            redirect(base_url().'index.php/area/');

                /*foreach ($iteraciondocumento as $v) {
                 

                    $prueba=$this->db->where('iditeraciondocumento', $v->iditeraciondocumento);
                    
                    $this->db->delete('iteraciondocumento');
                }*/
            }









    }
}

