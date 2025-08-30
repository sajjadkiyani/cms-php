<?php

namespace src;

class Template
{

    public function view($template)
    {
        include("../view/".$template.".php");
    }
}