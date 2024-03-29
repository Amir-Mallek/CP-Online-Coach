<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    // Use user information as needed
} else {
    header("Location: login.php");
    exit();
}

include_once ($_SERVER['DOCUMENT_ROOT'].'/includes/DBConnection.php');
$db=DBConnection::getInstance();

//languages section
$req = $db->prepare("select * from getLanguagesSection (:user_id);");
$req->execute(array('user_id' => $userId));
/**
 * [language,count]
 */
$languages = $req->fetchAll(PDO::FETCH_ASSOC);
function buildLanguagesSection(){
    global $languages;
    foreach ($languages as $row) {
        echo '<div class="row"><p class="rounded-pill mx-2 primary d-flex align-items-center justify-content-center w-auto" style="background-color:#eff2f699;max-width: 68px">'
            .$row['language'].'</p><p class="primary col text-end ">'.$row['count'].'<small class="secondary"> problems solved</small></p></div>';
    }
}

//skills section
$req = $db->prepare("select * from getskillssection (:user_id);");
$req->execute(array('user_id' => $userId));
/**
 * [topic,count,overall]
 */
$skills = $req->fetchAll(PDO::FETCH_ASSOC);
function buildSkillsSection(){
    global $skills;
    $colors=array('#9FC131','#F24405','#22BABB','#FA7F08','#04BF8A','#D6D58E');
    $skillsLabels=array();
    $skillsDataset=array();
    foreach ($skills as $index => $skill) {
        $color = $colors[$index%6];
        $percentage = $skill['overall']==0?0:($skill['count'] / $skill['overall']) * 100;
        array_push($skillsLabels, $skill['topic']);
        array_push($skillsDataset, $skill['count']);
        echo '<div>
                                    <div class="row">
                                        <div class="col secondary text-start">'. $skill['topic'].'</div>
                                        <div class="col secondary text-end">
                                            <small class="primary">'.$skill['count'].' </small>/'.$skill['overall'].'
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col">
                                            <div class="progress" style="height: 8px">
                                                <div class="progress-bar " role="progressbar" style="width: '.$percentage.'%; height: 8px; background-color: '.$color.' " aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
    }
    echo "<script> const skillsLabels=".json_encode($skillsLabels).";const skillsDataset=".json_encode($skillsDataset).";</script>";
}

//difficulties/levels section
$req = $db->prepare("select * from getDifficultySection(:user_id);");
$req->execute(array('user_id' => $userId));
/**
 * [difficulty,count,overall]
 */
$difficulties = $req->fetchAll(PDO::FETCH_ASSOC);
function countSolvedProblems(){
    global $difficulties;
    $solved=0;
    $total=0;
    foreach ($difficulties as $row) {
        $solved+=$row['count'];
        $total+=$row['overall'];
    }
    return number_format($total==0?0:($solved/$total)*100,2);
}
function buildSolvedProblemsSection(){
    global $difficulties;
    $colors=array('bg-success','bg-warning','bg-danger');

    foreach ($difficulties as $index => $row) {
        $percentage = $row['overall']==0?0:($row['count'] / $row['overall']) * 100;
        $color = $colors[$index];
        echo '<div class="container">
                                <div class="row">
                                    <div class="col secondary text-start">
                                        '.$row['difficulty'].'
                                    </div>
                                    <div class="col secondary text-end">
                                        <small class="primary">'.$row['count'].'</small>/'.$row['overall'].'
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="progress" style="height: 8px">
                                            <div class="progress-bar '.$color.'" role="progressbar" style="width: '.$percentage.'%; height: 8px" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
    }
}

//verdicts section
$req = $db->prepare("select * from getVerdictsSection(:user_id);");
$req->execute(array('user_id' => $userId));
/**
 * [verdict,count]
 */
$verdicts = $req->fetchAll(PDO::FETCH_ASSOC);
function buildVerdictsSection()
{
    global $verdicts;

    $status = array(
        "AC" => 0,
        "WA" => 0,
        "TLE" => 0,
        "MLE" => 0,
        "CE" => 0,
        "RTE" => 0
    );

    foreach ($verdicts as $verdict) {
        $status[$verdict['verdict']] = $verdict['count'];
    }

    $verdicts_count = array_values($status);

    echo "<script> const verdictsDataset = " . json_encode($verdicts_count) . ";</script>";

}

//upcoming-contests section
$req = $db->prepare("select * from upcoming_contests order by contest_date desc");
$req->execute();
/**
 * [title,image_name,contest_link,place_or_platform,contest_date]
 */
$upcoming_contests = $req->fetchAll(PDO::FETCH_ASSOC);
function buildUpcomingContestsSection(){
    global $upcoming_contests;

    foreach ($upcoming_contests as $contest) {
        $contest_date=date('l j F, Y', strtotime($contest['contest_date']));
        echo '<div class="col">
                        <a href="'.$contest['contest_link'].'" class="text-decoration-none">
                        <div class="card">
                            <div class="h-100 d-flex align-items-start">
                                <img src="assets/img/'.$contest['image_name'].'" class="card-img-top" alt="'.$contest['title'].'">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">'.$contest['title'].'</h5>
                                <p class="card-text">'.$contest_date.', '.$contest['place_or_platform'].'</p>
                            </div>
                        </div>
                        </a>
                    </div>';
    }
}

?>
