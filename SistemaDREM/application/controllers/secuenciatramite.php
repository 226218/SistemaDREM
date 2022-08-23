<?php

class secuenciatramite extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }
		
		$this->load->helper(array('form','codegen_helper'));
		$this->load->model('secuenciatramite_model','',TRUE);
		$this->data['menusecuenciatramite'] = 'secuenciatramite';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'vsecuenciatramite')){
           $this->session->set_flashdata('error','No tiene permiso para visualizar los Tramites.');
           redirect(base_url());
        }

        $this->load->library('pagination');
         $nombresec = $this->input->get('nombresec');
         if($nombresec == null ){
        $config['base_url'] = base_url().'index.php/secuenciatramite/gerenciar/';
        $config['total_rows'] = $this->secuenciatramite_model->count('secuenciatramite');
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

		$this->data['results'] = $this->secuenciatramite_model->get('secuenciatramite','idsecuenciatramite,codsecuenciatramite,nombresecuencia,tipotramite_id,codsecuenciaprevia,estadoaccionsecuencia,idarea','',$config['per_page'],$this->uri->segment(3));
        }else{
            $this->data['results'] = $this->secuenciatramite_model->search($nombresec);
        }
       
	    $this->data['view'] = 'secuenciatramite/secuenciatramite';
       	$this->load->view('tema/topo',$this->data);
      
		
    }
	
    function adicionar(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'asecuenciatramite')){
          $this->session->set_flashdata('error','No tiene permiso para agregar ventas.');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
           if ($this->form_validation->run('secuenciatramite') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

        $this->data['custom_error'] = '';
   
$this->load->library('encrypt');   
            $datasecuenciatramite = $this->input->post('datasecuenciatramite');
           $cantidadsecuencia= $this->secuenciatramite_model->count('secuenciatramite') +1;

$codsecuencia=substr($this->input->post('tipotramite'),0,3).'-'.$this->input->post('valorininombresec') ; 
 $query = $this->db->query('SELECT * FROM secuenciatramite');
        $idsecuenciatramite=$query->num_rows();

$nombrefinalsecuencia=substr($this->input->post('codsecuenciatramite'),0,5).'-'.$this->input->post('nombresecuencia');
            $data = array(
                'codsecuenciatramite' =>  $codsecuencia,
                'nombresecuencia' => $nombrefinalsecuencia,
                'tipotramite_id' => set_value('tipotramite_id'),
                'codsecuenciaprevia' => set_value('codsecuenciaprevia'),
                'estadoaccionsecuencia' => set_value('estadoaccionsecuencia'),
                 'idarea' => $this->input->post('idarea')
                
            );

         if ($this->secuenciatramite_model->add('secuenciatramite', $data) == TRUE) { 
                $this->session->set_flashdata('success','Secuencia agregada correctamente.');
                redirect(base_url() . 'index.php/secuenciatramite');

            } else {
                
                $this->data['custom_error'] = '<div class="form_error"><p>Ocurrió un error.</p></div>';
            }
}         
        $this->data['view'] = 'secuenciatramite/adicionarsecuenciatramite';
        $this->load->view('tema/topo', $this->data);
    
    }
    

    
    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'esecuenciatramite')){
          $this->session->set_flashdata('error','No tiene permiso para editar las ventas');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('secuenciatramite') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $this->load->library('encrypt');   
            $data = array(
                'codsecuenciatramite' =>  set_value('codsecuenciatramite'),
                'nombresecuencia' => set_value('nombresecuencia'),
                'tipotramite_id' => $this->input->post('tipotramite_id'),
                'codsecuenciaprevia' => set_value('codsecuenciaprevia'),
                'estadoaccionsecuencia' => set_value('estadoaccionsecuencia'),
                 'idarea' => set_value('idarea')
            );


            if ($this->secuenciatramite_model->edit('secuenciatramite', $data, 'idsecuenciatramite', $this->input->post('idsecuenciatramite')) == TRUE) {
                $this->session->set_flashdata('success','Secuencia tramite editada con éxito!');
                redirect(base_url() . 'index.php/secuenciatramite/editar/'.$this->input->post('idsecuenciatramite'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocurrió un error</p></div>';
            }
        }

        $this->data['result'] = $this->secuenciatramite_model->getById($this->uri->segment(3));
        $this->data['tipotramite'] = $this->secuenciatramite_model->gettipotramite($this->uri->segment(3));
        $this->data['view'] = 'secuenciatramite/editarsecuenciatramite';
        $this->load->view('tema/topo', $this->data);
   
    }

    public function visualizar(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'vsecuenciatramite')){
          $this->session->set_flashdata('error','No tiene permiso para visualizar las ventas.');
          redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->secuenciatramite_model->getById($this->uri->segment(3));
        $this->data['tipotramite'] = $this->secuenciatramite_model->gettipotramite($this->uri->segment(3));
        $this->data['area'] = $this->secuenciatramite_model->getarea($this->uri->segment(3));

        $this->data['view'] = 'secuenciatramite/visualizarsecuenciatramite';
        $this->load->view('tema/topo', $this->data);
       
    }


    public function enviar(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'esecuenciatramite')){
          $this->session->set_flashdata('error','No tiene permiso para editar las ventas');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';



        if ($this->form_validation->run('secuenciatramite') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $this->load->library('encrypt');  
            $data = array(
                'iddocumento' => set_value('iddocumento'),
                'dniaprobacion' => $this->encrypt->sha1(set_value('dniaprobacion')),
                'idareaactual' => set_value('idareaactual'),
                'idareasiguiente' => set_value('idareasiguiente'),
                'observaciones' => set_value('observaciones'),
                 'fechaingreso' => set_value('fechaingreso'),
                'fechaaprobacion' => set_value('fechaaprobacion'),
                'estadotramite' => 'F',
                'permiso' => set_value('permiso')
            );

if($this->input->post('idarea')==10)
{

$data2 = array(
           'iddocumento' => set_value('iddocumento'),
                'fechaaprobacion' => set_value('fechaaprobacion'),
                'observaciones' => set_value('observaciones'),
                'estado' => 'F'
            );

    $this->secuenciatramite_model->edit('documentos', $data2, 'iddocumento', $this->input->post('iddocumento'));
}

if($this->input->post('idarea')!=10){
  $data1 = array(
           'iddocumento' => set_value('iddocumento'),
                'dniaprobacion' => set_value('dniaprobacion'),
                'idareaactual' => set_value('idareasiguiente'),
                'idareasiguiente' => '',
                'fechaingreso' => set_value('fechaaprobacion'),
                'fechaaprobacion' => '',
                'observaciones' => set_value('observaciones'),
                'estadotramite' => 'T',
                'permiso' => set_value('permiso')
            );

              $this->secuenciatramite_model->add('secuenciatramite', $data1);
   }

            if ($this->secuenciatramite_model->edit('secuenciatramite', $data, 'idsecuenciatramite', $this->input->post('idsecuenciatramite')) == TRUE) {
                $this->session->set_flashdata('success','Venta editada con éxito!');
                redirect(base_url() . 'index.php/secuenciatramite/visualizar/'.$this->input->post('idsecuenciatramite'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocurrió un error</p></div>';
            }



        }

        $this->data['result'] = $this->secuenciatramite_model->getById($this->uri->segment(3));
        $this->data['view'] = 'secuenciatramite/enviariteracion';
        $this->load->view('tema/topo', $this->data);
    }
	
 public function excluir(){


        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'dsecuenciatramite')){
          $this->session->set_flashdata('error','No tiene permiso para eliminar la Secuencia');
          redirect(base_url());
        }
        
        $id =  $this->input->post('id');



        if ($id == null){

            $this->session->set_flashdata('error','Error al intentar eliminar la Secuencia.');            
            redirect(base_url().'index.php/secuenciatramite/gerenciar/');
        }


            $this->db->where('codsecuenciatramite', $id);
         
          
            $secuenciatramite = $this->db->get('secuenciatramite')->result();
            //$id = 2;
            // excluindo OSs vinculadas ao Area
    $query = $this->db->query("SELECT * FROM secuenciatramite WHERE codsecuenciaprevia='".$id."'");
$result = $query->result_array();

            if($result==null)
            {
                        $this->secuenciatramite_model->delete('secuenciatramite','codsecuenciatramite',$id); 
                        $this->session->set_flashdata('success','Secuencia de Tramite eliminada con éxito!');
                        redirect(base_url().'index.php/secuenciatramite/');
            }
            if($secuenciatramite != null){


 foreach ($result as $v) {
            
                if( $v!=null)
                {
                    break;
                }
                            else   {
                        $this->secuenciatramite_model->delete('secuenciatramite','codsecuenciatramite',$secuenciatramite); 
                        $this->session->set_flashdata('success','Area eliminado con éxito!')  ;        
                        redirect(base_url().'index.php/secuenciatramite/');
            }

                }
            $this->session->set_flashdata('error','Esta Secuencia esta siendo utilizada por otra secuencia, por ende no se puede eliminar!');            
            redirect(base_url().'index.php/secuenciatramite/');

            }


    }

    public function autoCompleteTipotramite(){
        
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->secuenciatramite_model->autoCompleteTipotramite($q);
        }

    }


  /*   public function validarsecuencia()
     {
   $num1 = $_GET["num1"];
        $num2 = $_GET['num2'];
        $sum = $num1+$num2;
        //echo "$num1 + $num2 = $sum";

        document.getElementById("SumTotalTxtBx").value = $sum;


     }*/

    public function autoCompleteArea(){

$area=set_value('idareaactual');
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);

            $this->secuenciatramite_model->autoCompleteArea($q,$area);
        }

    }

    public function autoCompleteUsuario(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->secuenciatramite_model->autoCompleteUsuario($q);
        }

    }

 public function autoCompleteAreaSiguiente(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->secuenciatramite_model->autoCompleteAreaSiguiente($q);
        }

    }


 public function autoCompletePreviaSecuenciatramite(){

        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->secuenciatramite_model->autoCompletePreviaSecuenciatramite($q);
        }

    }
    

    public function adicionarTipotramite(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'esecuenciatramite')){
          $this->session->set_flashdata('error','No tiene permiso para editar la venta.');
          redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idTipotramite', 'Tipotramite', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idsecuenciatramiteTipotramite', 'secuenciatramite', 'trim|required|xss_clean');
        
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
                'secuenciatramite_id'=> $this->input->post('idsecuenciatramiteTipotramite'),
            );

                echo json_encode(array('result'=> true));
            }


        
        
      
    }

    function excluirTipotramite(){

            if(!$this->permission->checkPermission($this->session->userdata('permiso'),'esecuenciatramite')){
              $this->session->set_flashdata('error','No tiene permiso para editar la venta.');
              redirect(base_url());
            }

            $ID = $this->input->post('idTipotramite');
            if($this->secuenciatramite_model->delete('itens_de_secuenciatramite','idItens',$ID) == true){
                
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





    public function nombretipotramite($idtipodoc){

        if (isset($idtipodoc)){
            $q = strtoupper($idtipodoc);
            $this->secuenciatramite_model->nombretipotramite($idtipodoc);
        }

    }

        public function nombrearea($idarea){

        if (isset($idtipodoc)){
            $q = strtoupper($idtipodoc);
            $this->secuenciatramite_model->nombrearea($idarea);
        }

    }



  


}

