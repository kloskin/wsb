<!doctype html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset("css/style.css")}}">
  <title>Użytkownik</title>
</head>
<body>
  <h3>Dane użytkownika</h3>
  @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  @endif
  <form action="CreateUser" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Podaj nazwe użytkownika" autofocus value="{{old('name')}}">
    @error('name'){{$message}}@enderror<br><br>
    <input type="email" name="email" placeholder="Podaj email" value="{{old('email')}}"> @error('email'){{$message}}@enderror<br><br>
    <input type="text" name="email_confirmation" placeholder="Powtórz email" value="{{old('email_confirmation')}}"> @error('email_confirmation'){{$message}}@enderror<br><br>
    <input type="password" name="password" placeholder="Podaj hasło" value="{{old('password')}}"> @error('password'){{$message}}@enderror<br><br>
    <input type="password" name="password_confirmation" placeholder="Powtórz hasło" value="{{old('password_confirmation')}}"> @error('password_confirmation'){{$message}}@enderror<br><br>
    <input type="submit" value="Dodaj użytkownika">
  </form>
</body>
</html>
