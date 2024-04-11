<?php
require_once('../includes/DB_Connexion.php');
$db=DB_Connexion::getInstance();
require_once '../includes/userChecker.php';
$user=$user_id;
$form=["email","username","codeforces_acc","leetcode_acc","linkedin_acc","github_acc"];
foreach ($form as $input){
    if (isset($_POST[$input])){
        $query=$db->prepare("update public.user set $input = ? where id= ? ");
        $query->execute(array($_POST[$input],$user=11));
    }
}
header("Location: http://localhost:8000/pages/settings.php");
