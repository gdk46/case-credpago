# Gerador de parcela
Gerador de parcela. Gere parcelas facimente, facilite o desenvolvimento utilizando para gerar por exemplo mensalidade, repasse, vendas entre outras ações.


Para começar clone o repositório com o comando.
```
git clone https://github.com/gdk46/gerador-de-parcela.git

```
ou click no [link aqui](https://github.com/gdk46/gerador-de-parcela/archive/main.zip)


### em corporando o gerador de parcelas ao HTML

No HTML requisite o script.

```
<body>
    <script src="./generateParcel.js"></script>
</body>
 ```
  
 ### Instância a função de datas
 
 A função responsável por gerar a(s) data(s) para compor a(s) parcela(s)
 necessita de algumas informações para parametrizar.
```
generateDate(day, month, year, looping)
 
day recebe o dia;
month recebe a quantidade de messes;
year recebe o ano recorrente;
looping recebe a quantidade de loops e é a responssável por todo processo.
```
 
```
<body>
    <script src="./generateParcel.js"></script>
    <script>
      // Example:
      let arrDate = generateDate(30, 12, 2020, 1)
    </script>
</body>
```

 ### Instância a função de Gera Parcelas
 
 A função responsável por gerar a(s) parcelas(s) de fato onde dizemos a ela
 os dias das parcelas.
 
```
generateParcel(arrDate, valueParcel)
 
arrDate recebe um array de data(s) que nos devolve
indice, o valor da(s) parcela(s) ,a data e o status que por padrão é "Em aberto";

valueParcel é o valor padrão de finido da parcela.
```
 
```
<body>
    <script src="./generateParcel.js"></script>
    <script>
      // Example:
      let arrDate = generateDate(30, 12, 2020, 1)
      let parcel  = generateParcel(arrDate, "20,59");
    </script>
</body>
```
  
  
### Aquela espiadinha

Para deixar a mostra os dados devemos utilizar o console já que
ele nos permite ver as propriedades, volores de objetos, Arrays entre outros elementos.


```
<body>
    <script src="./generateParcel.js"></script>
    <script>
      // Example:
      let arrDate = generateDate(30, 12, 2020, 1)
      let parcel  = generateParcel(arrDate, "20,59");
      console.log(parcel)
    </script>
</body>
```

Nesse caso iremos gerar uma parcela para o dia 30 do mês 1 do ano de 2020 no valor de 20,59.
  