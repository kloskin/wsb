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
<h3>Użytkownicy</h3>

<table>
  <thead>
    <tr>
      <th>Nazwa Użytkownika</th>
      <th>Email</th>
      <th>Data stworzenia</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->created_at}}</td>
    </tr>
  @endforeach

  </tbody>

</table>
<br>
<a href="{{ route('forms.user') }}"> Dodaj użytkownika</a>

</body>
</html>
