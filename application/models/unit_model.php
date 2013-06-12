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

class Unit_model extends CI_Model
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
        return $this->db->count_all('gl_profit_centers');
    } 
        
    function get_unit_for_option($selected_unit=false)
    {
        $where = ' WHERE 1=1 AND Unit_Is_Active=1 ';                
        $select = 'SELECT Unit_Code, Unit_Name FROM gl_profit_centers ' . $where . ' ORDER BY Unit_Code';
        $result = $this->db->query($select);        
        $ret_='';
        if ($result->num_rows > 0) 
        {
            foreach ($result->result_array() as $res)
            {
                $ret_ .= '<option ' . (($selected_unit != $res['Unit_Code']) ? '' : 'selected' ) . ' values="'.$res['Unit_Code'].'" >'.$res['Unit_Code'].' - '.$res['Unit_Name'].'</option>';
            }
        }
        return $ret_;        
                
    }
    

}

/* End of file flexi_auth_model.php */
/* Location: ./application/controllers/flexi_auth_model.php */
