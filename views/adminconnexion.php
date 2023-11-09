<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<p class="fs-4 text-center text-capitalize lh-lg">connexion <br> admin</p>



<div class="container text-center mx-auto p-2 containerForm">
<form action="#" method="post">
  <div class="form-group mb-3">
    <label for="exampleInputEmail1"></label>
    <input type="text" class="form-control" id="adm_login" placeholder="Login" name="adm_login">
    <span class="text-danger fs-5"><?= $errors['adm_login'] ?? "" ?></span>
  </div>
  <div class="form-group mb-3">
    <label for="password"></label>
    <input type="password" class="form-control" id="adm_password" placeholder="Password" name="adm_password">
    <span class="text-danger fs-5"><?= $errors['adm_password'] ?? "" ?></span>
  </div>
  <button type="submit" class="btn  mt-3">Connexion</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
