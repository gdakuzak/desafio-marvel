# API Marvel

<p align="center">
    <img alt="Made by YahP" src="https://img.shields.io/badge/Laravel-8.12-ff2d20?style=for-the-badge&logo=laravel">
</p>

## 📚 Histórico
Após os acontecimentos do Ultimato, na Terra 616, Tony Stark e Reed Richards estão tentando recuperar o sistema da Prisão 42. Stark acionou o Protocolo de Segurança J.A.R.V.I.S. para evitar problemas de segurança. Instruções estão nos próximos passos.

## ⚠️ Pré-requisitos
- PHP 7.4.3
- Instalar os pacotes PHP:
	- php7.4-cli
	- php7.4-common
	- php7.4-curl
	- php7.4-gd
	- php7.4-json
	- php7.4-mbstring
	- php7.4-mysql
	- php7.4-opcache
	- php7.4-readline
	- php7.4-sqlite3
	- php7.4-xml
	- php7.4-zip
- MariaDB ou MySQL
- Nginx ou Apache (se for servidor)
- Git
- Composer
- Linux
	- Preferencia, porém se for em outro SO,  alguns comandso devem ser adaptados. 

## ⚙️ Instalação
- Clone o repositorio e entre dentro da pasta:
  ```
  git clone git@github.com:gdakuzak/desafio-marvel.git
  cd desafio-marvel
  ```
 - Instale os pacotes: ```composer install ```
- Copie o ```.env.example``` para ```.env``` para executar o Laravel: 
	- Linux: ```cp .env.example .env```
- Crie a chave  aleatoria para executar o Laravel: ```php artisan key:generate```
- Abra o ```.env``` e nos parametros abaixo, adicione os dados do banco de dados:
  ```
  DB_DATABASE=
  DB_USERNAME=
  DB_PASSWORD=
  ```
  <b>Importante 1:</b> se voce alterou a porta do banco de dados MySQL ou MariaDB para uma porta diferente da 3306, altere no parametro: ```DB_PORT```.
  
  <b>Importante 2:</b> Se voce não vai utilizar o banco de dados local ou tem outro servidor para banco de dados, altere no parametro: ```DB_HOST```. 
 - <b>Passo Opcional:</b> Se deseja se conectar a Marvel para receber alguns dados de alguns personagens , voce deve seguir os passos no <a href="https://developer.marvel.com/docs#!/public/getCharacterIndividual_get_1">nesse link</a>, e pegar, pegar URL, chave publica e a chave privada. Caso não queira, adicionaremos os primeiros herois do Avenger #1 de 1961 no DB.
	- Abra o arquivo ```.env``` e altere os parametros:
      ```
      MARVEL_URL=
      MARVEL_PUBLIC=
      MARVEL_PRIVATE=
      ``` 
- Execute o comando a seguir para criação das tabelas e importação dos dados: ```php artisan migrate --seed```
- Para executar o servidor localmente, use: ```php artisan serve --port=8000```

	<b>Importante:</b> Você poderá alterar a porta de acesso aos endpoints, porem não esqueça de mudar quando for acessar.
### Acesso:
Sem esses passos aqui, o J.A.R.V.I.S não deixará você passar:
- No Postman ou qualquer outro software similar, utilize acesso o endpoint: ```/tokens/create``` passe o body:
  ```json
  {
      "name": "Guilherme Dakuzaku",
      "email": "gdakuzak@gmail.com.br"
  }
  ```
 - Você receberá o retorno:
    ```json
    {
        "email": "gdakuzak@gmail.com.br",
        "token": "3|SJg8KcP1k1tuG8Cn83Ym6J9LkZnvMr7lh7lIMwyx"
    }
    ```
  - Se o software que você usa tiver o meio de Autenticação Bearer, cole no campo o token. Se não tiver, coloque no header o campo ```Authorization``` e antes do token coloque ```Bearer + espaço```. Exemplo: ```Bearer 3|SJg8KcP1k1tuG8Cn83Ym6J9LkZnvMr7lh7lIMwyx```
  - Não esqueça de todas as conexões terem no header ```Accept``` com o conteúdo: ```application/json```.
  

## Endpoints:
Veja os endpoints na documentação específica:

<a href="https://documenter.getpostman.com/view/6554571/Tz5ndzEL"><img src="https://img.shields.io/badge/Veja%20no-Postman-ef5b25?style=for-the-badge&logo=postman"></a>

## Sobre o Dev:
Guilherme Makoto Sacoman Dakuzaku

Contato: gdakuzak@gmail.com