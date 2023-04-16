<?php
class Logout extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        session_destroy();
        unset($_SESSION["user_email"]);
        unset($_SESSION["user_id"]);
        redirect(base_url());
    }
}