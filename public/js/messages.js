(function(){

$(function(){
 
$( "#btnRefresh" ).click(function(event){
    
document.getElementById("messageListFrame").contentWindow.
location.reload(true);

});
});

})();
