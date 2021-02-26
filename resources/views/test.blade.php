<!DOCTYPE html>

<html lang="en">
@php
    $status = 1;

if(isset($_POST['grade1']))
    $status = 'Hello world';
@endphp
<head>

    <title>Bootstrap Example</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>درجات الطالب</h2>

        <form action="test.php" method="POST">

            <div class="form-group">

                <label for="num">درجة اختبار شهر الأول:</label>

                <input type="text" class="form-control" id="email" name="grade1">

            </div>

            <div class="form-group">

                <label for="pwd">درجة اختبار شهر الثاني:</label>

                <input type="text" class="form-control" id="num" name="grade2">

            </div>
            <div class="form-group">

                <label for="pwd">درجة اختبار النهائية:</label>

                <input type="text" class="form-control" id="num" name="final">

            </div>

            <div class="form-group form-check">

                <button type="submit" class="btn btn-primary">انهاء</button>

            </div>
            <div class="form-group">

                <label for="pwd">انت:<?php echo $status; ?></label>


            </div>

        </form>
</body>

</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
