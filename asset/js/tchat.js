  let name = sessionStorage.getItem('pseudo');
                        console.log(name);
                        var socket = io('http://localhost:3000');
                        var send = function() {
                            if (document.querySelector('#message').value !== '') {
                                var text = document.querySelector("#message").value;
                                let tab = [name, text];
                                console.log(tab);
                                socket.emit("chat message", tab);
                            }
                        };

                        var recieve = function(tab) {
                            var ladate = new Date()
                            var li = document.createElement("li");
                            var h = ladate.getHours();
                            if (h < 10) {
                                h = "0" + h
                            }
                            var m = ladate.getMinutes();
                            if (m < 10) {
                                m = "0" + m
                            }
                            var s = ladate.getSeconds();
                            if (s < 10) {
                                s = "0" + s
                            }
                            li.innerHTML = "<div class ='globalMsg'><div><span class='pseudoContainer'>" + tab[0] + ' : </span>' + tab[1] +
                                "</div><div>" + h + ":" + m + ":" + s + "</div></div>";
                            document.querySelector("#messages").appendChild(li);
                            document.querySelector(".tchat").scrollTop = 1000000;
                        };
                        socket.on("chat message", recieve);