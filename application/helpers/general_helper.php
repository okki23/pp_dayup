<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function initialize_elfinder($value = '') {
    $CI = & get_instance();
    $CI->load->helper('path');
    $opts = array(
        //'debug' => true, 
        'roots' => array(
            array(
                'driver' => 'LocalFileSystem',
                'path' => './file_manager_dir',
                'URL' => base_url('file_manager_dir')
            // more elFinder options here
            )
        )
    );

    return $opts;
}

 