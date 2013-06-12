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

class Project_model extends CI_Model
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
        return $this->db->count_all('gl_projects');
    } 
        
    function get_project_for_option($selected_unit=false)
    {
        $where = ' WHERE 1=1 ';                
        $select = 'SELECT * FROM gl_projects ' . $where . ' ORDER BY Project_Contract_Number';
        $result = $this->db->query($select);        
        $ret_='';
        //$ret_='<option values="Non-Proyek">00000 - Non Proyek/Order</option>';
        if ($result->num_rows > 0) 
        {
            foreach ($result->result_array() as $res)
            {
                $ret_ .= '<option ' . (($selected_unit != $res['Project_Contract_Number']) ? '' : 'selected' ) . ' values="'.$res['Project_Contract_Number'].'" >'.$res['Project_Contract_Number'].' - '.$res['Description'].'</option>';
            }
        }
        return $ret_;                
    }
    
    function check_and_add_new_project($id=false, $id_name=false)
    {
        if (! $id) return false;        
        $res = $this->db->where('Project_Contract_Number', $id)->get('gl_projects');
        if ($res->num_rows == 0) 
        {
            $sql_insert=array('Project_Contract_Number' => $id, 'Description' => $id_name);
            $this->db->insert('gl_projects', $sql_insert);
        } 
    }

}

/* End of file flexi_auth_model.php */
/* Location: ./application/controllers/flexi_auth_model.php */
