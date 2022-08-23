<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class iteraciondocumento_model extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields.',documentos.nombredocumento,documentos.tipotramite_id,documentos.apellidopaternoremitente,documentos.apellidomaternoremitente,
            documentos.nombresremitente,tipotramite.nombretipotramite');
        $this->db->from($table);
        $this->db->join('documentos','iteraciondocumento.iddocumento=documentos.iddocumento');
         $this->db->join('tipotramite',' tipotramite.idtipotramite = documentos.tipotramite_id');

        $this->db->limit($perpage,$start);
        $this->db->order_by('iditeraciondocumento','desc');
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }



     public function search($nombredoc, $dniremiten){
        
        if($nombredoc != null){
            $this->db->like('nombredocumento',$nombredoc);
        }

        if($dnisolicitan != null){
          $this->db->like('dniremitente',$dniremiten);
        }
          $this->db->join('tipotramite','tipotramite.idtipotramite = documentos.tipotramite_id');

        $this->db->limit(10);
        return $this->db->get('documentos')->result();
    }

    function getById($id){
        $this->db->where('iditeraciondocumento',$id);
        $this->db->limit(1);
        return $this->db->get('iteraciondocumento')->row();
    }
 function getarea($id){
        $this->db->where('idarea',$id);
        $this->db->limit(1);
        return $this->db->get('area')->row();
    }

 function getTodasAreas(){
$query = $this->db->query("SELECT * FROM area");
$result = $query->result_array();
return $result;
    }

     function getpermisos(){
$query = $this->db->query("SELECT * FROM permisos");
$result = $query->result_array();
return $result;
    }

    
    function getSiguientesSecuenciasTramites($q){
    $query = $this->db->query("SELECT secuenciatramite.*,area.nombrearea FROM secuenciatramite, area WHERE area.idarea=secuenciatramite.idarea AND codsecuenciaprevia='".$q."'");
$result = $query->result_array();
return $result;
    }


    function getdocumentos($id){
        $this->db->where('iddocumento',$id);
        $this->db->limit(1);
        return $this->db->get('documentos')->row();
    }
    public function gettipotramite($id){
      $this->db->where('idtipotramite',$id);
        $this->db->limit(1);
        return $this->db->get('tipotramite')->row();
    }




public function getdnidesencriptado($dni){
$this->load->library('encrypt');

$cantidad=$this->db->count_all('usuarios');
$desencriptado='0';
    
for($i = 0;$i<=$cantidad;$i++)
{
$query = $this->db->query("SELECT dni FROM usuarios where idUsuarios = ".$i." LIMIT 1");
$row = $query->row();

 @$dniencrip= $this->encrypt->sha1($row->dni);

if($dni==$dniencrip)
{
@$desencriptado=$row->dni;
}
else{


}
$query='';

}


return $desencriptado;

}

    
    function add($table,$data,$returnId = false){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
                        if($returnId == true){
                            return $this->db->insert_id($table);
                        }
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

    function count($table){
	return $this->db->count_all($table);
    }

    public function autoCompleteTipotramite($q){

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('descricao', $q);
        $query = $this->db->get('tipotramite');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['descricao'].' | Precio: € '.$row['precoiteraciondocumento'].' | Stock: '.$row['estoque'],'estoque'=>$row['estoque'],'id'=>$row['idtipotramite'],'preco'=>$row['precoiteraciondocumento']);
            }
            echo json_encode($row_set);
        }
    }


  public function autoCompleteSiguienteSecuenciatramite($q,$val){
  
  $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nombresecuencia', $q);
        $this->db->where('codsecuenciaprevia ==',$val);
        $query = $this->db->get('secuenciatramite');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['nombresecuencia'] ,'codsecuencia'=>$row['codsecuencia']);
            }
            echo json_encode($row_set);
        }
    }



  public function valorSecuentramite($q){
  
$this->db->select('*');
        $this->db->from('secuenciatramite');
        $this->db->where('codsecuenciatramite',$q);
        return $this->db->get()->result();
    }

    

    public function autoCompleteArea($q){

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nombrearea', $q);
        $query = $this->db->get('area');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['nombrearea'].' | Teléfono: '.$row['telefono'],'id'=>$row['idarea']);
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteUsuario($q){

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nome', $q);
        $this->db->where('estadopermiso',1);
        $query = $this->db->get('usuarios');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['nome'].' | Teléfono: '.$row['telefono'],'id'=>$row['idUsuarios']);
            }
            echo json_encode($row_set);
        }
    }



        public function autoCompleteAreaSiguiente($q,$area){

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nombrearea', $q);
        $this->db->where('idarea !=',$area);
        $query = $this->db->get('area');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['nombrearea'] ,'id'=>$row['idarea']);
            }
            echo json_encode($row_set);
        }
    }

  public function getUsuarios($id){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('idUsuarios',$id);
        return $this->db->get()->result();
    }

  public function getUsuariosDNI($dni){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('dni',$dni);
        return $this->db->get()->result();
    }


     public function autoCompleteAre($q){

        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nombretipotramite', $q);
        $query = $this->db->get('tipotramite');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['nombretipotramite'],'id'=>$row['idtipotramite']);
            }
            echo json_encode($row_set);
        }
    }

}

/* End of file iteraciondocumento_model.php */
/* Location: ./application/models/iteraciondocumento_model.php */