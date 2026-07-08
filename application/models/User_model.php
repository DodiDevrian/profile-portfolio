<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

    protected $table = 'users';

    public function by_email($email)
    {
        return $this->find_by('email', $email);
    }

    public function verify($email, $password)
    {
        $user = $this->by_email($email);
        if ($user && password_verify($password, $user['password']))
        {
            return $user;
        }
        return FALSE;
    }

    public function set_password($id, $plain)
    {
        return $this->update($id, array('password' => password_hash($plain, PASSWORD_DEFAULT)));
    }

    public function set_reset_token($email, $token, $expires)
    {
        return $this->db->where('email', $email)->update($this->table, array(
            'reset_token'   => $token,
            'reset_expires' => $expires,
        ));
    }
}
