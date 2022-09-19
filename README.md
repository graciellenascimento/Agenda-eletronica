<h1> Agenda eletrônica</h1>
Projeto simples feito com PHP. Foi utilizada a biblioteca <i>FullCalendar</i> para a visualização de atividades no calendário e <i>MySQL</i> para o banco de dados.
<br>
<h2>Funcionalidades:</h2>
<ul>
  <li><b>Login e Cadastro de usuários;</b></li>
  <li><b>Exibição das atividades em um calendário;</b></li>
  <li><b>CRUD de atividades;</b></li>
</ul>
<br>
 Ao clicar em um evento presente no calendário, é aberto um modal onde é possível ver os detalhes e editar/deletar. Além disto, também é viável visualizá-los em uma tabela.
<br>
<h2>Códigos do banco de dados</h2>
<b>Nome do banco:</b> testevaggon
<br>
<h4>Tabela de cadastro de usuários</h4>
<code>CREATE TABLE `register`. (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;</code> <br>

<br>
<h4>Tabela de atividades</h4>

<code>
CREATE TABLE `tasks`. ( <br>
  `id` int(11) NOT NULL, <br>
  `name` varchar(255) NOT NULL, <br>
  `description` varchar(300) NOT NULL, <br>
  `start_date` datetime NOT NULL, <br>
  `end_date` datetime NOT NULL, <br>
  `status` varchar(30) NOT NULL, <br>
  `userid` int(11) NOT NULL, <br>
  PRIMARY KEY (`id`)<br>
); </code><br>
<br>
<code>
ALTER TABLE `tasks`
 ADD CONSTRAINT `fk_users` FOREIGN KEY (`userid`) REFERENCES `register` (`id`); </code>
