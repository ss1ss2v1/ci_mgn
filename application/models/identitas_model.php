<?php

/**
 * @author Fajrie R Aradea
 * @copyright 2013
 */



?>

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Name: Bisfren Ad Model
*
*/

class Identitas_model extends CI_Model
{
	public function __construct() {

		$this->load->database();
	   
	}
    
	public function &__get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}

    Public function count_all()
    {
        return $this->db->count_all('gl_identitas');
    } 
        
    function get_identitas_for_option($selected_unit=false)
    {
        $where = ' WHERE 1=1 ';                
        $select = 'SELECT * FROM gl_identitas ' . $where . ' ORDER BY Identitas';
        $result = $this->db->query($select);        
        $ret_='';
        if ($result->num_rows > 0) 
        {
            foreach ($result->result_array() as $res)
            {
                $ret_ .= '<option ' . (($selected_unit != $res['Identitas']) ? '' : 'selected' ) . ' values="'.$res['Identitas'].'" >'.$res['Identitas'].' - '.$res['ID_Description'].'</option>';
            }
        }
        return $ret_;                
    }
    
    function check_and_add_new_identitas($id=false, $id_name=false)
    {
        if (! $id) return false;
        $res = $this->db->where('Identitas', $id)->get('gl_identitas');
        if ($res->num_rows == 0) 
        {
            $sql_insert=array('Identitas' => $id, 'ID_Description' => $id_name);
            $this->db->insert('gl_identitas', $sql_insert);
        } 
    }

}

/* End of file flexi_auth_model.php */
/* Location: ./application/controllers/flexi_auth_model.php */
