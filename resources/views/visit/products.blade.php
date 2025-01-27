@extends('layouts.visit.main')

@section('pageTitle', 'Produtos')

@section('location1', 'Produtos')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Produtos</h1>
              <p class="mb-0">
                Descubra uma ampla variedade de produtos disponíveis para compra! Navegue pelas categorias, encontre itens que atendem
                às suas necessidades, e conecte-se diretamente com produtores confiáveis.
              </p>
            </div>
          </div>
        </div>
      </div>

      {{-- <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Blog</li>
          </ol>
        </div>
      </nav> --}}

      @include('layouts.visit.naviagtion')

    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

      <div class="container">
        <div class="row gy-4">

            <style>
                .post-img{
                    width: 200px; height: 250px; overflow: hidden;
                }
                .productImg{
                    /* width: 100%; */
                    /* height: 100%; */
                    /* object-fit: cover; */
                    width: 100%; height: 100%; object-fit: contain;
                }
                #info_min_text{
                    font-size: 12px;
                }
                .product_name{
                    font-size: 15px;
                }
            </style>

          <div class="col-lg-2 h-100">
            <article>

              <div class="post-img">
                <img src="{{ asset('storage/products/batatas.jpeg') }}" alt="" class="productImg"> {{-- img-fluid --}}
              </div>

              <p class="post-category" id="info_min_text">Category: </p>

              <h2 class="product_name">
                <span>Batata Rena (1 Cesto)</span>
              </h2>

              <p class="post-category" id="info_min_text">Price: <strong>3000,00 Kz</strong></p>
              <p class="post-category" id="info_min_text">In Stock: <strong>37</strong></p>
              <p class="post-category" id="info_min_text">Avaliações média: <strong>78</strong></p>

              <center>
                {{-- <button class="bg-info btn"> --}}
                        <a href="" class="text-muted">
                    <sup>
                            {{-- <i class="fa-solid fa-cart-shopping"></i>
                            <br> --}}
                            Adicionar ao <i class="fa-solid fa-cart-shopping"></i>

                    </sup>
               {{--  </button> --}}</a>
              </center>

              <center>
                <sub>
                    <a href="" class="text-primary">Mais informações</a>
                </sub>
              </center>

            </article>
          </div><!-- End post list item -->

        <div class="col-lg-2 h-100">
            <article>

                <div class="post-img">
                    <img src="{{ asset('storage/products/cenoura.jpeg') }}" alt="" class="productImg"> {{-- img-fluid --}}
                </div>

                <p class="post-category" id="info_min_text">Category: </p>

                <h2 class="product_name">
                    <span>Cenoura (7 Cesto<sub>s</sub> )</span>
                </h2>

                <p class="post-category" id="info_min_text">Price: <strong>27000,00 Kz</strong></p>
                <p class="post-category" id="info_min_text">In Stock: <strong>72</strong></p>
                <p class="post-category" id="info_min_text">Avaliações média: <strong>102</strong></p>

                <center>
                    {{-- <button class="bg-info btn"> --}}
                        <a href="" class="text-muted">
                            <sup>
                                {{-- <i class="fa-solid fa-cart-shopping"></i>
                                <br> --}}
                                Adicionar ao <i class="fa-solid fa-cart-shopping"></i>

                            </sup>
                            {{-- </button> --}}</a>
                </center>

                <center>
                    <sub>
                        <a href="" class="text-primary">Mais informações</a>
                    </sub>
                </center>

            </article>
        </div><!-- End post list item -->

        <div class="col-lg-2 h-100">
            <article>

              <div class="post-img">
                <img src="{{ asset('storage/products/batatas.jpeg') }}" alt="" class="productImg"> {{-- img-fluid --}}
              </div>

              <p class="post-category" id="info_min_text">Category: </p>

              <h2 class="product_name">
                <span>Batata Rena (1 Cesto)</span>
              </h2>

              <p class="post-category" id="info_min_text">Price: <strong>3000,00 Kz</strong></p>
              <p class="post-category" id="info_min_text">In Stock: <strong>37</strong></p>
              <p class="post-category" id="info_min_text">Avaliações média: <strong>78</strong></p>

              <center>
                {{-- <button class="bg-info btn"> --}}
                        <a href="" class="text-muted">
                    <sup>
                            {{-- <i class="fa-solid fa-cart-shopping"></i>
                            <br> --}}
                            Adicionar ao <i class="fa-solid fa-cart-shopping"></i>

                    </sup>
               {{--  </button> --}}</a>
              </center>

              <center>
                <sub>
                    <a href="" class="text-primary">Mais informações</a>
                </sub>
              </center>

            </article>
          </div><!-- End post list item -->

        </div>
      </div>

    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#" class="active">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">10</a></li>
            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>

    </section><!-- /Blog Pagination Section -->

  </main>

@endsection
