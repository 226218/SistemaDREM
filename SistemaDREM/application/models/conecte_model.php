<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conecte_model extends CI_Model {


	public function getLastOs($Area){
		
		$this->db->where('area_id',$Area);
		$this->db->limit(5);

		return $this->db->get('os')->result();
	}	

	public function getLastCompras($Area){
		
		$this->db->select('iteraciondocumento.*,usuarios.nome');
		$this->db->from('iteraciondocumento');
		$this->db->join('usuarios', 'usuarios.idUsuarios = iteraciondocumento.usuarios_id');
		$this->db->where('area_id',$Area);
		$this->db->limit(5);

		return $this->db->get()->result();
	}

	public function getCompras($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array',$Area){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->join('usuarios', 'iteraciondocumento.usuarios_id = usuarios.idUsuarios', 'left');
        $this->db->where('area_id', $Area);
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    public function count($table,$Area){
    	$this->db->where('area_id', $Area);
		return $this->db->count_all($table);
	}

    public function getDados(){
        
        $this->db->where('idarea',$this->session->userdata('id'));
        $this->db->limit(1);
        return $this->db->get('area')->row();
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

}

/* End of file conecte_model.php */
/* Location: ./application/models/conecte_model.php */