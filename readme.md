O objetivo deste teste é conhecer suas habilidades em:

PHP, MySQL, HTML e Java;
Entendimento e análise dos requisitos;
Modelagem de banco de dados;
Requisições AJAX

A aplicação pode ser feita em PHP puro ou algum framework conhecido no mercado. 
Banco de dados MySQL ou MariaDB. 
Utilizar php 7.1.X ou superior
Pode utilizar framework de js como jQuery

Simulador de pagamento

-> Tela index.html onde a pessoa coloque dois campos: descrição e valor do débito
-> Essa tela deve enviar para um  "parcelar.php" 
-> Esse  parcelar.php vai receber a descrição do débito e o valor, e deve retornar opções de parcelamento, de 1 a 12x (a taxa de acréscimos aplicada é indiferente, pode fazer como preferir)
-> Esse  parcelar.php deve salvar em uma tabela "simulacoes" o ip do usuário, a descrição do débito, o valor base e uma string contendo o json com as opções de parcelamento que serão retornadas. 
-> Depois de salvar ele deve obter o id (auto increment, primary) que foi salvo na tabela
-> O  deve retornar em formato JSON os dados: id do parcelamento e opções de parcelamento (de 1 a 12x)
-> Ao receber a resposta via AJAX a tela deve mostrar 12 botões
-> Quando o usuário clicar em um desses botões a tela vai chamar, também via AJAX, um novo  "pagar.php", enviando SOMENTE o id da simulação e o número de parcelas que o usuário selecionou
-> O  "pagar.php" deve sortear um número aleatório, de 0 a 100. Se o número for até 80 então o pagamento foi um sucesso, e se for 81 a 100 o pagamento falhou.
-> Em ambos os casos, sucesso ou falha, o  deve salvar em uma tabela "pagamentos" as seguintes colunas: sucesso (booleano dizendo se passou ou não), id simulacao, num_parcelas e datahora (esse último guarda o datetime da hora em que ocorreu a transação)
-> Essa tabela também deve ter um id auto increment primary key
-> Quando falha, o  deve retornar uma mensagem "Não autorizado pela operadora do cartão", e a tela index.html deve mostrar essa mensagem em um alert java normal
-> Quando o pagamento "passa", o  deve retornar somente o id do pagamento e uma mensagem dizendo "pagamento 12345 autorizado", sendo 12345 o id do pagamento na tabela "pagamentos"

ATENÇÃO:
- Não precisa fazer nenhum tipo de layout. Não será avaliado o layout css, somente a funcionalidade
- Caso não consiga colocar a aplicação publicada, rodando em algum servidor, não tem problema, pode entregar um link para um repositório seu contendo o código
- Caso ela não esteja publicada, colocar também, em comentários nos arquivos .php, o CREATE dessas tabelas no mysql. Caso seja via Laravel ou outro framework similar pode ser via migrations
- As duas tabelas precisam ter id auto increment primary key
- A tela index.html não pode ter refresh, tudo deve ser feito via ajax
- Caso não consiga fazer a solução inteira e queira apresentar apenas implementação parcial, sem problemas, será avaliado o que for entregue somente
- Caso tenha alguma dúvida sobre a especificação do teste, não pense duas vezes em perguntar. Não está sendo avaliada a sua interpretação, perguntar é essencial quando as instruções não estiverem claras o suficiente




-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    A aplicação sera feita em versão PHP/7.4.1
    Banco de dados 10.4.11-MariaDB 
    Jquery 
    https://engcomp2088932.000webhostapp.com/Parcelamentos/interface/
    Github
    https://github.com/matheuscamarques/parcelamentos/
    
