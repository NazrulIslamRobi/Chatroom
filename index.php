
<html>

<head>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h3 class="text-center mt-5">Public Chat Room</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="chat-wrapper">
                            <div class="chat-body" style="height: 550px; overflow-y: scroll;">

                            </div>

                            <input type="text" class="write_msg form-control" placeholder="Type a message" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        let name;

        (function($) {
            $(document).ready(function() {
                name = prompt("What is your name?");
                if (name == '') {
                    $(".write_msg").css("display", "none");
                }
                $('.write_msg').focus();
            });



            $('.write_msg').on('keypress', function(e) {

        

                if (e.keyCode == 13) {
                    let msg = $('.write_msg').val();
                    $('.write_msg').val('');


                    $.ajax({
                        method: "POST",
                        url: "data.php",
                        data: {
                            "msg": msg,
                            "sender": name
                        }
                    }).done(function(data) {

                        $('.chat-body').html(data);

                         $('.chat-body').scrollTop($('.chat-body').prop('scrollHeight'));

                    });


                }
            });

            setInterval(function() {
               
                $.post('data.php', {
                    'refresh': 1
                }, function(data) {

                    $('.chat-body').html(data);

                     $('.chat-body').scrollTop($('.chat-body').prop('scrollHeight'));
                });
            }, 500);

        })(jQuery);
    </script>
</body>

</html>