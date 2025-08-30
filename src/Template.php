<?php

namespace src;

class Template
{

    public function view($template,$data =array())
    {
        extract($data);
        include(VIEW_PATH."layout/app.php");
    }
}