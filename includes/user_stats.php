<?php

// User section
$user = new User_Table($user_id);
$user_data = $user->get_user();

function buildUserSection(): void
{
    global $user_data;

    function buildLink($link, string $icon, $text): void
    {
        echo '<a class="icon-link secondary text-decoration-none text-start" href="' . $link . '">' . $icon . $text . '</a>';
    }

    function buildUserLink($account, string $icon): void
    {
        global $user_data;
        if (isset($user_data->$account) && !empty($user_data->$account)) {
            $text = basename(parse_url($user_data->$account, PHP_URL_PATH));
            buildLink($user_data->$account, $icon, $text);
        }
    }

    $linkedinIcon = '<i class="bi bi-linkedin h-auto"></i>';
    $githubIcon = '<i class="bi bi-github h-auto"></i>';
    $codeforcesIcon ='<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bi" width="1em" height="1em" viewBox="0 0 24 24">
                        <path  d="M4.5 7.5A1.5 1.5 0 0 1 6 9v10.5A1.5 1.5 0 0 1 4.5 21h-3C.673 21 0 20.328 0 19.5V9c0-.828.673-1.5 1.5-1.5zm9-4.5A1.5 1.5 0 0 1 15 4.5v15a1.5 1.5 0 0 1-1.5 1.5h-3c-.827 0-1.5-.672-1.5-1.5v-15c0-.828.673-1.5 1.5-1.5zm9 7.5A1.5 1.5 0 0 1 24 12v7.5a1.5 1.5 0 0 1-1.5 1.5h-3a1.5 1.5 0 0 1-1.5-1.5V12a1.5 1.5 0 0 1 1.5-1.5z" />
                    </svg>';
    $leetcodeIcon ='<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bi" width="1em" height="1em" viewBox="0 0 24 24">
                        <path d="M13.483 0a1.374 1.374 0 0 0-.961.438L7.116 6.226l-3.854 4.126a5.266 5.266 0 0 0-1.209 2.104a5.35 5.35 0 0 0-.125.513a5.527 5.527 0 0 0 .062 2.362a5.83 5.83 0 0 0 .349 1.017a5.938 5.938 0 0 0 1.271 1.818l4.277 4.193l.039.038c2.248 2.165 5.852 2.133 8.063-.074l2.396-2.392c.54-.54.54-1.414.003-1.955a1.378 1.378 0 0 0-1.951-.003l-2.396 2.392a3.021 3.021 0 0 1-4.205.038l-.02-.019l-4.276-4.193c-.652-.64-.972-1.469-.948-2.263a2.68 2.68 0 0 1 .066-.523a2.545 2.545 0 0 1 .619-1.164L9.13 8.114c1.058-1.134 3.204-1.27 4.43-.278l3.501 2.831c.593.48 1.461.387 1.94-.207a1.384 1.384 0 0 0-.207-1.943l-3.5-2.831c-.8-.647-1.766-1.045-2.774-1.202l2.015-2.158A1.384 1.384 0 0 0 13.483 0m-2.866 12.815a1.38 1.38 0 0 0-1.38 1.382a1.38 1.38 0 0 0 1.38 1.382H20.79a1.38 1.38 0 0 0 1.38-1.382a1.38 1.38 0 0 0-1.38-1.382z" />
                    </svg>';

    buildUserLink('linkedin_acc', $linkedinIcon);
    buildUserLink('github_acc', $githubIcon);
    buildUserLink('codeforces_acc', $codeforcesIcon);
    buildUserLink('leetcode_acc', $leetcodeIcon);
}


// Badges section
$badges = new Badges_Status_Table();
$badges_data = $badges->get_full_badges_status($user_id);
$nb_badges_acquired = 0;

function buildBadgesSection(): void
{
    global $badges_data;
    global $nb_badges_acquired;

    foreach ($badges_data as $badge) {
        $acquired = $badge->acquired == 1 ? '' : 'opacity-50';
        echo '<img src="assets/img/badges/' . $badge->image_name . '" class="mb-1 ' . $acquired . '" alt="' . $badge->title . '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="' . $badge->title . ': ' . $badge->description . '" >';
        if ($badge->acquired == 1) {
            $nb_badges_acquired++;
        }
    }
    echo '<script>document.querySelector("#badges-number").textContent="' . $nb_badges_acquired . '";</script>';
}

// Languages section
$languages_data = $user->get_languages();

function buildLanguagesSection(): void
{
    global $languages_data;

    foreach ($languages_data as $row) {
        echo '<div class="row"><p class="rounded-pill mx-2 primary d-flex align-items-center justify-content-center w-auto" style="background-color:#eff2f699;max-width: 68px">' . $row->language . '</p><p class="primary col text-end ">' . $row->count . '<small class="secondary"> problems solved</small></p></div>';
    }
}

// Skills section
$skills_data = $user->get_skills();

function buildSkillsSection(): void
{
    global $skills_data;

    $colors = array('#9FC131', '#F24405', '#22BABB', '#FA7F08', '#04BF8A', '#D6D58E');
    $skillsLabels = [];
    $skillsDataset = [];

    foreach ($skills_data as $index => $skill) {
        $color = $colors[$index % 6];
        $percentage = $skill->overall == 0 ? 0 : ($skill->count / $skill->overall) * 100;
        $skillsLabels[] = $skill->topic;
        $skillsDataset[] = $skill->count;

        echo '<div>
                <div class="row">
                    <div class="col secondary text-start">' . $skill->topic . '</div>
                    <div class="col secondary text-end">
                        <small class="primary">' . $skill->count . ' </small>/' . $skill->overall . '
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="progress" style="height: 8px">
                            <div class="progress-bar " role="progressbar" style="width: ' . $percentage . '%; height: 8px; background-color: ' . $color . ' " aria-valuenow="' . $percentage . '" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>';
    }
    echo "<script> const skillsLabels=" . json_encode($skillsLabels) . ";const skillsDataset=" . json_encode($skillsDataset) . ";</script>";
}

// Difficulties/Levels section
$difficulties_data = $user->get_difficulties();

function countSolvedProblems(): string
{
    global $difficulties_data;

    $solved = 0;
    $total = 0;

    foreach ($difficulties_data as $row) {
        $solved += $row->count;
        $total += $row->overall;
    }

    return number_format($total == 0 ? 0 : ($solved / $total) * 100, 2);
}

function buildSolvedProblemsSection(): void
{
    global $difficulties_data;

    $colors = ['bg-success', 'bg-warning', 'bg-danger'];

    foreach ($difficulties_data as $index => $row) {
        $percentage = $row->overall == 0 ? 0 : ($row->count / $row->overall) * 100;
        $color = $colors[$index];

        echo '<div class="container">
                <div class="row">
                    <div class="col secondary text-start">
                        ' . $row->difficulty . '
                    </div>
                    <div class="col secondary text-end">
                        <small class="primary">' . $row->count . '</small>/' . $row->overall . '
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="progress" style="height: 8px">
                            <div class="progress-bar ' . $color . '" role="progressbar" style="width: ' . $percentage . '%; height: 8px" aria-valuenow="' . $percentage . '" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}

// Verdicts section
$attempts = new Attempts_Table();
$verdicts_data = $attempts->get_all_verdicts($user_id);
$showPie = false;

function buildVerdictsSection(): void
{
    global $verdicts_data;
    global $showPie;

    $status = [
        "AC" => 0,
        "WA" => 0,
        "TLE" => 0,
        "MLE" => 0,
        "CE" => 0,
        "RTE" => 0
    ];

    foreach ($verdicts_data as $verdict) {
        $status[$verdict->verdict] = $verdict->count;
    }

    $verdicts_count = array_values($status);

    foreach ($verdicts_count as $value) {
        if ($value != 0) {
            $showPie = true;
            break;
        }
    }

    echo '<script>let verdictsDataset;</script>';

    if ($showPie) {
        echo "<div class='chart-container h-75 w-75'><canvas id='verdictsChart'></canvas></div><script> verdictsDataset = " . json_encode($verdicts_count) . ";</script>";
    } else {
        echo '<p style="color: #BFA181" class="mt-2">No verdicts yet? Start solving!</p>';
    }
}

// Problems Solved section
$historical_problems_solved = new Historical_Problems_Solved_Table();
$historical_problems_solved_data = $historical_problems_solved->get_status($user_id);

function getProblemsSolvedSection(): void
{
    global $historical_problems_solved_data;

    $problemsDataset = [];

    foreach ($historical_problems_solved_data as $row) {
        // If the year is not yet in the array, initialize it
        if (!isset($problemsDataset[$row->year])) {
            $problemsDataset[$row->year] = [];
        }
        $problemsDataset[$row->year][] = $row->nb_problems_solved;
    }

    echo "<script> const problemsDataset = " . json_encode($problemsDataset) . ";</script>";
}

getProblemsSolvedSection();

// Upcoming Contests section
$upcoming_contests = new Upcoming_Contests_Table();
$upcoming_contests_data = $upcoming_contests->get_upcoming_contests();

function buildUpcomingContestsSection(): void
{
    global $upcoming_contests_data;

    foreach ($upcoming_contests_data as $contest) {
        $contest_date = date('l j F, Y', strtotime($contest->contest_date));
        echo '<div class="col">
                <a href="' . $contest->contest_link . '" class="text-decoration-none">
                    <div class="card">
                        <div class="h-100 d-flex align-items-start">
                            <img src="assets/img/' . $contest->image_name . '" class="card-img-top" alt="' . $contest->title . '">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">' . $contest->title . '</h5>
                            <p class="card-text">' . $contest_date . ', ' . $contest->place_or_platform . '</p>
                        </div>
                    </div>
                </a>
            </div>';
    }
}

