function readItem() {
  function reqListener() {
    if (this.readyState == 4 && this.status == 200) {
      let res = this.response;
      console.log(res);
      
      if (res != null) {
        document.querySelector("#zone_text").innerHTML = "";
        res.forEach(element => {
          document.querySelector("#zone_text").innerHTML +=
          "<div class='ligne'>" +
          "<div class='item'>" +
          element.Items +
          "</div>" +
          "<div class='regroup_button regroup_button-" + element.Id + "'><div class = 'value'>" +
          element.Counter + '</div><div>'+
          '<i id="modification-' + element.Id + '" onclick= "onclic(' + element.Id + ') " class=" fas fa-pencil-alt"></i>' +
          '<i id="delete-' + element.Id + '" onclick="supprimer('+element.Id+')" class=" fas fa-trash-alt"></i></div> </div>' +
          '<div class="regroup_button2 regroup_button2-' + element.Id + '" >  <form class ="itemValue"> <input class ="counter" type="number" name="count'+ element.Id +'"autofocus>' +
            '<i class="fas fa-check valider' + element.Id + '" onclick = "modifier(' + element.Id + ')"></i> </form> </div></div ><br/>' ;
          document.querySelector("#zone_text").scrollTop = 1000000;
        });  
      } else {
        document.querySelector("#zone_text").innerHTML += "";
      }
    }
  }
  
  var xhr = new XMLHttpRequest();
  xhr.onload = reqListener;
  xhr.open("GET", "../php/readItem.php", true);
  xhr.send();
  xhr.responseType = "json";
}

function onclic(Id) {
  document.querySelector(".regroup_button-"+Id).style.display = "block";
  if (document.querySelector(".regroup_button-"+Id).style.display === "block") {
    document.querySelector(".regroup_button-"+Id).style.display = "none";
    document.querySelector(".regroup_button2-"+Id).style.display = "block";
  }
}

function supprimer(Id){
  deleteItem(Id);
}

function modifier(Id) {
  updateItem(Id);
  document.querySelector(".regroup_button2-"+Id).style.display = "block";
  if (document.querySelector(".regroup_button2-"+Id).style.display === "block") {
    document.querySelector(".regroup_button2-"+Id).style.display = "none";
    document.querySelector(".regroup_button-"+Id).style.display = "block";
  }
  
}

