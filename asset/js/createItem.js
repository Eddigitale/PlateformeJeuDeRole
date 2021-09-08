function createItem() {
    let form = document.querySelector("#envoi_text");
    var data = new FormData(form);
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            readItem();
        }
    }

    xhr.open("POST", "../php/createItem.php", true);
    xhr.send(data);
    document.querySelector("#writting-zone").value = "";
    return false; 
}

document.getElementById("envoi_text").addEventListener("submit", function (e) {
    e.preventDefault();
    createItem();
});