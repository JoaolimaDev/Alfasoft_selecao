<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <style>
            body {
                font-family: 'Nunito', sans-serif;
            }


      </style>

      <script>

        

        function html(params) {

          
let tab =
        `   <thead class="thead-dark" id = "contatos">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">TELEFONE</th>
      <th scope="col">FUNÇÕES</th>
      

    </tr>
  </thead>
         
         
         `;


          for (let i = 0; i < params.length; i++) {
        
            
              tab += `<tr>
              <td>${params[i]['id']} </td>
              <td>${params[i]['name']} </td>
              <td>${params[i]['telefone']} </td>
              

            `;


            tab += `
            <td>
         
<button onclick= "set(${params[i]['id']})" type="button" class="btn btn-danger" > Deletar


</button>

<button type="button" class="btn btn-success">Atualizar</button>


</td>
</tr>
`;

            
          }

          document.getElementById("table_body").innerHTML = tab;

        }

        function html_02(params) {
          
                    
let tab =
        `   <thead class="thead-dark" id = "contatos">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">TELEFONE</th>

    </tr>
  </thead>
         
         
         `;


          for (let i = 0; i < params.length; i++) {
        
            
              tab += `<tr>
              <td>${params[i]['id']} </td>
              <td>${params[i]['name']} </td>
              <td>${params[i]['telefone']} </td>
              

            `;

       
       
        }

        document.getElementById("table_body").innerHTML = tab;

      }

        axios.get('http://127.0.0.1:8000/api')
        .then(response => {

         let cookie = document.cookie;

  
         const parts = cookie.split(`; username=`);


          if (parts[1] == "User login successfully.") {

            html(response.data.data);
          }else{

            html_02(response.data.data);

          }

        }).catch(
          error => {
            console.log(error);
            
        });


        const set = (evt) =>{


          var x;
          var r=confirm("Deseja realmente deletar este");
          if (r==true)
            {
            x= true;
            }
          else
            {
            x=false;
            }


            if (x === true) {
              
              axios.post('http://127.0.0.1:8000/api/delete', { id: evt}, {

              headers: {
                'content-type': 'application/json'
              }

              }).then(response => {

                alert("Deletado com sucesso!")

                window.location.href = "http://127.0.0.1:8000/";


              }).catch(error => {
                
                alert("Erro ao deletar! Tente novamente mais tarde.")
              });
            }

        

        }
        
        const update = () => {

          

          axios.post('http://127.0.0.1:8000/api/search_contato', { id:  document.getElementById('textbox_id').value }, {

          headers: {
            'content-type': 'application/json'
          }

          }).then(response => {

          
            let cookie = document.cookie;

  
         const parts = cookie.split(`; username=`);

         let tab= '';


         if (parts[1] == "User login successfully.") {

   tab +=
        `   <thead class="thead-dark" id = "contatos">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">TELEFONE</th>
      <th scope="col">FUNÇÕES</th>


    </tr>
  </thead>
         
         
         `;
            
            
            tab += `<tr>
              <td>${response.data.data.id} </td>
              <td>${response.data.data.name} </td>
              <td>${response.data.data.telefone} </td>
            
             `;
            

             tab += `
            <td>
         
<button onclick= "set(${response.data.data.id})" type="button" class="btn btn-danger" > Deletar


</button>

<button type="button" class="btn btn-success">Atualizar</button>


</td>
</tr>
`;
  }else{


 

   tab +=
        `   <thead class="thead-dark" id = "contatos">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">TELEFONE</th>

    </tr>
  </thead>
         
         
         `;
            
            
            tab += `<tr>
              <td>${response.data.data.id} </td>
              <td>${response.data.data.name} </td>
              <td>${response.data.data.telefone} </td>
            
             `;
          
  }
         

            document.getElementById("table_body").innerHTML = tab;


          }).catch(error => {
            
            console.log(error.code);

          });


        }
    
  </script>
  
</head>
<body>
  

    <div class="pad">
    <nav class="navbar navbar-dark bg-dark" >
      <ul class="nav">

        <li class="nav-item">
          <a class="nav-link active" href="http://127.0.0.1:8000/login">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="http://127.0.0.1:8000/register">Registrar usuário</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="http://127.0.0.1:8000/register_contact">Registrar Contato</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="http://127.0.0.1:8000/register_contact">Deslogar</a>
        </li>


      </ul>

      <form class="form-inline">
      <input   oninput="update()" id="textbox_id" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      </form>

    </nav>
       
    </div>


    <table class="table">
 
  <tbody id = "table_body">

  </tbody>

  
  
</table>

</body>
</html>