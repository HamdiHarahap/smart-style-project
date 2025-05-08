import "./bootstrap";
import "./navbar";
import "./menu";

const btnUp = document.querySelector(".btn-up");

window.addEventListener("scroll", () => {
    if (window.scrollY > 320) {
        btnUp.classList.add(
            "opacity-100",
            "translate-y-0",
            "pointer-events-auto"
        );
        btnUp.classList.remove(
            "opacity-0",
            "translate-y-4",
            "pointer-events-none"
        );
    } else {
        btnUp.classList.remove(
            "opacity-100",
            "translate-y-0",
            "pointer-events-auto"
        );
        btnUp.classList.add(
            "opacity-0",
            "translate-y-4",
            "pointer-events-none"
        );
    }
});
