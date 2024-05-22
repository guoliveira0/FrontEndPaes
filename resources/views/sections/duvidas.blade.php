<section id="duvidas">
    @include('components.section-title', ['title' => "dúvidas frequentes"])

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
        <a href="https://www.coteps.unimontes.br/paes/" class="btn btn-sm btn-outline-primary btn-rounded">ver mais</a>
    </div>
</section>