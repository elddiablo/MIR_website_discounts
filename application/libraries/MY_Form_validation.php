<?php 

	class MY_Form_validation extends CI_Form_validation {
	     protected $CI;
	     function __construct() {
	        parent::__construct();
	                // reference to the CodeIgniter super object 
	         $this->CI =& get_instance();
	    }
	       function validate_name($str) {           
	         $this->CI->form_validation->set_message('validate_name','Title should contain less than 20 characters!');
	         if(strlen($str) <= 20) { // do your validations
	                return TRUE;
	          } else {
	              return FALSE;
	          }
	       }
	}

?>