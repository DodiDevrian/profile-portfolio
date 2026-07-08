<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base controllers.
 *  - MY_Controller : shared helpers/state for every controller.
 *  - Public_Controller : front-end pages, loads global site data.
 *  - Admin_Controller  : admin area, enforces session authentication.
 */
class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'general'));
    }
}

class Public_Controller extends MY_Controller {

    protected $settings = array();

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array('Setting_model', 'Profile_model', 'Social_model'));
        $this->settings = $this->Setting_model->all_kv();

        // Data shared across every public view.
        $this->load->vars(array(
            'settings' => $this->settings,
            'profile'  => $this->Profile_model->get(),
            'socials'  => $this->Social_model->all(),
        ));
    }
}

class Admin_Controller extends MY_Controller {

    protected $user;

    public function __construct()
    {
        parent::__construct();

        if ( ! $this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Please sign in to continue.');
            redirect('login');
        }

        $this->user = array(
            'id'    => $this->session->userdata('user_id'),
            'name'  => $this->session->userdata('user_name'),
            'email' => $this->session->userdata('user_email'),
            'avatar'=> $this->session->userdata('user_avatar'),
        );

        $this->load->model(array('Setting_model', 'Message_model'));
        $this->load->vars(array(
            'auth_user'    => $this->user,
            'settings'     => $this->Setting_model->all_kv(),
            'unread_count' => $this->Message_model->unread_count(),
        ));
    }

    /**
     * Render an admin page wrapped in the admin layout.
     */
    protected function render($view, $data = array(), $active = '')
    {
        $data['active'] = $active;
        $data['content_view'] = $view;
        $this->load->view('admin/layout', $data);
    }
}
