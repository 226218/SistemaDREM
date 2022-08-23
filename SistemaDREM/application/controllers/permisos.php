<?php

class permisos extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'cpermiso')){
          $this->session->set_flashdata('error','Usted no está autorizado para configurar los permisos en el sistema.');
          redirect(base_url());
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('permisos_model', '', TRUE);
        $this->data['menuConfiguracoes'] = 'Permissões';
    }
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){
        
        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/permisos/gerenciar/';
        $config['total_rows'] = $this->permisos_model->count('permisos');
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

		  $this->data['results'] = $this->permisos_model->get('permisos','idPermiso,cargo,fechacreacion,estadopermiso','',$config['per_page'],$this->uri->segment(3));
       
	    $this->data['view'] = 'permisos/permisos';
       	$this->load->view('tema/topo',$this->data);

       
		
    }
	
    function adicionar() {
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        $this->form_validation->set_rules('cargo', 'cargo', 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            
            $cargopermiso = $this->input->post('cargo');
            $cadastro = date('Y-m-d');
            $estadopermiso = 1;

            $permisos = array(

                  'aArea' => $this->input->post('aArea'),
                  'eArea' => $this->input->post('eArea'),
                  'dArea' => $this->input->post('dArea'),
                  'vArea' => $this->input->post('vArea'),

                  'aTipotramite' => $this->input->post('aTipotramite'),
                  'eTipotramite' => $this->input->post('eTipotramite'),
                  'dTipotramite' => $this->input->post('dTipotramite'),
                  'vTipotramite' => $this->input->post('vTipotramite'),

                  'aDocumento' => $this->input->post('aDocumento'),
                  'eDocumento' => $this->input->post('eDocumento'),
                  'dDocumento' => $this->input->post('dDocumento'),
                  'vDocumento' => $this->input->post('vDocumento'),

                  'aiteraciondocumento' => $this->input->post('aiteraciondocumento'),
                  'eiteraciondocumento' => $this->input->post('eiteraciondocumento'),
                  'diteraciondocumento' => $this->input->post('diteraciondocumento'),
                  'viteraciondocumento' => $this->input->post('viteraciondocumento'),

                  'asecuenciatramite' => $this->input->post('asecuenciatramite'),
                  'esecuenciatramite' => $this->input->post('esecuenciatramite'),
                  'dsecuenciatramite' => $this->input->post('dsecuenciatramite'),
                  'vsecuenciatramite' => $this->input->post('vsecuenciatramite'),



                  'cUsuario' => $this->input->post('cUsuario'),
                  'cpermiso' => $this->input->post('cpermiso'),
                  'cBackup' => $this->input->post('cBackup'),

                  'rArea' => $this->input->post('rArea'),
                  'rTipotramite' => $this->input->post('rTipotramite'),
                  'rDocumento' => $this->input->post('rDocumento'),
                  'riteraciondocumento' => $this->input->post('riteraciondocumento'),
                  'eSeguimiento' => $this->input->post('eSeguimiento')

            );
            $permisos = serialize($permisos);

            $data = array(
                'cargo' => $cargopermiso,
                'fechacreacion' => $cadastro,
                'permisos' => $permisos,
                'estadopermiso' => $estadopermiso
            );

            if ($this->permisos_model->add('permisos', $data) == TRUE) {

                $this->session->set_flashdata('success', 'Permisos añadidos con éxito.');
                redirect(base_url() . 'index.php/permisos/adicionar/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $this->data['view'] = 'permisos/adicionarpermiso';
        $this->load->view('tema/topo', $this->data);

    }

    function editar() {

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        $this->form_validation->set_rules('cargo', 'cargo', 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            
            $cargopermiso = $this->input->post('cargo');
            $estadopermiso = $this->input->post('estadopermiso');
            $permisos = array(

                  'aArea' => $this->input->post('aArea'),
                  'eArea' => $this->input->post('eArea'),
                  'dArea' => $this->input->post('dArea'),
                  'vArea' => $this->input->post('vArea'),

                  'aTipotramite' => $this->input->post('aTipotramite'),
                  'eTipotramite' => $this->input->post('eTipotramite'),
                  'dTipotramite' => $this->input->post('dTipotramite'),
                  'vTipotramite' => $this->input->post('vTipotramite'),

                  'aDocumento' => $this->input->post('aDocumento'),
                  'eDocumento' => $this->input->post('eDocumento'),
                  'dDocumento' => $this->input->post('dDocumento'),
                  'vDocumento' => $this->input->post('vDocumento'),

                  'aiteraciondocumento' => $this->input->post('aiteraciondocumento'),
                  'eiteraciondocumento' => $this->input->post('eiteraciondocumento'),
                  'diteraciondocumento' => $this->input->post('diteraciondocumento'),
                  'viteraciondocumento' => $this->input->post('viteraciondocumento'),

                   'asecuenciatramite' => $this->input->post('asecuenciatramite'),
                  'esecuenciatramite' => $this->input->post('esecuenciatramite'),
                  'dsecuenciatramite' => $this->input->post('dsecuenciatramite'),
                  'vsecuenciatramite' => $this->input->post('vsecuenciatramite'),
  
                  'cUsuario' => $this->input->post('cUsuario'),
                  'cpermiso' => $this->input->post('cpermiso'),
                  'cBackup' => $this->input->post('cBackup'),

                  'rArea' => $this->input->post('rArea'),
                  'rTipotramite' => $this->input->post('rTipotramite'),
                  'rDocumento' => $this->input->post('rDocumento'),
                  'riteraciondocumento' => $this->input->post('riteraciondocumento'),
                  'eSeguimiento' => $this->input->post('eSeguimiento')

            );
            $permisos = serialize($permisos);

            $data = array(
                'cargo' => $cargopermiso,
                'permisos' => $permisos,
                'estadopermiso' => $estadopermiso
            );

            if ($this->permisos_model->edit('permisos', $data, 'idPermiso', $this->input->post('idPermiso')) == TRUE) {
                $this->session->set_flashdata('success', 'Permisos editados con éxito!');
                redirect(base_url() . 'index.php/permisos/editar/'.$this->input->post('idPermiso'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um errro.</p></div>';
            }
        }

        $this->data['result'] = $this->permisos_model->getById($this->uri->segment(3));

        $this->data['view'] = 'permisos/editarpermiso';
        $this->load->view('tema/topo', $this->data);

    }
	
    function excluir(){

        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Error al intentar eliminar el permiso.');            
            redirect(base_url().'index.php/permisos/gerenciar/');
        }

        $this->db->where('permisos_id', $id);
        $this->db->delete('permisos_os');

        $this->documentos_model->delete('permisos','idPermiso',$id);             
        

        $this->session->set_flashdata('success','permiso eliminado con exito');            
        redirect(base_url().'index.php/permisos/gerenciar/');
    }
}


/* End of file permisos.php */
/* Location: ./application/controllers/permisos.php */