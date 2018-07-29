<h1>page test</h1>
<html>
   
   <head>
      <title>View Student Records</title>
   </head>
   
   <body>
      <table border = 1>
         <tr>
            <td>ID</td>
            <td>Name</td>
         </tr>
         @foreach ($catys as $u)
         <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->name }}</td>
         </tr>
         @endforeach
      </table>
   
   </body>
</html>
