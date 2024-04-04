<?php

require_once '../auto_load.php';

$new_acquired_badges = [];

$badge_table = new Badge_Table();
$badges_status_table = new Badges_Status_Table();

$badges = $badge_table->get_badges();
$badges_status = $badges_status_table->get_badges_status($user_id);

$status = [];
foreach ($badges_status as $badge) {
    $status[$badge->badge_id] = $badge;
}


function update_badges_progress($last_attempt) {
    $user_id = $last_attempt['user_id'];
    global $badges, $status, $new_acquired_badges;
    foreach ($badges as $badge) {
        if (array_key_exists($badge->id, $status) && $status[$badge->id]->acquired)
            continue;
        switch ($badge->id) {
            //Lighting Hawk:First Solve
            case 1:
                increase_progress($badge, $user_id);
                break;
            //speed: solve under 5mins
            case 2:
                if ($last_attempt['time_spent_min'] != -1 and $last_attempt['time_spent_min'] <= 5)
                    increase_progress($badge, $user_id);
                break;
            //night owl:5problems between midnight and 5am
            case 3:
                $dateString = $last_attempt['attempt_time'];
                $dateTime = DateTime::createFromFormat('Y/m/d, H:i', $dateString);
                $hoursMinutes = $dateTime->format('H:i');
                $midnight = new DateTime('00:00:00');
                $fiveAM = new DateTime('05:00:00');
                if ($hoursMinutes >= $midnight && $hoursMinutes <= $fiveAM)
                    increase_progress($badge, $user_id);

                break;
            //case 4: participate in 3 contests: I think to have this badge the user needs to participate
            // and then send a proof of participation via contact us to admin who will INCREASE the progress ONLY
            // while here we check for the progress and HERE we set acquired to true because we need to show the badge
            // the only downside that he will be shown that he got this badge only after another AC
//            case 4:
//                if ($badge->progress == 3)
//                    showNewBadge($badge);
//                break;
            case 5:
                increase_progress($badge, $user_id);
        }
    }
    return $new_acquired_badges;
}


function increase_progress($badge, $user_id){
    global $status, $badges_status_table, $new_acquired_badges;

    if (array_key_exists($badge->id, $status)) {
        $status[$badge->id]->progress++;
        $status[$badge->id]->acquired = ($badge->requirement == $status[$badge->id]->progress);
        $badges_status_table->update_badge_status($badge->id, $user_id, $status[$badge->id]->progress, $status[$badge->id]->acquired);
    } else {
        $new_status =  [
            'badge_id' => $badge->id,
            'user_id' => $user_id,
            'progress' => 1,
            'acquired' => (int)($badge->requirement == 1)
        ];
        $status[$badge->id] = (object) $new_status;
        $badges_status_table->insert($new_status);
    }
    if ($status[$badge->id]->acquired)
        $new_acquired_badges[] = [
            'title' => $badge->title,
            'description' => $badge->description,
            'img_name' => $badge->image_name
        ];
}