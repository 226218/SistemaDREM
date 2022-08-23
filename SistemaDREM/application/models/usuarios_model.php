<?php
class Usuarios_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    

    function get($perpage=0,$start=0,$one=false){
        
        $this->db->from('usuarios');
        $this->db->select('usuarios.*, permisos.cargo as permiso');
        $this->db->limit($perpage,$start);
        $this->db->join('permisos', 'usuarios.permisos_id = permisos.idPermiso', 'left');
  
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

     function getAllTipos(){
        $this->db->where('estadopermiso',1);
        return $this->db->get('tiposUsuario')->result();
    }

    function getById($id){
        $this->db->where('idUsuarios',$id);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
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
		return $this->db->count_all($table);
	}


    

     public function alterarfotoperfil($imagen,$id){

        $this->db->where('idUsuarios', $id);
        $this->db->limit(1);
        $usuario = $this->db->get('usuarios')->row();

        if($usuario->fotoperfil != $imagen){
            return false;
        }
        else{
            $this->db->set('fotoperfil',$imagen);
            $this->db->where('idUsuarios',$id);
            return $this->db->update('usuarios');    
        }

        
    }



}