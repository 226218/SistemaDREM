<?php

class iteraciondocumento extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }
		
		$this->load->helper(array('form','codegen_helper'));
		$this->load->model('iteraciondocumento_model','',TRUE);
		$this->data['menuiteraciondocumento'] = 'iteraciondocumento';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'viteraciondocumento')){
           $this->session->set_flashdata('error','No tiene permiso para visualizar los Tramites.');
           redirect(base_url());
        }

        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/iteraciondocumento/gerenciar/';
        $config['total_rows'] = $this->iteraciondocumento_model->count('iteraciondocumento');
        $config['per_page'] = 100;
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
        $config['first_link'] = 'Primera';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        	
        $this->pagination->initialize($config); 	

		$this->data['results'] = $this->iteraciondocumento_model->get('iteraciondocumento','iditeraciondocumento,dniaprobacion,codsecuenciatramite,idareaactual,idareasiguiente,estadotramite,permiso','',$config['per_page'],$this->uri->segment(3));
       
	    $this->data['view'] = 'iteraciondocumento/iteraciondocumento';
       	$this->load->view('tema/topo',$this->data);
      
		
    }
	
    function adicionar(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'aiteraciondocumento')){
          $this->session->set_flashdata('error','No tiene permiso para agregar ventas.');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        
        if ($this->form_validation->run('iteraciondocumento') == false) {
           $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {
$this->load->library('encrypt');   
            $dataiteraciondocumento = $this->input->post('dataiteraciondocumento');

            $data = array(
                'iddocumento' => set_value('iddocumento'),
                'dniaprobacion' =>  $this->encrypt->sha1($datausuario[0]->dni),
                'idareaactual' => $datausuario[0]->idarea,
                'idareasiguiente' => '',
                'observaciones' => set_value('observaciones'),
                'estadotramite' => 'T',
                 'fechaingreso' => set_value('fechaingreso'),
                'fechaaprobacion' => set_value('fechaaprobacion'),
                'anexos' => set_value('anexos'),
                  'permiso' => $this->input->post('permiso1')
            );

            if (is_numeric($id = $this->iteraciondocumento_model->add('iteraciondocumento', $data, true)) ) {
                $this->session->set_flashdata('success','Segumiento iniciado correctamente.');
                redirect('iteraciondocumento/editar/'.$id);

            } else {
                
                $this->data['custom_error'] = '<div class="form_error"><p>Ocurrió un error.</p></div>';
            }
        }
         
        $this->data['view'] = 'iteraciondocumento/adicionariteraciondocumento';
        $this->load->view('tema/topo', $this->data);
    }
    

    
    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'eiteraciondocumento')){
          $this->session->set_flashdata('error','No tiene permiso para editar las ventas');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('iteraciondocumento') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $this->load->library('encrypt');   
            $data = array(
                'iddocumento' => set_value('iddocumento'),
                'dniaprobacion' =>  $this->encrypt->sha1($datausuario[0]->dni),
                'idareaactual' => $datausuario[0]->idarea,
                'idareasiguiente' => set_value('idareasiguiente'),
                'observaciones' => set_value('observaciones'),
                 'fechaingreso' => set_value('fechaingreso'),
                'fechaaprobacion' => set_value('fechaaprobacion'),
                'estadotramite' => set_value('estadotramite'),
                'permiso' => set_value('0')
            );


            if ($this->iteraciondocumento_model->edit('iteraciondocumento', $data, 'iditeraciondocumento', $this->input->post('iditeraciondocumento')) == TRUE) {
                $this->session->set_flashdata('success','Iteracion del Documento editada con éxito!');
                redirect(base_url() . 'index.php/iteraciondocumento/editar/'.$this->input->post('iditeraciondocumento'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocurrió un error</p></div>';
            }
        }

        $this->data['result'] = $this->iteraciondocumento_model->getById($this->uri->segment(3));
        $this->data['tipotramite'] = $this->iteraciondocumento_model->gettipotramite($this->uri->segment(3));
        $this->data['view'] = 'iteraciondocumento/editariteracion';
        $this->load->view('tema/topo', $this->data);
   
    }

    public function visualizar(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'viteraciondocumento')){
          $this->session->set_flashdata('error','No tiene permiso para visualizar las ventas.');
          redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->iteraciondocumento_model->getById($this->uri->segment(3));
        $this->data['tipotramite'] = $this->iteraciondocumento_model->gettipotramite($this->uri->segment(3));
        $this->data['area'] = $this->iteraciondocumento_model->getarea($this->uri->segment(3));

        $this->data['view'] = 'iteraciondocumento/visualizariteraciondocumento';
        $this->load->view('tema/topo', $this->data);
       
    }


    public function enviar(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'eSeguimiento')){
          $this->session->set_flashdata('error','No tiene permiso para editar las ventas');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';



        if ($this->form_validation->run('iteraciondocumento') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $this->load->library('encrypt');  
 $texto=   $this->input->post('nombrequesalecodsecuencia');



$estadocodsecu=$this->iteraciondocumento_model->valorSecuentramite($texto);






//CREAR CODAREASECUENCIA

            $data = array(
                'iddocumento' => set_value('iddocumento'),
                'dniaprobacion' => $this->encrypt->sha1(set_value('dniaprobacion')),
                'idareaactual' => $this->input->post('idareaactual'),
                'idareasiguiente' =>  $this->input->post('idareasiguiente'),
                'codsecuenciatramite' => $this->input->post('codsecuenciatramite'), 
                'observaciones' => set_value('observaciones'),
                'anexos' => $this->input->post('anexos'),
                 'fechaingreso' => set_value('fechaingreso'),
                'fechaaprobacion' => set_value('fechaaprobacion'),
                'estadotramite' => 'D', //Derivado
                'permiso' => $this->input->post('permisoactual')
            );



if($estadocodsecu[0]->estadoaccionsecuencia=='F') // aca cambiar con la wea de si se finalizo el documento
{

$data2 = array(
           'iddocumento' => set_value('iddocumento'),
                'fechafin' => set_value('fechaaprobacion'),
                'observaciones' => set_value('observaciones'),
                'anexos' => $this->input->post('anexos'),
                'estado' => $estadocodsecu[0]->estadoaccionsecuencia
            );  

    $this->iteraciondocumento_model->edit('documentos', $data2, 'iddocumento', $this->input->post('iddocumento'));



      $data = array(
                'iddocumento' => set_value('iddocumento'),
                'dniaprobacion' => $this->encrypt->sha1(set_value('dniaprobacion')),
                'idareaactual' => $this->input->post('idareaactual'),
                'idareasiguiente' =>  $this->input->post('idareasiguiente'),
                'codsecuenciatramite' => $this->input->post('codsecuenciatramite'), 
                'observaciones' => set_value('observaciones'),
                'anexos' => $this->input->post('anexos'),
                 'fechaingreso' => set_value('fechaingreso'),
                'fechaaprobacion' => set_value('fechaaprobacion'),
                'estadotramite' => 'F', //Derivado
                'permiso' => $this->input->post('permisoactual')
            );


}

if($estadocodsecu[0]->estadoaccionsecuencia!='F'){
  $data1 = array(
           'iddocumento' => set_value('iddocumento'),
                'dniaprobacion' => set_value('dniaprobacion'),
                'idareaactual' =>  $this->input->post('idareasiguiente'),
                'idareasiguiente' => null,
                'codsecuenciatramite' => $texto, 
                'fechaingreso' => set_value('fechaaprobacion'),
                'fechaaprobacion' => null,
                'observaciones' => set_value('observaciones'),
                'anexos' => $this->input->post('anexos'),
                'estadotramite' => $estadocodsecu[0]->estadoaccionsecuencia,
                'permiso' => $this->input->post('permiso1')
            );

              $this->iteraciondocumento_model->add('iteraciondocumento', $data1);
   }

            if ($this->iteraciondocumento_model->edit('iteraciondocumento', $data, 'iditeraciondocumento', $this->input->post('iditeraciondocumento')) == TRUE) {
                $this->session->set_flashdata('success','Iteracion del Documento transferida con éxito!');
                redirect(base_url() . 'index.php/iteraciondocumento/visualizar/'.$this->input->post('iditeraciondocumento'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocurrió un error</p></div>';
            }



        }

        $this->data['result'] = $this->iteraciondocumento_model->getById($this->uri->segment(3));
        $this->data['view'] = 'iteraciondocumento/enviariteracion';
        $this->load->view('tema/topo', $this->data);
    }
	
    function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'diteraciondocumento')){
          $this->session->set_flashdata('error','No tiene permiso para eliminar las ventas');
          redirect(base_url());
        }
        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Error al intentar eliminar la venta.');            
            redirect(base_url().'index.php/iteraciondocumento/gerenciar/');
        }


        $this->db->where('iditeraciondocumento', $id);
        $this->db->delete('iteraciondocumento');           

        $this->session->set_flashdata('success','Venta eliminada con éxito!');            
        redirect(base_url().'index.php/iteraciondocumento/gerenciar/');

    }

    public function autoCompleteTipotramite(){
        
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->iteraciondocumento_model->autoCompleteTipotramite($q);
        }

    }

 public function autoCompleteSiguienteSecuenciatramite(){
        
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->iteraciondocumento_model->autoCompletecodsecuenciatramite($q);
        }

    }


    public function autoCompleteArea(){

$area=set_value('idareaactual');
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);

            $this->iteraciondocumento_model->autoCompleteArea($q,$area);
        }

    }

    public function autoCompleteUsuario(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->iteraciondocumento_model->autoCompleteUsuario($q);
        }

    }

 public function autoCompleteAreaSiguiente(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->iteraciondocumento_model->autoCompleteAreaSiguiente($q);
        }

    }

    public function adicionarTipotramite(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'eiteraciondocumento')){
          $this->session->set_flashdata('error','No tiene permiso para editar la venta.');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idTipotramite', 'Tipotramite', 'trim|required|xss_clean');
        $this->form_validation->set_rules('iditeraciondocumentoTipotramite', 'iteraciondocumento', 'trim|required|xss_clean');
        
        if($this->form_validation->run() == false){
           echo json_encode(array('result'=> false)); 
        }
        else{

            $preco = $this->input->post('preco');
            $quantidade = $this->input->post('quantidade');
            $subtotal = $preco * $quantidade;
            $Tipotramite = $this->input->post('idTipotramite');
            $data = array(
                'quantidade'=> $quantidade,
                'subTotal'=> $subtotal,
                'tipotramite_id'=> $Tipotramite,
                'iteraciondocumento_id'=> $this->input->post('iditeraciondocumentoTipotramite'),
            );

                echo json_encode(array('result'=> true));
            }


        
        
      
    }

    function excluirTipotramite(){

            if(!$this->permission->checkPermission($this->session->userdata('permiso'),'eiteraciondocumento')){
              $this->session->set_flashdata('error','No tiene permiso para editar la venta.');
              redirect(base_url());
            }

            $ID = $this->input->post('idTipotramite');
            if($this->iteraciondocumento_model->delete('itens_de_iteraciondocumento','idItens',$ID) == true){
                
                $quantidade = $this->input->post('quantidade');
                $Tipotramite = $this->input->post('Tipotramite');


                $sql = "UPDATE tipotramite set estoque = estoque + ? WHERE idtipotramite = ?";

                $this->db->query($sql, array($quantidade, $Tipotramite));
                
                echo json_encode(array('result'=> true));
            }
            else{
                echo json_encode(array('result'=> false));
            }           
    }





  


}

