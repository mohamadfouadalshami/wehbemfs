// <!-- to show notification when download successfully complete -->

function showNotification() {
    var notification = document.querySelector('.notification');
    notification.style.display = 'block';
    setTimeout(function() {
     notification.style.display = 'none';
    }, 3000);
   }