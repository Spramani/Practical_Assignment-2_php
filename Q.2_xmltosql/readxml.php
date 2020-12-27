<?php
$conn = mysqli_connect("localhost", "root", "root", "phppract");

$affectedRow = 0;

$xml = simplexml_load_file("student.xml") or die("Error: Cannot create object");

foreach ($xml->children() as $row) {
    $name = $row->name;
    $standard = $row->standard;
    $address = $row->address;
    
    
    $sql = "INSERT INTO student(name,standard,address) VALUES ('" . $name . "','" . $standard . "','" . $address . "')";
    
    $result = mysqli_query($conn, $sql);
    
    if (! empty($result)) {
        $affectedRow ++;
    } else {
        $error_message = mysqli_error($conn) . "\n";
    }
}
?>
<h2>Insert XML Data to MySql Table Output</h2>
<?php
if ($affectedRow > 0) {
    $message = $affectedRow . " records inserted";
} else {
    $message = "No records inserted";
}

?>

<style>
body {
	max-width: 550px;
	font-family: Arial;
}

.affected-row {
	background: #cae4ca;
	padding: 10px;
	margin-bottom: 20px;
	border: #bdd6bd 1px solid;
	border-radius: 2px;
	color: #6e716e;
}

.error-message {
	background: #eac0c0;
	padding: 10px;
	margin-bottom: 20px;
	border: #dab2b2 1px solid;
	border-radius: 2px;
	color: #5d5b5b;
}
</style>
<div class="affected-row">
    <?php  echo $message; ?>
</div>
<?php if (! empty($error_message)) { ?>
<div class="error-message">
    <?php echo nl2br($error_message); ?>
</div>
<?php } ?>