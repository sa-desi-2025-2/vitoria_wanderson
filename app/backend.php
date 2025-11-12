<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashcore</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .main-container {
      display: flex;
      flex: 1;
    }

    .sidebar {
      width: 250px;
      background-color: #BB9CDD;
      padding: 20px;
      border-right: 1px solid #ddd;
      height: 100vh;
      position: sticky;
      top: 0;
    }

    .sidebar a {
      display: block;
      color: #333;
      text-decoration: none;
      padding: 10px 15px;
      border-radius: 5px;
      margin-bottom: 5px;
    }

    .sidebar a:hover {
      background-color: #FFFFFF;
      color: #000000;
    }

    .content {
      flex: 1;
      padding: 30px;
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }
    }
  </style>
</head>
<body>
  


<div class="main-container">

  <div class="sidebar">
    <h5>Menu</h5>
    <a href="#"> Cadastro</a>
    <a href="#">Login</a>
    <a href="#"> Sair</a>
  </div>
  <div class="content">
    <h1>Início</h1>
    <p>Bem-vindo ao inicio do Dashcore!</p>
  </div>
</div>
</body>
</html>
</html>