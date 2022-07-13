document.addEventListener('DOMContentLoaded', () => {
    function displayNone(target) {
        [...target.children].forEach((el) => {
            if (el.tagName === "BUTTON") {
                el.addEventListener("click", () => {
                    el.parentNode.style.display = "none";
                })
            }
        })
    }

    displayNone(document.querySelector('.toHide'));
});