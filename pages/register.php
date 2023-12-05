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
        <div class="card__body">
            <form>
                <div class='form-control'>
                    <label for='email'>Email</label>
                    <input id='email' type='email'  required/>
                </div>
                <div class='form-control'>
                    <label for='name'>Nazwa Firmy</label>
                    <input id='name' type='text'  required/>
                </div>
                <div class='form-control'>
                    <label for='password'>Hasło</label>
                    <input id='password' type='text' required/>
                </div>
                <button type='submit' class='btn btn__big btn__primary'>Dodaj</button>
            </form>
        </div>
        <div class="card__footer">
            <a href="/login">Masz już konto ? Zaloguj się!</a>
        </div>
    </div>
</body>
</html>
