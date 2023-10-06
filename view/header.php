<style>
    @import url('https://fonts.googleapis.com/css2?family=Galada&family=Italianno&family=Josefin+Slab&display=swap');

    * {
        font-family: 'Josefin Slab', serif;
        margin: 0;
    }

    #ola {
        color: rgb(204, 204, 204);
        font-size: 1.5em;
    }

    #lo {
        font-size: 2em;
        margin: 1EM;
    }

    #nav1 {
        color: #c9c692;
    }

    #log,
    #lo {
        color: #c9c692;
    }

    .collapse {
        --bs-navbar-nav-link-padding-x: 3em;
    }

    .collapse a {
        color: white;
    }

    .titulo {
        margin: 0;
    }

    #nav1 {
        background: rgb(255, 255, 255);
        background: linear-gradient(0deg, rgba(255, 255, 255, 0) 0%, rgba(21, 13, 0, 1) 100%);
    }
</style>


<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top " id="nav1">

        <div class="container">

            <a class="navbar-brand " href="index.php">
                <img src="img/logo.png" alt="Bootstrap" width="80" height="80">
            </a>
            <div class="collapse navbar-collapse pl-5" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
                    <li class="nav-item">
                        <a id="inicio" class=" nav-link " href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a id="produtos" class="  nav-link" href="produtos.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a id="sobre" class=" nav-link" href="sobre.php">Sobre nós</a>
                    </li>
                </ul>

            </div>

            <div class="icons">
                <?php


                if (!empty($_SESSION['email'])) {

                ?>
                    <a id="ola"><?php echo 'Olá, ' . ucfirst($_SESSION['nome']) . '!'; ?></a>
                    <a class="navbar-brand " id="lo" href="logout.php">
                        <i class="material-symbols-outlined">logout</i></a>
                <?php

                } else { ?>
                    <a class="navbar-brand " href="login.php">
                        <i class="material-symbols-outlined" id="log">person</i></a>
                <?php
                }
                ?>

            </div>
        </div>
    </nav>
</header>