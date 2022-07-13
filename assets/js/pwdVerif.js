document.addEventListener("DOMContentLoaded", () => {
    function passverif(target, pwd, verifPwd) {
        target.style.color = pwd.value !== verifPwd.value ? "#f00" : "#0f0";
    }

    let verifPwd = document.querySelector("#verifPwd");
    verifPwd.addEventListener("keyup", () => {
        passverif(document.querySelector("#colorPwd"), document.querySelector("#pwd"), verifPwd);
    })
})