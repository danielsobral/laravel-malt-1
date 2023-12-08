<x-app-layout>
    <x-slot name="header">
        <h3>Dados dos usuários</h3>
    </x-slot>
    <ul>
        <li>Nome: {{ auth()->user()->name }}</li>
        <li>Documento: {{ auth()->user()->client->document }}</li>
        <li>Status da assinatura: {{ auth()->user()->client->signatures->first()->status->name }}</li>
    </ul>
</x-app-layout>