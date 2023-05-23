<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
</head>
<body>
    <div>
            <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="#">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Registrar usuário</a>
        </li>
        </ul>
    </div>


<table id="employees" class="table"></table>


<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input id="id" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button onclick= pesquisa() class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
<script>

fetch('http://127.0.0.1:8001/api/', {
   headers: {
      'Accept': 'application/json'
   }
})
   .then(response => response.json())
   .then(text => {

    let data = text.data


    let tab =
        ` <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">telefone</th>

    </tr>
  </thead>
         
         
         `;
         
         

         
    for (let i = 0; i < data.length; i++) {
        
        

        tab += `<tr>
    <td>${data[i]['id']} </td>
    <td>${data[i]['name']} </td>
    <td>${data[i]['telefone']} </td>

</tr>`;




   }

   document.getElementById("employees").innerHTML = tab;
   
}
   )
   

  function pesquisa() {
    
    let id = document.getElementById("id").value;

    fetch('http://127.0.0.1:8001/api/search_contato', {
    method: 'POST',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({ "id": id })
})
.then(response => response.json())
   .then(text => {

    let tab =
        ` <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">telefone</th>

    </tr>
  </thead>
         
         
         `;

         tab += `<tr>
    <td>${text.data.id} </td>
    <td>${text.data.name} </td>
    <td>${text.data.telefone} </td>


</tr>`;

document.getElementById("employees").innerHTML = tab;

    
}
   )
  

  }

 
    </script>

</body>
</html>