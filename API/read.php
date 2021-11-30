<?php
    //headers
    header('Access-Control-Allow_origin: *');
    header('Content-Type: application/json');
    include_once '../Config/Database.php';
    include_once '../Models/Post.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $post = new Post($db);

    //Blog psot query
    $result = $post->read();

    //Get row Count
    $num = $result->rowCount();

    //Check if any posts
    if($num > 0){
        //Post array
        $post_arr = array();
        $post_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            
            $post_item =array(
                'id' => $title,
                'title' => $title,
                
            );
            array_push($post_arr['data'],$post_item);
        }
    }