let overlay = document.querySelector("#overlay")

// User Sign-in Modal
let userSignIn = document.querySelector("#sign-in-box");
let userModalOpen = document.querySelector("#sign-in-modal");
let userModalClose = document.querySelector("#close-btn");

userSignIn.addEventListener("click", ()=>{
    overlay.style.display = "block"
    userModalOpen.style.display = "block";
})

userModalClose.addEventListener("click",()=>{
    userModalOpen.style.display = "none";
    overlay.style.display = "none"
})


// Admin Sign-in Modal
let adminSignIn = document.querySelector("#admin-box");
let adminModalOpen = document.querySelector("#admin-modal");
let adminModalClose = document.querySelector("#admin-modal-close-btn");


adminSignIn.addEventListener("click", ()=>{
    overlay.style.display = "block"
    adminModalOpen.style.display = "block";
})

adminModalClose.addEventListener("click",()=>{
        adminModalOpen.style.display = "none";
        overlay.style.display = "none"
})