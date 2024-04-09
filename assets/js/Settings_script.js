const camera = document.getElementById("camera");
const profile = document.getElementById("profile");
const btn = document.getElementById("imagebtn");

profile.addEventListener("mouseenter", () => {
    profile.style.filter = "brightness(55%)";
    camera.style.opacity = "1";
});

profile.addEventListener("mouseleave", () => {
    profile.style.filter = "brightness(100%)";
    camera.style.opacity = "0";
});

camera.addEventListener("mouseenter", () => {
    profile.style.filter = "brightness(55%)";
    camera.style.opacity = "1";
});

camera.addEventListener("mouseleave", () => {
    profile.style.filter = "brightness(100%)";
    camera.style.opacity = "0";
});


