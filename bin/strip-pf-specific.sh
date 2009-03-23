#!/usr/bin/php
<?php
    $sCurrentDir = dirname(__FILE__).'/';
    
    if (count($argv) > 1) {
        array_shift($argv);
        
        foreach ($argv as $sFilename) {
            $sFullPath = realpath($sCurrentDir.$sFilename);
            
            $sContents = file_get_contents($sFullPath);
            $sContents = preg_replace("/\/\* PF_REMOVE \*\/.*\/\* END_PF_REMOVE \*\//sU", '', $sContents);
            $sContents = preg_replace("/<!-- PF_REMOVE -->.*<!-- END_PF_REMOVE -->/sU", '', $sContents);
            
            file_put_contents($sFullPath, $sContents);
            
            echo "Processed file...$sFullPath\n";
        }
    }
?>
