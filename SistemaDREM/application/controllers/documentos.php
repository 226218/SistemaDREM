<?php

class documentos extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('documentos_model', '', TRUE);
        $this->data['menudocumentos'] = 'documentos';
    }
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'vDocumento')){
           $this->session->set_flashdata('error','No tiene permiso para visualizar Documentos.');
           redirect(base_url());
        }

        $this->load->library('pagination');
        
        $nombredoc = $this->input->get('nombredoc');
        $dnisolicitan = $this->input->get('dnisolicitan');  
       // $areausuario= $datausuario[0]->idarea;
        if($nombredoc == null && $dnisolicitan == null){

        $config['base_url'] = base_url().'index.php/documentos/gerenciar/';
        $config['total_rows'] = $this->documentos_model->count('documentos');
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

		$this->data['results'] = $this->documentos_model->get('documentos','iddocumento,tipotramite_id,nombredocumento,descripciondocumento,estado,dniremitente,emailremitente,cargodestinatario,apellidopaternoremitente,apellidomaternoremitente,
        nombresremitente,fechaingreso,fechafin,observaciones,anexos,archivodocumento','',$config['per_page'],$this->uri->segment(3));
         }
        else{
            $this->data['results'] = $this->documentos_model->search($nombredoc, $dnisolicitan);
        }
	    $this->data['view'] = 'documentos/documentos';
       	$this->load->view('tema/topo',$this->data);

       
		
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'aDocumento')){
           $this->session->set_flashdata('error','No tiene permiso para agregar Documentos.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('documentos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
$this->load->library('encrypt');

          $arquivo = $this->do_upload();

            $file = $arquivo['file_name'];
            $path = $arquivo['full_path'];
            $url = base_url().'assets/archivos/'.date('d-m-Y').'/'.$file;
            $tamanho = $arquivo['file_size'];
            $tipo = $arquivo['file_ext'];

            $data = $this->input->post('data');

            if($data == null){
                $data = date('Y-m-d');
            }
            else{
                $data = explode('/',$data);
                $data = $data[2].'-'.$data[1].'-'.$data[0];
            }

            if($file==null) 
                {$url=null;}

            $data = array(
               'tipotramite_id' => set_value('tipotramite_id'),
                'nombredocumento' => set_value('nombredocumento'),
                'descripciondocumento' => set_value('descripciondocumento'),
                'estado' => set_value('estado'),
                'dniremitente' => set_value('dniremitente'),
                'emailremitente' => set_value('emailremitente'),
                'cargodestinatario' => set_value('cargodestinatario'),    
                'apellidopaternoremitente' => set_value('apellidopaternoremitente'),
                'apellidomaternoremitente' => set_value('apellidomaternoremitente'),
                'nombresremitente' => set_value('nombresremitente'),
                'fechaingreso' => set_value('fechaingreso'),
                'fechafin' => null,
                'observaciones' => set_value('observaciones'),
                'anexos' => set_value('anexos'),
                'archivodocumento' => $url

            );
        
   
     
            if ($this->documentos_model->add('documentos', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Documento '.$data[0]->nombredocumento.' agregado con éxito!');
        

$iddelusuario=$this->session->userdata('id');
        $datausuario = $this->documentos_model->getUsuarios($this->session->userdata('id'));

        $query = $this->db->query('SELECT * FROM documentos');
        $iddocumentonumero=$query->num_rows();

// $areasig = $this->consultainiciodocumento();

$nombresecc=substr($this->input->post('tipotramite'),0,3);

            $data1 = array(
                'iddocumento' => $iddocumentonumero,
                'dniaprobacion' => $datausuario[0]->dni,
                'codsecuenciatramite' => $nombresecc.'-1',
                'idareaactual' => $datausuario[0]->idarea,
                'idareasiguiente' => null,//consultareasegundocumento
                'fechaingreso' => set_value('fechaingreso'),
                'fechaaprobacion' => null,
                'observaciones' => set_value('observaciones'),
                'estadotramite' => 'T',//verestado
                'permiso' => set_value('1'),
                'anexos' => set_value('anexos')
            );
            $this->documentos_model->add('iteraciondocumento', $data1);

                redirect(base_url() . 'index.php/documentos');

            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
       



        }
        $this->data['view'] = 'documentos/adicionarDocumento';
        $this->load->view('tema/topo', $this->data);


    }

 public function adicionarAjax(){
        $this->load->library('form_validation');

        if ($this->form_validation->run('documentos') == false) {
           $json = array("result"=> false);
           echo json_encode($json);
        } else {
            $data = array(
                 'tipotramite_id' => set_value('tipotramite_id'),
                'nombredocumento' => set_value('nombredocumento'),
                'descripciondocumento' => set_value('descripciondocumento'),
                'estado' => set_value('estado'),
                'dniremitente' => set_value('dniremitente'),
                'emailremitente' => set_value('emailremitente'),
                'cargodestinatario' => set_value('cargodestinatario'),  
                'apellidopaternoremitente' => set_value('apellidopaternoremitente'),
                'apellidomaternoremitente' => set_value('apellidomaternoremitente'),
                'nombresremitente' => set_value('nombresremitente'),
                'fechaingreso' => set_value('fechaingreso'),
                'fechafin' => set_value('fechafin'),
                'anexos' => set_value('anexos'),
                'observaciones' => set_value('observaciones')
            );

            if ( is_numeric($id = $this->os_model->add('documentos', $data, true)) ) {
                $json = array("result"=> true, "id"=> $id);
                echo json_encode($json);

            } else {
                $json = array("result"=> false);
                echo json_encode($json);

            }
        }
         
    }


public function visualizar(){

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->documentos_model->getById($this->uri->segment(3));
                $this->data['usuarios'] = $this->documentos_model->getUsuarios($this->uri->segment(3));

        $this->data['view'] = 'documentos/visualizarDocumento';
        $this->load->view('tema/topo', $this->data);
       
    }


    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'eDocumento')){
           $this->session->set_flashdata('error','No tiene permiso para editar Documentos.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('documentos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            
            $data = array(
                'tipotramite_id' => set_value('tipotramite_id'),
                'nombredocumento' => set_value('nombredocumento'),
                'descripciondocumento' => set_value('descripciondocumento'),
                'estado' => set_value('estado'),
                'dniremitente' => set_value('dniremitente'),
                'emailremitente' => set_value('emailremitente'),
                'cargodestinatario' => set_value('cargodestinatario'),  
                'apellidopaternoremitente' => set_value('apellidopaternoremitente'),
                'apellidomaternoremitente' => set_value('apellidomaternoremitente'),
                'nombresremitente' => set_value('nombresremitente'),
                'fechaingreso' => set_value('fechaingreso'),
                'fechafin' => set_value('fechafin'),
                'anexos' => set_value('anexos'),
                'observaciones' => $this->input->post('observaciones')

            );

            if ($this->documentos_model->edit('documentos', $data, 'iddocumento', $this->input->post('iddocumento')) == TRUE) {
                $this->session->set_flashdata('success', 'Servicio editado con éxito!');
                redirect(base_url() . 'index.php/documentos/editar/'.$this->input->post('iddocumento'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um errro.</p></div>';
            }
        }

        $this->data['result'] = $this->documentos_model->getById($this->uri->segment(3));

        $this->data['view'] = 'documentos/editarDocumento';
        $this->load->view('tema/topo', $this->data);

    }
	
    function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'dDocumento')){
           $this->session->set_flashdata('error','No tiene permiso para eliminar Documentos.');
           redirect(base_url());
        }
       
        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Error al intentar eliminar el servicio.');            
            redirect(base_url().'index.php/documentos/gerenciar/');
        }

        $this->db->where('documentos_id', $id);
        $this->db->delete('documentos_os');

        $this->documentos_model->delete('documentos','iddocumento',$id);             
        

        $this->session->set_flashdata('success','Servicio eliminado con éxito!');            
        redirect(base_url().'index.php/documentos/gerenciar/');
    }

public function autoCompleteTipotramite(){

        if (isset($_GET['term'])){
            $q = strtoupper($_GET['term']);
            $this->documentos_model->autoCompleteTipotramite($q);
        }

    }


    public function nombretipotramite($idtipodoc){

        if (isset($idtipodoc)){
            $q = strtoupper($idtipodoc);
            $this->documentos_model->nombretipotramite($idtipodoc);
        }

    }




    public function consultainiciodocumento($iniciodoc){

        if (isset($iniciodoc)){
            $q = strtoupper($iniciodoc);
            $this->documentos_model->consultainiciodocumento($q);
        }

    }


 public function download($id = null){
        
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'vDocumento')){
          $this->session->set_flashdata('error','No tiene permiso para visualizar archivos.');
          redirect(base_url());
        }

        if($id == null || !is_numeric($id)){
            $this->session->set_flashdata('error','Error! O archivo localizados.');
            redirect(base_url() . 'index.php/documentos/');
        }

        $file = $this->documentos_model->getById($id);

        $this->load->library('zip');

        $path = $file->archivodocumento;
      $path1=substr($path,50);
        $this->zip->read_file($path1); 

        $this->zip->download('file'.date('d-m-Y-H.i.s').'.zip');
    }







    public function do_upload(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'aDocumento')){
          $this->session->set_flashdata('error','No tiene permiso para agregar archivos.');
          redirect(base_url());
        }
    

     $date = date('d-m-Y');

        $config['upload_path'] = './assets/archivos/'.$date;
        $config['allowed_types'] = '*';
           $config['max_size'] = '1000000';
        $config['max_width']  = '1024000';
        $config['max_height']  = '768000';
        $config['encrypt_name'] = true;


        if (!is_dir('./assets/archivos/'.$date)) {

            mkdir('./assets/archivos/' . $date, 0777, TRUE);

        }

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

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

