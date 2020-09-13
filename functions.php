<?php
function generation($connect)
{
    $number = rand(1, 1000000);
    mysqli_query($connect, "INSERT INTO `random_numbers` (`id`, `number`) VALUES (NULL, '$number')");

    http_response_code(201);

    $res = [
        "status" => true,
        "num_id" => mysqli_insert_id($connect),
        "number" => $number
    ];

    echo json_encode($res);
}

function retrieve($connect, $id){
    $number_record = mysqli_query($connect, "SELECT * FROM `random_numbers` WHERE `id` = '$id'");

    if (mysqli_num_rows($number_record) === 0) {
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Number not found"
        ];
        echo json_encode($res);

    } else {
        $number_record = mysqli_fetch_assoc($number_record);
        echo json_encode($number_record);
    }

}