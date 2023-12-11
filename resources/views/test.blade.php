<x-app-layout>
    <x-slot name="header">
        <h3>Dados dos usuários</h3>
    </x-slot>
    <ul>
        <li>Nome: {{ $name }}</li>
        <li>Documento: {{ $document }}</li>
        <li>Status da assinatura: {{ $status }}</li>
        <li>Comida: {{ $param['food'] }}</li>
        <li>Bebida: {{ $param['drink'] }}</li>
    </ul>
</x-app-layout>