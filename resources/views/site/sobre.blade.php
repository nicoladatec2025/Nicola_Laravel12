@extends('layouts.app')

@section('title', 'Sobre-Nicola-Da-Tec')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 3rem 2rem;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 3rem;
    }

    .page-header h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

   section {
            background: white;
            margin: 30px 0;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        section h2 {
            color: #667eea;
            font-size: 2rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #667eea;
        }

        section p {
            margin-bottom: 15px;
            text-align: justify;
        }

        .valores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .valor-item {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
            transition: transform 0.3s ease;
        }

        .valor-item:hover {
            transform: translateX(10px);
        }

        .valor-item h3 {
            color: #667eea;
            margin-bottom: 10px;
            font-size: 1.3rem;
        }
</style>

<div class="page-header">
    <h1>Sobre Nós</h1>
    <p>Conheça nossa história e valores</p>
</div>

<section id="quem-somos">
            <h2>Quem Somos</h2>
            <p>Somos um projecto empresarial no setor de tecnologias de informação e formação profissional, comprometida em impulsionar a transformação digital e o desenvolvimento de competências técnicas de excelência. Combinamos expertise tecnológica com metodologias pedagógicas inovadoras para oferecer soluções completas que atendem às necessidades do mercado atual.</p>
            <p>A nossa equipa é formada por profissionais altamente qualificados, apaixonados por tecnologia e educação, que trabalham diariamente para entregar projetos de qualidade superior e programas de formação que preparam os nossos formandos para os desafios do futuro digital.</p>
        </section>

        <section id="fundacao">
            <h2>Fundação</h2>
            <p>Fundada em 2024, nascemos da visão de dois empreendedores que identificaram a crescente lacuna entre as competências disponíveis no mercado e as necessidades das empresas, profissionais e estudantes em constante evolução tecnológica. Desde o primeiro dia, estabelecemos como objetivo criar uma ponte entre a tecnologia de ponta e a formação de qualidade, tornando-nos um parceiro estratégico para empresas e profissionais que buscam excelência.</p>
        </section>

        <section id="missao">
            <h2>Missão</h2>
            <p>Capacitar empresas, estudantes e profissionais através de soluções tecnológicas inovadoras e programas de formação de excelência, promovendo a transformação digital e o desenvolvimento contínuo de competências que geram impacto real no mercado de trabalho.</p>
        </section>

        <section id="visao">
            <h2>Visão</h2>
            <p>Ser umas das referência nacional em tecnologias de informação e formação profissional até 2030, reconhecidos pela qualidade dos nossos serviços, pela inovação constante e pelo impacto positivo na vida dos nossos clientes e formandos, expandindo a nossa atuação para o mercado internacional.</p>
        </section>

        <section id="valores">
            <h2>Valores</h2>
            <div class="valores-grid">
                <div class="valor-item">
                    <h3>Inovação</h3>
                    <p>Buscamos constantemente novas tecnologias e metodologias que nos permitam oferecer soluções diferenciadas e à frente do mercado.</p>
                </div>
                <div class="valor-item">
                    <h3>Excelência</h3>
                    <p>Comprometemo-nos com a qualidade em cada projeto, formação e interação, superando expectativas e estabelecendo novos padrões de excelência.</p>
                </div>
                <div class="valor-item">
                    <h3>Integridade</h3>
                    <p>Atuamos com transparência, ética e responsabilidade em todas as nossas relações, construindo confiança duradoura com clientes, parceiros e colaboradores.</p>
                </div>
                <div class="valor-item">
                    <h3>Colaboração</h3>
                    <p>Acreditamos no poder do trabalho em equipa e na partilha de conhecimento como motor de crescimento mútuo e sucesso coletivo.</p>
                </div>
                <div class="valor-item">
                    <h3>Compromisso com o Cliente</h3>
                    <p>Colocamos as necessidades dos nossos clientes no centro de tudo o que fazemos, oferecendo suporte personalizado e soluções adaptadas a cada realidade.</p>
                </div>
                <div class="valor-item">
                    <h3>Desenvolvimento Contínuo</h3>
                    <p>Promovemos a aprendizagem constante, tanto internamente como nos programas que oferecemos, mantendo-nos atualizados com as tendências do setor.</p>
                </div>
            </div>
        </section>
@endsection
