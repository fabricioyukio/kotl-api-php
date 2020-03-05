<h1>
@if (strtoupper($contender->gender)==='FEMALE')
    Bem vinda
@else
    Bem vindo
@endif
{{ $contender->name }}
</h1>

<p>Estamos muito gratos por sua participação no <strong>Rei do Almoço</strong>.</p>

<p>Por favor clique no link abaixo para validar sua participação:</p>

<p><a href='{{ url("/confirm/contender/{$contender->token}") }}'>
    {{ url("/confirm/contender/{$contender->token}") }}</a></p>

<p>Boa sorte!</p>
