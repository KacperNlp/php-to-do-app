<?php

declare(strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

function dump($data): void
{
    echo '<div 
    style="
        display: inline-block;
        background: #dedede;
        padding: 10px 30px;
        border: 1px solid #000;
    "><prev>';
    print_r($data);
    echo '</prev>
    </div>';
};