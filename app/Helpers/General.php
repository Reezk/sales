<?php

use Illuminate\Support\Facades\Config;



function uploadImage($folder, $image)
{
    $extension = strtolower($image->extension());
    $filename = time() . rand(100, 9999) . '.' . $extension;
    $image->getClientOrignalName = $filename;
    $image->move($folder, $filename);
    return $filename;
}
