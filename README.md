## Instrução de uso

O contrato https://stark-bank.herokuapp.com/api/invoices invoca a criação de 8 a 12 Invoices conforme necessário descrito o teste.

Obs.: 1 - O contrato acima descrito foi adicionado ao Cloud Scheduler do GCloud e configurado para ser executado de 3 em 3h.

2 - Foi enviado pelo email o arquivo .env necessário para rodar os testes.

`php artisan config:cache`

## Testes

Rode o seguinte comando dentro do container:

`php artisan test --env=local`