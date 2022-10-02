<h1 align="center">
👨🏾‍💻<br>Teste Para Vaga de Desenvolvimento Web
</h1>

# Inicio

O teste foi feito de acordo com os PDF's "Desafio para vaga desenvolvedor PHP" e o "Requisitos" com ênfase ao Back-End:

# Desafio para vaga desenvolvedor PHP:

-   Utilizar as linguagens: PHP (5.2 ou Superior);
-   Utilizar o framework CodeIgniter ou Laravel;
-   Camada de frontend independente do backend (API REST + frontend);
-   Bons padrões de desenvolvimento e código limpo;
-   Organização dos arquivos dentro do projeto;

# Requisitos:

-   CRUD de clientes.
-   CRUD de produtos.
-   CRUD de pedidos de compra, com status (Em
    Aberto, Pago ou Cancelado).

-   Cada CRUD:
-   -   deve ser filtrável e ordenável por qualquer campo, e possuir paginação de 20 itens.
-   -   deve possuir formulários para criação e atualização de seus itens.
-   -   deve permitir a deleção de qualquer item de sua lista.

# ⚜️ Linguagens, Frameworks e Versões

-   `PHP`- **8.1.10 (cli)**

-   `Composer` - **2.4.2**

-   `Laravel` - **9.33**

# 💭 Como iniciar a API, Criar as tabelas e popular o Banco de dados?

## ䷀ Criar as tabelas no Banco de Dados

Para criar as tabelas no banco de dados basta digitar o comando <code>php artisan migrate</code>

## 👨‍👩‍👧‍👦 Popular o Banco de Dados

Para popular o Banco de Dados basta digitar o comando <code>php artisan db:seed</code>

## 🎬 Iniciar a API

Para iniciar a API basta digitar o comando <code>php artisan serve</code>

</br>

# 🫙 Tabelas do Banco de Dados

<table>
  <thead>
    <tr>
      <th>Clientes</th>
      <th>Tipo de Dado</th>
      <th>Nullable</th>
    </tr>

  </thead>
 <tbody>
    <tr>
      <td>NomeCliente</td>
      <td><code>Varchar(100)</code></td>
      <td>❌</td>
</tr>
<tr>
      <td>CPF</td>
      <td><code>Char(14)</code></td>
      <td>❌</td>
</tr>
<tr>
<td>Email</td>
      <td><code>Varchar</code></td>
      <td>✅</td>
      </tr>
</tbody>
</table>

<table>
  <thead>
    <tr>
      <th>Produtos</th>
      <th>Tipo de Dado</th>
      <th>Nullable</th>
    </tr>
  </thead>
 <tbody>
 <tr>
      <td>CodBarra</td>
      <td><code>Varchar(20)</code></td>
       <td>❌</td>
</tr>
<tr>
<td>NomeProduto</td>
      <td><code>Varchar(100)</code></td>
       <td>✅</td>
</tr>
<tr>
<td>ValorUnitario</td>
      <td><code>Decimal</code></td>
       <td>❌</td>
</tr>
</tbody>
</table>

<table>
  <thead>
    <tr>
      <th>Pedidos</th>
      <th>Tipo de Dado</th>
      <th>Nullable</th>
    </tr>
  </thead>
 <tbody>
<tr>
       <td>NumeroPedido</td>
      <td><code>Int</code></td>
       <td>❌</td>
    </tr>
    <tr>      
       <td>DtPedido</td>
      <td><code>DateTime</code></td>
       <td>❌</td>
    </tr>
    <tr>
      <tr>
       <td>Status</td>
      <td><code>Enum</code></td>
       <td>❌</td>
      </tr>
   <tr>
       <td>Quantidade</td>
      <td><code>SmallInteger</code></td>
       <td>❌</td>
      </tr>
   <tr>
       <td>Customer_id</td>
      <td><code>BigInt Unsigned</code></td>
       <td>❌</td>
</tr>
   <tr>
       <td>Product_id</td>
      <td><code>BigInt Unsigned</code></td>
       <td>❌</td>
    </tr>
    
  </tbody>
</table>

# 👀 Filtros e Ordenação em Detalhes

## 🗄️ Filtro

<table>
<thead>
<tr>
<th>Query Params</th>
<th>Descrição</th>
<th>Valores Aceitos</th>
</tr>
</thead>
<tbody>
<tr>
<td>campo_filtro</td>
<td>Filtra o banco de dados baseado na coluna fornecida</td>
<td>Nome da coluna para a tabela em questão, ex: Se for Clientes, CPF seria um valor válido!</td>
</tr>
<tr>
<td>filtro</td>
<td>Faz a filtragem baseado no valor fornecido</td>
<td>Ex: Se o Campo Especificado for o CPF então "300.000.000-00" seria um valor valido</td>
</tr>
<td>operador_filtro</td>
<td>Faz a operação lógica baseado no valor fornecido</td>
<td><code>=</code> <code>></code> <code><</code><code>>=</code><code><=</code></td>
</tr>
</tbody>
</table>

## 🪢 Ordenação

<table>
<thead>
<tr>
<th>Query Params</th>
<th>Descrição</th>
<th>Valores Aceitos</th>
</tr>
</thead>
<tbody>
<tr>
<td>campo_ordem</td>
<td>Ordena o banco de dados baseado na coluna fornecida</td>
<td>Nome da coluna para a tabela em questão, ex: Se for Produtos, ValorUnitario seria um valor válido!</td>
</tr>
<tr>
<td>ordem</td>
<td>Faz a ordenação baseado no valor fornecido</td>
<td><code>asc</code><code>desc</code></td>
</tr>
</tr>
</tbody>
</table>

## ↹ Rotas da API

<table>
<thead>
<tr>
<th>Método</th>
<th>Rotas</th>
<th>Filtros</th>
<th>Ordenações</th>
</tr>
</thead>
<tbody>
<tr>
<td>GET</td>
<td> <code>api/clientes</code></br><code>api/produtos</code></br><code>api/pedidos</code></br><code>api/clientes/:id</code></br><code>api/produtos/:id</code></br><code>api/pedidos/:id</code></td>
<td><code>filtro</code></br> <code>campo_filtro</code></br> <code>operador_filtro</code></td>
<td><code>ordem</code></br> <code>campo_ordem</code></td>
</tr>
<tr>
<td>POST</td>
<td> <code>api/clientes</code></br><code>api/produtos</code></br><code>api/pedidos</code></td>
 <td>❌</td>
  <td>❌</td>
</tr>
<tr>
<td>PUT/PATCH</td>
<td> <code>api/clientes/:id</code></br><code>api/produtos/:id</code></br><code>api/pedidos/:id</code></td>
 <td>❌</td>
  <td>❌</td>
</tr>
<tr>
<td>DELETE</td>
<td> <code>api/clientes/:id</code></br><code>api/produtos/:id</code></br><code>api/pedidos/:id</code></td>
 <td>❌</td>
  <td>❌</td>
</tr>
</tbody>
</table>

# 🛟 Exemplo de Filtro e Ordenação


<table>
<thead>
<tr>
<th>Método</th>
<th>Exemplo de Filtro</th>
<th>Exemplo de Ordenação</th>
</tr>
</thead>
<tbody>
<tr>
<td>GET</td>
<td><code>api/clientes?campo_filtro=CPF&filtro=000.000.000-00&operador_filtro==</code></td>
<td><code>api/produtos?campo_ordem=Quantidade&ordem=desc</code></td>
</tr>
<tr>
<td>POST</td>
<td>❌</td>
    <td>❌</td>
</tr>
<tr>
<td>PUT/PATCH</td>

 <td>❌</td>
    <td>❌</td>
</tr>
<tr>
<td>DELETE</td>
 <td>❌</td>
    <td>❌</td>
</tr>
</tbody>
</table>




# 📖 Exemplo de Paginação


<table>
<thead>
<tr>
<th>Método</th>
<th>Exemplo de Páginação</th>
</tr>
</thead>
<tbody>
<tr>
<td>GET</td>
<td><code>api/clientes?page=1</code></br><code>api/clientes?page=2</code></td>
</tr>
<tr>
<td>POST</td>
<td>❌</td>
</tr>
<tr>
<td>PUT/PATCH</td>
 <td>❌</td>
</tr>
<tr>
<td>DELETE</td>
 <td>❌</td>
</tr>
</tbody>
</table>



<br>[🔝 Voltar ao topo](#Inicio) <br>
