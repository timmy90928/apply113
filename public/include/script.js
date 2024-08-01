// <script language="JavaScript1.2" type="text/javascript" src="./include/script.js"></script>
String.prototype.hashCode = function (){
    var hash = 0;
    if ( this .length == 0) return hash;
    for (i = 0; i < this .length; i++) {
        char = this .charCodeAt(i);
       hash = ((hash<<5)-hash)+char;
        hash = hash & hash; // Convert to 32bit integer
   }
    return hash;
}
console.log("asdsad".hashCode())