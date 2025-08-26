<?php

$json = file_get_contents('php://input');
$data = json_decode($json, 1); // masyvas

$data['gavau'] = true;

$jsonBack = json_encode($data);

echo $jsonBack;