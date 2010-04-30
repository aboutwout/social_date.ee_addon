<?php if (!defined('EXT')) exit('Invalid file request');

$plugin_info = array(
	'pi_name'			=> 'Social Date',
	'pi_version'		=> '1.0',
	'pi_author'			=> 'Wouter Vervloet',
	'pi_author_url'		=> '',
	'pi_description'	=> 'Displays a nice date.',
	'pi_usage'			=> Social_date::usage()
);

/**
* Social Date Plugin class
*
* @package			social_date-ee2_addon
* @version			0.1
* @author			Wouter Vervloet <wouter@baseworks.nl>
* @license			http://creativecommons.org/licenses/by-sa/3.0/
*/
class Social_date {

	/**
	* Plugin return data
	*
	* @var	string
	*/
	var $return_data;

	/**
	* PHP4 Constructor
	*
	* @see	__construct()
	*/
	function Social_date($date='')
	{
		$this->__construct($date);
	}


	/**
	* PHP5 Constructor
	*
	* @param	string	$date
	* @return	string
	*/
	function __construct($date='')
	{
	  global $TMPL;

    if ($date == '') {
      $date = $TMPL->fetch_param('date');
    }
    
    if($date == 0) return;
    
    $timestamp = is_numeric($date) ? $date : strtotime($date);
    
    $parts = array(
      array('second', 60,  1),
      array('minute', 60, 60),
      array('hour', 24, 3600),
      array('day', 7, 86400),
      array('week', 4, 604800),
      array('month', 12, 2419200),
      array('year', 999, 29030400)
    );

    $diff = time() - $timestamp;



    foreach ($parts as $key => $part) {

      $period = floor(abs($diff) / $part[2]);

      if ($period > $part[1]) continue;

      $p = ($period == 1) ? $part[0] : $part[0].'s';

      return $this->return_data .=  ($diff < 0) ? 'in about '.$period.' '.$p : $period.' '.$p.' ago ('.$key.')';
    }	

	}


	/**
	* Plugin Usage
	*
	* @return	string
	*/    
	function usage()
	{
		ob_start(); 
		?>
		
			{exp:social_date date="2007-05-20"}
			
		<?php
		$buffer = ob_get_contents();
  
		ob_end_clean(); 

		return $buffer;
	}

	// --------------------------------------------------------------------

}
// END CLASS

/* End of file pi.social_date.php */