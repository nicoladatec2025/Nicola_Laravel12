@extends('layouts.app')

@section('title', 'Início - NicolaDaTec')

@section('content')
<style>
     .slider {
      position: relative;
      width: 100%;
       height: 500px;
      margin: auto;
      overflow: hidden;
    }
    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
      width: 100%; /* 100% x número de imagens */
       height: 500px;
    }
    .slides img {
      width: 100%;
      flex-shrink: 0;
      height: 500px;
    }
    .nav-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0,0,0,0.5);
      color: #fff;
      border: none;
      padding: 10px;
      cursor: pointer;
    }
    .prev { left: 10px; }
    .next { right: 10px; }

    .hero {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        border-radius: 0;
        text-align: center;
        margin-bottom: 0;
    }

    .hero h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .hero p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }

    .btn {
        display: inline-block;
        padding: 1rem 2rem;
        background-color: white;
        color: #1e3c72;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: all 0.3s;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .feature-card {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        text-align: center;
        transition: all 0.3s;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .feature-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .feature-card h3 {
        color: #1e3c72;
        margin-bottom: 1rem;
    }
</style>

<div class="hero">
    <h1>Bem-vindo à Nicola Da Tec</h1>
    <p>Soluções tecnológicas inovadoras para o seu negócio</p>
    <a href="{{ route('servicos') }}" class="btn">Conheça Nossos Serviços</a>
</div>

<div class="slider">
  <div class="slides" id="slides">
    <img class="slider img" src="{{ asset('images/banner1.jpeg') }}" alt="Banner 1">
    <img  class="slider img" src="{{ asset('images/banner2.jpeg') }}" alt="Banner 2">
    <img  class="slider img" src="{{ asset('images/banner3.jpeg') }}" alt="Banner 3">
  </div>
  <button class="nav-btn prev" onclick="moveSlide(-1)">&#10094;</button>
  <button class="nav-btn next" onclick="moveSlide(1)">&#10095;</button>
</div>

<script>
  let index = 0;
  const slides = document.getElementById('slides');
  const total = slides.children.length;

  function showSlide(i) {
    index = (i + total) % total;
    slides.style.transform = `translateX(-${index * 100}%)`;
  }

  function moveSlide(step) {
    showSlide(index + step);
  }

  // autoplay a cada 3 segundos
  setInterval(() => moveSlide(1), 3000);
</script>


<div class="features">
    <div class="feature-card">
        <div class="feature-icon">🚀</div>
        <h3>Inovação</h3>
        <p>Utilizamos as tecnologias mais modernas e eficientes do mercado.</p>
    </div>

    <div class="feature-card">
        <div class="feature-icon">⚡</div>
        <h3>Rapidez</h3>
        <p>Entregamos projetos no prazo com qualidade garantida.</p>
    </div>

    <div class="feature-card">
        <div class="feature-icon">💎</div>
        <h3>Qualidade</h3>
        <p>Comprometimento total com a excelência em cada projeto.</p>
    </div>

    <div class="feature-card">
        <div class="feature-icon">🤝</div>
        <h3>Suporte</h3>
        <p>Acompanhamento contínuo e suporte dedicado aos nossos clientes.</p>
    </div>
</div>
@endsection
