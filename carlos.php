<?php 
// $iterator = new DirectoryIterator('/var/www');
 
// foreach ( $iterator as $entry ) {
//     echo $entry->getFilename(), "
// ";
// }

$diretorios = new DirectoryIterator('/var/www/html');

foreach ($diretorios as  $value) {
    echo $value->getFilename(). PHP_EOL;
}