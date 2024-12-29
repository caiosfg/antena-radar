<h1 align="center">
    <a href="/">
        <img src="./assets/antenna.svg" alt="antena-radar" width="30" height="24">
            antena-radar
    </a>
</h1>
<p align="center">Gerencie e controle sua rede de antenas.</p>

<p align="center">
    <img src="https://img.shields.io/badge/laravel-gray?logo=laravel"/>
    <img src="https://img.shields.io/badge/docker-5742f5?logo=docker"/>
    <img src="https://img.shields.io/badge/vite-FFD740?logo=vite"/>
</p>

### Structure

- [x] Laravel ;
- [x] Docker ;
- [x] Vue ;

### Requirements

1. Copie o `.env.example` e renomeie para `.env` dentro e `api`;

2. Execute o comando abaixo para subir as imagens:

   > `docker compose up`

3. Execute as migrations para criação das tabelas, dentro do container da api:

   > `php artisan migrate`
