@extends('layouts.visit.main')

@section('pageTitle', 'Página inicial')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="assets/img/capa1.jpg" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h2 data-aos="fade-up" data-aos-delay="100">Bem-vindo ao Agrifácil</h2>
                    <p data-aos="fade-up" data-aos-delay="200">Conectamos Produtores e Compradores de Produtos Agrícolas
                    </p>
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
                    <form action="forms/newsletter.php" method="post" class="php-email-form">
                        <a href="{{ route('visit.products') }}" class="btn btn-success mt-4">Explorar Produtos</a>
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    </div>

    </div>

    <!-- Seção Sobre Nõs -->
    <section id="about" class="about section light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-xl-center gy-5">

                <div class="col-xl-5 content">
                    <h3>Sobre nós</h3>
                    <h2>Conectando Agricultores e Consumidores</h2>
                    <p>Somos uma plataforma que facilita o acesso a produtos agrícolas de qualidade, conectando pequenos
                        produtores a consumidores e mercados. Nosso objetivo é promover o desenvolvimento sustentável,
                        fortalecer a agricultura local e garantir que você encontre os melhores produtos diretamente da
                        fonte.</p>
                    <a href="#" class="read-more"><span>Leia mais</span><i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="col-xl-7">
                    <div class="row gy-4 icon-boxes">

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bi bi-person-lines-fill"></i>
                                <h3>Informações do Produtor</h3>
                                <p>Visualize os detalhes de contato e localização fornecidos pelos agricultores para
                                    facilitar sua negociação.</p>
                            </div>
                        </div> <!-- End Icon Box -->


                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-people"></i>
                                <h3>Apoio à Comunidade</h3>
                                <p>Ajudamos a fortalecer a agricultura local, criando um impacto positivo nas
                                    comunidades rurais.</p>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-box-seam"></i>
                                <h3>Disponibilidade Garantida</h3>
                                <p>Saiba onde e como retirar os produtos diretamente com o produtor, garantindo
                                    praticidade e agilidade.</p>
                            </div>
                        </div> <!-- End Icon Box -->


                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-graph-up-arrow"></i>
                                <h3>Crescimento Sustentável</h3>
                                <p>Promovemos o desenvolvimento sustentável, incentivando práticas agrícolas
                                    responsáveis.</p>
                            </div>
                        </div> <!-- End Icon Box -->

    </section><!-- /Seção Sobre nós -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Serviços</h2>
            <p>Conectamos agricultores locais com consumidores, oferecendo produtos frescos e de qualidade diretamente
                da fonte, sem intermediários.</p>

        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-person-bounding-box"></i></div>
                        <div>
                            <h4 class="title"><a href="services-details.html" class="stretched-link">Conexão com
                                    Produtores</a></h4>
                            <p class="description">Conectamos consumidores diretamente com produtores locais para a
                                compra de produtos frescos e de qualidade.</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-truck"></i></div>
                        <div>
                            <h4 class="title"><a href="services-details.html" class="stretched-link">Entrega Rápida</a>
                            </h4>
                            <p class="description">Garantimos uma entrega rápida e segura diretamente da fazenda para a
                                sua casa.</p>
                        </div>
                    </div>

                </div><!-- End Service Item -->

                <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-headset"></i></div>
                        <div>
                            <h4 class="title"><a href="services-details.html" class="stretched-link">Suporte ao
                                    Cliente</a></h4>
                            <p class="description">Nossa equipe de suporte está disponível para ajudar com qualquer
                                dúvida ou problema relacionado à compra.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-geo-alt"></i></div>
                        <div>
                            <h4 class="title"><a href="services-details.html" class="stretched-link">Localização dos
                                    Produtores</a></h4>
                            <p class="description">Acesse facilmente a localização dos produtores para escolher os
                                melhores produtos perto de você.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-brightness-high"></i></div>
                        <div>
                            <h4 class="title"><a href="services-details.html" class="stretched-link">Compromisso com a
                                    Qualidade</a></h4>
                            <p class="description">Garantimos que todos os produtos oferecidos sejam frescos e de alta
                                qualidade, respeitando o agricultor e o consumidor.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-clock"></i></div>
                        <div>
                            <h4 class="title"><a href="services-details.html" class="stretched-link">Serviço Rápido</a>
                            </h4>
                            <p class="description">Oferecemos um serviço rápido, garantindo que você receba os produtos
                                de maneira eficiente e pontual.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Junte-se a nós</h2>
            <p>Escolha a Agrifácil para negociações agrícolas mais práticas e confiáveis. Com uma interface simples,
                avaliações transparentes e uma rede de produtores comprometidos, facilitamos suas transações.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4 align-items-center features-item">
                <div class="col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h3>Cadastre-se como Produtor</h3>
                    <p>
                        Amplie seu alcance e conecte-se a clientes que buscam produtos agrícolas de qualidade. Com nossa
                        plataforma, você terá ferramentas para exibir seus produtos, negociar com facilidade e crescer
                        no mercado.
                    </p>
                    <a href="produtor.html" class="btn btn-get-started">Cadastrar como produtor</a>
                </div>
                <div class="col-lg-7 order-1 order-lg-2 d-flex align-items-center" data-aos="zoom-out"
                    data-aos-delay="100">
                    <div class="image-stack">
                        <img src="assets/img/602302220906311645607191.jpg" alt="" class="stack-front">
                    </div>
                </div>
            </div>
            <!-- Features Item -->

            <div class="row gy-4 align-items-stretch justify-content-between features-item">
                <div class="col-lg-6 d-flex align-items-center features-img-bg" data-aos="zoom-out">
                    <img src="assets/img/pexels-zen-chung-5529764.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5 d-flex justify-content-center flex-column" data-aos="fade-up">
                    <h3>Cadastre-se como Comprador</h3>
                    <p>
                        Descubra uma rede confiável de produtores locais e encontre produtos agrícolas frescos
                        diretamente da fonte. Faça compras de forma prática e segura com a nossa plataforma.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i> <span>Conexão direta com produtores locais.</span></li>
                        <li><i class="bi bi-check"></i><span> Negociações seguras e rápidas.</span></li>
                        <li><i class="bi bi-check"></i> <span>Avaliações de produtores para mais confiança.</span></li>
                    </ul>
                    <a href="comprador.html" class="btn btn-get-started align-self-start">Cadastrar como comprador</a>
                </div>
            </div>
            <!-- Features Item -->

        </div>

    </section><!-- /Features Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="content px-xl-5">
                        <h3><span>Perguntas </span><strong>Frequentes</strong></h3>
                        <p>
                            Respondemos as dúvidas mais comuns sobre como funciona a nossa plataforma, para que você
                            tenha uma experiência tranquila e direta ao ponto.
                        </p>
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">
                        <div class="faq-item faq-active">
                            <h3><span class="num">1.</span> <span>Como fica a situação do transporte uma vez que já
                                    acertei tudo com o produtor?</span></h3>
                            <div class="faq-content">
                                <p>O transporte será definido entre você e o produtor, considerando as condições que ele
                                    oferece.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">2.</span> <span>Preciso ter uma conta para usar a plataforma?</span>
                            </h3>
                            <div class="faq-content">
                                <p>Não é necessário criar uma conta. Basta acessar o site, procurar o produto e entrar
                                    em contato com o produtor através das informações fornecidas.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">3.</span> <span>Como posso confiar nos produtores da
                                    plataforma?</span></h3>
                            <div class="faq-content">
                                <p>Os produtores cadastrados têm perfis detalhados, onde você pode verificar informações
                                    e avaliações feitas por outros compradores.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">4.</span> <span>Os preços exibidos são negociáveis?</span></h3>
                            <div class="faq-content">
                                <p> Sim. Os preços podem ser negociados diretamente com o produtor, conforme sua
                                    conveniência.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num">5.</span> <span>Quais produtos posso encontrar na plataforma?</span>
                            </h3>
                            <div class="faq-content">
                                <p>A plataforma conecta você a diversos produtos agrícolas, como frutas, vegetais e
                                    grãos frescos.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div>
            </div>

        </div>

    </section><!-- /Faq Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">
        <img src="assets/img/ANGOLAHORTICOLAS-.png" alt="Call to Action Background">

        <div class="container">
            <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-10">
                    <div class="text-center">
                        <h3>Pronto para transformar suas negociações?</h3>
                        <p>Cadastre-se agora na Agrifácil e comece a negociar com produtores comprometidos com a
                            qualidade. Aproveite uma plataforma simples e eficiente para suas transações agrícolas.</p>
                        <a class="cta-btn" href="cadastro.html">Cadastre-se Agora</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /Call To Action Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contacto</h2>
            <p>Entre em contato conosco para perguntas, suporte ou qualquer informação adicional sobre a nossa
                plataforma.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Endereço</h3>
                                <p>Luanda</p>
                                <p>Angola</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Ligue</h3>
                                <p>+244 923 885 493</p>
                                <p>+244 923 479 641</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email</h3>
                                <p><a href="mailto:suporte@exemplo.com">suporte@exemplo.com</a></p>
                                <p><a href="mailto:contato@exemplo.com">contato@exemplo.com</a></p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="500">
                                <i class="bi bi-share"></i>
                                <h3>Redes sociais</h3>
                                <p>
                                    <a href="#">Facebook</a> |
                                    <a href="#">Instagram</a> |
                                    <a href="#">Twitter</a>
                                </p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Seu nome" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Seu email"
                                    required="">
                            </div>

                            <div class="col-12">
                                <input type="text" class="form-control" name="subject" placeholder="Assunto"
                                    required="">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Mensagem"
                                    required=""></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">A sua mensagem foi enviada! Obrigado</div>

                                <button type="submit">Enviar mensagem</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

        @session("unauthorizated")

            <script>
                Swal.fire({
                    title: '{{ session('unauthorizated') }}',
                    icon: 'error',
                    width: 400,
                    heightAuto: false,
                    showConfirmButton: false,
                    timer: 5000,
                });
            </script>

        @endsession

@endsection
