<?php 
include "koneksi.php";

// $sql = "SELECT * FROM loan AS l
//     LEFT JOIN member AS m ON l.member_id=m.member_id
//     LEFT JOIN mst_member_type AS t ON t.member_type_id=m.member_type_id
//     LEFT JOIN item AS i ON l.item_code=i.item_code
//     LEFT JOIN biblio AS b ON i.biblio_id=b.biblio_id
//     WHERE m.member_type_id IN (2,3)
//     GROUP BY l.member_id";

$sql = "SELECT * FROM member AS m
    LEFT JOIN mst_member_type AS t ON t.member_type_id=m.member_type_id
    WHERE m.member_type_id IN (2,3)";

$query = mysqli_query($koneksi, $sql);
while ($dt = mysqli_fetch_array($query)) {
	$item[] = array(
		'member_id' => $dt['member_id'] ,
		'member_name' => $dt['member_name'] ,
		'member_type_name' => $dt['member_type_name'] ,
		 );
}

//menampung data yang dihasilkan
if ($query) {
	$json = array(
	'result' => 'success' ,
	'item' => $item 
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