<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script>
        function SubmitForm() {
            document.LoginForm.submit();
            document.LoginForm.reset();

        }
    </script>

</head>

<body>

    <!-- including navbar -->
    <?php

    ?>


    <div class="container my-4">

        <form name="LoginForm" action="indexlogin.php" method="POST">

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-group col-md-6 mt-4">
                <button type="button" class="btn btn-primary" id="btnsubmit" onclick="SubmitForm()">Submit</button>
            </div>
        </form>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>