// timer.js
document.addEventListener('DOMContentLoaded', function () {
    let seconds = 0;
    const timerElement = document.getElementById('timer-seconds');

    // Controleer of het element wel bestaat op de pagina om fouten te voorkomen
    if (timerElement) {
        setInterval(function () {
            seconds++;
            timerElement.innerText = seconds;
        }, 1000);
    }
});