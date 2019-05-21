<form>
    <textarea rows='10' name="input" ></textarea><br/>
    <input type="submit" value="Count words">
</form>

<?php
if (isset($_GET['input'])) {
    $text = trim($_GET['input']);
    preg_match_all('/[a-zA-Z]+/', $text, $words);
    $words = array_map('strtolower', $words[0]);
    $newArr = [];
    foreach ($words as $item) {
        if (!key_exists($item, $newArr)) {
            $newArr[$item] = 0;
        }
        $newArr[$item]++;
    }

    echo "<table border='2'>";
    foreach ($newArr as $word => $count) {
        echo "<tr><td>$word</td><td>$count</td></tr>";
    }
    echo "</table>";
}
?>