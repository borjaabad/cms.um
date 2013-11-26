
    function resizeIframe(){
       $('iframe').height(getDocHeight() - 6 + 'px');
       
       window.onresize = function(event) {
            $('iframe').height(getDocHeight() - 6 + 'px');
        }
   }
   
   



        
    function getDocHeight() {
    var D = document;
    return Math.max(
        Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
        Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        Math.max(D.body.clientHeight, D.documentElement.clientHeight)
    );
} 