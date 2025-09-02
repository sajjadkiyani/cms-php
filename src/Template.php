<?php

namespace src;

class Template
{

    public function view($template,$data =array())
    {
        extract($data);
        include(VIEW_PATH."layout/app.php");

    }

    public function viewModule($template,$data =array())
    {
        extract($data);
        include(MODULE_PATH."admin/dashboard/views/layout/app.php");
    }
}