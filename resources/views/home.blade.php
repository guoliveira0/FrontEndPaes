<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ $pageTitle }}</title>
        <link rel="shortcut icon" href="{{ Vite::asset('resources/img/favicon/favicon.ico') }}" type="image/x-icon">
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>

    <body class="ff-montserrat">
        <main>
            <section id="edital">
                @include('components.section-title', ['title' => "conheça o edital"])

                <div class="container my-6">
                    <div class="row">
                        <div class="col col-12 col-md-6 d-flex align-items-center">
                            <p class="text-justify">
                                Explore o edital do programa de forma virtual através do Metaverso do PAES. Conheça os prazos, documentos e procedimentos necessários para realizar sua inscrição de forma interativa e lúdica
                            </p>
                        </div>
                        <div class="col col-12 col-md-6">
                            <img class="d-flex ms-auto me-auto me-md-0" src="{{ Vite::asset('resources/img/game-brand.svg') }}" alt="PAES">
                        </div>
                    </div>
                </div>
                    
                <div class="container mb-5 d-flex justify-content-center">
                    <button class="btn btn-outline-primary btn-rounded">explorar</button>
                </div>
            </section>
            
            <section id="duvidas">
                @include('components.section-title', ['title' => "dúvidas frequetes"])

                <div class="container">
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($duvidas as $key => $value)
                        @include('components.duvida-card', ['index' => $i, 'key' => $key, 'value' => $value])
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>

                <div class="container mb-5 d-flex justify-content-end">
                    <button class="btn btn-sm btn-outline-primary btn-rounded">ver mais</button>
                </div>
            </section>
        </main>
    </body>
</html>