function updateItem(Id) {
    
    // alert('ok');
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            readItem();  
        }
    }
    xhr.open("POST", "../php/updateItem.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("count=" + document.getElementsByName('count'+Id)[0].value+"&IdItem="+Id);
    
    return false; 
}

