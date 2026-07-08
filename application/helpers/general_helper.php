<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * General purpose helpers used across the CMS.
 */

if ( ! function_exists('slugify'))
{
    /**
     * Convert a string into a URL friendly slug.
     */
    function slugify($text)
    {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        $text = trim($text, '-');
        return $text ?: 'n-a';
    }
}

if ( ! function_exists('upload_url'))
{
    /**
     * Build a public URL for an uploaded file, with a fallback.
     */
    function upload_url($path, $fallback = 'assets/images/placeholder.svg')
    {
        if (empty($path))
        {
            return base_url($fallback);
        }
        return base_url('assets/uploads/' . ltrim($path, '/'));
    }
}

if ( ! function_exists('setting'))
{
    /**
     * Read a value from the shared settings array (loaded into views).
     */
    function setting($key, $default = '')
    {
        $CI =& get_instance();
        $settings = $CI->load->get_var('settings');
        return isset($settings[$key]) ? $settings[$key] : $default;
    }
}

if ( ! function_exists('format_date'))
{
    function format_date($date, $format = 'd M Y')
    {
        if (empty($date) || $date === '0000-00-00') return '-';
        return date($format, strtotime($date));
    }
}

if ( ! function_exists('excerpt'))
{
    function excerpt($text, $limit = 140)
    {
        $text = trim(strip_tags($text));
        if (mb_strlen($text) <= $limit) return $text;
        return mb_substr($text, 0, $limit) . '…';
    }
}

if ( ! function_exists('active_class'))
{
    /**
     * Return $class when the current admin section matches $name.
     */
    function active_class($name, $active, $class = 'active')
    {
        return ($name === $active) ? $class : '';
    }
}

if ( ! function_exists('e'))
{
    /**
     * Escape output for HTML context.
     */
    function e($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if ( ! function_exists('handle_upload'))
{
    /**
     * Upload a file for an admin form field.
     *
     * @param string $field   name attribute of the file input
     * @param string $folder  sub-folder under assets/uploads/
     * @param string $types   allowed types e.g. 'jpg|jpeg|png|webp|gif|svg'
     * @return string|null    stored filename, or NULL when no file / on error
     */
    function handle_upload($field, $folder, $types = 'jpg|jpeg|png|webp|gif|svg')
    {
        $CI =& get_instance();

        if (empty($_FILES[$field]['name']))
        {
            return NULL;
        }

        $path = FCPATH . 'assets/uploads/' . trim($folder, '/') . '/';
        if ( ! is_dir($path)) @mkdir($path, 0775, TRUE);

        $config = array(
            'upload_path'   => $path,
            'allowed_types' => $types,
            'max_size'      => 8192, // 8 MB
            'file_name'     => $folder . '_' . uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\.]/', '', $_FILES[$field]['name']),
            'encrypt_name'  => FALSE,
        );

        $CI->load->library('upload', $config);
        $CI->upload->initialize($config);

        if ($CI->upload->do_upload($field))
        {
            return $CI->upload->data('file_name');
        }

        $CI->session->set_flashdata('error', $CI->upload->display_errors('', ''));
        return NULL;
    }
}

if ( ! function_exists('delete_upload'))
{
    function delete_upload($folder, $filename)
    {
        if (empty($filename)) return;
        $file = FCPATH . 'assets/uploads/' . trim($folder, '/') . '/' . $filename;
        if (is_file($file)) @unlink($file);
    }
}

if ( ! function_exists('rating_stars'))
{
    function rating_stars($rating)
    {
        $rating = (int) $rating;
        $out = '';
        for ($i = 1; $i <= 5; $i++)
        {
            $out .= '<i class="bi bi-star' . ($i <= $rating ? '-fill' : '') . '"></i>';
        }
        return $out;
    }
}
