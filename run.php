<?php

$parsedFilesPath = 'parsed';
$sourceFilesPath = 'files';
$layoutFile = 'layout.html';

$files = array_diff(scandir($sourceFilesPath), array('..', '.', 'layout.html'));
$layoutContent = file_get_contents($sourceFilesPath.'/'.$layoutFile);

foreach($files as $file){
    $fileContent = file_get_contents($sourceFilesPath.'/'.$file);
    $parsedFileContent = str_replace('{{content}}', $fileContent, $layoutContent);
    $parsedFilePath = $parsedFilesPath.'/'.$file;
    file_put_contents($parsedFilePath, $parsedFileContent);
}