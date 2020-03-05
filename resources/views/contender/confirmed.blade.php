@extends('layouts.web')

<h1>Inscrição Confirmada!</h1>

<p>Parabéns <strong>{{ $contender->name }}</strong>!</p>
<p>Você já está apto a concorrer nas votações para "O Rei do Almoço"!</p>
<p>Desejamos muita sorte e sucesso para que você consiga ser
@if (strtolower($contender->gender)==='female')
    a próxima <strong>rainha</strong>
@else
    o próximo <strong>rei</strong>
@endif
do almoço!</p>
<p>Convide os seus amigos para aumentar ainda mais suas chances.</p>
