<h1>Erro ao realizar confirmação de inscrição</h1>

@if ( strtoupper($contender->status) !== 'ACTIVE')
    <p>Houve um erro ao processar sua inscrição, que pode ter sido por um dos seguintes motivos:</p>

    <h3>Condição inesperada</h3>
    <p>Por favor entre em contato conosco pelo email abaixo:</p>
    <p><a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></p>
@else
    <p>Você já confirmou sua inscrição!</p>
@endif
