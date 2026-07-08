<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
    }

    public function index()
    {
        if ($this->input->method() === 'post')
        {
            $keys = array(
                'site_title', 'meta_title', 'meta_description', 'meta_keywords',
                'google_analytics', 'facebook_pixel', 'whatsapp', 'map_embed',
            );
            $pairs = array();
            foreach ($keys as $k)
            {
                $pairs[$k] = $this->input->post($k, TRUE);
            }
            $pairs['maintenance_mode'] = $this->input->post('maintenance_mode') ? '1' : '0';
            $pairs['dark_mode']        = $this->input->post('dark_mode') ? '1' : '0';

            // Logo / favicon uploads (store folder-relative path for upload_url()).
            if ($logo = handle_upload('logo', 'profile')) $pairs['logo'] = 'profile/' . $logo;
            if ($fav  = handle_upload('favicon', 'profile', 'png|ico|svg|jpg')) $pairs['favicon'] = 'profile/' . $fav;

            $this->Setting_model->set_many($pairs);
            $this->session->set_flashdata('success', 'Settings saved.');
            redirect('admin/settings');
        }

        $this->render('settings/index', array(
            'page_title' => 'Settings',
            's'          => $this->Setting_model->all_kv(),
        ), 'settings');
    }
}
