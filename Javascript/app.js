const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const image = document.getElementById('image');

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
    imageAnimation();
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
    container.classList.remove("image2");
    imageAnimation();
});

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function imageAnimation() {
    if(sign_up_btn) {
image.style.display = "none";
    } else if (sign_in_btn){
        sleep(100)
image.style.display = "block";
    }
}