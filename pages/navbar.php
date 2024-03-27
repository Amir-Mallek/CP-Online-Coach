<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        button{
            background-color: #262E33;
            color: #BFA181;
            width: 56px;
            height: 56px;
        }

        .primary{
            color: white !important;
        }
        i{
            font-size: 18px;
        }
        #navbar-container{
            width: 56px;
            z-index: 2;
        }
        .tr {
            background-color: transparent;
            color: white;
            border-bottom: 1px solid #BFA181 ;
        }

        .tr:nth-child(odd) {
            background-color: #178582;
        }
        .custom-btn-close{--bs-btn-close-color: #000;
            --bs-btn-close-bg: url("images/close_btn.svg");
        --bs-btn-close-opacity: 0.5;
        --bs-btn-close-hover-opacity: 0.75;
        --bs-btn-close-focus-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        --bs-btn-close-focus-opacity: 1;
        --bs-btn-close-disabled-opacity: 0.25;
        --bs-btn-close-white-filter: invert(1) grayscale(100%) brightness(200%);
        box-sizing: content-box;
        width: 2em;
        height:2em;
        color: var(--bs-btn-close-color);
        background: transparent var(--bs-btn-close-bg) center/1.2em auto no-repeat;
        border: 0;
        border-radius: .375rem;
        opacity: var(--bs-btn-close-opacity);
        }
         </style>
    <title></title>
</head>
<body>

<div id="navbar-container" class="vstack gap-2 mx-3 mt-3 position-fixed top-0 end-0">
    <button id="index" class="rounded-pill mb-2" data-bs-toggle="tooltip" data-bs-placement="left" title="Home">
        <i class="bi bi-bing"></i>
    </button>
    <button id="problems" class="rounded-pill mb-2 " data-bs-toggle="tooltip" data-bs-placement="left" title="Problems" >
        <i class="bi bi-code-slash"></i>
    </button>
    <button id="profile" class="rounded-pill mb-2 " data-bs-toggle="tooltip" data-bs-placement="left" title="Profile" >
        <i class="bi bi-person"></i>
    </button>
    <button id="contact-us" class="rounded-pill mb-2 " data-bs-toggle="tooltip" data-bs-placement="left" title="Contact Us" >
        <i class="bi bi-envelope-at"></i>
    </button>
    <button id="settings" class="rounded-pill mb-2 " data-bs-toggle="tooltip" data-bs-placement="left" title="Settings">
        <i class="bi bi-sliders2"></i>
    </button>
</div>
<?php
// Check if the current page is not "index.php"
if(basename($_SERVER['PHP_SELF']) != 'index.php') {
    // Second part of the navbar (only shown on pages other than "index.php")
    echo '<button style="z-index: 2" type="button" class="rounded-pill position-fixed bottom-0 end-0 mb-3 me-3 w-auto py-2 px-4" data-bs-toggle="offcanvas" data-bs-target="#todo-list" aria-controls="offcanvasWithBothOptions" >
    To-Do List
    <span class="badge text-bg-secondary">4</span>
</button>

<div class="offcanvas offcanvas-start" style="background-color: #061A26" data-bs-scroll="true" tabindex="-1" id="todo-list" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header justify-content-between">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel" style="color: white">To-Do List</h5>
        <button type="button" class="custom-btn-close" data-bs-dismiss="offcanvas"  aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">';
    include_once "todolist.php";
    echo '</div></div>';
}
?>

</body>
<script crossorigin="anonymous"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const container=document.querySelector('#navbar-container');
    const buttons = container.querySelectorAll('button');
    buttons.forEach(butt => {
        butt.addEventListener('click', event => {
            window.location.href = event.currentTarget.id+".php";
        });
    });
    let tooltipTriggerList = container.querySelectorAll('[data-bs-toggle="tooltip"]');
    let tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>

</html>