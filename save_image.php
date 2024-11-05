<?php

$id = $_POST['id'];
$imageDataURL = $_POST['imageDataURL'];

list($type, $data) = explode(';', $imageDataURL);
list(, $data) = explode(',', $data);

$data = base64_decode($data);

$filename = "uploads/certificate/{$id}.jpeg";
file_put_contents($filename, $data);

echo json_encode(['success' => true]);
?>