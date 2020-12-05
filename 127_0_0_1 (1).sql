-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2018 às 17:01
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_tcc`
--
CREATE DATABASE IF NOT EXISTS `bd_tcc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_tcc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `genero` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`genero`) VALUES
('Sertanejo'),
('MPB'),
('Samba'),
('Rock'),
('Funk'),
('Reggae'),
('Eletrônica'),
('Pagode'),
('Jazz'),
('Rap');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_experiencia`
--

CREATE TABLE `tb_experiencia` (
  `cod_usuario` int(8) NOT NULL,
  `descricao` varchar(1250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_experiencia`
--

INSERT INTO `tb_experiencia` (`cod_usuario`, `descricao`) VALUES
(41, 'Larissa começou a cantar ao 7 anos em um coral de uma igreja católica no bairro Honório Gurgel, no Rio de Janeiro, na mesma época ela fez aulas de dança de salão e chegou a dar aulas como professora de dança,[18] até hoje se aproveita de sua habilidade como dançarina em seus shows e videoclipes, embora tenha trocado a dança de salão pelo stiletto, a dança do salto alto,[19] chegando a ter a música Bang no game Just Dance 2017.[20] Aos 16 anos, cursou administração em uma escola técnica e foi chamada para estagiar na mineradora Vale. Segundo a cantora, as aulas de marketing que teve durante o curso de administração lhes são úteis até hoje, e se sente elogiada quando a chamam de um \"caso de marketing\", pois ela mesma é quem planeja e executa seu próprio marketing.[21]'),
(42, 'Sander van Dijck, mais conhecido pelo seu nome artístico San Holo, é um DJ holandês que atualmente vive em São Paulo, músico, produtor musical e compositor de Zoetermeer. Ele ganhou reconhecimento internacional por seu remix de \"The Next Episode\", do Dr. Dre, que atualmente tem mais de 175 milhões de visualizações no YouTube.'),
(43, 'Eric Patrick Clapton é um guitarrista, cantor e compositor britânico nascido na Inglaterra. Apelidado de Slowhand, é considerado um dos melhores guitarristas da história do Rock. Embora o seu estilo musical tenha variado ao longo de sua carreira, Clapton sempre teve as suas raízes ligadas ao blues.'),
(44, 'Cantor detentor de esmerada técnica e qualidade vocal, Simonal viu sua carreira entrar em declínio após o episódio no qual teve seu nome associado ao DOPS, envolvendo a tortura de seu contador Raphael Viviani. O cantor acabaria sendo processado e condenado por extorsão mediante sequestro, sendo que, no curso deste processo, redigiu um documento dizendo-se delator, o que acabou levando-o ao ostracismo e a condição de pária da música popular brasileira.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_form_usuario`
--

CREATE TABLE `tb_form_usuario` (
  `cod_usuario` int(8) NOT NULL,
  `cod_formacao` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_conclusao` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_form_usuario`
--

INSERT INTO `tb_form_usuario` (`cod_usuario`, `cod_formacao`, `data_inicio`, `data_conclusao`) VALUES
(39, 14, '2009-03-05', '2014-03-05'),
(40, 15, '2010-05-22', '2014-06-30'),
(40, 16, '2010-05-22', '2014-06-30'),
(41, 17, '2018-11-08', '2022-11-08'),
(42, 18, '2005-02-01', '2010-02-01'),
(43, 19, '1970-05-16', '1975-06-05'),
(44, 20, '1950-11-15', '1953-11-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_formacao`
--

CREATE TABLE `tb_formacao` (
  `cod_formacao` int(11) NOT NULL,
  `nome_formacao` varchar(50) NOT NULL,
  `instituicao` varchar(50) NOT NULL,
  `tipo_curso` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_formacao`
--

INSERT INTO `tb_formacao` (`cod_formacao`, `nome_formacao`, `instituicao`, `tipo_curso`) VALUES
(18, 'Produção Musical', 'Universidade Federal Fluminense', 'Bacharelado'),
(17, 'Canto', 'Universidade Cantareira', 'Bacharelado'),
(15, 'Canto', 'Universidade Cantareira', ''),
(16, 'Canto', 'Universidade Cantareira', 'Bacharelado'),
(14, 'Produção Musical', 'Universidade Federal Fluminense', 'Bacharelado'),
(19, 'Violão Classico', 'Berklee College of Music', 'Bacharelado'),
(20, 'Canto', 'Universidade Belas Artes', 'Bacharelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_genero`
--

CREATE TABLE `tb_genero` (
  `genero_1` varchar(50) NOT NULL,
  `cod_usuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_genero`
--

INSERT INTO `tb_genero` (`genero_1`, `cod_usuario`) VALUES
('Samba', 39),
('MPB, Funk', 40),
('MPB, Funk', 41),
('Eletrônica', 42),
('Rock', 43),
('MPB, Samba, Rock', 44),
('Eletrônica', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imagem`
--

CREATE TABLE `tb_imagem` (
  `cod_usuario` int(11) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imagem`
--

INSERT INTO `tb_imagem` (`cod_usuario`, `imagem`) VALUES
(39, 'Compositor.jpg'),
(41, 'anitta.jpg'),
(42, 'San holo.jpg'),
(43, 'clap.jpg'),
(44, '250px-Simonal.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cod_usuario`, `nome_usuario`, `tipo_usuario`, `data`, `email`, `senha`, `celular`, `estado`) VALUES
(44, 'Wilson Simonal', 'Arranjador', '1938-07-07', 'simwil@gmail.com', '123456789', '(23) 95623-4521', 'Rio de Janeiro'),
(43, 'Eric Clatpton', 'Arranjador', '1945-12-31', 'clapton@hotmail.com', '123456789', '1165983265', 'Paraná'),
(42, 'Sander van Dijck', 'Arranjador', '1990-07-22', 'swirl@gmail.com', '123456789', '1125232523', 'São Paulo'),
(41, 'Larissa de Macedo Machado ', 'Cantor', '1994-11-04', 'anitta.contato@gmail.com', '123456789', '1189362527', 'Rio de Janeiro'),
(39, 'Arthur Castilho', 'Compositor', '2001-05-22', 'art200141@gmail.com', '123456789', '1121565312', 'Espírito Santo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_formacao`
--
ALTER TABLE `tb_formacao`
  ADD PRIMARY KEY (`cod_formacao`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_formacao`
--
ALTER TABLE `tb_formacao`
  MODIFY `cod_formacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
