<h1>Inloggen</h1>
<p class="lead">voor oefeningen en persoonlijke voortgang.</p>
<form action="./index.php?content=login-script" method="post">
<div class="form-group">
    <label for="exampleFormControlInput1">Email adres</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="<?php if (isset( $_GET['email'])){echo $_GET['email'];} ?>">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Wachtwoord</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<div class="col-6">
    <button type="submit" class="btn btn-outline-info btn-lg btn-block">Log in</button>
</div>
</form>
</div> 