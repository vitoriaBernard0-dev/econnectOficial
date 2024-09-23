<?php
// Conectar ao banco de dados
$hostname = 'localhost';
$bancodedados = 'econnect';
$usuario = 'root';
$senha = '';

// Criando a conexão
$conn = new mysqli($hostname, $usuario, $senha, $bancodedados);

// Verificar a conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Receber dados do formulário
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Inserir os dados na tabela faleconosco
  $sql = "INSERT INTO faleconosco (faleconosco_name, faleconosco_email, faleconosco_message) VALUES ('$name', '$email', '$message')";

  if ($conn->query($sql) === TRUE) {
    // Redireciona para a página de sucesso com um parâmetro indicando o sucesso
    header("Location: index.php?status=success");
    exit();
  } else {
    // Redireciona para a página de erro com um parâmetro indicando a falha
    header("Location: index.php?status=error");
    exit();
  }
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Econnect</title>
  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">
  <script src="assets/js/config.js"></script>
  <link rel="stylesheet" href="./assets/css/theme.css">
  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="vendors/swiper/swiper-bundle.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&amp;display=swap"
    rel="stylesheet">
  <link href="assets/css/theme.css" rel="stylesheet" id="style-default">
  <link href="assets/css/user-rtl.css" rel="stylesheet" id="user-style-rtl">
  <link href="assets/css/user.css" rel="stylesheet" id="user-style-default">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <div class="bg-white">

    </div>
    </div>
    </div>
    <nav class="navbar navbar-expand-lg py-1" id="navbar-top" data-navbar-soft-on-scroll="data-navbar-soft-on-scroll">
      <div class="container"><a class="navbar-brand me-lg-auto cursor-pointer" href=""><img
            class="w-00 w-md-00 img-fluid" src="assets/img/logos/logo.png" alt="" /></a>
        <button class="navbar-toggler border-10 pe-10" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" data-navbar-collapse="data-navbar-collapse">
          <div class="container d-lg-flex justify-content-lg-end pe-lg-10 w-lg-100">

            <ul class="navbar-nav mt-2 mt-lg-1 ms-lg-4 ms-xl-8 ms-2xl-4 gap-lg-x1" data-navbar-nav="data-navbar-nav">
              <li class="nav-item"> <a class="nav-link nav-bar-item px-0" href="#home" title="home">Início</a></li>
              <li class="nav-item"> <a class="nav-link nav-bar-item px-0" href="#about" title="about">Feedback</a></li>
              <li class="nav-item"> <a class="nav-link nav-bar-item px-0" href="#products" title="catalog">Descarte</a>
              </li>
              <li class="nav-item"> <a class="nav-link nav-bar-item px-0" href="#support" title="support">Suporte</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="container" data-bs-target="#navbar-top" data-bs-spy="scroll" tabindex="0">
      <section class="mb-9 mb-lg-10 mb-xxl-11 text-center text-lg-start mt-9" id="home">
        <div>
          <div class="row g-4 g-lg-6 g-xl-7 mb-6 mb-lg-7 mb-xl-10 align-items-center">
            <div class="col-12 col-lg-6">
              <img class="img-fluid w-50 w-lg-100" src="assets/img/Hero/man_watering.png" alt="" />
            </div>
            <div class="col-12 col-lg-6">
              <h1 class="fs-5 fs-md-3 fs-xxl-2 text-black fw-light mb-4">
                Conectando
                <span class="fw-bold" id="rotating-text">pessoas, tecnologia e sustentabilidade</span>
                <br class="d-sm-none d-md-block d-xxl-none" />
                <span class="text-gradient fw-bold">Econnect</span>
              </h1>
              <p class="fs-8 fs-md-11 fs-xxl-7 text-primary mb-5 mb-lg-6 mb-xl-7 fw-light">
                Do planejamento do produto à implementação, cada detalhe da connect foi projetado com uma coisa em
                mente: simplificar e incentivar práticas sustentáveis. Veja como estamos fazendo isso.
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>

    <div class="row g-4 g-lg-6 g-xl-7 align-items-center container-custom">
      <div class="col-12 col-lg-6 order-1 order-lg-0">
        <h1 class="fs-5 fs-md-3 fs-xxl-2 text-secondary text-capitalize fw-light mb-4">Porque descartar <br class="d-none d-md-block d-lg-none" /><span class="fw-bold">Corretamente? </span><br class="d-none d-xl-block d-xxl-none" /><br class="d-sm-none" /></h1>
        <p class="fs-8 fs-md-11 fs-xxl-7 text-primary mb-5 mb-lg-6 mb-xl-7 fw-light">
          O futuro do planeta está em nossas mãos, e cada escolha conta.
          Descarte seu lixo corretamente hoje para garantir um amanhã
          sustentável. Pequenas ações podem ter um grande impacto ambiental.
        </p>
      </div>
      <div class="col-12 col-lg-6 order-0 order-lg-1">
        <img class="img-fluid w-50 w-lg-100" src="assets/img/Hero/planting.png" alt="" />
      </div>
    </div>
    <section class="mb-9 mb-lg-10 mb-xxl-11 px-4 px-lg-5">
      <div class="row g-4">
        <div class="col-12 col-lg-4 text-center mx-auto">
          <img class="mb-3" src="assets/img/icons/Counter_1.png" alt="" />
          <h1 class="text-secondary fs-4 fs-lg-3 fs-xl-2 counter-delivared" data-countup='{"endValue": 62000000,"autoIncreasing":true}' style="font-variant-numeric: lining-nums proportional-nums;">0</h1>
          <p class="text-success fs-7 fs-xl-6 fw-bold mb-0">
            Quantidade de lixo <br class="d-none d-xl-block d-xxl-none" />Eletrônico produzido no mundo.
          </p>
        </div>
      </div>
    </section>


    </div>
    </section>
    <section class="mb-9 mb-lg-10 mb-xxl-11 text-center text-lg-start" id="about">
      <div class="container-custom">
        <h1 class="fs-5 fs-lg-3 fs-xl-2 text-secondary text-capitalize fw-light mb-x1">
          <span class="fw-bold">Feedback</span> é<br />
          a <span class="fw-bold">alma do nosso serviço</span>
        </h1>
        <div class="row mb-7 mb-lg-8 mb-xl-9 gap-3">
          <div class="col-12 col-lg">
            <p class="text-black fs-10 fs-md-9 fs-xxl-8 lh-xl mb-0 line-clamp-5">
              Na nossa jornada de aprimoramento contínuo, valorizamos imensamente os feedbacks que recebemos dos nossos usuários.
              Confira alguns dos comentários que já recebemos:
            </p>
          </div>
        </div>
      </div>


      </div>
      <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center mb-8 mb-lg-10"> <img
          class="img-fluid badhon" src="assets/img/team/badhon.png" alt="" />
        <div class="about-card">
          <h1 class="fs-8 fs-md-7 fs-xxl-6 text-success fw-bold">Carla Rizzi</h1>
          <p class="fs-10 fs-md-9 fs-xxl-8 text-primary mb-0 line-clamp-5"> "O econnect tem impulsionado reciclagem de
            lixo eletrônico em nosso site, aumentando nossa taxa significativamente."
          </p>
        </div>
      </div>
      <div>
        <p class="text-secondary text-capitalize fw-light mb-0 fs-5 fs-lg-4 text-center mb-7 mb-lg-8">
          Conheça <span class="fw-bold">nosso time</span>
        </p>
        <div class="row mb-13 w-lg-75 mb-lg-5 mx-auto gy-2 gy-lg-5 h-100">
          <div class="col-12 col-md-6 col-lg-4 px-3 text-center mb-5 mb-lg-0">
            <div class="position-relative w-75 w-md-100 mx-auto mb-2">
              <img class="w-100 team-hero-image" src="assets/img/team/team/6.JPG" alt="" />
              <div class="social-icons">
                <a href="https://www.instagram.com/bruceciliavs/"> <span class="uil uil-instagram-alt"></span></a>
                <a href="https://www.linkedin.com/in/bruna-vit%C3%B3rio/"> <span class="uil uil-linkedin"></span></a>
              </div>
            </div>
            <h3 class="fs-9 fs-md-8 text-success fw-bold mb-1">Bruna Cecília</h3>
            <h5 class="text-black fs-10 fs-md-9 fw-medium text-capitalize mb-3">Desenvolvedora</h5>
          </div>

          <div class="col-12 col-md-6 col-lg-4 px-3 text-center mb-5 mb-lg-0">
            <div class="position-relative w-75 w-md-100 mx-auto mb-2">
              <img class="w-100 team-hero-image" src="assets/img/team/team/5.png" alt="" />
              <div class="social-icons">
                <a href="https://www.instagram.com/caioocesar__/"> <span class="uil uil-instagram-alt"></span></a>
              </div>
            </div>
            <h3 class="fs-9 fs-md-8 text-success fw-bold mb-1">Caio César</h3>
            <h5 class="text-black fs-10 fs-md-9 fw-medium text-capitalize mb-3">Desenvolvedor</h5>
          </div>

          <div class="col-12 col-md-6 col-lg-4 px-3 text-center mb-5 mb-lg-0">
            <div class="position-relative w-75 w-md-100 mx-auto mb-2">
              <img class="w-100 team-hero-image" src="assets/img/team/team/k.png" alt="" />
              <div class="social-icons">
                <a href="https://www.instagram.com/kaueerib/"> <span class="uil uil-instagram-alt"></span></a>
              </div>
            </div>
            <h3 class="fs-9 fs-md-8 text-success fw-bold mb-1">Kauê Brito</h3>
            <h5 class="text-black fs-10 fs-md-9 fw-medium text-capitalize mb-3">Desenvolvedor</h5>
          </div>

          <!-- Vitória Karoline, centralizada abaixo -->
          <div class="col-12 col-md-6 col-lg-4 px-3 text-center mb-5 mb-lg-0 mx-auto" style="order: 4;">
            <div class="position-relative w-75 w-md-100 mx-auto mb-2">
              <img class="w-100 team-hero-image" src="assets/img/team/team/v.png" alt="" />
              <div class="social-icons">
                <a href="https://www.instagram.com/_vitoriak/"> <span class="uil uil-instagram-alt"></span></a>
                <a href="https://www.linkedin.com/in/vitoria-karoline-dev/"> <span class="uil uil-linkedin"></span></a>
              </div>
            </div>
            <h3 class="fs-9 fs-md-8 text-success fw-bold mb-1">Vitória Karoline</h3>
            <h5 class="text-black fs-10 fs-md-9 fw-medium text-capitalize mb-3">Product Owner</h5>
          </div>
        </div>
      </div>
      </div>
      </div>
    </section>
    <section class="mb-9 mb-lg-10 mb-xxl-11 text-center text-md-start card-slider" id="products">
      <div class="container-custom">
        <div class="mb-6 mb-lg-7 mb-xl-10" id="slider-1">
          <h1 class="fs-5 fs-md-3 fs-xxl-2 text-secondary text-capitalize fw-light mb-13 mb-lg-7"> <span
              class="fw-bold">Linhas</span> de descarte</h1>
          <div class="mb-4 mb-lg-0">
            <div class="swiper-theme-container position-relative">
              <div class="swiper-container theme-slider"
                data-swiper='{"spaceBetween":32,"loop":true,"loopedSlides":5,"breakpoints":{"0":{"slidesPerView":1},"768":{"slidesPerView":2},"1024":{"slidesPerView":3}}}'>
                <div class="swiper-wrapper">
                  <div class="product-card swiper-slide">
                    <div class="product-card-top" style="background-image: url('assets/img/products/products/1.png')">
                      <div class="add-section"><a class="fs-10 fs-md-9 d-flex flex-column flex-xl-row align-items-center"
                          href="#!"><span class="uil uil-file-heart me-1 align-middle"></span>Política de descarte </a>
                      </div>
                    </div>
                    <div class="d-flex flex-column gap-x1 p-x1 pb-5 product-card-body">
                      <h3 class="text-success fw-semi-bold text-center line-clamp-1 fs-8 fs-md-11 fs-xxl-7">Conheça as
                        Políticas de descarte
                      </h3>
                      <p class="text-dark fs-10 fs-md-9 fs-xl-8 text-capitalize lh-xl mb-0 line-clamp-3">Existem várias
                        linhas de descarte, cada uma para tipos específicos de resíduos.</p>
                    </div>
                  </div>
                  <div class="product-card swiper-slide">
                    <div class="product-card-top"
                      style="background-image: url('assets/img/products/products/marrom.png')">
                      <div class="add-section"><a class="fs-10 fs-md-9 d-flex flex-column flex-xl-row align-items-center"
                          href="#!"><span class="uil uil-file-heart me-1 align-middle"></span>Política de descarte </a>
                      </div>
                    </div>
                    <div class="d-flex flex-column gap-x1 p-x1 pb-5 product-card-body">
                      <h3 class="text-success fw-semi-bold text-center line-clamp-1 fs-8 fs-md-11 fs-xxl-7">Linha Marrom
                      </h3>
                      <p class="text-dark fs-10 fs-md-9 fs-xl-8 text-capitalize lh-xl mb-0 line-clamp-3">É
                        destinada ao descarte de aparelhos de som, TVs, equipamentos de DVD/VHS e televisores de tubo e
                        plasma. Inclui também filmadores e semelhantes. </p>
                    </div>
                  </div>
                  <div class="product-card swiper-slide">
                    <div class="product-card-top" style="background-image: url('assets/img/products/products/azul.png')">
                      <div class="add-section"><a class="fs-10 fs-md-9 d-flex flex-column flex-xl-row align-items-center"
                          href="#!"><span class="uil uil-file-heart me-1 align-middle"></span>Política de descarte </a>
                      </div>
                    </div>
                    <div class="d-flex flex-column gap-x1 p-x1 pb-5 product-card-body">
                      <h3 class="text-success fw-semi-bold text-center line-clamp-1 fs-8 fs-md-11 fs-xxl-7">Linha Azul
                      </h3>
                      <p class="text-dark fs-10 fs-md-9 fs-xl-8 text-capitalize lh-xl mb-0 line-clamp-3">A azul é voltada
                        ao
                        descarte de pequenos eletrodomésticos e ferramentas elétricas. Inclui torradeiras, batedeiras,
                        aspiradores de pó, ventiladores, mixers, secadores de cabelo, ferramentas elétricas, calculadoras
                        e rádios.
                      </p>
                    </div>
                  </div>
                  <div class="product-card swiper-slide">
                    <div class="product-card-top" style="background-image: url('assets/img/products/products/verde.png')">
                      <div class="add-section"><a class="fs-10 fs-md-9 d-flex flex-column flex-xl-row align-items-center"
                          href="#!"><span class="uil uil-file-heart me-1 align-middle"></span>Política de descarte </a>
                      </div>
                    </div>
                    <div class="d-flex flex-column gap-x1 p-x1 pb-5 product-card-body">
                      <h3 class="text-success fw-semi-bold text-center line-clamp-1 fs-8 fs-md-11 fs-xxl-7">Linha Verde
                      </h3>
                      <p class="text-dark fs-10 fs-md-9 fs-xl-8 text-capitalize lh-xl mb-0 line-clamp-3">Nela, a gente
                        pode jogar fora aqueles eletrônicos que a gente não usa mais, como computadores, celulares e
                        tablets.</p>
                    </div>
                  </div>
                  <div class="product-card swiper-slide">
                    <div class="product-card-top"
                      style="background-image: url('assets/img/products/products/branca.png')">
                      <div class="add-section"><a class="fs-10 fs-md-9 d-flex flex-column flex-xl-row align-items-center"
                          href="#!"><span class="uil uil-file-heart me-1 align-middle"></span>Política de descarte</a>
                      </div>
                    </div>
                    <div class="d-flex flex-column gap-x1 p-x1 pb-5 product-card-body">
                      <h3 class="text-success fw-semi-bold text-center line-clamp-1 fs-8 fs-md-11 fs-xxl-7">Linha Branca
                      </h3>
                      <p class="text-dark fs-10 fs-md-9 fs-xl-8 text-capitalize lh-xl mb-0 line-clamp-3">"A linha branca é
                        para o descarte de grandes eletrodomésticos, como geladeiras, freezers, máquinas de lavar, fogões
                        e ar condicionados. Inclui também micro-ondas e outros equipamentos similares. Deposite esses
                        itens nesta linha para um descarte apropriado </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slider-nav">
                <button class="btn prev-button" data-slider="slider-1"
                  style="font-size: 4rem; padding: 2rem; margin-left: 40px; overflow: hidden;">
                  <span class="uil uil-angle-left-b"></span>
                </button>
                <button class="btn next-button" data-slider="slider-1"
                  style="font-size: 4rem; padding: 2rem; margin-right: 40px; overflow: hidden;">
                  <span class="uil uil-angle-right-b"></span>
                </button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container-custom2">
      <div class="mb-6 mb-lg-7 mb-xl-10 card-slider" id="slider-2">
        <h1 class="fs-5 fs-md-3 fs-xxl-2 text-secondary text-capitalize text-md-end fw-light mb-13 mb-lg-7">
          <span class="fw-bold">Econnect</span><br class="d-sm-none" /> e suas recompensas
        </h1>
        <div class="mb-4 mb-lg-0">
          <div class="swiper-theme-container position-relative">
            <div class="swiper-container theme-sliderdiv"
              data-swiper='{"spaceBetween":32,"loop":true,"loopedSlides":5,"breakpoints":{"0":{"slidesPerView":1},"768":{"slidesPerView":2},"1024":{"slidesPerView":3}}}'>
              <div class="swiper-wrapper">
                <!-- Recompensas -->
                <div class="product-card swiper-slide">
                  <div class="product-card-top" style="background-image: url('assets/img/products/products/bonifi.png')">
                    <div class="add-section"><a class="fs-10 fs-md-9 d-flex flex-column flex-xl-row align-items-center"
                        href="#!"><span class="uil uil-file-heart me-1 align-middle"></span>Descarte e concorra</a>
                    </div>
                  </div>
                  <div class="d-flex flex-column gap-x1 p-x1 pb-5 product-card-body">
                    <h3 class="text-success fw-semi-bold text-center line-clamp-1 fs-8 fs-md-11 fs-xxl-7">
                      Conheça nossas bonificações!
                    </h3>
                    <p class="text-dark fs-10 fs-md-9 fs-xl-8 text-capitalize lh-xl mb-0 line-clamp-3">
                      A Econnect e as empresas parceiras oferecem benefícios para os que mais descartam.
                    </p>
                  </div>
                </div>
                <!-- Outros Cards continuam aqui -->
              </div>
            </div>
            <div class="slider-nav">
              <button class="btn prev-button" data-slider="slider-1"
                style="font-size: 4rem; padding: 2rem; margin-left: 40px; overflow: hidden;">
                <span class="uil uil-angle-left-b"></span>
              </button>
              <button class="btn next-button" data-slider="slider-1"
                style="font-size: 4rem; padding: 2rem; margin-right: 40px; overflow: hidden;">
                <span class="uil uil-angle-right-b"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="mb-9 mb-lg-10 mb-xxl-11 text-center text-lg-start mt-1 card-formss" id="support">
      <div class="row g-4 g-lg-6 g-xl-7 pt-6">
        <div class="d-none d-lg-block col-lg-6 text-center">
          <img class="img-fluid" src="assets/img/illustrations/women_watering.png" alt="Contato" />
        </div>
        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center mt-0">
          <p class="fs-8 fs-md-7 fs-xxl-6 text-success fw-bold my-0 text-capitalize">Fale conosco</p>
          <h1 class="fs-5 fs-lg-4 fs-xl-3 text-secondary text-capitalize fw-light mt-3 mb-4">
            Entre <br />em <span class="fw-bold">Contato</span>
          </h1>

          <form id="contactForm" method="POST" action="">
            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input id="name" class="form-control" type="text" name="name" placeholder="Seu nome" required />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input id="email" class="form-control" type="email" name="email" placeholder="Seu e-mail" required />
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Mensagem</label>
              <textarea id="message" class="form-control" name="message" rows="4" placeholder="Sua mensagem" required></textarea>
            </div>
            <button class="btn btn-primary shadow-none submit-button" type="submit">Enviar</button>
          </form>

          <!-- Modal -->
          <div id="popupModal" class="modal">
            <div class="modal-content">
              <h2 id="popupMessage"></h2>
              <button onclick="closeModal()">OK</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    </div>
    <button class="btn scroll-to-top" data-scroll-top="data-scroll-top"><span
        class="uil uil-angle-up text-white"></span></button>
    <footer class="Footer" style="background-image: url('assets/img/illustrations/BOTTOM.png')">
      <div class="pb-x1 px-3 px-lg-0">
        <div class="container">
          <div class="row align-items-end g-4 g-sm-6">
            <div class="col-6 col-md-4">
              <div class="container"><a class="navbar-brand me-lg-auto cursor-pointer" href=""><img
                    class="w-50 w-md-100 img-fluid" src="assets/img/logos/logo1 (1).png" alt="" /></a>
                <div class="mb-2"> <a class="links" href="#">Início</a></div>
                <div class="mb-2"> <a class="links" href="#about">Feedback</a></div>
                <div class="mb-2"> <a class="links" href="#products">Descarte</a>
                </div> <a class="links" href="#support"> Suporte </a>
              </div>

            </div>
            <div class="col-6 col-md-4">

            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      <div class="bg-success py-2 py-md-3 position-relative terms-condition">
        <div class="overley-background"></div>
        <div class="container py-12 text-div text-md-end"><a class="links ms-md-4" href="#!" title="F.A.Q"> Todos os
            direitos reservados Econnect 2024 </a><a href="#!" title="Legal Terms"> Legal Terms </a><a
            class="links ms-3 ms-md-4" href="login.php" title="Login Administrador">Administrador</a>

        </div>
      </div>
      <script>
        // Verifica o parâmetro da URL
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'success') {
          // Mostra o alerta de sucesso
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Formulário enviado com sucesso!',
            showConfirmButton: false,
            timer: 1500
          });
        } else if (status === 'error') {
          // Mostra o alerta de erro
          Swal.fire({
            title: 'Erro',
            text: 'Não foi possível finalizar seu formulário',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
        }

        document.addEventListener("DOMContentLoaded", function() {
          const texts = ["pessoas", "tecnologia", "sustentabilidade"];
          let currentIndex = 0;
          const rotatingTextElement = document.getElementById("rotating-text");

          function rotateText() {
            // Adiciona classe para esconder o texto antes da troca
            rotatingTextElement.classList.add("hidden");

            setTimeout(() => {
              // Troca o texto
              rotatingTextElement.textContent = texts[currentIndex];
              rotatingTextElement.classList.remove("hidden");
              currentIndex = (currentIndex + 1) % texts.length;
            }, 500); // 500ms coincide com a transição do CSS
          }

          // Troca o texto a cada 3 segundos
          setInterval(rotateText, 3000);
        });
      </script>
    </footer>

    </div>
    </div>
  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->




  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="vendors/popper/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="vendors/countup/countUp.umd.js"></script>
  <script src="vendors/swiper/swiper-bundle.min.js"></script>
  <script src="vendors/lodash/lodash.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/list.js/list.min.js"></script>
  <script src="assets/js/theme.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>