document.querySelector("#diceOptions").style.display = "none";

document.querySelector("#diceButton").addEventListener("click", () => {
    if (document.querySelector("#diceOptions").style.display === "none") {
        document.querySelector("#diceOptions").style.display = "block";
    } else {
        document.querySelector("#diceOptions").style.display = "none";
    }
});

var elements = document.getElementsByName('diceValue');
let diceResult;
let diceValue;

document.querySelector("#diceValidation").addEventListener("click", () => {
    
    for (let i = 0; i < elements.length; i++){
       if (elements[i].checked) {
           if (elements[i].value == "diceCrafting") {
               diceResult = Math.floor(Math.random() * document.querySelector("#diceCrafting").value) + 1;
               diceValue = document.querySelector("#diceCrafting").value;
               sendDice();
               document.querySelector('.zone-dragdrop').innerHTML ='<span class="déResultatPosition">'+'<span class ="styleResultatDé">'+ diceResult+"</span>" + ' sur ' + diceValue+ '</span>';
                 setTimeout(function() {
                 document.querySelector('.zone-dragdrop').innerHTML = "";
                 },4000);
           }
           else {
               diceResult = Math.floor(Math.random() * elements[i].value) + 1;
               diceValue = elements[i].value;
               sendDice();
            document.querySelector('.zone-dragdrop').innerHTML = '<span class="déResultatPosition">'+'<span class ="styleResultatDé">'+diceResult+"</span>" + ' sur ' + diceValue+ '</span>';
            setTimeout(function() {
                 document.querySelector('.zone-dragdrop').innerHTML = "";
                 },3000);
           }
       }
    } 
})
for (let i = 0; i < elements.length; i++){
elements[i].addEventListener("change", () => {
    if (elements[i].value == "diceCrafting") {
        document.getElementById("diceCrafting").disabled=false;
    }
    else {
          document.getElementById("diceCrafting").disabled=true;
    }
})
}
    
                     
var socket = io('http://localhost:3000');
var sendDice = function () {
     let tab2 = [diceResult, diceValue];
    console.log(tab2);
    socket.emit("diceRandom", tab2);
    
    }
    ;


var recieve = function (tab2) {

   document.querySelector(".zone-dragdrop").innerHTML ='<span class="déResultatPosition">'+'<span class ="styleResultatDé">'+tab2[0]+"</span>" + ' sur ' + tab2[1]+ '</span>';
 setTimeout(function() {
         document.querySelector('.zone-dragdrop').innerHTML = "";
     },3000);
};
   
 socket.on("diceRandom", recieve);















// On affiche le message

 
// On l'efface 8 secondes plus tard

/*if (document.getElementsByName("diceValue").value == "diceCrafting") {
    document.form.text.disabled=false;
    
    
}*/
