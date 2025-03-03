<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<?php
$data = '{
	"projeto": {
    "nome": "Caracterização química, funcional e potencial biotecnológico de mix balanceado de resíduo vegetal associado a subprodutos de origem vegetal",
    "descricao": "O setor alimentício produz grande quantidade de lixo, tanto liquido como sólidos provenientes da produção, preparação e consumo de alimentos. Por sua composição, os resíduos provenientes de vegetais e frutas podem ser uma matéria prima de alto valor agregado para produção de novos produtos. Há grande interesse na utilização de fontes naturais no processamento de alimentos. Estudos apresentam substituição dos ingredientes sintéticos por aditivos naturais particularmente derivados de plantas e subprodutos agroindustriais. Bioconservação (usando compostos fenólicos) também está sendo objeto de diversos estudos como uma alternativa eficiente para aditivos alimentares. A avaliação da bioacessibilidade de compostos bioativos de vegetais vem sendo de grande interesse. Associar o potencial funcional e biotecnológico da FFH e demais resíduos vegetais com as propriedades funcionais de subprodutos da jabuticabeira é o objetivo deste trabalho. Serão identificados resíduos mais produzidos em UAN´s por processo mínimo. Estes associados a resíduo de mix de vegetal e frutas gerado na produção de bebida isotônica e subproduto de jabuticabeira serão base na elaboração de mix balanceado(MB). Será feita a caracterização química e funcional do MB e o mesmo será utilizado como substrato para produção de biomassa.. ",
    "coordenacao": "Edira Castello Branco de Andrade Gonçalves",
    "concluido": "false",
    "natureza": "pesquisa",
    "alunos_graducacao": "1",
    "alunos_mestrado_academico": "1",
    "alunos_doutorado": "1",
    "financiamento": "",
    "financiadores": "Fundação Carlos Chagas Filho de Amparo à Pesquisa do Estado do RJ",
    "numero_producoes": "31",
    "ano_inicial": "2018",
    "ano_final": "",
    "integrantes": [
      "Roberta Melquiades Silva de Andrade",
      "Pedro Paulo Saldanha Coimbra",
      "Nathânia de Sá Mendes",
      "Tamara Righetti Tupini Cavalheiro",
      "Elisa Dávila Costa Cavalcanti"
    ]
  }
}';

  $arr = json_decode($data);
  $projeto = $arr -> projeto ;

  $period = $projeto -> ano_inicial;

  if (!empty( $projeto -> ano_final )) {
    $period = $period.' a '.$projeto -> ano_final;
  } else {
    $period = 'Em andamento desde '.$period;
  }

  $integrantes = str_replace(array('{', '}'), array('[',']'), $projeto -> integrantes );

?>

<head>
  <?php
        require 'inc/config.php';
        require 'inc/meta-header.php';
        require 'inc/functions.php';
        require 'inc/components/SList.php';
        require 'inc/components/TagCloud.php';
        require 'inc/components/Who.php';
        require '_fakedata.php';
        ?>
  <meta charset="utf-8" />
  <title><?php echo $branch; ?> - Projeto ... </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="description" content="Prodmais Unifesp." />
  <meta name="keywords" content="Produção acadêmica, lattes, ORCID" />

</head>

<body data-theme="<?php echo $theme; ?>" class="c-wrapper-body">
  <?php if(file_exists('inc/google_analytics.php')){include 'inc/google_analytics.php';}?>

  <?php require 'inc/navbar.php'; ?>

  <main class="c-wrapper-container">
    <div class="c-wrapper-paper">
      <div class="c-wrapper-inner">
        <section class="p-projeto-header">
          <div class="p-projeto-header-d1">
            <i class="i i-sm i-project p-projeto-logo"></i>
          </div>
          <div class="p-projeto-header-d2">
            <h2 class="t t-h5">Projeto de pesquisa</h2>
            <h1 class="t t-h1 p-projeto-title"> <?php echo $projeto -> nome ?></h1>

            <div class="d-icon-text">
              <i class="i i-sm i-money"></i>
              <?php
                if(!empty($projeto -> financiadores))
                  echo('<p class="t t-gray t-b">Financiadores:' . $projeto -> financiadores. '</p>');
              ?>

            </div>

            <div class="p-projeto-header-d4">
              <i class="i i-sm i-date"></i>
              <p class="t t-b u-mr-05"> <?php echo $period ?></p>
              <i class="i i-sm i-production"></i>
              <p class="t t-b"> <?php echo $projeto -> numero_producoes ?></p>
              <p class="t t-b t-gray u-ml-05">(Número de produções)</p>
            </div>
          </div>

        </section>

        <hr class="c-line u-my-20" />

        <section class="p-projeto-main">


          <section class="p-projeto-tagcloud">
            <?php Tag::cloud($categorysFake) ?></p>
          </section>

          <hr class="c-line u-my-20" />

          <section class="p-projeto-description">
            <p class="t t-b u-mb-20">Sobre o projeto de pesquisa</p>
            <p class="t t-justify"><?php echo $projeto -> descricao; ?></p>

          </section>

          <hr class="c-line u-my-20" />

          <h4 class="t t-h4 u-mb-20">Integrantes</h4>

          <section class="dv d-md-h">
            <div class="dv">
              <ul class='p-projeto-integrantes'>
                <div class='d-icon-text'>
                  <i class='i i-people-manager'></i>
                  <li class=''><?php echo $projeto -> coordenacao; ?> <i class="t t-light"> (coordenação)</i></li>
                </div>
                <?php
              foreach($integrantes as $i) {
                echo("<div class='d-icon-text'>
                <i class='i i-project-participant'></i>
                <li class=''>$i</li>
                </div>");
              }
              ?>
              </ul>
            </div>

            <div class="dv">
              <div class='d-icon-text'>
                <i class='i i-project-participant'></i>
                <p class="t">Alunos de graduação: <?php echo $projeto -> alunos_graducacao ?></p>
              </div>
              <div class='d-icon-text'>
                <i class='i i-project-participant'></i>
                <p class="t">Alunos de mestrado acadêmico: <?php echo $projeto -> alunos_mestrado_academico ?></p>
              </div>
              <div class='d-icon-text'>
                <i class='i i-project-participant'></i>
                <p class="t">Alunos de graduação: <?php echo $projeto -> alunos_doutorado ?></p>
              </div>
            </div>
          </section>


        </section>

        <p class="t t-lastUpdate t-right u-mt-20">Atualização Lattes em </p>
        <p class="t t-lastUpdate t-right">Processado em </p>
      </div>
    </div>
  </main>

  <?php include('inc/footer.php'); ?>

</body>

</html>