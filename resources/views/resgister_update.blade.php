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

const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');

if (!id) {
    
    alert("Adicione o ID!");

    window.location.href = "http://127.0.0.1:8000/";

}

axios.post('http://127.0.0.1:8000/api/search_contato', { id: id }, {

headers: {
  'content-type': 'application/json'
}

}).then(response => {

   document.getElementById('nome').value = response.data.data.name;
    
   document.getElementById('telefone').value = response.data.data.telefone;
    
}).catch(error => {
    console.log(error)

});

function update() {

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    let nome = document.getElementById('nome').value;

    let telefone = document.getElementById('telefone').value;


    axios.put('http://127.0.0.1:8000/api/atualizar_contato', { id: id, name : nome, telefone : telefone}, {

    headers: {
    'content-type': 'application/json'
    }

    }).then(response => {

        console.log(response)

    }).catch(error => {

        console.log(error)
    });

    
}

</script>


<div class="form-floating mb-3">
  <input id="nome" class="form-control"  >
  <label for="floatingInput">Nome</label>
</div>
<div class="form-floating">
  <input id="telefone" class="form-control">
  <label for="floatingPassword">Telefone</label>
</div>


<button onclick="update()" type="button" class="btn btn-primary">Atualizar</button>


    
</body>
</html>