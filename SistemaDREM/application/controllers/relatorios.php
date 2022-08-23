<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
        }
        
        $this->load->model('Relatorios_model','',TRUE);
        $this->data['menuRelatorios'] = 'Relatórios';

    }

    public function area(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rArea')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de area.');
           redirect(base_url());
        }
        $this->data['view'] = 'relatorios/rel_area';
       	$this->load->view('tema/topo',$this->data);
    }

    public function tipotramite(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rTipotramite')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de productos.');
           redirect(base_url());
        }
        $this->data['view'] = 'relatorios/rel_tipotramite';
       	$this->load->view('tema/topo',$this->data);

    }

    public function areaCustom(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rArea')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de area.');
           redirect(base_url());
        }

        $dataInicial = $this->input->get('dataInicial');
        $dataFinal = $this->input->get('dataFinal');

        $data['area'] = $this->Relatorios_model->areaCustom($dataInicial,$dataFinal);

        $this->load->helper('mpdf');
        //$this->load->view('relatorios/imprimir/imprimirarea', $data);
        $html = $this->load->view('relatorios/imprimir/imprimirarea', $data, true);
        pdf_create($html, 'relatorio_area' . date('d/m/y'), TRUE);
    
    }

    public function areaRapid(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rArea')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de area.');
           redirect(base_url());
        }

 //error_reporting(E_ALL ^ E_DEPRECATED);

        $data['area'] = $this->Relatorios_model->areaRapid();
       
        $this->load->helper('mpdf');
        //$this->load->view('relatorios/imprimir/imprimirarea', $data);
        $html = $this->load->view('relatorios/imprimir/imprimirarea', $data, true);
        pdf_create($html, 'relatorio_area' . date('d/m/y'), TRUE);
    }

    public function tipotramiteRapid(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rTipotramite')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de productos.');
           redirect(base_url());
        }

        $data['tipotramite'] = $this->Relatorios_model->tipotramiteRapid();

        $this->load->helper('mpdf');
        //$this->load->view('relatorios/imprimir/imprimirtipotramite', $data);
        $html = $this->load->view('relatorios/imprimir/imprimirtipotramite', $data, true);
        pdf_create($html, 'relatorio_tipotramite' . date('d/m/y'), TRUE);
    }

    public function tipotramiteRapidMin(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rTipotramite')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de productos.');
           redirect(base_url());
        }

        $data['tipotramite'] = $this->Relatorios_model->tipotramiteRapidMin();

        $this->load->helper('mpdf');
        $html = $this->load->view('relatorios/imprimir/imprimirtipotramite', $data, true);
        pdf_create($html, 'relatorio_tipotramite1' . date('d/m/y'), TRUE);
        
    }

    public function tipotramiteCustom(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rTipotramite')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de productos..');
           redirect(base_url());
        }

        $busquedapalabra = $this->input->get('busquedapalabra');

        $data['tipotramite'] = $this->Relatorios_model->tipotramiteCustom($busquedapalabra);

        $this->load->helper('mpdf');
        $html = $this->load->view('relatorios/imprimir/imprimirtipotramite', $data, true);
        pdf_create($html, 'relatorio_tipotramite' . date('d/m/y'), TRUE);
    }

    public function documentos(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rDocumento')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de Documentos.');
           redirect(base_url());
        }
        $this->data['view'] = 'relatorios/rel_documentos';
       	$this->load->view('tema/topo',$this->data);

    }

    public function documentosCustom(){

        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rDocumento')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de Documentos.');
           redirect(base_url());
        }
 $dataInicial = $this->input->get('dataInicial');
        $dataFinal = $this->input->get('dataFinal');
         $dataInicial1 = $this->input->get('dataInicial1');
        $dataFinal1 = $this->input->get('dataFinal1');
        $busquedapalabra1 = $this->input->get('busquedapalabra1');
        
        $data['documentos'] = $this->Relatorios_model->documentosCustom($dataInicial,$dataFinal,$dataInicial1,$dataFinal1,$busquedapalabra1);
        $this->load->helper('mpdf');
        //$this->load->view('relatorios/imprimir/imprimirdocumentos', $data);
        $html = $this->load->view('relatorios/imprimir/imprimirDocumentos', $data, true);
        pdf_create($html, 'relatorio_documentos' . date('d/m/y'), TRUE);
     
    }

    public function documentosRapid(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rDocumento')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de Documentos.');
           redirect(base_url());
        }

        $data['documentos'] = $this->Relatorios_model->documentosRapid();

        $this->load->helper('mpdf');
        //$this->load->view('relatorios/imprimir/imprimirdocumentos', $data);
        $html = $this->load->view('relatorios/imprimir/imprimirdocumentos', $data, true);
        pdf_create($html, 'relatorio_documentos' . date('d/m/y'), TRUE);
    }

    public function os(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rOs')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de OS.');
           redirect(base_url());
        }
        $this->data['view'] = 'relatorios/rel_os';
       	$this->load->view('tema/topo',$this->data);
    }

    public function osRapid(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rOs')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de OS.');
           redirect(base_url());
        }

        $data['os'] = $this->Relatorios_model->osRapid();

        $this->load->helper('mpdf');
        //$this->load->view('relatorios/imprimir/imprimirOs', $data);
        $html = $this->load->view('relatorios/imprimir/imprimirOs', $data, true);
        pdf_create($html, 'relatorio_os' . date('d/m/y'), TRUE);
    }

    public function osCustom(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'rOs')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de OS.');
           redirect(base_url());
        }
        
        $dataInicial = $this->input->get('dataInicial');
        $dataFinal = $this->input->get('dataFinal');
        $Area = $this->input->get('Area');
        $responsavel = $this->input->get('responsavel');
        $status = $this->input->get('status');
        $data['os'] = $this->Relatorios_model->osCustom($dataInicial,$dataFinal,$Area,$responsavel,$status);
        $this->load->helper('mpdf');
        //$this->load->view('relatorios/imprimir/imprimirOs', $data);
        $html = $this->load->view('relatorios/imprimir/imprimirOs', $data, true);
        pdf_create($html, 'relatorio_os' . date('d/m/y'), TRUE);
    }



    public function iteraciondocumento(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'riteraciondocumento')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de ventas.');
           redirect(base_url());
        }

        $this->data['view'] = 'relatorios/rel_iteraciondocumento';
        $this->load->view('tema/topo',$this->data);
    }

    public function iteraciondocumentoRapid(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'riteraciondocumento')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de ventas.');
           redirect(base_url());
        }
        $data['iteraciondocumento'] = $this->Relatorios_model->iteraciondocumentoRapid();

        $this->load->helper('mpdf');
        //$this->load->view('relatorios/imprimir/imprimirOs', $data);
        $html = $this->load->view('relatorios/imprimir/imprimiriteraciondocumento', $data, true);
        pdf_create($html, 'relatorio_iteraciondocumento' . date('d/m/y'), TRUE);
    }

    public function iteraciondocumentoCustom(){
        if(!$this->permission->checkPermission($this->session->userdata('permiso'),'riteraciondocumento')){
           $this->session->set_flashdata('error','No se le permite generar los reportes de ventas..');
           redirect(base_url());
        }
        $dataInicial = $this->input->get('dataInicial');
        $dataFinal = $this->input->get('dataFinal');
        $dataInicial1 = $this->input->get('dataInicial1');
        $dataFinal1 = $this->input->get('dataFinal1');
        
$nombredocumento=$this->input->get('nombredocumento');


        $bTramitado = $this->input->get('bTramitado');
        $bDerivado = $this->input->get('bDerivado');
        $bObservado = $this->input->get('bObservado');
        $bEsperandoDocumentacion = $this->input->get('bEsperandoDocumentacion');
        $bFinalizado = $this->input->get('bFinalizado');


        $data['iteraciondocumento'] = $this->Relatorios_model->iteraciondocumentoCustom($dataInicial,$dataFinal,$dataInicial1,$dataFinal1,$nombredocumento,$bTramitado,$bDerivado,$bObservado,$bEsperandoDocumentacion,$bFinalizado);
        $this->load->helper('mpdf');
        //$this->load->view('relatorios/imprimir/imprimirOs', $data);
        $html = $this->load->view('relatorios/imprimir/imprimiriteraciondocumento', $data, true);
        pdf_create($html, 'relatorio_iteraciondocumento' . date('d/m/y'), TRUE);
    }
}
