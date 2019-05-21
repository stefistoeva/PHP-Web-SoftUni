<form>
    <textarea rows='10' name="input" ></textarea><br/>
    <input type="submit" value="Color text">
</form>

<?php
$output = "";
if (isset($_GET['input'])) {
    $input = $_GET['input'];
    $input = htmlspecialchars(str_replace(" ","", $input));

    for ($i = 0; $i < strlen($input); $i++) {
        $ord = ord($input[$i]);
        if ($ord % 2 === 1) {
            $chr = chr($ord);
            $output .= "<span style='color: blue'>$chr</span>";
        } else {
            $chr = chr($ord);
            $output .= "<span style='color: red'>$chr</span>";
        }
        if ($i !== strlen($input) - 1) {
            $output .= " ";
        }
    }
}
echo $output;