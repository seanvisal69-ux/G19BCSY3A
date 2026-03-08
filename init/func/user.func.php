<?php
function createUser($name, $usernamne, $passwd, $photo)
{
    global $db;
    
    $imagePath = null;
    if (!empty($photo['name'])){
        $imagePath = uploadImage($photo);
    }
    
    $query = $db->prepare('INSERT INTO users (name, username, password, photo) VALUES (?, ?, ?, ?)');
    $query->bind_param('ssss', $name, $usernamne, $passwd, $imagePath);
    return $query->execute();
    if($db->affected_rows){
        return true;
    }
    return false;
}
?>