<?php
require_once("Status_Table.php");
require_once('../includes/DB_Connexion.php');
$db=DB_Connexion::getInstance();
$user=1;
function userinfo($champ)
{
    global $db,$user;
    $query =$db->prepare( "SELECT $champ FROM public.user WHERE id= ?");
    $query->execute(array($user));
    $value = $query->fetchColumn();

    return($value);
}

$curLvl=userinfo("cur_lvl");
$nbProblems=$nb_solved_problems=0;
$test=false;

while(true) {
    $query = $db->prepare("SELECT nb_problems FROM public.level WHERE level_id=?");
    $query->execute(array($curLvl));
    $nbProblems = $query->fetchColumn();

    $nb_solved_problems = 0;
    $st = new Status_Table();
    $sti = $st->get_problems_status($curLvl, $user);
    foreach ($sti as $stat) {
        if ($stat->code == 0) {
            $nb_solved_problems++;
        }
    }
    if ($nb_solved_problems ==$nbProblems) {
        $curLvl=$curLvl+1;

    } else {
        break; // Exit the loop if not all problems are solved
    }
}


function lvlState($lvl)
{
    global $curLvl, $user, $nbProblems,$nb_solved_problems;
    if ($lvl == $curLvl) {


        echo("<div class='rectangle-icon ' onclick=' redirectToPage($lvl) ' >
            <p  class='lvl-number' >  Level $lvl  </p>
            <p style='position: absolute;top :110px;font-size:17px; color:#178582'>$nb_solved_problems/$nbProblems solved</p>
            <div class='progress-container'>
                <div class='progress-bar2' id='myBar1' style='width: " . ($nb_solved_problems * 100 / $nbProblems) . "%'></div>
            </div> </div>");

    }
    elseif ($lvl>$curLvl){
        echo("<div class='rectangle-icon '  >
            <p  class='lvl-number' >  Level $lvl  </p><svg   id='chorliya$lvl'style='position: absolute;bottom: 20% 'xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-lock' viewBox='0 0 16 16'>
                <path d='M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1'/>
            </svg>
            <p  id='msg$lvl' class='advice'>Unlock the previous lvl first</p> </div>");
    }
    else{
        echo ("<div class='rectangle-icon ' onclick=' redirectToPage($lvl) ' >
            <p  class='lvl-number' >  Level $lvl  </p> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' color='#178582' fill='currentColor' class='bi bi-check2-circle done' viewBox='0 0 16 16'>
  <path d='M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0'/>
  <path d='M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z'/>
</svg> </div>");
    }
}

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all_lvls.css">
    <title>lvls</title>
</head>

<body>
<?php
$query =$db->prepare(  "SELECT count(*) FROM public.level");
$query->execute();
$nblvl = $query->fetchColumn();
for ($i = 1; $i <= $nblvl; $i++) {
    if ($i%4==1) echo ('<div class="layer">');
    lvlState($i);
    if ($i%4==0) echo ('</div>');

}

?>
<script>function redirectToPage(lvl){
        window.location.href = "amir_page.php?key1="+lvl;

    }</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/Lvls_script.js"></script>
</body>
</html>