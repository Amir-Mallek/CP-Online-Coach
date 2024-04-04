<?php
function require_navbar() {
    require_once 'includes/navbar.php';
}

function link_bootstrap_style() {
    echo '
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    ::-webkit-scrollbar {
    width: 20px;
    }

    ::-webkit-scrollbar-track {
    background-color: transparent;
    }

    ::-webkit-scrollbar-thumb {
    background-color: #53575a;
    border-radius: 20px;
    border: 6px solid transparent;
    background-clip: content-box;
    }

    ::-webkit-scrollbar-thumb:hover {
    background-color: #3f3f42;
    }</style>
    ';
}

function link_bootstrap_script() {
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>';
    echo '<script>';
    echo 'let tooltipTriggerList = container.querySelectorAll(\'[data-bs-toggle="tooltip"]\');';
    echo 'let tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));';
    echo '</script>';
}

function auto_loader($class_name) {
    if (str_contains($class_name, 'Table'))
        require_once "includes/classes/$class_name.php";
    else
        require_once "includes/$class_name.php";
}
spl_autoload_register('auto_loader');
spl_autoload_register('auto_loader');
