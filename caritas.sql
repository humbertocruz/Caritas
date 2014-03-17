-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Mar-2014 às 23:37
-- Versão do servidor: 5.5.35-0ubuntu0.13.10.1
-- versão do PHP: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `caritas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assuntos`
--

CREATE TABLE IF NOT EXISTS `assuntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ata_precos`
--

CREATE TABLE IF NOT EXISTS `ata_precos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `edital_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ata_precos_editais1` (`edital_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendentes`
--

CREATE TABLE IF NOT EXISTS `atendentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `ramal` varchar(15) DEFAULT NULL,
  `senha` varchar(40) NOT NULL,
  `nivel_acesso_id` int(11) NOT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `login` varchar(80) NOT NULL,
  `sexo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_niveis_acesso` (`nivel_acesso_id`),
  KEY `fk_usuarios_sexos1` (`sexo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendentes_enderecos`
--

CREATE TABLE IF NOT EXISTS `atendentes_enderecos` (
  `tipo_enderecos_id` int(11) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL,
  `atendente_id` int(11) NOT NULL,
  PRIMARY KEY (`endereco`,`atendente_id`),
  KEY `fk_atendentes_enderecos_tipos_endereco1` (`tipo_enderecos_id`),
  KEY `fk_atendentes_endereco_cidades1` (`cidade_id`),
  KEY `fk_atendentes_enderecos_atendentes1` (`atendente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendentes_fones`
--

CREATE TABLE IF NOT EXISTS `atendentes_fones` (
  `tipo_fone_id` int(11) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `atendente_id` int(11) NOT NULL,
  PRIMARY KEY (`fone`,`atendente_id`),
  KEY `fk_atendentes_fones_tipos_fone1` (`tipo_fone_id`),
  KEY `fk_atendentes_fones_atendentes1` (`atendente_id`),
  KEY `fk_atendentes_fones_tipos_fones1` (`tipo_fone_id`),
  KEY `fk_antedentes_fones_atendentes1` (`atendente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendentes_projetos`
--

CREATE TABLE IF NOT EXISTS `atendentes_projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atendente_id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE IF NOT EXISTS `atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamadas`
--

CREATE TABLE IF NOT EXISTS `chamadas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_chamada_id` int(11) DEFAULT NULL,
  `atendente_id` int(11) DEFAULT NULL,
  `projeto_id` int(11) DEFAULT NULL,
  `estado_id` varchar(2) DEFAULT NULL,
  `cidade_id` int(11) DEFAULT NULL,
  `instituicao_id` int(11) DEFAULT NULL,
  `contato_id` int(11) DEFAULT NULL,
  `assunto_id` int(11) DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `solicitacao` text,
  `prioridade_id` int(11) DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  `chamada_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `fornecedor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chamadas_projetos1` (`projeto_id`),
  KEY `fk_chamadas_atendentes1` (`atendente_id`),
  KEY `fk_chamadas_tipos_chamada1` (`tipo_chamada_id`),
  KEY `fk_chamadas_contatos1` (`contato_id`),
  KEY `fk_chamadas_prioridades1` (`prioridade_id`),
  KEY `fk_chamadas_assuntos1` (`assunto_id`),
  KEY `fk_chamadas_chamadas_id` (`chamada_id`),
  KEY `fk_chamadas_status1` (`status_id`),
  KEY `fk_chamadas_pedidos` (`pedido_id`),
  KEY `fk_chamadas_instituicoes1` (`instituicao_id`),
  KEY `fk_chamadas_fornecedor1` (`fornecedor_id`),
  KEY `instituicao_estado_id` (`estado_id`,`cidade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32960 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamadas_procedimentos`
--

CREATE TABLE IF NOT EXISTS `chamadas_procedimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `procedimento_id` int(11) NOT NULL,
  `chamada_id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `procedimento` text NOT NULL,
  `atendente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chamada_procedimento_procedimento1` (`procedimento_id`),
  KEY `fk_chamada_procedimento_atendente1` (`atendente_id`),
  KEY `fk_chamada_procedimento_chamada1` (`chamada_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `estado_id` varchar(2) NOT NULL,
  `codigo_ibge` int(11) DEFAULT NULL,
  `prefeito` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cidades_estados1` (`estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5600 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `sexo_id` int(11) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contatos_sexo1` (`sexo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12599 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos_emails`
--

CREATE TABLE IF NOT EXISTS `contatos_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_email_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contato_id` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_email_id` (`tipo_email_id`,`contato_id`),
  KEY `updated` (`updated`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12495 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos_enderecos`
--

CREATE TABLE IF NOT EXISTS `contatos_enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_endereco_id` int(11) DEFAULT NULL,
  `endereco` varchar(80) DEFAULT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `cidade_id` int(11) DEFAULT NULL,
  `contato_id` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contatos_enderecos_tipos_endereco1` (`tipo_endereco_id`),
  KEY `fk_contatos_enderecos_cidades1` (`cidade_id`),
  KEY `fk_contatos_enderecos_contatos1` (`contato_id`),
  KEY `updated` (`updated`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12382 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos_fones`
--

CREATE TABLE IF NOT EXISTS `contatos_fones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_fone_id` int(11) DEFAULT NULL,
  `fone` varchar(80) DEFAULT NULL,
  `contato_id` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contatos_fones_tipos_fone1` (`tipo_fone_id`),
  KEY `fk_contatos_fones_contatos1` (`contato_id`),
  KEY `updated` (`updated`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28924 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos_fornecedores`
--

CREATE TABLE IF NOT EXISTS `contatos_fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor_id` int(11) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `situacao_contato_id` int(11) NOT NULL,
  `contato_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contatos_fornecedores_fornecedores1` (`fornecedor_id`),
  KEY `fk_contatos_fornecedores_cargos1` (`cargo_id`),
  KEY `fk_contatos_situacoes_contato1` (`situacao_contato_id`),
  KEY `fk_contatos_fornecedores_contatos1` (`contato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos_instituicoes`
--

CREATE TABLE IF NOT EXISTS `contatos_instituicoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao_id` int(11) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `situacao_contato_id` int(11) NOT NULL,
  `contato_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contatos_instituicoes_instituicoes1` (`instituicao_id`),
  KEY `fk_contatos_instituicoes_cargos1` (`cargo_id`),
  KEY `fk_contatos_instituicoes_situacoes_contato1` (`situacao_contato_id`),
  KEY `fk_contatos_instituicoes_contatos1` (`contato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32899 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convenios`
--

CREATE TABLE IF NOT EXISTS `convenios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_publicacao` date DEFAULT NULL,
  `valor_total` float DEFAULT NULL,
  `num_convenio` varchar(20) DEFAULT NULL,
  `orgao_id` int(11) NOT NULL,
  `tipo_convenio_id` int(11) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  `contrapartida` float DEFAULT NULL,
  `encargo_fnde` float DEFAULT NULL,
  `pagina` int(11) DEFAULT NULL,
  `secao` varchar(45) DEFAULT NULL,
  `edital_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_convenio_orgao1` (`orgao_id`),
  KEY `fk_convenio_tipo_convenio1` (`tipo_convenio_id`),
  KEY `fk_convenio_instituicao1` (`instituicao_id`),
  KEY `fk_convenios_editais1` (`edital_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `distribuidores`
--

CREATE TABLE IF NOT EXISTS `distribuidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  `fornecedor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  KEY `fk_distribuidores_fornecedores1` (`fornecedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editais`
--

CREATE TABLE IF NOT EXISTS `editais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  `orgao_id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_editais_orgaos1` (`orgao_id`),
  KEY `fk_editais_projetos1` (`projeto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` varchar(2) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `lixeira` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  KEY `lixeira` (`lixeira`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapas`
--

CREATE TABLE IF NOT EXISTS `etapas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapas_atividades_itens`
--

CREATE TABLE IF NOT EXISTS `etapas_atividades_itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto_id` int(11) NOT NULL,
  `etapas_id` int(11) NOT NULL,
  `atividades_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `prazo` float NOT NULL,
  `ordem_exibicao` int(11) NOT NULL,
  `global` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_etapas_atividades_projetos1` (`projeto_id`),
  KEY `fk_etapas_atividades_etapas1` (`etapas_id`),
  KEY `fk_etapas_atividades_atividades1` (`atividades_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(80) NOT NULL,
  `nome_fantasia` varchar(80) DEFAULT NULL,
  `inscricao_estadual` varchar(80) DEFAULT NULL,
  `cnpj` char(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_emails`
--

CREATE TABLE IF NOT EXISTS `fornecedores_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor_id` int(11) NOT NULL,
  `email` varchar(140) NOT NULL,
  `tipo_email_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fornecedores_emails_tipos_emails1` (`tipo_email_id`),
  KEY `fk_fornecedores_emails_fornecedores` (`fornecedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_enderecos`
--

CREATE TABLE IF NOT EXISTS `fornecedores_enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_endereco_id` int(11) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fornecedores_enderecos_tipos_enderecos1` (`tipo_endereco_id`),
  KEY `fk_fornecedores_enderecos_cidades1` (`cidade_id`),
  KEY `fk_fornecedores_enderecos_fornecedores1` (`fornecedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_fones`
--

CREATE TABLE IF NOT EXISTS `fornecedores_fones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_fone_id` int(11) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fornecedores_fones_tipos_fones1` (`tipo_fone_id`),
  KEY `fk_fornecedores_fones_forncedores` (`fornecedor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicoes`
--

CREATE TABLE IF NOT EXISTS `instituicoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(80) DEFAULT NULL,
  `nome_fantasia` varchar(80) DEFAULT NULL,
  `inscricao_estadual` varchar(80) DEFAULT NULL,
  `cnpj` char(14) DEFAULT NULL,
  `tipo_instituicao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_instituicoes_tipos_instituicao1` (`tipo_instituicao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13760 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicoes_emails`
--

CREATE TABLE IF NOT EXISTS `instituicoes_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao_id` int(11) NOT NULL,
  `email` varchar(145) NOT NULL,
  `tipo_email_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_instituicoes_emails_tipos_email1` (`tipo_email_id`),
  KEY `fk_instituicoes_emails_instituicoes1` (`instituicao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14254 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicoes_enderecos`
--

CREATE TABLE IF NOT EXISTS `instituicoes_enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_endereco_id` int(11) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL,
  `cidade_id` int(11) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_instituicoes_enderecos_tipos_enderecos1` (`tipo_endereco_id`),
  KEY `fk_instituicoes_enderecos_cidades1` (`cidade_id`),
  KEY `fk_instituicoes_enderecos_instituicoes1` (`instituicao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14181 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicoes_fones`
--

CREATE TABLE IF NOT EXISTS `instituicoes_fones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_fone_id` int(11) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_instituicoes_fones_tipos_fones1` (`tipo_fone_id`),
  KEY `fk_instituicoes_fones_instituicoes1` (`instituicao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14255 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE IF NOT EXISTS `itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `ata_preco_id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_itens_ata_precos1` (`ata_preco_id`),
  KEY `fk_itens_fornecedores1` (`fornecedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(50) NOT NULL,
  `plugin` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`parent_id`),
  KEY `plugin` (`plugin`),
  KEY `controller` (`controller`),
  KEY `action` (`action`),
  KEY `menu_id_2` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` datetime NOT NULL,
  `controller` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `atendente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `posicao` varchar(50) NOT NULL,
  `nivel_acesso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nivel_acesso_id` (`nivel_acesso_id`),
  KEY `posicao` (`posicao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orgaos`
--

CREATE TABLE IF NOT EXISTS `orgaos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime DEFAULT NULL,
  `observacao` varchar(45) DEFAULT NULL,
  `instituicao_id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `distribuidor_id` int(11) NOT NULL,
  `convenio_id` int(11) NOT NULL,
  `convenio` varchar(255) NOT NULL,
  `tipo_pagamento_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `edital_id` int(11) DEFAULT NULL,
  `ata_preco_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedidos_instituicoes1` (`instituicao_id`),
  KEY `fk_pedidos_projetos1` (`projeto_id`),
  KEY `fk_pedidos_convenios1` (`convenio_id`),
  KEY `fk_pedidos_tipos_pagamento1` (`tipo_pagamento_id`),
  KEY `fk_pedidos_status1` (`status_id`),
  KEY `fk_pedidos_dn1` (`distribuidor_id`),
  KEY `fk_pedidos_editais` (`edital_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_documentos`
--

CREATE TABLE IF NOT EXISTS `pedidos_documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `tipo_documento_id` int(11) NOT NULL,
  `observacao` varchar(140) DEFAULT NULL,
  `data_documento` datetime DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `nome_arquivo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedidos_documentos_pedidos1` (`pedido_id`),
  KEY `fk_pedidos_documentos_tipos_documento1` (`tipo_documento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_itens`
--

CREATE TABLE IF NOT EXISTS `pedidos_itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `pedido_id` int(11) NOT NULL,
  `nota_fiscal_man` varchar(80) DEFAULT NULL,
  `if_man` varchar(45) DEFAULT NULL,
  `num_man` varchar(45) DEFAULT NULL,
  `chassi` varchar(80) DEFAULT NULL,
  `data_inicial` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encomendas_itens_itens1` (`item_id`),
  KEY `fk_encomendas_itens_pedidos1` (`pedido_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_itens_etapas_atividade`
--

CREATE TABLE IF NOT EXISTS `pedidos_itens_etapas_atividade` (
  `pedido_id` int(11) NOT NULL,
  `etapa_atividade_id` int(11) NOT NULL,
  `pedido_item_id` int(11) NOT NULL DEFAULT '0',
  `data_inicio_prevista` date DEFAULT NULL,
  `data_inicio_efetiva` date DEFAULT NULL,
  `data_fim_prevista` date DEFAULT NULL,
  `data_fim_efetiva` date DEFAULT NULL,
  `observacao` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_pedidos_itens_etapas_atividades_pedidos1` (`pedido_id`),
  KEY `fk_pedidos_itens_etapas_atividades_etapas_atividades1` (`etapa_atividade_id`),
  KEY `fk_pedidos_itens_etapas_atividades_pedidos_itens` (`pedido_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_situacao`
--

CREATE TABLE IF NOT EXISTS `pedidos_situacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE IF NOT EXISTS `permissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(50) NOT NULL,
  `action` varchar(200) NOT NULL,
  `nivel_acesso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nivel_acesso_id` (`nivel_acesso_id`),
  KEY `name` (`controller`),
  KEY `action` (`action`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prioridades`
--

CREATE TABLE IF NOT EXISTS `prioridades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimentos`
--

CREATE TABLE IF NOT EXISTS `procedimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos`
--

CREATE TABLE IF NOT EXISTS `processos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE IF NOT EXISTS `projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sexos`
--

CREATE TABLE IF NOT EXISTS `sexos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes_contatos`
--

CREATE TABLE IF NOT EXISTS `situacoes_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_chamada`
--

CREATE TABLE IF NOT EXISTS `tipos_chamada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_convenio`
--

CREATE TABLE IF NOT EXISTS `tipos_convenio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_documento`
--

CREATE TABLE IF NOT EXISTS `tipos_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_email`
--

CREATE TABLE IF NOT EXISTS `tipos_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_endereco`
--

CREATE TABLE IF NOT EXISTS `tipos_endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_fone`
--

CREATE TABLE IF NOT EXISTS `tipos_fone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_instituicao`
--

CREATE TABLE IF NOT EXISTS `tipos_instituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descricao_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_pagamento`
--

CREATE TABLE IF NOT EXISTS `tipos_pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ata_precos`
--
ALTER TABLE `ata_precos`
  ADD CONSTRAINT `fk_ata_precos_editais1` FOREIGN KEY (`edital_id`) REFERENCES `editais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atendentes`
--
ALTER TABLE `atendentes`
  ADD CONSTRAINT `fk_usuarios_niveis_acesso` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `niveis_acessos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_sexos1` FOREIGN KEY (`sexo_id`) REFERENCES `sexos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atendentes_enderecos`
--
ALTER TABLE `atendentes_enderecos`
  ADD CONSTRAINT `fk_atendentes_enderecos_atendentes1` FOREIGN KEY (`atendente_id`) REFERENCES `atendentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendentes_enderecos_tipos_endereco1` FOREIGN KEY (`tipo_enderecos_id`) REFERENCES `tipos_endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendentes_endereco_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `atendentes_fones`
--
ALTER TABLE `atendentes_fones`
  ADD CONSTRAINT `fk_antedentes_fones_atendentes1` FOREIGN KEY (`atendente_id`) REFERENCES `atendentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_atendentes_fones_tipos_fones1` FOREIGN KEY (`tipo_fone_id`) REFERENCES `tipos_fone` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `chamadas`
--
ALTER TABLE `chamadas`
  ADD CONSTRAINT `fk_chamadas_assuntos1` FOREIGN KEY (`assunto_id`) REFERENCES `assuntos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamadas_atendentes1` FOREIGN KEY (`atendente_id`) REFERENCES `atendentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamadas_contatos1` FOREIGN KEY (`contato_id`) REFERENCES `contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamadas_fornecedor1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamadas_instituicoes1` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamadas_pedidos` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamadas_prioridades1` FOREIGN KEY (`prioridade_id`) REFERENCES `prioridades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamadas_projetos1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamadas_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamadas_tipos_chamada1` FOREIGN KEY (`tipo_chamada_id`) REFERENCES `tipos_chamada` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `chamadas_procedimentos`
--
ALTER TABLE `chamadas_procedimentos`
  ADD CONSTRAINT `fk_chamada_procedimento_atendente1` FOREIGN KEY (`atendente_id`) REFERENCES `atendentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamada_procedimento_chamada1` FOREIGN KEY (`chamada_id`) REFERENCES `chamadas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chamada_procedimento_procedimento1` FOREIGN KEY (`procedimento_id`) REFERENCES `procedimentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `fk_cidades_estados1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_contatos_sexos1` FOREIGN KEY (`sexo_id`) REFERENCES `sexos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contatos_enderecos`
--
ALTER TABLE `contatos_enderecos`
  ADD CONSTRAINT `fk_contatos_enderecos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contatos_enderecos_contatos1` FOREIGN KEY (`contato_id`) REFERENCES `contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contatos_enderecos_tipos_endereco1` FOREIGN KEY (`tipo_endereco_id`) REFERENCES `tipos_endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contatos_fones`
--
ALTER TABLE `contatos_fones`
  ADD CONSTRAINT `fk_contatos_fones_contatos1` FOREIGN KEY (`contato_id`) REFERENCES `contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contatos_fones_tipos_fone1` FOREIGN KEY (`tipo_fone_id`) REFERENCES `tipos_fone` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contatos_fornecedores`
--
ALTER TABLE `contatos_fornecedores`
  ADD CONSTRAINT `fk_contatos_fornecedores_cargos1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contatos_fornecedores_contatos1` FOREIGN KEY (`contato_id`) REFERENCES `contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contatos_fornecedores_fornecedores1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contatos_situacoes_contato1` FOREIGN KEY (`situacao_contato_id`) REFERENCES `situacoes_contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contatos_instituicoes`
--
ALTER TABLE `contatos_instituicoes`
  ADD CONSTRAINT `fk_contatos_instituicoes_cargos1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contatos_instituicoes_contatos1` FOREIGN KEY (`contato_id`) REFERENCES `contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contatos_instituicoes_instituicoes1` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contatos_instituicoes_situacoes_contato1` FOREIGN KEY (`situacao_contato_id`) REFERENCES `situacoes_contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `convenios`
--
ALTER TABLE `convenios`
  ADD CONSTRAINT `fk_convenios_editais1` FOREIGN KEY (`edital_id`) REFERENCES `editais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_convenio_instituicaos1` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_convenio_orgao1` FOREIGN KEY (`orgao_id`) REFERENCES `orgaos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_convenio_tipo_convenio1` FOREIGN KEY (`tipo_convenio_id`) REFERENCES `tipos_convenio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `distribuidores`
--
ALTER TABLE `distribuidores`
  ADD CONSTRAINT `fk_distribuidores_fornecedores1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `editais`
--
ALTER TABLE `editais`
  ADD CONSTRAINT `fk_editais_orgaos1` FOREIGN KEY (`orgao_id`) REFERENCES `orgaos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_editais_projetos1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `etapas_atividades_itens`
--
ALTER TABLE `etapas_atividades_itens`
  ADD CONSTRAINT `fk_etapas_atividades_atividades1` FOREIGN KEY (`atividades_id`) REFERENCES `atividades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etapas_atividades_etapas1` FOREIGN KEY (`etapas_id`) REFERENCES `etapas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etapas_atividades_projetos1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fornecedores_emails`
--
ALTER TABLE `fornecedores_emails`
  ADD CONSTRAINT `fk_fornecedores_emails_fornecedores` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fornecedores_emails_tipos_emails1` FOREIGN KEY (`tipo_email_id`) REFERENCES `tipos_email` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fornecedores_enderecos`
--
ALTER TABLE `fornecedores_enderecos`
  ADD CONSTRAINT `fk_fornecedores_enderecos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fornecedores_enderecos_fornecedores1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fornecedores_enderecos_tipos_enderecos1` FOREIGN KEY (`tipo_endereco_id`) REFERENCES `tipos_endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `instituicoes`
--
ALTER TABLE `instituicoes`
  ADD CONSTRAINT `fk_instituicoes_tipos_instituicao1` FOREIGN KEY (`tipo_instituicao_id`) REFERENCES `tipos_instituicao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `instituicoes_emails`
--
ALTER TABLE `instituicoes_emails`
  ADD CONSTRAINT `fk_instituicoes_emails_instituicoes1` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instituicoes_emails_tipos_email1` FOREIGN KEY (`tipo_email_id`) REFERENCES `tipos_email` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `instituicoes_enderecos`
--
ALTER TABLE `instituicoes_enderecos`
  ADD CONSTRAINT `fk_instituicoes_enderecos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instituicoes_enderecos_instituicoes1` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instituicoes_enderecos_tipos_enderecos1` FOREIGN KEY (`tipo_endereco_id`) REFERENCES `tipos_endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `instituicoes_fones`
--
ALTER TABLE `instituicoes_fones`
  ADD CONSTRAINT `fk_instituicoes_fones_instituicoes1` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instituicoes_fones_tipos_fones1` FOREIGN KEY (`tipo_fone_id`) REFERENCES `tipos_fone` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `fk_itens_ata_precos1` FOREIGN KEY (`ata_preco_id`) REFERENCES `ata_precos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_fornecedores1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_dn1` FOREIGN KEY (`distribuidor_id`) REFERENCES `distribuidores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_editais` FOREIGN KEY (`edital_id`) REFERENCES `editais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_instituicoes1` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_projetos1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_tipos_pagamento1` FOREIGN KEY (`tipo_pagamento_id`) REFERENCES `tipos_pagamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos_documentos`
--
ALTER TABLE `pedidos_documentos`
  ADD CONSTRAINT `fk_pedidos_documentos_pedidos1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_documentos_tipos_documento1` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipos_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos_itens`
--
ALTER TABLE `pedidos_itens`
  ADD CONSTRAINT `fk_encomendas_itens_itens1` FOREIGN KEY (`item_id`) REFERENCES `itens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_encomendas_itens_pedidos1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos_itens_etapas_atividade`
--
ALTER TABLE `pedidos_itens_etapas_atividade`
  ADD CONSTRAINT `fk_pedidos_itens_etapas_atividades_etapas_atividades1` FOREIGN KEY (`etapa_atividade_id`) REFERENCES `etapas_atividades_itens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_itens_etapas_atividades_pedidos_itens` FOREIGN KEY (`pedido_item_id`) REFERENCES `pedidos_itens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
