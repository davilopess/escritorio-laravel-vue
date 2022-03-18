# Teste 

Teste prático

## Descrição

Você, desenvolvedor, foi contratado para realizar a implementação de um módulo
de contas a pagar do novo sistema do setor jurídico da empresa ABC.

### Instalando e executando

* Sem docker

Na pasta escritorio
```
composer install
```
* Com docker

Crie os containers
```
docker compose up -d --build
```
Entre no container app-escritorio
```
docker-exec -it app-escritorio bash
```
Para o laravel
```
composer install
```
```
php artisan migrate
```
```
php artisan key:generate
```

* Sem Docker

#### Simples demonstração



<img src='escritorio\public\to_readme\preview.gif'>