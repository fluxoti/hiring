# Trabalhe Conosco

## Testes

 Os testes são realizados por meio de Pull Requests no github. Se você estiver interessado em trabalhar conosco pode criar um fork deste projeto e nos enviar um PR com a resolução de um ou mais testes que achar necessário.

 Criamos vários exercícios com dificuldades diferentes. Alguns já possuem uma estrutura de código inicial, outros apenas possuem a pasta para identificar o exercício. O enunciado de cada problema descreve a solução desejada, mas o candidato pode realizar adições ao problema (por exemplo, utilizar **TDD** na resolução).  
 Alguns exercícios são relacionados as ferramentas utilizadas pela FluxoTI no desenvolvimento ([Laravel](http://laravel.com), [PHPSpec](http://www.phpspec.net/en/latest/) e [PHPUnit](https://phpunit.de/)).

 O candidato deve também preencher o arquivo `profile.md` com as informações solicitadas.

---
### Exercício 1: FizzBuzz
Criar um script que imprima a palavra *Fizz* para múltiplos de 3, *Buzz* para múltiplos de 5 e *FizzBuzz* para os múltiplos de 3 e 5, iniciando no número 1 e terminando no número 100.

### Exercício 2: Temperaturas
Realizar a conversão de temperaturas entre Fahrenheit e Celsius. As informações serão passadas via **GET** para o script:

Parâmetro      |   Significado
---------------|-------------------------------------------------------
temperature    |   Temperatura a ser convertida
to             |   Escala a ser convertida (F = Fahrenheit, C = Celsius)

Exemplo de URL: **conversion.php?temperature=172&to=C**  
*A URL acima deverá converter 172º para a escala celsius.*

O script deve possuir uma *classe especializada* na conversão das temperaturas e esta deve estar coberta com testes unitários (utilizando PHPSpec). AS dependências devem ser gerenciadas via *composer*.

### Exercício 3: Funcionários

Vamos realizar a leitura de um arquivo fictício que conterá dados de uma empresa e seus funcionários. Nosso script deverá ler linha por linha desde arquivo e organizar as informações da seguinte maneira:

+ Uma tag H1 com o nome da empresa
+ Um parágrafo com o endereço desta empresa
+ Uma tabela com o Nome, data de admissão do funcionário (formato: dd/mm/yyyy), cargo e salário de cada funcionário

A primeira linha do arquivo contém as informações da empresa, dispostas da seguinte maneira:

Posição Inicial | Posição Final | Significado
----------------|---------------|------------------------
1               |            30 | Nome da Empresa
31              |           100 | Endereço da empresa

As linhas subsequentes contém as informações relativas a cada funcionário, dispostas da seguinte maneira:

Posição Inicial | Posição Final | Significado
----------------|---------------|------------------------
1               |             20| Nome do funcionário
21              |             28| Data de admissão (formato:yyyymmdd)
29              |             60| Cargo do funcionário
61              |             68| Salário do funcionário (2 casas decimais e sem vírgula)

O exercício deverá possuir uma classe especializada em realizar a interpretação das informações lidas. Esta classe deverá estar coberta por testes unitários (utilizar PHPSpec).
Não é necessário um formulário para upload do arquivo.

### Exercício 4: Laravel Login

O exercicio conta com um simples projeto Laravel recém criado. O objetivo aqui é criar um sistema de login simples: o usuário digitará seu email e senha e o sistema deverá verificar. Caso esteja correto enviá-lo para a url `/dashboard`, caso contrário, exibir um erro no formulário.  

Recomenda-se utilizar um banco de dados SQLite e o servidor nativo do PHP (utilizar o comando `php artisan serve` para iniciar o servidor no projeto Laravel). Utilizar a criptografia de senhas padrão do Laravel e também migrações e seeds para alimentar o banco.  

Pode-se utilizar o Bootstrap para adicionar um pouco de estilo na página. As mensagens de erro devem ser exibidas em português.

Os itens listados abaixo não são exigências do exercício, porém são um diferencial:

+ Utilizar Login Throttling nativo do framework
+ Validações de campos obrigatórios
+ Testes funcionais utilizando a suíte de testes do Laravel

### Exercício 5: From 0 to All

Criar um CRUD simples de clientes utilizando Laravel. Não é necessário sistema de login para esse exercício. Como banco de dados deve-se utilizar o SQLite e o servidor nativo do PHP. Os clientes devem possuir as seguintes informações: Nome, data de nascimento, Endereço e telefone.  
Utilizar também migrations e o CRUD deve estar coberto por testes funcionais, utilizando as factories do Laravel para a manipulação do banco de dados.





