var app = require("express")();
var http = require("http").Server(app);
io = require("socket.io")(http);

io.on("connection", function (socket) {
  console.log("a user is connected");
  socket.on("disconnect", function () {
    console.log("a user is disconnected");
  });
  socket.on("chat message", function (tab) {
    console.log("message recu: " + tab[0] + ":"+ tab[1]);
    io.emit("chat message", tab);
  });
    socket.on("diceRandom", function (tab2) {
    console.log("résultat dé recu: " + tab2[0] + " sur "+ tab2[1]);
    io.emit("diceRandom", tab2);
  });
});
http.listen(3000, function () {
  console.log("server running on 3000");
});
