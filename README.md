### Plataforma Verde - Interview Test

##### Requisitos:

- PHP 7.3+
- Docker
- Postman

##### Tecnologias Utilizadas:
- PHP 7.3
    - Laravel 7
- Apache 2.4
- MongoDB

__

### Getting Started

#### Ambiente 

1- Inicializar os containers executando os comandos a seguir na pasta do projeto (antes da pasta `laravel`)
```shell
$ docker-compose up -d

# VERIFICAR SE OS CONTAINERS ESTAO RODANDO
$ docker ps
```

2- Acessar `htt://localhost:8080/` - Deve exibir a Welcome Page do Laravel

#### Postman

1- Abra o Postman
2- Na parte superior esquerda, clique em Import > File
3- Selecione o arquivo `postman.json` para testar os endpoints

__

### Endpoints

#### Enviar planilha

**URI:** [POST]  /api/residuos

**Request Params:**

|Parâmetro      |Tamanho Min/Max|Valor Padrão   |Tipo           |Obrigatório|
| :------------ | :------------ | :------------ | :------------ | :------------ |
planilha        |-              |-              |Arquivo        |Sim

**Response:**
```json
{
    "success": true,
    "data": {
        "assoc": [
            {
                "nomeComumDoResiduo": "Papelão",
                "tipoDeResiduo": "Construção Civil",
                "categoria": "Reciclàvel",
                "tecnologiaDeTratamento": "Aterro Comum",
                "classe": "||-A",
                "unidadeDeMedida": "kg",
                "peso": 100.5
            }
        ],
        "cabecalho": {
            "B": "Nome Comum do Resíduo",
            "C": "Tipo de Resíduo",
            "D": "Categoria",
            "E": "Tecnologia de Tratamento",
            "F": "Classe",
            "G": "Unidade de Medida",
            "H": "Peso"
        },
        "conteudo": {
            "6": {
                "B": "Papelão",
                "C": "Construção Civil",
                "D": "Reciclàvel",
                "E": "Aterro Comum",
                "F": "||-A",
                "G": "kg",
                "H": 100.5
            }
        }
    }
}
```


#### Listar Residuos

**URI:** [GET]  /api/residuos

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "_id": "5eed26d2247f1636474cf822",
            "nome": "Papelão",
            "tipo": "Construção Civil",
            "categoria": "Reciclàvel",
            "tecnologia_tratamento": "Aterro Comum",
            "classe": "||-A",
            "unidadeDeMedida": "kg",
            "peso": 100.5,
            "updated_at": "2020-06-19T20:57:54.017000Z",
            "created_at": "2020-06-19T20:57:54.017000Z"
        }
    ]
}
```


#### Recuperar Planilha de Resíduo (processamento)

**URI:** [GET]  /api/residuos/planilha/{nomePlanilha}

**Request Params:**

|Parâmetro      |Tamanho Min/Max|Valor Padrão   |Tipo           |Obrigatório|
| :------------ | :------------ | :------------ | :------------ | :------------ |
nomePlanilha    |50             |-              |Texto          |Sim

**Response:**
```json
{
    "success": true,
    "data": {
        "planilha_processada": true,
        "mensagem": "Planilha processada",
        "nome_planilha": "planilha_residuos_test01.xlsx",
        "total_residuos_processados": 3
    }
}
```


#### Deletar Resíduo

**URI:** [DELETE]  /api/residuos/{idResiduo}

**Request Params:**

|Parâmetro      |Tamanho Min/Max|Valor Padrão   |Tipo           |Obrigatório|
| :------------ | :------------ | :------------ | :------------ | :------------ |
idResiduo       |-              |-              |ObjectId       |Sim

**Response:**
```json
{
    "success": true
}
```


#### Editar Resíduo

**URI:** [PUT]  /api/residuos/{idResiduo}

**Request Params:**

|Parâmetro              |Tamanho Min/Max|Valor Padrão   |Tipo           |Obrigatório|
| :------------         | :------------ | :------------ | :------------ | :------------ |
idResiduo               |-              |-              |ObjectId       |Sim
nomeResiduo             |255            |-              |Texto          |Sim
tipo                    |255            |-              |Texto          |Sim
categoria               |255            |-              |Texto          |Sim
tecnologia_tratamento   |255            |-              |Texto          |Sim
classe                  |255            |-              |Texto          |Sim
unidadeMedida           |255            |-              |Texto          |Sim
peso                    |-              |-              |Numérico       |Sim

**Response:**
```json
{
    "success": true
}
```
__

### Queue (fila)

1- Processar dos resíduos na fila:

```shell
$ docker exec -it laravel bash

$ php artisan queue:work
```

__

### Testes

1- Para executar os testes, execute o comando a seguir no terminal:

```shell
$ docker exec -it laravel php artisan test
```
