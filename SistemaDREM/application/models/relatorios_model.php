<?php
class Relatorios_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }

    function count($table) {
        return $this->db->count_all($table);
    }
    
    public function areaCustom($dataInicial = null,$dataFinal = null){
        
        if($dataInicial == null || $dataFinal == null){
            $dataInicial = date('Y-m-d');
            $dataFinal = date('Y-m-d');
        }
        $query = "SELECT * FROM area WHERE fechaCreacion BETWEEN ? AND ?";
        return $this->db->query($query, array($dataInicial,$dataFinal))->result();
    }

    public function areaRapid(){
        $this->db->order_by('idarea','asc');
        return $this->db->get('area')->result();
    }

   public  function getarea($id){
        $this->db->where('idarea',$id);
        $this->db->limit(1);
        return $this->db->get('area')->row();
    }


  public function getUsuarios($id){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('idUsuarios',$id);
        return $this->db->get()->result();
    }

    public function tipotramiteRapid(){
        $this->db->order_by('nombretipotramite','asc');
        return $this->db->get('tipotramite')->result();
    }

    public function documentosRapid(){
        $this->db->order_by('iddocumento','asc');
        return $this->db->get('documentos')->result();
    }

    public function osRapid(){
        $this->db->select('os.*,area.nombrearea');
        $this->db->from('os');
        $this->db->join('area','area.idarea = os.area_id');
        return $this->db->get()->result();
    }

    public function tipotramiteRapidMin(){
        $this->db->order_by('idtipotramite','asc');
        return $this->db->get('tipotramite')->result();
    }

    public function tipotramiteCustom($busquedapalabra = null){
        $wherePreco = "";
        if($busquedapalabra != null){
            $wherePreco = "WHERE nombretipotramite LIKE '%".$busquedapalabra."%'";
        }
        
        $query = "SELECT * FROM tipotramite $wherePreco";
        return $this->db->query($query)->result();
    }

    public function documentosCustom($dataInicial = null,$dataFinal = null,$dataInicial1 = null,$dataFinal1 = null, $busquedapalabra1 = null){
         

          $whereData='';
         $whereData1='';
         $whereData2='';
          $consulta="";
       if($dataInicial != null || $dataInicial1 != null){
         
        

         if($dataInicial1 == null){
            $dataInicial1=date('Y-m-d');
         }
         if($dataInicial == null){
            $dataInicial='0000-00-00';
         }
            $whereData = "AND fechaingreso BETWEEN '".$dataInicial."' AND '".$dataInicial1."'";
        }

         if($dataFinal != null || $dataFinal1 != null){
           
            if($dataFinal1 == null){
            $dataFinal1=date('Y-m-d');
         }
         if($dataFinal == null){
            $dataFinal='0000-00-00';
         }
             $whereData1 = "AND fechafin BETWEEN ".$this->db->escape($dataFinal)." AND ".$this->db->escape($dataFinal1);
        }
       

     if($busquedapalabra1!=null)
     {

        $whereData2= "AND (nombredocumento LIKE '%".$busquedapalabra1."%') OR (dniremitente LIKE '%".$busquedapalabra1."%' ) OR (descripciondocumento LIKE '%".$busquedapalabra1."%')";
     }

    
     if ($whereData1!=null)
     {
        $consulta=$whereData;
     }
      if ($whereData1!=null)
     {
        $consulta=$consulta.' '.$whereData1;
     }
      if ($whereData2!=null)
     {
        $consulta=$consulta.' '.$whereData2;
     }
       
       

        $query = "SELECT DISTINCT documentos.* FROM documentos, tipotramite WHERE tipotramite.idtipotramite = documentos.tipotramite_id $consulta";
        return $this->db->query($query)->result();

    }





    public function osCustom($dataInicial = null,$dataFinal = null, $dataInicial1 = null, $dataFinal1= null,$Area = null,$responsavel = null,$status = null){
        $whereData = "";
        $whereArea = "";
        $whereResponsavel = "";
        $whereStatus = "";
        if($dataInicial != null){
            $whereData = "AND fechaingreso BETWEEN ".$this->db->escape($dataInicial)." AND ".$this->db->escape($dataInicial1);
        }
        if($dataFinal != null){
            $whereData = "AND fechafin BETWEEN ".$this->db->escape($dataInicial)." AND ".$this->db->escape($dataInicial1);
        }
        if($Area != null){
            $whereArea = "AND area_id = ".$this->db->escape($Area);
        }
        if($responsavel != null){
            $whereResponsavel = "AND usuarios_id = ".$this->db->escape($responsavel);
        }
        if($status != null){
            $whereStatus = "AND status = ".$this->db->escape($status);
        }
        $query = "SELECT os.*,area.nomeArea FROM os LEFT JOIN area ON os.area_id = area.idarea WHERE idOs != 0 $whereData $whereArea $whereResponsavel $whereStatus";
        return $this->db->query($query)->result();
    }


   

    public function iteraciondocumentoRapid(){
        $this->db->select('iteraciondocumento.*, documentos.nombredocumento,documentos.descripciondocumento');
        $this->db->from('iteraciondocumento');
        $this->db->join('documentos', 'documentos.iddocumento = iteraciondocumento.iddocumento');
        return $this->db->get()->result();
    }


    public function iteraciondocumentoCustom($dataInicial = null,$dataFinal = null, $dataInicial1 = null,$dataFinal1 = null,$nombredocumento = null ,$bTramitado=null,$bDerivado=null,$bObservado=null,$bEsperandoDocumentacion=null,$bFinalizado=null){
        $whereData = "";
        
        $whereResponsavel = "";
      
       
        

         if($nombredocumento != null){
            $whereResponsavel = "AND documentos.nombredocumento LIKE '%".$nombredocumento."%'";
        }
      




          $whereData='';
         $whereData1='';
         $whereData2='';
          $consulta="";
          $consulta2="";
       if($dataInicial != null || $dataInicial1 != null){
         
        

         if($dataInicial1 == null){
            $dataInicial1=date('Y-m-d');
         }
         if($dataInicial == null){
            $dataInicial='0000-00-00';
         }
            $whereData = "AND fechaingreso BETWEEN '".$dataInicial."' AND '".$dataInicial1."'";
        }

         if($dataFinal != null || $dataFinal1 != null){
           
            if($dataFinal1 == null){
            $dataFinal1=date('Y-m-d');
         }
         if($dataFinal == null){
            $dataFinal='0000-00-00';
         }
             $whereData1 = "AND fechaaprobacion BETWEEN ".$this->db->escape($dataFinal)." AND ".$this->db->escape($dataFinal1);
        }
       
   if($bTramitado != null || $bDerivado != null ||$bObservado != null ||$bEsperandoDocumentacion!= null ||$bFinalizado!= null )
     {
        $consulta2=" AND (";
        if($bTramitado=='1') { 
            if(substr($consulta2,-1)=="'"){ $consulta2 = $consulta2. " OR "; }  $consulta2 = $consulta2. "iteraciondocumento.estadotramite ='T'";
         }
        if($bDerivado=='1') {  if(substr($consulta2,-1)=="'"){ $consulta2 = $consulta2. " OR "; } $consulta2 = $consulta2. " iteraciondocumento.estadotramite ='D'"; }
        if($bObservado=='1') { if(substr($consulta2,-1)=="'"){ $consulta2 = $consulta2. " OR "; } $consulta2 = $consulta2. " iteraciondocumento.estadotramite ='O'"; }
        if($bEsperandoDocumentacion=='1') { if(substr($consulta2,-1)=="'"){ $consulta2 = $consulta2. " OR "; }  $consulta2 = $consulta2. " iteraciondocumento.estadotramite ='ED'"; }
        if($bFinalizado=='1') { if(substr($consulta2,-1)=="'"){ $consulta2 = $consulta2. " OR "; }  $consulta2 = $consulta2. " iteraciondocumento.estadotramite ='F'"; }
         $consulta2=$consulta2.")";
       
     }

    
     if ($whereData1!=null)
     {
        $consulta=$whereData;
     }
      if ($whereData1!=null)
     {
        $consulta=$consulta.' '.$whereData1;
     }
      if ($whereData2!=null)
     {
        $consulta=$consulta.' '.$whereData2;
     }
     /*   if ($consulta2!=null)
     {
        $consulta=$consulta;
     }*/        

        $query = "SELECT iteraciondocumento.*, documentos.nombredocumento,documentos.descripciondocumento  FROM iteraciondocumento LEFT JOIN documentos ON documentos.iddocumento = iteraciondocumento.iddocumento WHERE iditeraciondocumento != 0 $whereData $whereResponsavel $consulta $consulta2";
        return $this->db->query($query)->result();
    }
}