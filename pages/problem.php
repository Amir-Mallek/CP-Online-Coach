<?php
    
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Problem Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/problem-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />

</head>
<body>
<script src="js/bootstrap.bundle.js"></script>
<div class="container mb-5">
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class="display-1">Watermelon <span class="status solved">Solved</span></h1>
            <h4><a href="https://codeforces.com/problemset/problem/4/A" target="_blank"
                   class="link-light link-underline-opacity-25 link-underline-opacity-100-hover clink">
                   Codeforces 4A
                   <span class="material-symbols-outlined">link</span>
                </a>
            </h4>
            
            <h4 class="mt-2 ptags">
                Problem Tags:
                <span class="tag rounded px-2 pb-1">Binary search</span>
                <span class="tag rounded px-2 pb-1">DFS and similar</span>
            </h4>
            
            <div class="timer-div mt-4 container">
                <div class="row align-items-center">
                    <div class="col-2 text-center">
                        <h1>Timer:</h1>
                    </div>
                    <div class="clock container text-center col-6">
                        <div class="row">
                            <div class="col">
                                <span class="hours">00</span>
                                <br>
                                <span class="label col-5">Hours</span>
                            </div>
                            <div class="col">:</div>
                            <div class="col">
                                <span class="minutes">00</span>
                                <br>
                                <span class="label col-2">Minutes</span>
                            </div>
                            <div class="col">:</div>
                            <div class="col">
                                <span class="seconds">00</span>
                                <br>
                                <span class="label col-5">Seconds</span>
                            </div>
                        </div>
                        <div class="commands">
                            <button class="btn start input me-3 px-4">Start</button>
                            <button class="btn stop input mx-3 px-4" disabled>Stop</button>
                            <button class="btn reset input ms-3 px-4" disabled>Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-5">
                <h2>Attempts:</h2>
                <table class="table attempts">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">When</th>
                            <th scope="col">Time Spent(min)</th>
                            <th scope="col">Hints</th>
                            <th scope="col">Language</th>
                            <th scope="col">Verdict</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                
                <div class="container add-attempt">
                    <div class="row text-center align-items-end mb-5">
                        <div class="col-3" style="color: white;">
                            <button class="btn add-attempt input">Add Attempt</button>
                        </div>
                        <div class="col-2">
                            <h6>Language</h6>
                            <select class="form-select lang form-control">
                                <option selected value="0">C++</option>
                                <option value="1">Java</option>
                                <option value="2">Python</option>
                                <option value="3">Ruby</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <h6>Verdict</h6>
                            <select class="form-select verdict form-control">
                                <option selected value="0">AC</option>
                                <option value="1">WA</option>
                                <option value="2">CE</option>
                                <option value="3">RTE</option>
                                <option value="4">TLE</option>
                                <option value="5">MLE</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <h6>Time Spent</h6>
                            <input type="number" class="time-spent form-control">
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="hints">
                <h2>Hints:</h2>
            </div>

        </div>
        <div class="col-2"></div>
    </div>
</div>
<script src="../assets/js/problem-script.js"></script>
</body>
</html>