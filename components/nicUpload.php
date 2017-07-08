<?php
include 'ResizeImg.php';
//Check if we are getting the image
if(isset($_FILES['image'])){
        //Get the image array of details
        $img = $_FILES['image'];       
        //The new path of the uploaded image, rand is just used for the sake of it
        $path = "../upload/images/news/" . rand().$img["name"];
        ResizeImg::resize_crop_image(600, 400, $img['tmp_name'], $path, 60);
        //Move the file to our new path
        //move_uploaded_file($img['tmp_name'],$path);
        //Get image info, reuiqred to biuld the JSON object

        $data = getimagesize($path);
        //The direct link to the uploaded image, this might varyu depending on your script location  
        $path = substr($path, 3);
        $link = "http://$_SERVER[HTTP_HOST]"."/".$path;
        //Here we are constructing the JSON Object
        $res = array("data" => array(
                                "link" => $link,
                                "width" => $data[0],
                                "success" => true          
                    ));
        //echo out the response :)
        echo json_encode($res);
}
?>