# case imobiliário


<pre>
case-imobiliario/
│   ├── doc/
│   │   ├── dump
│   │   │   ├── sctruture-date.sql
│   │   │   └── sctruture.sql  
│   │   └── imob.docx
│   
│   ├── public/
│   │   ├── app/
│   │   │   ├── __layout__/ 
│   │   │   │   └── defalt.layout.ph
│   │   │   │
│   │   │   ├── atualizar/
│   │   │   │   ├── contrato.php
│   │   │   │   ├── imovel.php
│   │   │   │   ├── locador.php
│   │   │   │   ├── locatario.php
│   │   │   │   ├── mensalidade.php
│   │   │   │   └── repasse.php
│   │   │   │
│   │   │   ├── cadastro/
│   │   │   │   ├── imovel.php
│   │   │   │   ├── locador.php
│   │   │   │   └── locatario.php
│   │   │   │
│   │   │   ├── deletar/
│   │   │   │   ├── contrato.php
│   │   │   │   ├── imovel.php
│   │   │   │   ├── locador.php
│   │   │   │   ├── locatario.php
│   │   │   │   ├── mensalidade.php
│   │   │   │   └── repasse.php
│   │   │   │
│   │   │   ├── erro/
│   │   │   │   └── 404.php
│   │   │   │
│   │   │   ├── gerar/
│   │   │   │   ├── conta.php
│   │   │   │   └── contrato.php
│   │   │   │
│   │   │   ├── lista/ 
│   │   │   │   ├── contrato.php
│   │   │   │   ├── imovel.php
│   │   │   │   ├── locador.php
│   │   │   │   ├── locatario.php
│   │   │   │   ├── mensalidade.php
│   │   │   │   └── repasse.php
│   │   │   │
│   │   │   ├── index.php
│   │   │   └── welcome.php
│   │   ├── assets/
│   │   │   ├── img/ *
│   │   │   └── libs/ *
│   │   │   
│   │   └── boot/
│   │       └── layout padrão onde será importado o necessário 
│   │         
│   └── src/
│       ├── Class/
│       │   ├── Database/ *
│       │   ├── Format/ *
│       │   └── Saniteze/ *
│       │   
│       └── ControllerAjax/
│           ├── contrato.ajax.php
│           ├── imovel.ajax.php
│           ├── locador.ajax.php
│           ├── locatario.ajax.php
│           ├── mensailidade.ajax.php
│           ├── mensailidadeCriar.ajax.php
│           ├── repasse.ajax.php
│           └── repasseCriar.ajax.php
│   
│   
├── .editorconfig  
├── .gitignore 
├── .htaccess
├── LICENSE
└── README.md 
</pre>


## Features
* Xampp | v3.2.4
* PHP   | v7.4.12 
* MySql | v5.7 

## Resquest
```
rota: case-imobiliario/public/app/index.php
```
Responsável por receber requisições http(s) e indexa a página correspondente a requisição. Essas requisições são feitas via query string onde é informado o folder e a página que deve ser indexada. Esse tipo de requisição seria a teoria posta em prática do patten front controller no procedural.



## Comunicação entre partes
As requisições ao backend são feitas via ajax.

<p align="center">
  <img src="https://github.com/gdk46/case-imobiliario/blob/main/doc/ilustracao.jpg" alt="ilustracao"/>  
</p> 

Logo você poderá ter X front-ends para um back-end desde que siga as regras de negócio aplicada.



## Via POST e métodos padrões (funções)
Pelo POST eu vivo, pelo POST eu morro!
É bem possível encontrar falhas de segurança nesse sistema já que a prioridade era em si construí um sistema em PHP e MySql.

No back-end foi desenvolvido um padrão universal apenas mudando a regra de negócio em partes


#### Métodos padrões
Locador | locatário | imóvel
* criar
    * campos para criar
* atualizar
    * campos para atualizar
* editar
    * campos para editar
* listar
* deletar


Contrato
* criar
    * campos para criar
* editar
    * campos para editar
* listar
* deletar
* gerar


repasses | mensalidade
* criar
    * campos para criar
* atualizar
    * campos para atualizar
* editar
    * campos para editar
* listar


