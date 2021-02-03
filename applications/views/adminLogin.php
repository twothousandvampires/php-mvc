<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel='stylesheet' href='/style.css' type='text/css'>
    <title>Document</title>
</head>
<body class ='container d-flex flex-row justify-content-center align-items-center'>
    <div class =''>
        <div class='container d-flex flex-column'>
            <form method = 'post' action="/admin/login" class ='text-center'>
                <input type="text" name = 'name' placeholder='имя'>
                <input type="text" name = 'password' placeholder = 'пароль'>              
                <div class = 'd-flex flex-row align-items-center justify-content-center  mt-4 '>
                    <button class = 'btn btn-info mr-4'type='submit'>Войти</button>
                    <a  class ='btn btn-secondary'href="../index/index">назад</a>
                </div>               
                           
            </form>
        </div>
    </div>
</body>
</html>

