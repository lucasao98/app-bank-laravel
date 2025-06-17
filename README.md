# Projeto FullStack

## Passos para executar

Ao realizar o clone da aplicação, é necessário criar uma pasta chamada dbdata dentro da pasta .docker do projeto. Depois disso, deve-se criar dois diretórios dentro dele. Esse será o volume do container mysql.
Então basta executar o comando: 

```docker
docker-compose up -d
```

O docker foi configurado para executar no localhost na porta 8001. Dessa forma, ao criar o container, a aplicação estará disponível nesse ip e porta.

## Rotas
| rota                               | descrição                                                |
|------------------------------------|----------------------------------------------------------|
| <kbd>GET / </kbd>                  | Rota responsável pela tela de login                      |
| <kbd>GET /login </kbd>             | Responsável pela verificação de usuário, para prosseguir |
