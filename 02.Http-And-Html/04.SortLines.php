<?php
$sortedLines = '';
if (isset($_GET['lines'])) {
    $lines = array_map("trim", explode("\n", $_GET['lines']));
    sort($lines);
    $sortedLines = implode("\n", $lines);
}
?>

<form>
  <textarea rows="10" name="lines"><?= $sortedLines?></textarea> <br>
    <input type="submit" value="Sort">
</form>