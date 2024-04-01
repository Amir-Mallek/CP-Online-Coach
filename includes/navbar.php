
    <style>
        nav button{
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
        .custom-btn-close{
            --bs-btn-close-color: #000;
            --bs-btn-close-bg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='white' class='bi bi-x-lg' viewBox='0 0 16 16'%3E%3Cpath d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z'/%3E%3C/svg%3E");
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
<nav>

<div id="navbar-container" class="vstack gap-2 ms-3 me-1 mt-3 position-fixed top-0 end-0">
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
    <span id="todolist-badge" class="badge text-bg-secondary"></span>
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
</nav>
<script>
    const container=document.querySelector('#navbar-container');
    const buttons = container.querySelectorAll('button');
    buttons.forEach(butt => {
        butt.addEventListener('click', event => {
            window.location.href = event.currentTarget.id+".php";
        });
    });
</script>

