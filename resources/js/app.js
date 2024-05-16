import './bootstrap.js';
import '~bootstrap/js/bootstrap.js';
$('#openBtn').on('click', function(event){
  event.preventDefault();
  $('#myModal').modal('show');
})
