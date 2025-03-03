<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <?php    
    require 'inc/meta-header.php';
    require 'inc/functions.php';
  ?>
  <title><?php echo $branch ?> - Inclusão</title>
  

</head>

<?php
require 'inc/config.php';

$username = $login_user;
$password = $login_password;
 
if(isset($_POST['submit'])){
    if($_POST['username'] == $username && $_POST['password'] == $password){
        ?>

<body class="c-wrapper-body">
  <main class="c-wrapper-container">
    <div class="c-wrapper-paper">
      <div class="c-wrapper-inner">



        <h1 class="t t-h1"><?php echo $branch; ?> - Inclusão</h1>
        <p><?php echo $branch_description; ?></p>

        <?php isset($error_connection_message) ? print_r($error_connection_message) : "" ?>

        <h2 class="t t-h3 ">Inserir um XML do Lattes</h2>

        <form class="p-inclusao-form" action="lattes_xml_to_elastic_dedup.php" method="post" accept-charset="utf-8"
          enctype="multipart/form-data" title="Formulário de Inserção de XML do Lattes">

          <div class="input-group">
            <div class="custom-file">
              <input class="c-input--sm" type="file" id="fileXML" aria-describedby="Arquivo XML" name="file">
              <label class="custom-file-label" for="fileXML">Escolha o arquivo</label>
            </div>
            <input class="c-input--sm" type="text" placeholder="Instituição" name="instituicao">
            <input class="c-input--sm" type="text" placeholder="TAG" name="tag">
            <input class="c-input--sm" type="text" placeholder="Núm. funcional" name="numfuncional">
            <input class="c-input--sm" type="text" placeholder="Unidade" name="unidade">
            <input class="c-input--sm" type="text" placeholder="E-mail" name="email">
          </div>

          <div class="input-group">
            <input class="c-input--sm" type="text" placeholder="Departamento" name="departamento">
            <input class="c-input--sm" type="text" placeholder="Divisão" name="divisao">
            <input class="c-input--sm" type="text" placeholder="Seção" name="secao">
            <input class="c-input--sm" type="text" placeholder="Nome do PPG" name="ppg_nome">
            <input class="c-input--sm" type="text" placeholder="Área de concentração" name="area_concentracao">
            
          </div>
          <div class="input-group">
            <input class="c-input--sm" type="text" placeholder="Tipo de vínculo" name="tipvin">
            <input class="c-input--sm" type="text" placeholder="Genero" name="genero">
            <input class="c-input--sm" type="text" placeholder="Nível" name="desc_nivel">
            <input class="c-input--sm" type="text" placeholder="Curso" name="desc_curso">
            <input class="c-input--sm" type="text" placeholder="Campus" name="campus">            
          </div>
          <div class="input-group">
            <input class="c-input--sm" type="text" placeholder="Gestora" name="desc_gestora">
            <input class="c-input--sm" type="text" placeholder="Google Scholar ID" name="google_citation">
            <input class="c-input--sm" type="text" placeholder="Researcher ID" name="researcherid">
          </div>
          <div class="input-group-append">
            <button class="c-btn" type="submit">Incluir</button>
          </div>
        </form>

        <h2 class="t t-h3 ">Inserir um Programa de Pós-Graduação (PPG)</h2>

        <form class="p-inclusao-form" action="include_ppg.php" method="post" accept-charset="utf-8"
          enctype="multipart/form-data" title="Formulário de Inserção de um Programa de Pós Graduação">

          <div class="input-group">
            <input class="c-input--sm" type="text" placeholder="ID do Curso" name="ID_CURSO">
            <input class="c-input--sm" type="text" placeholder="Código CAPES" name="COD_CAPES">
            <input class="c-input--sm" type="text" placeholder="Conceito CAPES" name="CONCEITO_CAPES">
            <input class="c-input--sm" type="text" placeholder="Campus" name="NOME_CAMPUS">
          </div>

          <div class="input-group">
            <input class="c-input--sm" type="text" placeholder="Sigla da Câmara" name="SIGLA_CAMARA">
            <input class="c-input--sm" type="text" placeholder="Nome da Câmara" name="NOME_CAMARA">
            <input class="c-input--sm" type="text" placeholder="Nome do PPG" name="NOME_PPG">
            <input class="c-input--sm" type="text" placeholder="Data de início do PPG" name="INI_PPG">
          </div>
          <div class="input-group">
            <input class="c-input--sm" type="text" placeholder="Site do PPG" name="PPG_SITE">
            <input class="c-input--sm" type="text" placeholder="E-mail do PPG" name="PPG_EMAIL">
            <input class="c-input--sm" type="text" placeholder="URL no DSpace do PPG" name="PRODMAIS_DSPACE">
            <input class="c-input--sm" type="text" placeholder="URL no Dataverse do PPG" name="PRODMAIS_DATAVERSE">
            <input class="c-input--sm" type="text" placeholder="Gestora" name="desc_gestora">
          </div>
          <div class="input-group">
            <input class="c-input--sm" type="text" placeholder="Nome do Coodenador" name="NOME_COORDENADOR">
            <input class="c-input--sm" type="text" placeholder="Data de Início do Coodenador" name="DT_INI_COORD">
            <input class="c-input--sm" type="text" placeholder="URL no Dataverse do PPG" name="PRODMAIS_DATAVERSE">
            <input class="c-input--sm" type="text" placeholder="Nível" name="NIVEL">
          </div>
          <div class="input-group-append">
            <button class="c-btn" type="submit">Incluir</button>
          </div>
        </form>

        <h2 class="t t-h3 ">Inserir um DOI de artigo que queira incluir (sem https://doi.org/)</h2>

        <form class="p-inclusao-form" action="doi_to_elastic.php" method="get">
          <div class="custom-file">
            <input class="c-input--sm" type="text" placeholder="Insira um DOI" name="doi" data-validation="required">
            <label class="custom-file-label" for="fileXML">Escolha o arquivo</label>
          </div>
          <input class="c-input--sm" type="text" placeholder="TAG para formar um grupo" name="tag">
          <button class="c-btn" type="submit">Enviar</button>

        </form>

        <h2 class="t t-h3 ">Enviar um arquivo da Web of Science (UTF-8, separado por tabulações)</h2>

        <form class="p-inclusao-form" action="wos_upload.php" method="post" accept-charset="utf-8"
          enctype="multipart/form-data">

          <div class="custom-file">
            <input class="c-input--sm" type="file" class="custom-file-input" id="fileXML" aria-describedby="fileXML"
              name="file">
            <label class="custom-file-label" for="fileXML">Escolha o arquivo</label>
          </div>
          <input class="c-input--sm" type="text" placeholder="TAG para formar um grupo" name="tag">

          <button class="c-btn" type="submit">Upload</button>

        </form>

        <h2 class="t t-h3 ">Enviar um arquivo do INCITES (CSV)</h2>

        <form class="p-inclusao-form" action="incites_upload.php" method="post" accept-charset="utf-8"
          enctype="multipart/form-data">

          <div class="custom-file">
            <input class="c-input--sm" type="file" class="custom-file-input" id="fileXML" aria-describedby="fileXML"
              name="file">
            <label class="custom-file-label" for="fileXML">Escolha o arquivo</label>
          </div>
          <input class="c-input--sm" type="text" placeholder="TAG para formar um grupo" name="tag">
          <button class="c-btn" type="submit">Upload</button>


        </form>

        <h2 class="t t-h3 ">Enviar um arquivo do Scopus (CSV - All available information)</h2>

        <form class="p-inclusao-form" action="scopus_upload.php" method="post" accept-charset="utf-8"
          enctype="multipart/form-data">
          <div class="custom-file">
            <input class="c-input--sm" type="file" class="custom-file-input" id="fileXML" aria-describedby="fileXML"
              name="file">
            <label class="custom-file-label" for="fileXML">Escolha o arquivo</label>
          </div>
          <input class="c-input--sm" type="text" placeholder="TAG para formar um grupo" name="tag">
          <button class="c-btn" type="submit">Upload</button>

        </form>

        <h2 class="t t-h3 ">Enviar um arquivo do SCIVAL (CSV - All available information)</h2>

        <form class="p-inclusao-form " action="scival_upload.php" method="post" accept-charset="utf-8"
          enctype="multipart/form-data">

          <div class="custom-file">
            <input class="c-input--sm" type="file" class="custom-file-input" id="fileXML" aria-describedby="fileXML"
              name="file">
            <label class="custom-file-label" for="fileXML">Escolha o arquivo</label>
          </div>

          <input class="c-input--sm" type="text" placeholder="TAG para formar um grupo" name="tag">
          <button class="c-btn" type="submit">Upload</button>

        </form>

        <hr/>
        <h2 class="t t-h3">Excluir índices</h2>
        <div class="alert alert-danger" role="alert">
            Excluir todos os dados! Atenção, essa tarefa é irreversível! <a href="tools/delete_all_indexes.php">Clique aqui</a>
        </div>

        <h2 class="t t-h3">Exportar</h2>
        <p><a href="tools/export_old.php?<?php echo $_SERVER["QUERY_STRING"] ?>&format=ris">Exportar em formato RIS</a></p>
        <p><a href="tools/export_old.php?<?php echo $_SERVER["QUERY_STRING"] ?>&format=bibtex">Exportar em formato BIBTEX</a></p>
        <p><a href="tools/export_old.php?<?php echo $_SERVER["QUERY_STRING"] ?>&format=dspace">Exportar em formato CSV para o DSpace</a></p>
        <p><a href="tools/export_old.php?<?php echo $_SERVER["QUERY_STRING"] ?>&format=capesprint">Exportar em formato CSV para o CapesPrint</a></p>
        <p><a href="tools/export_old.php?<?php echo $_SERVER["QUERY_STRING"] ?>&format=authorNetwork">Exportar em formato CSV para o Gephi da Rede de Co-Autoria incluindo publicações</a></p>
        <p><a href="tools/export_old.php?<?php echo $_SERVER["QUERY_STRING"] ?>&format=authorNetworkWithoutPapers">Exportar em formato CSV para o Gephi da Rede de Co-Autoria sem publicações</a></p>
        <p><a href="tools/export_old.php?<?php echo $_SERVER["QUERY_STRING"] ?>&format=ppgNetworkWithoutPapers">Exportar em formato CSV para o Gephi da Rede de PPGs</a></p>
        
        <p><a href="tools/export_field.php?field=EducationEvent.name">Exportar Nomes de eventos (EducationEvent.name)</a></p>
        <p><a href="tools/export_field.php?field=isPartOf.name">Exportar nomes de obras no todo (isPartOf.name)</a></p>




      </div>
    </div>
  </main>
</body>

</html>




        <?php
        } else {
        echo "Usuário não encontrado";
        }
} else {
    ?>
    <body>
      
      <form class="p-inclusao-form" method="post">
        <h1><?php echo $branch ?> - Login</h1>
        Usuário: <input class="c-input--sm" type="text" name="username" /><br />
        Senha: <input class="c-input--sm" type="password" name="password" /><br />
        <input class="c-btn" type='submit' name='submit' value="Login" />
      </form>
    </body>
    <?php
}
 
?>