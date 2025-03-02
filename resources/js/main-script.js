document.addEventListener("DOMContentLoaded", function () {
    const closeFlash = document.getElementById("close-flash");
    const notifFlash = document.getElementById("notif-flash");

    if (closeFlash && notifFlash) {
        closeFlash.addEventListener("click", function () {
            notifFlash.style.display = "none";
        });
    }
});