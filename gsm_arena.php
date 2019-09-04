<?php
	$conn = new mysqli("127.0.0.1", "slipcodi_admin", "123456zxc", "slipcodi_berakal");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$jsondata = file_get_contents('vivo1.json');
    $data = json_decode($jsondata, true);
    foreach ($data['rows'] as $k => $rs) {
    	$brand = 'vivo';
        $name = (isset($rs[0]) && $rs[0] != null) ? $brand.' '.$rs[0] : '';
        $image = (isset($rs[1]) && $rs[1] != null) ? $rs[1] : '';
    	$sql = "INSERT INTO gadget(DeviceName, Brand, image) VALUES('$name', '$brand', '$image')";
    	
        //$name = (isset($rs[0]) && $rs[0] != null) ? 'Samsung '.$rs[0] : '';
        //$image = (isset($rs[1]) && $rs[1] != null) ? $rs[1] : '';
        //$sql = "UPDATE gadget SET image='".$image."' WHERE DeviceName='".$name."'";

        if ($conn->query($sql) === TRUE) {
            echo "SUCCESS".$k."<br/>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>