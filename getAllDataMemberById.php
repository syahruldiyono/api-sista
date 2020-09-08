<?php 
include "koneksi.php";

$member_id = $_GET['member_id']; 

$sql = "SELECT * FROM member AS m
    LEFT JOIN mst_member_type AS t ON t.member_type_id=m.member_type_id
    WHERE m.member_id=$member_id";


$query = mysqli_query($koneksi, $sql);
$dt = mysqli_fetch_array($query);

		$member_id = $dt['member_id'];
		$member_name = $dt['member_name'];
		$member_type_name = $dt['member_type_name'];
		$gender = $dt['gender'];
		$member_phone = $dt['member_phone'];
		$member_address = $dt['member_address'];


// $total = count($dt['member_id']);

//menampung data yang dihasilkan
if ($query) {
	$json = array(
	'result' => 'success' ,
	'member_id' => $member_id, 
	'member_name' => $member_name, 
	'member_type_name' => $member_type_name,
	'gender' => $gender, 
	'member_phone' => $member_phone,
	'member_address' => $member_address, 
);

// merubah data dalam bentuk json
echo json_encode($json);
}else {
	$json = array(
	'result' => 'Data Tidak Ditemukan' ,
	
);

// merubah data dalam bentuk json
echo json_encode($json);
}

?>