<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Social_date Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			Wouter Vervloet <wouter@baseworks.nl> (EE2 port by Aaron Gustafson <aaron@easy-designs.net>)
 * @copyright		http://creativecommons.org/licenses/by-sa/3.0/
 */

$plugin_info = array(
	'pi_name'			=> 'Social Date',
	'pi_version'		=> '1.0',
	'pi_author'			=> 'Wouter Vervloet (EE2 port by Aaron Gustafson)',
	'pi_author_url'		=> 'http://baseworks.nl/',
	'pi_description'	=> 'Displays a nice date.',
	'pi_usage'			=> Social_date::usage()
);

class Social_date {

	/**
	* Plugin return data
	*
	* @var	string
	*/
	var $return_data;
	
	var $addon_name = 'social_date';
	
	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	void
	 */
	function Social_date($date='')
	{
		$this->EE =& get_instance();
		
		# get the language file
		$this->EE->lang->loadfile($this->addon_name);

		# collect the date
		if ( empty($date) ) $date = $this->EE->TMPL->fetch_param('date');
		if ( empty($date) ) $date = $this->EE->TMPL->tagdata;
		if ( empty($date) ) return;
		
		$timestamp = is_numeric($date) ? $date : strtotime($date);
		
		$parts = array(
			array('second', 60,	 1),
			array('minute', 60, 60),
			array('hour', 24, 3600),
			array('day', 7, 86400),
			array('week', 4, 604800),
			array('month', 12, 2419200),
			array('year', 999, 29030400)
		);
		
		$diff = time() - $timestamp;

		foreach ($parts as $key => $part)
		{
			$period = floor(abs($diff) / $part[2]);
			if ($period > $part[1]) continue;
			$p = $this->EE->lang->line( ($period == 1) ? $part[0] : $part[0].'s' );
			
			# build the string
			$swap = array(
				'period'	=>	$period,
				'p'			=>	$p,
				'key'		=>	$key
			);
			$str = $this->EE->lang->line( ($diff < 0) ? 'future' : 'past' );
			
			$this->return_data = $this->EE->functions->var_swap( $str, $swap );
			return $this->return_data;
		}
	}

	/**
	* Plugin Usage
	*
	* @return	string
	*/	  
	function usage()
	{
		ob_start(); ?>
		
			{exp:social_date date="2007-05-20"}
			
			or
			
			{exp:social_date}{entry_date}{/exp:social_date}
			
<?php	$buffer = ob_get_contents();
		ob_end_clean(); 
		return $buffer;
	}

	// --------------------------------------------------------------------

} # end Social_date

/* End of file pi.social_date.php */ 
/* Location: ./system/expressionengine/third_party/social_date/pi.social_date.php */