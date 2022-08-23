<?php
class documentos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){

$datausuario = $this->getUsuarios($this->session->userdata('id'));
        
        $this->db->distinct();
             $this->db->select('documentos.iddocumento, documentos.tipotramite_id, documentos.nombredocumento, documentos.descripciondocumento, documentos.estado, 
                documentos.dniremitente, documentos.emailremitente, documentos.apellidopaternoremitente, documentos.apellidomaternoremitente, documentos.nombresremitente, 
                documentos.fechaingreso, documentos.fechafin, documentos.observaciones, documentos.archivodocumento,tipotramite.nombretipotramite');
        $this->db->from($table);

$this->db->join('tipotramite','tipotramite.idtipotramite = documentos.tipotramite_id','INNER');
$this->db->join('iteraciondocumento','iteraciondocumento.iddocumento = documentos.iddocumento','INNER');

        $this->db->limit($perpage,$start);
        $this->db->order_by('documentos.iddocumento','desc');

          $this->db->where('tipotramite.idtipotramite = documentos.tipotramite_id AND iteraciondocumento.iddocumento = documentos.iddocumento AND iteraciondocumento.idareaactual =  '.$datausuario[0]->idarea. ' OR iteraciondocumento.iddocumento = ' .$datausuario[0]->idarea);  
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;



    }

 public function search($nombredoc, $dnisolicitan){
        
        if($nombredoc != null){
            $this->db->like('nombredocumento',$nombredoc);
        }

        if($dnisolicitan != null){
          $this->db->like('dniremitente',$dnisolicitan);
        }
          $this->db->join('tipotramite','tipotramite.idtipotramite = documentos.tipotramite_id');

        $this->db->limit(10);
        return $this->db->get('documentos')->result();
    }

    function getById($id){
        $this->db->where('iddocumento',$id);
        $this->db->limit(1);
        return $this->db->get('documentos')->row();
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
	
	function count($table){

        return $this->db->count_all_results($table);
	
    }

 public function gettipotramite($id){
        $this->db->where('idtipotramite',$id);
       return $this->db->get('tipotramite')->row();
    }

  public function getUsuarios($id){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('idUsuarios',$id);
        return $this->db->get()->result();
    }




public function nombretipotramite($q){

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


  public function consultainiciodocumento($q){
        $this->db->select('*');
        $this->db->from('secuenciatramite');
        $this->db->where('nombresecuencia',$q);
        return $this->db->get()->result();
    }


    public function autoCompleteTipotramite($q){

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