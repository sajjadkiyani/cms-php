<?php

namespace src;

class Template
{

    public function view($template)
    {
        include(VIEW_PATH.$template.".php");
    }
}