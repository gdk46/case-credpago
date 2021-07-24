<h1 align="center">
    case imobiliário :european_post_office:
</h1>

<p align="center"> 
 :european_post_office: Caso dirigido a teste técnico
</p>

<p align="center" style="margin-bottom:50px;">
 <a href="#Sobre">Sobre</a> •
 <a href="#Instalação">Instalacao</a> • 
 <a href="#tecnologias">Tecnologias</a> • 
 <a href="#tecnologias">Organização</a> • 
 <a href="#como-usar">Como usar</a> •
 <a href="#feature">Features</a> • 
 <a href="#estrutura-de-codigo">Estrutura de código</a> •
 <a href="#consideracoes-finais">Considerações finais</a>
</p>

<p align="center">
  <img src="https://img.shields.io/static/v1?label=Tec.&message=HTML5&color=E34F26&style=for-the-badge&logo=Html5"/>
  <img src="https://img.shields.io/static/v1?label=Tec.&message=CSS3&color=1572B6&style=for-the-badge&logo=CSS3"/>
  <img src="https://img.shields.io/static/v1?label=tec.&message=JavaScript&color=F7DF1E&style=for-the-badge&logo=JavaScript"/>
  <img src="https://img.shields.io/static/v1?label=tec.&message=PHP&color=8892BF&style=for-the-badge&logo=PHP"/>
</p>

### 🏁Sobre
Consiste em uma aplicação monolítica para cadastro de dados de imóveis, locador, locatário e  para gerar parcelas.

#### 🚧 Alguns pré-requisitos 🚧
- MySql 5.4 ou >
- PHP 7.4 ou >
- Servidor Apache 2

### 🧰 Instalação 
- é necessário ter um banco de dados relacional de sintaxe SQL, para facilitar instale o [xampp](https://www.apachefriends.org/pt_br/index.html).
  - após a instalação:
    - incialize o MySql;
    - incialize o Apache;
- vá até o passo 🚀 Go 🚀 para continuar.

### :computer: Tecnologias
* Bootstrap: v4.^;
* HTLM, v5;
* CSS, v3;
* PHP, v7.4;

#### 🚀 Go 🚀
Utilize esse comando para clonar o repositório:
```GIT
git clone https://github.com/gdk46/case-credpago.git
```
Caso deseje não clonar: baixar [código fonte](https://github.com/gdk46/case-credpago/archive/refs/heads/main.zip).

Acesse ao diretório:
```
cd case-credpago
```

Inicialize o serviço com o servidor imbutido do PHP:
```
php -S localhost:8181
```

Já com o XAMPP/LAMP inicializado é preciso subir uma versão do banco de dados, para isso você deve seguir o seguintes passos 
```
1- acesse o localhost/phpmyadmin
2- faça o login (caso peça)

3- vá até a pasta do projeto case-credpago/doc/dump
    aqui você irá encontrar dois arquivos
        ctruture-date.sql
        dump
          ├── sctruture-date.sql (arquivo com a estrutura e dados)
          └── sctruture.sql (arquivo com a estrutura)
    Nesse casso, se sinta avontade para utilizar qualquer dos dois.

4- cri um banco chamado "caseimobiliaria"
5- arraste o arquivo para o phpmyadmin
```

### Organização
<pre>
case-credpago/
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


## Resquest
##### caso 1: caso esteja usando o servidor do xampp
```
rota: case-credpago/public/app/index.php
```

##### caso 2: caso esteja usando o servidor embutido do PHP
```
rota: index.php
```


Responsável por receber requisições http(s) e indexa a página correspondente a requisição. Essas requisições são feitas via query string onde é informado o folder e a página que deve ser indexada. Esse tipo de requisição seria a teoria posta em prática do patten front controller no procedural.



## Comunicação entre partes
As requisições ao back-end são feitas via ajax com os métodos GET para solicitar algum recurso com uma view, e POST para armazenar.

<p align="center">
  <img src="https://github.com/gdk46/case-credpago/blob/main/doc/ilustracao.jpg" alt="ilustracao"/>  
</p> 

Logo você poderá ter X fronts-end para um back-end desde que siga as regras de negócio aplicada no back-end.

## Features
* [X] Locador -> Atualizar | Criar | Editar | Excluir
* [X] Locatário -> Atualizar | Criar | Editar | Excluir
* [X] Imóvel -> Atualizar | Criar | Editar | Excluir
* [X] Parcela -> Atualizar | Criar | Editar | Excluir

## Métodos padrões de estrutura do código
Esses métodos padrões de estrutura de código não se refere a uma função ou a uma particularidade de um objeto, mas sim a uma padronização de código, onde foi escolhido para padronizar nossas entradas de requisições de recursos. Um exemplo, ao pedir para um garçom uma xícara de café e para outro, um copo com água, temos em como semelhança a ação de pegar.

### EXEMPLO
<pre>
Garçom 1
_____________________________
└── pegar 
    └── café
    
Garçom 2
_____________________________
└── pegar 
    └── água

</pre>



### APLICAÇÃO
<pre>
Locador | Locatário | Imóvel
_____________________________
├── criar 
│   └── campos para criar
├── atualizar 
│   └── campos para atualizar
├── editar 
│   └── campos para editar
├── listar
└── deletar


Contrato
_____________________________
├── criar 
│   └── campos para criar
├── editar 
│   └── campos para editar
├── listar
├── gerar
└── deletar


Repasses | Mensalidade
_____________________________
├── criar 
│   └── campos para criar
├── atualizar 
│   └── campos para atualizar
├── editar 
│   └── campos para editar
└── listar
</pre>


## Considerações finais
Utilize esse projeto como fonte de estudo. Fico feliz em poder contribuir para seu crescimento, qualquer dúvida entre em contato comigo.
