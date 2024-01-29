<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zaloguj się do sytemu!</title>
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%">
    <div class="card no__hover">
        <h4>
            Rejestracja
        </h4>
        <div class="card__body"  >
            <form action="./api/signup.php" method="POST">
                <div class='form-control'>
                    <label for='email'>Email</label>
                    <input id='email' type='email' name="email" required/>
                </div>
                <div class='form-control'>
                    <label for='password'>Hasło</label>
                    <input id='password' type='password' name="password" required/>
                </div>
                <div class='form-control'>
                    <label for='passwordConfirm'>Hasło</label>
                    <input id='passwordConfirm' name="confirm_password" type='password' required/>
                </div>
                <button type='submit'  class='btn btn__big btn__primary'>Zarejestruj się</button>
            </form>
        </div>
        <div class="card__footer">
            <a href="/login">Masz już konto ? Zaloguj się!</a>
        </div>
    </div>
    <script src="https://unpkg.com/htmx.org@1.9.10" integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC" crossorigin="anonymous"></script>
</body>
</html>
