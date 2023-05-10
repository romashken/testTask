<?php

class BaseController
{
    public function getJsonData()
    {
        $post_data = json_decode(file_get_contents('php://input'));
        return $post_data;
    }
}
