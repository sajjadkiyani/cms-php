<?php
use src\Controller;

class AboutUsController extends Controller {

    public function showAction()
    {
        include("../view/about-us.php");
    }
}