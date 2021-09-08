document.querySelector("#inventory").style.display = "none";
document.querySelector("#button-chest").addEventListener("click", onclick);

function onclick() {
  if (document.querySelector("#inventory").style.display === "none") {
    document.querySelector("#inventory").style.display = "block";
  } else {
    document.querySelector("#inventory").style.display = "none";
  }
}

readItem();
sessionStorage.setItem('pseudo', document.querySelector('#account').textContent);

