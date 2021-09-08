function deleteItem(Id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            readItem();
            console.log(this);        
        }
    }

    xhr.open("POST", "../php/deleteItem.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("IdItem="+Id);
    document.querySelector("#writting-zone").value = "";
    return false; 
}