<?php
session_start();
try  {
    $db_connexion = new PDO(
        'pgsql:host=aws-0-eu-central-1.pooler.supabase.com;dbname=postgres',
        'postgres.smtyqkucrdolnrkzwqjp',
        'ezLz72hM(dJv!@E');
    $response = $db_connexion->query("select * from problems");
    $data = $response->fetchAll(PDO::FETCH_OBJ);

    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Level Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="../assets/css/level-style.css" rel="stylesheet">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-8">
                <h1 class="display-1">Level 1</h1>
                <h4>Solved 3 out of 8</h4>
                <div class="progress" role="progressbar">
                    <div class="progress-bar"></div>
                </div>
                <div class="mt-5">
                    <h4>Resources:</h4>
                    <div>
                        <h6>DFS and BFS:
                            <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover ml-2"
                               href="https://cp-algorithms.com/graph/breadth-first-search.html" target="_blank">CP-Algorithms</a>
                        </h6>
                    </div>
                    <div>
                        <h6>Number Theory:
                            <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover ml-2"
                               href="https://cp-algorithms.com/algebra/sieve-of-eratosthenes.html" target="_blank">CP-Algorithms</a>,
                            <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover ml-2"
                               href="https://www.geeksforgeeks.org/number-theory-competitive-programming/" target="_blank">GeeksforGeeks</a>
                        </h6>
                    </div>
                </div>



                <table class="table mt-5 text-center">
                    <thead>
                    <tr>
                        <th scope="col">Staus</th>
                        <th scope="col">Title</th>
                        <th scope="col">Platform</th>
                        <th scope="col">Acceptence</th>
                        <th scope="col">Difficulty</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data as $datum): ?>
                        <tr>
                            <th scope="row">➖</th>
                            <td>
                                <a href="problem.php?problem=<?=$datum->id?>"><?= $datum->title ?></a>
                            </td>
                            <td><?= $datum->platform ?></td>
                            <td><?= $datum->acceptance?>%</td>
                            <td><?= $datum->difficulty?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    </body>
    </html>

    <?php
} catch (PDOException $exception) {
    echo "Connexion to DB failed: ".$exception->getMessage();
    phpinfo();
}
?>