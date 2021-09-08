document.querySelector("#profile").addEventListener("click", () => {
    document.location.href = '../php/profil.php';
});

document.querySelector("#modificationInformation").style.display = "none";

document.querySelector("#modifier").addEventListener("click", () => {
    if (document.querySelector("#modificationInformation").style.display === "none") {
        document.querySelector("#modificationInformation").style.display = "block";
        document.querySelector("#peopleInformation").style.display = "none";
        document.querySelector("#btnSupprimer").style.display = "none";    
    } 
});

document.querySelector("#account_options").style.display = "none";

document.querySelector("#account").addEventListener("click", () => {
    if (document.querySelector("#account_options").style.display === "none") {
        document.querySelector("#account_options").style.display = "block";
    } else {
        document.querySelector("#account_options").style.display = "none";
    }
});


document.querySelector("#profile").addEventListener("click", () => {
    document.location.href = '../php/profil.php';
});
