<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fjalla+One&family=Mitr:wght@200&display=swap"
        rel="stylesheet">
    <!--<script src="js/script.js"></script>-->
    <link rel="stylesheet" href="css/style.css">

    <title>Registration</title>
</head>

<body>
    <?php include 'navbar-dark.php' ?>
    <div class="container">

        <form class="row g-3 registration" id="registration" method="POST" action="addMemberDemo.php">
            <h1 class="topic">Registration Form</h1>
            <div class="col-md-12 mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-12 ">
                <label for="gender" class="form-label labelGap">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female"
                        checked>
                    <label class="form-check-label" for="inlineRadio1">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male">
                    <label class="form-check-label" for="inlineRadio2">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_other" value="other">
                    <label class="form-check-label" for="inlineRadio3">Other</label>
                </div>
            </div>
            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-md-6">
                <label for="re-password" class="form-label">Re-Password</label>
                <input type="password" class="form-control" id="re_password" name="re_password">
            </div>
            <div class="col-md-12">
                <label for="inputAddress" class="form-label">Address</label>
                <textarea name="address" id="address" cols="30" rows="5" class="form-control" name="address"></textarea>

            </div>


            <div class="col-md-12 mb-3">
                <label for="province" class="form-label">Province</label>
                <select id="province" class="form-control" name="province">
                    <option value="Surat Thani" selected>Surat Thani</option>
                    <option value="Bangkok">Bangkok</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">

                <label for="province" class="form-label">Sources: </label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="chanel_internet" name="chanel_internet"
                        value="1">
                    <label class="form-check-label" for="chanel_internet">
                        Internet
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="chanel_friend" name="chanel_internet" value="2">
                    <label class="form-check-label" for="chanel_friend">
                        Friends
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="chanel_other" name="chanel_internet" value="3">
                    <label class="form-check-label" for="chanel_other">
                        Other
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Sign Up</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
            <p class="error mt-3" id="error"></p>
        </form>
    </div>





    <?php include 'footer.html' ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>



</body>

</html>