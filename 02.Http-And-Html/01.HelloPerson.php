<form>
    Name: <input type="text" name="person"/>
    <input type="submit"/>
</form>

<?php
if (isset($_GET['person'])) {
    $name = $_GET['person'];
}
echo "Hello, " . htmlspecialchars($name) . "!";
