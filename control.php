<?php

/* Database connection start */
session_start();
$_SESSION["id"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sfdeshop4";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    printf("Connect failed: %sn", mysqli_connect_error());
    exit();
}


if(isset($_POST['import_data'])){
// validate to check uploaded file is a valid csv file
    $file_mimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){

            $mysql = new mysqli($servername, $username, $password, $dbname);

            $ultimoPedido = $mysql->query('SELECT * FROM pedidos ORDER BY id DESC LIMIT 1');

            $id_pedido = date('Ymdhs');

            if ($ultimoPedido->num_rows === 0) {
                $id_pedido .= '-1';
            }else{
                $ultimoPedido = $ultimoPedido->fetch_assoc();

                $ultimoIdPedido = explode('-', $ultimoPedido['id_pedido']);

                $ultimoIdPedido = (int) $ultimoIdPedido[1] + 1;

                $id_pedido .= '-' . $ultimoIdPedido;
            }

            $csv_file = fopen($_FILES['file']['tmp_name'], 'r');
            //fgetcsv($csv_file);
            // get data records from csv file
            while(($emp_record = fgetcsv($csv_file, 1000, ",")) !== FALSE){

                $mysql_insert = "INSERT INTO 
                    pedidos (id_usuario, id_pedido, codigo, cantidad) VALUES (
                        '". $_SESSION["id"] . "',
                        '" . $id_pedido . "',
                        '".$emp_record[0]."',
                        '".$emp_record[1]."'
                    )";

                mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
            }

            fclose($csv_file);

            $import_status = '?import_status=success';

        } else {
            $import_status = '?import_status=error';
        }
    } else {
        $import_status = '?import_status=invalid_file';
    }
}

header("Location: perfilMayoreo".$import_status);

?>