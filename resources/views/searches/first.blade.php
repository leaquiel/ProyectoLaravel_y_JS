<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>hola</h1>

    <ul>
      @foreach ($activities as $oneActivity)
        <li style="padding: 10px 0;">

          <p><b>Nombre:</b> {{ $oneActivity->name }}</p>

          
        </li>
      @endforeach
    </ul>
    {{ $activities->links() }}

  </body>
</html>
