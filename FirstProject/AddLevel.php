


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/AddLevel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="container">
            <div class="row text-center m-5">
                <h1 class = "display-1">Add Level</h1>
            </div>
            <div class="row m-5">
                <div class="col"></div>
                <div class="col d-flex justify-content-end">
                    <label for="number">Level number : </label>
                </div>
                <div class="col-1">
                    <input type="number" id = "number" style = "width : 80%;" class="no-suffix-icon form-control">
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
            <div class="row m-5">
                <div class="col"></div>
                <div class="col">
                    <label for="summary" > Summary</label>
                    <br>
                    <textarea name="" id="summary" cols="55" rows="5" class="form-control text"></textarea>
                </div>
                <div class="col"></div>
            </div>
            <div class="row m-5 resources">
                <div class="col-3"></div>
                <div class="col-6 container">
                    <div class="row rounded resource container"><div class="row align-items-center"><div class="col-4"><h3>1</h3></div><div class="col-7"><a href="1" target="_blank">1</a></div><div class="col-1">
                                <button class="btn btn-danger delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                    </svg>
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div></div></div>
                    <div class="row container add-resource rounded">
                        <div class="row align-items-center" style="position: relative">
                            <div class="col-2 topic">
                                <label for="topic-name"> Topic</label>
                                <input type="text" class="form-control" id = "topic-name" name = "topic">
                            </div>
                            <div class="col-5 text-center link">
                                <label for="link">Link</label>
                                <input type="text" name="link" id="link" class="form-control">
                            </div>
                            <div class="col-3 text-center platform">
                                <label for="platform">Platform</label>
                                <input type="text" name="platform" id="platform" class="form-control">
                            </div>

                            <button class="btn btn1 btn-primary add-resource-btn ">add</button>

                        </div>

                    </div>


                </div>
                <div class="col-3"></div>

            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn btn-primary save-btn mb-5">Save</button>
            </div>
    </div>
    <script src="js/AddLevel.js"></script>

</body>