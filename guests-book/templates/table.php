<?php

echo "<table class='table'>";

foreach ($table as $row) {
    echo '<tr>';
    foreach ($row as $value){
        echo "<td>$value</td>";
    }
    echo '</tr>';
}

echo '</table>';
?>
<form method="POST" action="?action=add" class="form">
    <textarea name="text"></textarea>
    <input type="text" name="name" value="Name">
    <input type="submit" value="Ok">
</form>