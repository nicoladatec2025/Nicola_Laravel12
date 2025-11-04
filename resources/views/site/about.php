<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conheça a nossa empresa de tecnologias de informação e formação profissional">
    <title>Sobre Nós - Tecnologia e Formação</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.2rem;
            opacity: 0.9;
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

        .localizacao-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 20px;
        }

        .local-item {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            border-top: 4px solid #764ba2;
        }

        .local-item h3 {
            color: #764ba2;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .local-item p {
            margin-bottom: 5px;
            text-align: left;
        }

        .contactos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .contacto-item {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .contacto-item:hover {
            transform: translateY(-5px);
        }

        .contacto-item h3 {
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .contacto-item p {
            margin-bottom: 8px;
            text-align: left;
        }

        .contacto-item a {
            color: white;
            text-decoration: none;
            border-bottom: 1px dotted white;
        }

        .contacto-item a:hover {
            border-bottom: 1px solid white;
        }

        .redes-sociais {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .redes-sociais a {
            background: white;
            color: #667eea;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .redes-sociais a:hover {
            background: #667eea;
            color: white;
        }

        .horario {
            background: #fff3cd;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #ffc107;
            margin-top: 30px;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 1.8rem;
            }

            section {
                padding: 25px;
            }

            section h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Sobre Nós</h1>
            <p>Tecnologia de Informação & Formação Profissional</p>
        </div>
    </header>

    <main class="container">
        <section id="quem-somos">
            <h2>Quem Somos</h2>
            <p>Somos uma empresa de referência no setor de tecnologias de informação e formação profissional, comprometida em impulsionar a transformação digital e o desenvolvimento de competências técnicas de excelência. Combinamos expertise tecnológica com metodologias pedagógicas inovadoras para oferecer soluções completas que atendem às necessidades do mercado atual.</p>
            <p>A nossa equipa é formada por profissionais altamente qualificados, apaixonados por tecnologia e educação, que trabalham diariamente para entregar projetos de qualidade superior e programas de formação que preparam os nossos alunos para os desafios do futuro digital.</p>
        </section>

        <section id="fundacao">
            <h2>Fundação</h2>
            <p>Fundada em 2015, nascemos da visão de dois empreendedores que identificaram a crescente lacuna entre as competências disponíveis no mercado e as necessidades das empresas em constante evolução tecnológica. Desde o primeiro dia, estabelecemos como objetivo criar uma ponte entre a tecnologia de ponta e a formação de qualidade, tornando-nos um parceiro estratégico para empresas e profissionais que buscam excelência.</p>
        </section>

        <section id="missao">
            <h2>Missão</h2>
            <p>Capacitar empresas e profissionais através de soluções tecnológicas inovadoras e programas de formação de excelência, promovendo a transformação digital e o desenvolvimento contínuo de competências que geram impacto real no mercado de trabalho.</p>
        </section>

        <section id="visao">
            <h2>Visão</h2>
            <p>Ser a referência nacional em tecnologias de informação e formação profissional até 2030, reconhecidos pela qualidade dos nossos serviços, pela inovação constante e pelo impacto positivo na vida dos nossos clientes e formandos, expandindo a nossa atuação para o mercado internacional.</p>
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

        <section id="localizacao">
            <h2>Localização</h2>
            <div class="localizacao-grid">
                <div class="local-item">
                    <h3>Sede Principal</h3>
                    <p>Avenida da Tecnologia, 123</p>
                    <p>Edifício Innovation Hub, 5º andar</p>
                    <p>1000-001 Lisboa, Portugal</p>
                </div>
                <div class="local-item">
                    <h3>Centro de Formação</h3>
                    <p>Rua do Conhecimento, 45</p>
                    <p>Parque Tecnológico, Bloco B</p>
                    <p>4000-002 Porto, Portugal</p>
                </div>
            </div>
        </section>

        <section id="contactos">
            <h2>Contactos</h2>
            <div class="contactos-grid">
                <div class="contacto-item">
                    <h3>Geral</h3>
                    <p>Email: <a href="mailto:geral@suaempresa.pt">geral@suaempresa.pt</a></p>
                    <p>Telefone: <a href="tel:+351210000000">+351 210 000 000</a></p>
                </div>
                <div class="contacto-item">
                    <h3>Departamento Comercial</h3>
                    <p>Email: <a href="mailto:comercial@suaempresa.pt">comercial@suaempresa.pt</a></p>
                    <p>Telefone: <a href="tel:+351210000001">+351 210 000 001</a></p>
                </div>
                <div class="contacto-item">
                    <h3>Formação Profissional</h3>
                    <p>Email: <a href="mailto:formacao@suaempresa.pt">formacao@suaempresa.pt</a></p>
                    <p>Telefone: <a href="tel:+351210000002">+351 210 000 002</a></p>
                </div>
                <div class="contacto-item">
                    <h3>Suporte Técnico</h3>
                    <p>Email: <a href="mailto:suporte@suaempresa.pt">suporte@suaempresa.pt</a></p>
                    <p>Telefone: <a href="tel:+351210000003">+351 210 000 003</a></p>
                    <p>Segunda a Sexta, 9h00 - 18h00</p>
                </div>
            </div>

            <div class="redes-sociais">
                <a href="https://linkedin.com/company/suaempresa" target="_blank">LinkedIn</a>
                <a href="https://facebook.com/suaempresa" target="_blank">Facebook</a>
                <a href="https://instagram.com/suaempresa" target="_blank">Instagram</a>
                <a href="https://twitter.com/suaempresa" target="_blank">Twitter</a>
            </div>

            <div class="horario">
                <h3>Horário de Atendimento</h3>
                <p><strong>Segunda a Sexta:</strong> 9h00 - 18h00</p>
                <p><strong>Sábado:</strong> Mediante agendamento</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 Sua Empresa - Tecnologia e Formação. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>