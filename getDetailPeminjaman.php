<?php 
include "koneksi.php";

$loan_id = $_GET['loan_id']; 

$sql = "SELECT * FROM loan AS l
    LEFT JOIN member AS m ON l.member_id=m.member_id
    LEFT JOIN mst_member_type AS t ON t.member_type_id=m.member_type_id
    LEFT JOIN item AS i ON l.item_code=i.item_code
    LEFT JOIN biblio AS b ON i.biblio_id=b.biblio_id
    WHERE l.loan_id=$loan_id";


$query = mysqli_query($koneksi, $sql);
$dt = mysqli_fetch_array($query);

$data = array(
	'loan_id' => $dt['loan_id'] , 
	'member_id' => $dt['member_id'] , 
	'item_code' => $dt['item_code'] , 
	'title' => $dt['title'] , 
	'member_name' => $dt['member_name'] , 
	'member_type_name' => $dt['member_type_name'] , 
	'loan_date' => $dt['loan_date'] , 
	'due_date' => $dt['due_date'] , 
);


$total = mysqli_num_rows($query);

//menampung data yang dihasilkan
if ($total > 0) {
	$json = array(
	'result' => 'success' ,
	'total_data' => $total,
	'data' => $data
);

// merubah data dalam bentuk json
echo json_encode($json);
}else {
	$json = array(
	'result' => 'Data Tidak Ditemukan' ,
	'total_data' => $total,
	
);

// merubah data dalam bentuk json
echo json_encode($json);
}

?>