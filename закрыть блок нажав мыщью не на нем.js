//Close form when you click outside of the field element 
$(document).mouseup(function (e) {
   var container = $("form");
   if (container.has(e.target).length === 0){
       container.hide();
   }
});
