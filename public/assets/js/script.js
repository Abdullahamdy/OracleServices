/*global $, jQuery, console, alert, prompt */
$(document).ready(function () {
     $('.active-sidebar').on('click', function () {
          $('.sidebar').toggleClass('side-active');
          $(this).toggleClass('open');
     });
     $('.active-sidebar').on('click', function () {
          $('.main').on('click',function (){
               $('.sidebar').removeClass('side-active');
          })
     });
          var input = document.getElementById('file-upload');
          var infoArea = document.getElementById('file-upload-filename');
          input.addEventListener('change', showFileName);

          function showFileName(event) {
          var input = event.srcElement;
          var fileName = input.files[0].name;
          infoArea.textContent = 'إسم الملف: ' + fileName;
     }
     
});
