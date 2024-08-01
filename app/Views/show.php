<?php
if(!empty($posts)){
    echo '<h1> User data </h1>';
    echo '<table>';
    foreach($posts as $key => $value){
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo '</table>';
}
?>

