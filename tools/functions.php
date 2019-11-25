<?php
function get_user_image_path($id)
{
    $sql = "SELECT * FROM users where user_id = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $dir = "database/profiles/user/" . $row['user_name'] . "/" . $row['user_image'];

    return $dir;
}

function get_publication_image_path($id)
{
    $sql = "SELECT * FROM publication where publication_id = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $dir = "database/publication/" . $id . "/" . $row['publication_main_image'];

    return $dir;
}

function get_publication_title($id)
{
    $sql = "SELECT * FROM publication where publication_id = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $text = $row['publication_title'];

    return $dir;
}

function get_publication_text($id)
{
    $sql = "SELECT * FROM publication where publication_id = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $text = $row['publication_text'];

    return $dir;
}

function get_publication_description($id)
{
    $sql = "SELECT * FROM publication where publication_id = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $text = $row['publication_description'];

    return $dir;
}

function get_publication_datetime($id)
{
    $sql = "SELECT * FROM publication where publication_id = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $text = $row['publication_datetime'];

    return $dir;
}

function get_publication_object_date($id)
{
    $sql = "SELECT * FROM publication where publication_id = '$id'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $text = $row['object_date'];

    return $dir;
}
