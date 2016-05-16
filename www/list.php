<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title>Features & scenarios</title>
</head>
<pre><?php

$dir = '../features';
$userFile = (isset($_GET['file']) ? $_GET['file'] : null);

if ($userFile) {
    if (!preg_match('/\.feature$/', $userFile)) {
        exit("Not a feature file.");
    }
    echo file_get_contents($userFile);
} else {
    $number = 1;
    foreach (glob("{$dir}/*.feature") as $file)
    {
        $description = file($file)[0];
        echo "{$number}. <a href='?file={$file}'>{$description}</a><br />";
        $number += 1;
    }
}


