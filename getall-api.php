
<?php

header("Content-Type:application/json");

$method = $_SERVER['REQUEST_METHOD'];

$result= array();
if ($method=='GET') {
    $result = [
        "quiz_tittle" => 'get all data',
        "quiz_duraction" => 200
    ];
    // koneksi database
    $servername = "localhost";
    $username = "root";
    $password = "khandiasdewa123";
    $dbname = "air";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


//memanggil data dari database
$sql = "SELECT * FROM ((questionbank INNER JOIN questionbank_quizzes ON questionbank.id = questionbank_quizzes.questionbank_id) INNER JOIN quizzes ON questionbank_quizzes.quize_id = quizzes.id)";

//validasi query
$hasil = $conn->query($sql);

//menampilkan data dari database
$result['results'] = $hasil->fetch_all(MYSQLI_ASSOC);

}else{
    $result = [
        "quiz_duraction" => 500,
        "quiz_tittle" => 'gagal get data'
    ];
}

echo json_encode($result);
?>
