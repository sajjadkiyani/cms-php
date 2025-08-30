<?php
use src\Controller;
use src\Template;

class AboutUsController extends Controller {

    public function showAction()
    {
        $template = new Template();
        $template->view("about-us");
    }
}