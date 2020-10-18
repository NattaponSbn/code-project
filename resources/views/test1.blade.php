<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <style>
        .panel-heading {
    position: sticky;
    width: 100%;
    z-index: 99999;
    top: 0;
}
.div1 {
    opacity: 0.4;
    filter: alpha(opacity=40);
}
    </style>

</head>



<body>
    <div class="container">
        <div class="row">

            <form action="input_rate" method="post">
                @csrf
                <div>
                    <h3>Student Rating System</h3>
                </div>

                <div>
                    <label>Name</label>
                    <input type="text" name="name">
                </div >
               
                   <img src="img/test1.png" class="rateyo"  id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
              
                    
               


                <span class='result'>0</span>
                <input type="hidden" name="rating">

        </div>

        <div><input type="submit" name="add"> </div>

        </form>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>
        $(function() {
            $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :' + rating);
                $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
            });
        });
    </script>
</body>

</html>