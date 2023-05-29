<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <title>Login AlfaSoft</title>
</head>
<body>

<script>

 const logar = () => {

    let email = document.getElementById('email').value;

    let senha = document.getElementById('password').value;
 

    axios.post('http://127.0.0.1:8000/api/login', { email: email, password: senha}, {

headers: {
  'content-type': 'application/json'
}

}).then(response => {

 
  document.cookie = "username=" + response.data.message ; 

  
  window.location.href = "http://127.0.0.1:8000/";

}).catch (error => {


    console.log(error);

});

}

</script>


<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input id="email" type="email" class="form-control"  aria-describedby="emailHelp">
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input id="password" type="password" class="form-control" >
  </div>

  <button onclick="logar()" type="button" class="btn btn-primary">Submit</button>
</form>
</body>
</html>