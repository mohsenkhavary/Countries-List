<?php

function get_countries_list()
{
    $api_url = 'countries.json';
    $json = file_get_contents($api_url);
    $ar = json_decode($json, true);
    return $ar;
}
?>