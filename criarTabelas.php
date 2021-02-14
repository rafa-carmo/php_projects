<?php
include('config.php');
include('database/Conexao.php');

$usuario = "CREATE TABLE `usuario` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
    `senha` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
    `telefone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
    `dtCriacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE  CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


if (!$conn->query($usuario)) {
    die("Erro na criação da Tabela Usuario");
}



$projetos = "CREATE TABLE `tabela_projetos` (
    `ID_Projeto` int(11) NOT NULL AUTO_INCREMENT,
    `nomeProjeto` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
    `descricao` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
    `dtAbertura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `responsavel` int(11) NOT NULL,
    `dtConclusao` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`ID_Projeto`),
    KEY `fk_id_responsavel` (`responsavel`),
    CONSTRAINT `fk_id_responsavel` FOREIGN KEY (`responsavel`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

if (!$conn->query($projetos)) {
    die("Erro na criação da Tabela Projetos");
}



$atividades = "CREATE TABLE `tabela_atividades_projeto` (
    `ID_Ativ_Projeto` int(11) NOT NULL AUTO_INCREMENT,
    `FK_ID_Projeto` int(11) DEFAULT NULL,
    `Fk_ID_Usuario` int(11) DEFAULT NULL,
    `Nome_Ativ` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
    `descricao` text,
    `dtConcPrev` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `dtConcEfet` timestamp NULL DEFAULT NULL,
    `executor` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`ID_Ativ_Projeto`),
    KEY `FK_ID_Projeto` (`FK_ID_Projeto`),
    KEY `Fk_ID_Usuario` (`Fk_ID_Usuario`),
    CONSTRAINT `tabela_atividades_projeto_ibfk_1` FOREIGN KEY (`FK_ID_Projeto`) REFERENCES `tabela_projetos` (`ID_Projeto`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `tabela_atividades_projeto_ibfk_2` FOREIGN KEY (`Fk_ID_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

if (!$conn->query($atividades)) {
    die("Erro na criação da Tabela Atividades");
}


header("Location: ../");