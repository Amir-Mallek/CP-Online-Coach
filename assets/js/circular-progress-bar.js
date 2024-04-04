const progressBars = document.querySelectorAll(".progress");
progressBars.forEach(progress => {
    const value = progress.getAttribute('data-value');
    const left = progress.querySelector('.progress-left .progress-bar');
    const right = progress.querySelector('.progress-right .progress-bar');

    if (value > 0) {
        if (value <= 50) {
            right.style.transform = `rotate(${percentageToDegrees(value)}deg)`;
        } else {
            right.style.transform = 'rotate(180deg)';
            left.style.transform = `rotate(${percentageToDegrees(value - 50)}deg)`;
        }
    }
});
function percentageToDegrees(percentage) {
    return (percentage / 100) * 360;
}