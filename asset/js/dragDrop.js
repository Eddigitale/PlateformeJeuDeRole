var f = function(){
    function Draggable(element){
        this.element = element;
        this.element.classList.add('draggable');
        var self = this;

        var move = function(event){
           //don't bubble this event - mousedown
            event.stopPropagation();
            //prevent any default action
            event.preventDefault();

            var originalLeft = parseInt(window.getComputedStyle(this).left);
            var originalTop = parseInt(window.getComputedStyle(this).top);
            var mouseDownX = event.clientX;
            var mouseDownY = event.clientY;

          function dragMe(event) {
            self.element.style.zIndex = 0;
                self.element.style.left = originalLeft + event.clientX - mouseDownX + "px";
                self.element.style.top = originalTop + event.clientY - mouseDownY + "px";
                event.stopPropagation();
            }

            function dropMe(event){
                document.removeEventListener('mousemove',dragMe,true);
                document.removeEventListener('mouseup',dropMe,true);
                event.stopPropagation();
            }

            document.addEventListener('mouseup',dropMe,true);
            document.addEventListener('mousemove',dragMe,true);

        };

        this.element.addEventListener('mousedown',move,false);
    }
    
    let imageElement = [];
    
    for (let i = 0; i < document.getElementById("zone-objet").getElementsByTagName('img').length; i++){
        imageElement[i] = document.getElementById('image'+(i+1));
        var dragObject = new Draggable(imageElement[i]);
    }
};

window.addEventListener('load', f, false); 