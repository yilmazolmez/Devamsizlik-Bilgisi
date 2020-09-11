<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script>
// Get the modal
var modal = document.getElementById('id01');
var icerik = document.getElementById('a');
var cikis = document.getElementById('cikis');
var sifrekontrol = document.getElementById('sifrekontrol');
 
// herhangi bir yere basınca pencere kapanması için
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
       if (event.target == icerik) {
        icerik.style.display = "none";
    }
       if (event.target == cikis) {
        cikis.style.display = "none";
    }
      if (event.target != sifrekontrol) {
        sifrekontrol.style.display = "none";
    }
   
}


 


</script>



