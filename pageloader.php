<section class="content">
    <?php 
        if (isset($_GET["content"])){
            if($_GET["content"] == "Producten"){
                ?><main class="container-fluid px-lg-5">
                    <div class="container-fluid px-lg-5">
                        <!-- pagina -->
                        <div class="row">
                        <div id='main' class="col-12"><br><?php include("./" . $_GET["content"] . ".php"); ?></div>
                        </div>
                    </div>
                </main><?php
            }else{
            ?><main class="container">
                <!-- pagina -->
                <div class="row">
                <div id='main' class="col-12"><br><?php include("./" . $_GET["content"] . ".php"); ?></div>
                </div>
            </main><?php
            }
        }else{
            ?><main class="container">
                <!-- pagina -->
                <div class="row">
                <div id='main' class="col-12"><br><?php include("./product.php"); ?></div>
                </div>
            </main><?php
        }
    ?>
</section>