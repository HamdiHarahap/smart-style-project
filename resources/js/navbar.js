const navbar = document.querySelector(".navbar");

const isQuestionPage = window.location.pathname === "/question";
const isRecomendationPage = window.location.pathname === "/rekomendasi";
const isHairStylePage = window.location.pathname === "/hair-style";

if (!isQuestionPage && !isRecomendationPage && !isHairStylePage) {
    window.addEventListener("scroll", () => {
        if (window.scrollY >= 100) {
            navbar.classList.add("bg-white");
            navbar.classList.add("shadow-lg");
            navbar.classList.add("text-black");
            navbar.classList.remove("text-white");
        } else {
            navbar.classList.remove("bg-white");
            navbar.classList.remove("shadow-lg");
            navbar.classList.add("text-white");
            navbar.classList.remove("text-black");
        }
    });
} else {
    navbar.classList.add("bg-white");
    navbar.classList.add("shadow-lg");
    navbar.classList.add("text-black");
    navbar.classList.remove("text-white");
}
