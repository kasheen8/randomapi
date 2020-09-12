<?php
function generation($connect)
{
    $number = rand(1, 1000000);
    mysqli_query($connect, "INSERT INTO `random_numbers` (`id`, `number`) VALUES (NULL, '$number')");

    http_response_code(201);

    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect),
        "number" => $number
    ];

    echo json_encode($res);
}