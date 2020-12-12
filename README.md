# case imobiliário


<pre>
case-imobiliario/
│   ├── doc/
│   │   ├── dump
│   │   │   ├── sctruture-date.sql
│   │   │   └── sctruture.sql  
│   │   └── imob.docx
│   │
│   │
│   │
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
│   │   │   ├── lista/ 
│   │   │   │   ├── contrato.php
│   │   │   │   ├── imovel.php
│   │   │   │   ├── locador.php
│   │   │   │   ├── locatario.php
│   │   │   │   ├── mensalidade.php
│   │   │   │   └── repasse.php
│   │   │   │
│   │   │   ├── index.php ()
│   │   │   └── welcome.php
│   │   ├── assets/
│   │   │   ├── img/ *
│   │   │   └── libs/ *
│   │   │   
│   │   └── boot/
│   │       └── layout padrão onde será importado o necessário 
│   │       
│   │       
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
└──README.md 
</pre>

```
rota: case-imobiliario/public/app/index.php
```
responsável por receber requisições http(s) e index a página correspondente a requisição. Essas requisições são feitas via query string onde é informado o folder e a página