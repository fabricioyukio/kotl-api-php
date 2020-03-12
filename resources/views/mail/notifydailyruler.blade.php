<h1>
Parabéns Vossa Majestade Real
</h1>

<p>{{ $contender->name }},</p>

<p>
Você foi
@if (strtoupper($contender->gender)==='FEMALE')
    eleita a nova <strong>Rainha</strong>
@else
    eleito o novo <strong>Rei</strong>
@endif
do Almoço para o dia {{ \Carbon\Carbon::now()->format('d/m/Y') }}
</p>

<p>Estamos muito gratos por sua participação no <strong>Rei do Almoço</strong>.</p>

<p>Esperamos sinceramente que continue participando!</p>
