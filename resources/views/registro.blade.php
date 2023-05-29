<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Document</title>
</head>
<body>

    <script>

    function criar() {

        let nome = document.getElementById('nome').value;

        let telefone = document.getElementById('telefone').value;

        let email = document.getElementById('email').value;

        let senha = document.getElementById('password').value;

        let c_senha = document.getElementById('c_password').value;

        axios.post('http://127.0.0.1:8000/api/register', { name: nome, telefone : telefone, email:email,
        password: senha, c_password: c_senha}, {

        headers: {
        'content-type': 'application/json'
        }

        }).then(response => {
            alert("Usuário cadastrado!")

            window.location.href = "http://127.0.0.1:8000/";


        }).catch(error => {

            alert("Erro ao adicionar usuário!")

        });



    }

    </script>

<div class="form-floating mb-3">
  <input id="nome" class="form-control"  >
  <label for="floatingInput">Nome</label>
</div>

<div class="form-floating mb-3">
  <input id="email" class="form-control"  >
  <label for="floatingInput">Email</label>
</div>


<div class="form-floating mb-3">
  <input id="telefone" class="form-control"  >
  <label for="floatingInput">Telefone</label>
</div>

<div class="form-floating">
  <input id="password" class="form-control" type="password">
  <label for="floatingPassword">Senha</label>
</div>

<div class="form-floating mb-3">
  <input id="c_password" class="form-control"  type="password"  >
  <label for="floatingInput">Confirme a senha</label>
</div>


<button onclick="criar()" type="button" class="btn btn-primary">Criar</button>

    
</body>
</html>