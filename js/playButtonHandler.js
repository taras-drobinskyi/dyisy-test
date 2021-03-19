$(document).ready(function () {

   $('.play-button').click((event) => {
       let btnId = event.target.id

       $.ajax({
           type: 'post',
           url: '/app/LogHandler.php',
           dataType:'json',
           data: {
               id: btnId
           },
           success: function (response) {
                console.log(JSON.stringify(response))
           },
           error: function (error) {
                console.log(JSON.stringify(error))
           }
       });
   })



});


