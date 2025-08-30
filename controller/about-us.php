<?php
use src\Controller;
use src\Template;

class AboutUsController extends Controller {

    public function showAction()
    {
        $data['title'] = "About Us";
        $data['content'] = "about-us page ";
        $template = new Template();
        $template->view("about-us",$data);
    }
}