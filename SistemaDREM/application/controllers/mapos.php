<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mapos_model','',TRUE);
        
    }

    public function index() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        $this->data['tipotramite'] = $this->mapos_model->gettipotramiteMinimo();
        $this->data['menuPainel'] = 'Painel';
        $this->data['view'] = 'mapos/painel';
        $this->load->view('tema/topo',  $this->data);
      
    }

    public function miCuenta() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        $this->data['usuario'] = $this->mapos_model->getById($this->session->userdata('id'));
        $this->data['view'] = 'mapos/miCuenta';
        $this->load->view('tema/topo',  $this->data);
     
    }

    public function alterarcontrasenha() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }
         $this->load->library('encrypt');

   

        $oldcontrasenha = $this->encrypt->sha1($this->input->post('oldcontrasenha'));
        $contrasenha = $this->encrypt->sha1($this->input->post('novacontrasenha'));
        $result = $this->mapos_model->alterarcontrasenha($contrasenha,$oldcontrasenha,$this->session->userdata('id'));
        if($result){
            $this->session->set_flashdata('success','Contraseña modificada con éxito!'.$file);
            $this->session->sess_destroy();
            redirect(base_url() . 'index.php/mapos/miCuenta');
        }
        else{
            $this->session->set_flashdata('error','Ocurrió un error al modificar la contraseña!');
            redirect(base_url() . 'index.php/mapos/miCuenta');
            
        }
    }


    public function alterarfotoperfil() {
        
         if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }


    $arquivo = $this->do_upload();
 //  $bla= $this->do_upload();
   //   $this->session->set_flashdata($bla);

            $file = $arquivo['file_name'];
            $path = $arquivo['full_path'];
            $url = base_url().'assets/fotoperfil/'.$file;
            $tamanho = $arquivo['file_size'];
            $tipo = $arquivo['file_ext'];
  
             

              $upload_error = $this->upload->display_errors();


if ($file== "") {

    $url= base_url().'assets/fotoperfil/imagendefecto.png';
}

           
        $result = $this->mapos_model->alterarfotoperfil($url,$this->session->userdata('id'));
        

        if($result){
            $this->session->set_flashdata('success','Foto de perfil modificada con éxito!');

          //  $this->session->set_flashdata('success','Foto de modificada con éxito!');
          //  $this->session->sess_destroy();
            redirect(base_url() . 'index.php/mapos/miCuenta');
        }
        else if(!$result){
            $this->session->set_flashdata('error','Ocurrió un error al modificar la foto de perfil!');
            
        
    redirect(base_url() . 'index.php/mapos/miCuenta');

         }

        
    }


    public function pesquisar() {
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }
        
        $termo = $this->input->get('termo');

        $data['results'] = $this->mapos_model->pesquisar($termo);
        $this->data['tipotramite'] = $data['results']['tipotramite'];
        $this->data['documentos'] = $data['results']['documentos'];
        $this->data['area'] = $data['results']['area'];
        $this->data['view'] = 'mapos/pesquisa';
        $this->load->view('tema/topo',  $this->data);
      
    }

    public function login(){
        
        $this->load->view('mapos/login');
        
    }
    public function sair(){
        $this->session->sess_destroy();
        redirect('mapos/login');
    }


    public function verificarLogin(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','valid_email|required|xss_clean|trim');
        $this->form_validation->set_rules('contrasenha','contrasenha','required|xss_clean|trim');
        $ajax = $this->input->get('ajax');
        if ($this->form_validation->run() == false) {
            
            if($ajax == true){
                $json = array('result' => false);
                echo json_encode($json);
            }
            else{
                $this->session->set_flashdata('error','Los datos de acceso son incorrectos.');
                redirect($this->login);
            }
        } 
        else {

            $email = $this->input->post('email');
            $contrasenha = $this->input->post('contrasenha');

            $this->load->library('encrypt');   
            $contrasenha = $this->encrypt->sha1($contrasenha);

            $this->db->where('email',$email);
            $this->db->where('contrasenha',$contrasenha);
            $this->db->where('estado',1);
            $this->db->limit(1);
            $usuario = $this->db->get('usuarios')->row();
            if(count($usuario) > 0){
                $dados = array('nombres' => $usuario->nombres, 'id' => $usuario->idUsuarios,'permiso' => $usuario->permisos_id , 'logado' => TRUE);
                $this->session->set_userdata($dados);

                if($ajax == true){
                    $json = array('result' => true);
                    echo json_encode($json);
                }
                else{
                    redirect(base_url().'mapos');
                }

                
            }
            else{
                
                
                if($ajax == true){
                    $json = array('result' => false);
                    echo json_encode($json);
                }
                else{
                    $this->session->set_flashdata('error','Los datos de acceso son incorrectos.');
                    redirect($this->login);
                }
            }
            
        }
        
    }


    public function backup(){

        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'cBackup')){
           $this->session->set_flashdata('error','No tiene permiso para efectuar back-up.');
           redirect(base_url());
        }

        
        
        $this->load->dbutil();
        $prefs = array(
                'format'      => 'zip',
                'filename'    => 'backup'.date('d-m-Y').'.sql'
              );

        $backup =& $this->dbutil->backup($prefs);

        $this->load->helper('file');
        write_file(base_url().'backup/backup.zip', $backup);

        $this->load->helper('download');
        force_download('backup'.date('d-m-Y H:m:s').'.zip', $backup);
    }


    // public function emitente(){   

    //     if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
    //         redirect('mapos/login');
    //     }

    //     if(!$this->permission->checkPermission($this->session->userdata('permiso'),'cEmitente')){
    //        $this->session->set_flashdata('error','No tiene permiso para configurar una empresa.');
    //        redirect(base_url());
    //     }

    //     $data['menuConfiguracoes'] = 'Configuracoes';
    //     $data['dados'] = $this->mapos_model->getEmitente();
    //     $data['view'] = 'mapos/emitente';
    //     $this->load->view('tema/topo',$data);
    //     $this->load->view('tema/rodape');
    // }

 public function do_upload(){

       

       

        $config['upload_path'] = './assets/fotoperfil/';
        $config['allowed_types'] = 'jpg|jpeg|pdf|png|JPG|JPEG|PNG|PDF';
           $config['max_size'] = '1000000';
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
       // return "error";
        return false;
    }
        }
        else
        {
            //$data = array('upload_data' => $this->upload->data());
         
            return   $this->upload->data();;
        }
    }

    /*

  public function do_upload(){

        
    

        $config['upload_path'] = './assets/fotos/';
        $config['allowed_types'] = 'jpg|jpeg|pdf|png|JPG|JPEG|PNG|PDF';
           $config['max_size'] = '1000000';
        $config['max_width']  = '1024000';
        $config['max_height']  = '768000';
        $config['encrypt_name'] = true;



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
    }*/

    // public function cadastrarEmitente() {
    //     if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
    //         redirect('index.php/mapos/login');
    //     }

    //     if(!$this->permission->checkPermission($this->session->userdata('permiso'),'cEmitente')){
    //        $this->session->set_flashdata('error','No tiene permiso para configurar una empresa.');
    //        redirect(base_url());
    //     }

    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('nome','Razão Social','required|xss_clean|trim');
    //     $this->form_validation->set_rules('cnpj','CNPJ','required|xss_clean|trim');
    //     $this->form_validation->set_rules('ie','IE','required|xss_clean|trim');
    //     $this->form_validation->set_rules('logradouro','Logradouro','required|xss_clean|trim');
    //     $this->form_validation->set_rules('numero','Número','required|xss_clean|trim');
    //     $this->form_validation->set_rules('bairro','Bairro','required|xss_clean|trim');
    //     $this->form_validation->set_rules('cidade','Cidade','required|xss_clean|trim');
    //     $this->form_validation->set_rules('uf','UF','required|xss_clean|trim');
    //     $this->form_validation->set_rules('telefono','telefono','required|xss_clean|trim');
    //     $this->form_validation->set_rules('email','E-mail','required|xss_clean|trim');




        

    //     if ($this->form_validation->run() == false) {
            
    //         $this->session->set_flashdata('error','Los campos obligatorios están vacíos.');
    //         redirect(base_url().'index.php/mapos/emitente');
            
    //     } 
    //     else {

    //         $nome = $this->input->post('nome');
    //         $cnpj = $this->input->post('cnpj');
    //         $ie = $this->input->post('ie');
    //         $logradouro = $this->input->post('logradouro');
    //         $numero = $this->input->post('numero');
    //         $bairro = $this->input->post('bairro');
    //         $cidade = $this->input->post('cidade');
    //         $uf = $this->input->post('uf');
    //         $telefono = $this->input->post('telefono');
    //         $email = $this->input->post('email');
    //         $id = $this->input->post('id');


    //         $retorno = $this->mapos_model->editEmitente($id, $nome, $cnpj, $ie, $logradouro, $numero, $bairro, $cidade, $uf,$telefono,$email);
    //         if($retorno){

    //             $this->session->set_flashdata('success','La información se ha cambiado correctamente.');
    //             redirect(base_url().'index.php/mapos/emitente');
    //         }
    //         else{
    //             $this->session->set_flashdata('error','Se produjo un error al tratar de cambiar la información.');
    //             redirect(base_url().'index.php/mapos/emitente');
    //         }
            
    //     }
    // }


    // public function editarLogo(){
    //     if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
    //         redirect('index.php/mapos/login');
    //     }

    //     if(!$this->permission->checkPermission($this->session->userdata('permiso'),'cEmitente')){
    //        $this->session->set_flashdata('error','Usted no está autorizado a configurar una empresa.');
    //        redirect(base_url());
    //     }

    //     $id = $this->input->post('id');
    //     if($id == null || !is_numeric($id)){
    //        $this->session->set_flashdata('error','Se produjo un error al intentar cambiar el logomarca.');
    //        redirect(base_url().'index.php/mapos/emitente'); 
    //     }
    //     $this->load->helper('file');
    //     delete_files(FCPATH .'assets/uploads/');

    //     $image = $this->do_upload();
    //     $logo = base_url().'assets/uploads/'.$image;

    //     $retorno = $this->mapos_model->editLogo($id, $logo);
    //     if($retorno){

    //         $this->session->set_flashdata('success','La información se ha cambiado correctamente.');
    //         redirect(base_url().'index.php/mapos/emitente');
    //     }
    //     else{
    //         $this->session->set_flashdata('error','Se produjo un error al tratar de cambiar la información.');
    //         redirect(base_url().'index.php/mapos/emitente');
    //     }

    // }

    
}
