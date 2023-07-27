<?php
//simple database to json conversion script
// Writen by Mohammad Hafiz bin Ismail

/***
    Copyright (c) 2021 by Mohammad Hafiz bin Ismail (mypapit@gmail.com)
    Redistribution and use in source and binary forms, with or without
    modification, are permitted provided that the following conditions are met:

    1. Redistributions of source code must retain the above copyright notice, this list
    of conditions and the following disclaimer.

    2. Redistributions in binary form must
    reproduce the above copyright notice, this list of conditions and the following
    disclaimer in the documentation and/or other materials provided with the
    distribution.

    THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
    REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY AND
    FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
    INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM LOSS
    OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR OTHER
    TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF
    THIS SOFTWARE.
***/


require_once('db.php');


//select semua row dari table maklumat
// SQL Query ini boleh ditukar ganti mengikut kesesuaian
// contohnya boleh set LIMIT, WHERE, ORDER, dan GROUP
$query = "SELECT * FROM location";
$result=mysqli_query($link,$query);

//declare array
$output = array();

//tambahkan row kepada array untuk setiap baris rekod...
foreach ($result as $row) {
 array_push($output,$row);


}

// assign to json variable
$json=json_encode($output);

//declare document type to json and output json
header("Content-Type: application/json");
echo $json;




?>
