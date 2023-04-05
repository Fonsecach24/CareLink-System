<?php
include('protect.php');

	
?>
<?php
if(!isset($_SESSION)){
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
    <title>Marcação-Consultas Médicas</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    
    <header>
        <section class="left">
            <a href="logout.php" class="iconeSector">
                <ion-icon name="arrow-back" id="voltar"></ion-icon>
            </a>
            <a href="#name"><span class="white-text name">Olá, <?= $_SESSION['nome']?></span></a> 
            <h1>Consultas Médicas</h1>
        </section>

        <section class="rebith">
            <img src="../sistema2/imagens/g20191227-12013-1ka3nc.png" alt="" id="img">
        </section>
    </header>
    <main class="corpo">
        <ion-icon name="arrow-up-circle-outline" id="subir" onmouseenter="mostrarRodape()"></ion-icon>
        <form class="form-horizontal" action="processa.php" method="post"> 
          <div class="col-sm-3 col-sm-offset-3">         
                    <label>Nome</label>
                    <input class="form-control" type="text" name="nome" placeholder="Digite seu nome" required> 
                </div>
                <div class="col-sm-3"> 
                    <label>Número de Telefone</label>         
                    <input class="form-control" type="text" name="telefone" placeholder="Digite seu telefone" required>
                </div>
                <div class="col-sm-6 col-sm-offset-3">	
                    <label>Consultas</label>
                    <select name="tipo_consulta" class="form-control">
                        <option value="" selected=>Selecione Consulta</option>
                        <option>CONSULTAS DE OZONOTERAPIA</option>
                        <option>INFERTILIDADE</option> 
                        <option>DIFINÇÃO SEXUAL</option> 
                        <option>TERMOGRAFIA</option> 
                        <option>ANALISE QUANTICO</option> 
                        <option>CLINICA GERAL</option> 
                        <option>CONSULTAS PEDIATRIA</option> 
                        <option>PUERICULTURA</option> 
                        <option>CARDIOLOGIA</option> 
                        <option>UROLOGIA</option> 
                        <option>GINECOLOGIA</option> 
                        <option>OBSTETRICIA</option> 
                        <option>PLANEJAMENTO FAMILIAR</option> 
                        <option>DERMATOLOGIA</option> 
                        <option>OFTALMOLOGIA</option>  
                        <option>OTORRINO</option>  
                        <option>ECOGRAFIAS</option>  
                        <option>GASTROENTEROLOGIA</option>  
                        <option>CONSULTA DE ONCOLOGIA</option>    
                        <option>CONSULTA DE MAMA (MASTOLOGIA)</option>  
                        <option>CONSULTA DE NUTRICION (ADULTOS)</option>  
                        <option>CONSULTA DE NEONATOLOCIA</option>  
                        <option>CONSULTA DE NEURO DESENVOLVIMENTO</option>
                        <option>CONSULTA DE NUTRICION (CRIANÇA)</option>
                        <option>CONSULTAS DE PSICOLOGIA</option>
                        <option>PSIQUIATRIA</option>
                        <option>CONSULTAS DE ORTOPEDIA</option>
                        <option>CONSULTAS DE CIRURGIA</option>
                    </select>  			
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <label>Data e hora</label>
                    <div class="input-group date data_formato" data-date-format="dd/mm/yyyy HH:ii:ss">
                        <input class="form-control" type="text" name="data" placeholder="Data do serviço">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </span>
                    </div> 
                </div>
                
                <div class="col-sm-offset-3 col-sm-6"><br>
                    <button type="submit" class="btn btn-success">Marcar</button>
                    <a class="btn btn-primary btn_carrega_conteudo" href='#' id="pagina">Pacientes Registrados</a><br><br>
                    <?php
                        if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                        }
                    ?>
                </div>
                
        </form>


            <div class="col-sm-6 col-sm-offset-3" id="div_conteudo"><!-- div onde será exibido o conteúdo-->
                <img id="loader" src="loader.gif" style="display:none;margin: 0 auto;">
            </div>  



        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
        <script type="text/javascript">
            $('.data_formato').datetimepicker({
                weeKStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                language: "pt-BR",
                startDate: '-0d'
            });

        $(document).ready(function(){// Ao carregar a página faça o conteudo abaixo
            $('.btn_carrega_conteudo').click(function(){// Ao clicar no elemento que contenha a classe .btn_carrega_conteudo faça...
                            
            var carrega_url = this.id; //Carregar url pegando os dados pelo ID
            carrega_url = carrega_url+'_listar.php'; //Carregar a url e o conteudo da página
                            
                $.ajax({ //Carregar a função ajax embutida no jQuery
                    url: carrega_url,
                                
                    //Variável DATA armazena o conteúdo da requisição
                    success: function(data){//Caso a requisição seja completada com sucesso faça...
                        $('#div_conteudo').html(data);// Incluir o conteúdo dentro da DIV
                    },
                                
                    beforeSend: function(){//Antes do envio do cabeçalho faça...
                        $('#loader').css({display:"block"});//carregar a imagem de load
                    },
                                
                    complete: function(){//Após o envio do cabeçalho faça...
                        $('#loader').css({display:"none"});//esconder a imagem de load
                    }
                });  
            });
        });
        </script>

            <script>
                function mostrarRodape(){
                    let rodape = document.querySelector('.footer')
                    rodape.style.visibility='visible'
                }

                function fecharRodape(){
                    let rodape = document.querySelector('.footer')
                    rodape.style.visibility='hidden'
                }
            </script>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <footer class="footer">
        
        <ion-icon name="close-circle-outline" id="fechar" onmouseenter="fecharRodape()"></ion-icon>
        <div class="container-footer">
          <div class="row-footer">
            <!-- footer col -->
            <div class="footer-col">
              <h4>EMPRESA</h4>
              <ul>
                <li> <a href="">Quem Somos</a> </li>
                <li> <a href="">Nossos Serviços</a> </li>
              </ul>
            </div>
            <!-- End Footer col -->
                  <!-- footer col -->
            <div class="footer-col">
              <h4>Obter Ajuda</h4>
              <ul>
                <li> <a href="">FAQ</a> </li>
                <li> <a href="">Transporte</a> </li>
                <li> <a href="">Insatisfações</a> </li>
              </ul>
            <!-- End Footer col --> 
            </div>
            <!-- footer col -->
            <div class="footer-col">
              <h4>Online</h4>
              <ul>
                <li> <a href="">gsfgg</a> </li>
                <li> <a href="">gdfgdfgdf</a> </li>
              </ul>
            </div>
            <!-- End Footer col --> 
            <!-- footer col -->
            <div class="footer-col">
              <h4>Vídeo</h4>
              <div class="Vídeo">
                <iframe src="https://www.facebook.com/plugins/video.php?height=317&href=https%3A%2F%2Fwww.facebook.com%2Fwww.medisaf.com.ao%2Fvideos%2F1014429849394060%2F&show_text=false&width=560&t=0" width="560" height="317" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
              </div>
              <!-- End Footer col -->
            </div>
          </div>
        </div>
    </footer>
</body>
</html>
