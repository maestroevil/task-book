<?php
  if(isset($_POST['buttonExit'])){
    $_SESSION['autorization'] = false;
  }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand logo" href="#">Приложение-задачник</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="/about/task">Задание <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/about/dev">Разработчик<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <?php if( $_SESSION['autorization'] == false){ ?>
        <a class="btn-1" href="/account/login"> Авторизация </a>
      <?php } else{ ?>
        <p class="text-white"> <?php echo $_SESSION['nameUser'];?></p>
        <form  action="http://task-book/" method="POST">
          <input name='buttonExit' type="submit" value="Выход"> 
        </form>
      <?php }?>
    </div>
  </div>
</nav>