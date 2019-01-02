-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Dez-2018 às 14:45
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_loja`
--
CREATE DATABASE IF NOT EXISTS `db_loja` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_loja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_address`
--

CREATE TABLE `tb_address` (
  `id_address` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `CEP` int(11) NOT NULL,
  `street` varchar(128) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  `sector` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `state` varchar(60) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_address`
--

INSERT INTO `tb_address` (`id_address`, `id_user`, `CEP`, `street`, `number`, `block`, `sector`, `city`, `state`, `status`) VALUES
(1, 1, 85355456, '15', 22, 46, 'Esmeraldas dos condominios', 'Goias', 'Goiania', 1),
(2, 2, 74355456, '51', 11, 64, 'Condominio das esmeraldas', 'Goiânia', 'Goias', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_brand`
--

CREATE TABLE `tb_brand` (
  `id_brand` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_brand`
--

INSERT INTO `tb_brand` (`id_brand`, `name`, `status`) VALUES
(1, 'Caneca Mania', 1),
(2, 'HypeX', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cart`
--

CREATE TABLE `tb_cart` (
  `session` varchar(150) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ammount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_delivery`
--

CREATE TABLE `tb_delivery` (
  `id_delivery` int(11) NOT NULL,
  `id_sale` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `id_provider` int(11) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL COMMENT 'Para referenciar com o tipo de produto, coo camiseta,caneca, etc.',
  `id_product_sample` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` float(4,2) DEFAULT NULL,
  `value_cost` float(4,2) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `id_provider`, `id_brand`, `id_type`, `id_product_sample`, `name`, `value`, `value_cost`, `status`) VALUES
(1, 1, 1, 1, NULL, 'Caneca Homem Aranha', 29.99, 11.22, 1),
(2, 1, 1, 1, NULL, 'Caneca Home de ferro', 29.99, 11.22, 1),
(3, 1, 1, 1, NULL, 'Caneca Huck', 29.99, 11.22, 1),
(10, 1, 1, 1, 1, 'Livro João e o pé de feijão', 30.00, 11.89, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_product_photos`
--

CREATE TABLE `tb_product_photos` (
  `id_product` int(11) NOT NULL,
  `link` varchar(60) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_product_sample`
--

CREATE TABLE `tb_product_sample` (
  `id_product_sample` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_product_sample`
--

INSERT INTO `tb_product_sample` (`id_product_sample`, `id_product`, `title`, `description`, `photo`, `link`, `status`) VALUES
(1, NULL, 'Livro João e o pé de feijão', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_provider`
--

CREATE TABLE `tb_provider` (
  `id_provider` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_provider`
--

INSERT INTO `tb_provider` (`id_provider`, `name`, `phone`, `cnpj`, `status`) VALUES
(1, 'Aço Italia', 2147483647, NULL, NULL),
(2, 'Cocacola', 2147483647, '45.997.418/0001-53', 1),
(3, 'Cocacola', 2147483647, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_recover_password_user`
--

CREATE TABLE `tb_recover_password_user` (
  `id_user` int(11) NOT NULL,
  `token` varchar(60) DEFAULT NULL,
  `date` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sale`
--

CREATE TABLE `tb_sale` (
  `id_sale` int(11) NOT NULL,
  `session` varchar(150) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_session`
--

CREATE TABLE `tb_session` (
  `id_user` int(11) NOT NULL,
  `session` varchar(128) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_session`
--

INSERT INTO `tb_session` (`id_user`, `session`, `status`) VALUES
(2, 'SESSION-admin09-12-2018-05:57', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `name`, `description`) VALUES
(0, 'Desativada', 'alguma atividade falsa'),
(1, 'Ativo', 'algumas aitidade verdadeira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_stock`
--

CREATE TABLE `tb_stock` (
  `id_stock` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_type`
--

CREATE TABLE `tb_type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_type`
--

INSERT INTO `tb_type` (`id_type`, `name`, `description`, `status`) VALUES
(1, 'Caneca', 'Canecas personalizadas ', NULL),
(2, 'Livros', 'Livro de todos os seguimantos', 0),
(6, 'Carrilho', 'Carrilho de corrida(Não é de controle remoto)', 1),
(8, 'Boneca', 'Bonecas femeninas', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_address` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `login` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_address`, `name`, `login`, `email`, `phone`, `password`, `status`) VALUES
(1, 1, 'Gessica Souza', 'geca', 'gessicasouzarocha@outlock.com', '1458586', '$10$Z7pcXTvHLqNgRlEIY33fWu43WPdPWzQcHIQi0FLt72vAnP23pw1SW', 1),
(2, 2, 'Gabriel', 'admin', 'gabrieloliveradesouza9@gmail.com', '62991691823', '$10$m2hnfT7CC6bHoNuLpomcaebCNMw4oKrO4n8sd3UEEK/v.iRmPE18y', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user_profile`
--

CREATE TABLE `tb_user_profile` (
  `id_user` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `biography` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_user_profile`
--

INSERT INTO `tb_user_profile` (`id_user`, `photo`, `user_name`, `biography`, `status`) VALUES
(1, NULL, 'Geca', NULL, 1),
(2, NULL, 'ZoinBrs', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `fk_address_status_idx` (`status`),
  ADD KEY `fk_address_id_user_idx` (`id_user`);

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`id_brand`),
  ADD KEY `fk_brand_status_idx` (`status`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`session`),
  ADD KEY `fk_cart_product_idx` (`id_product`),
  ADD KEY `fk_cart_user_idx` (`id_user`),
  ADD KEY `fk_cart_status_idx` (`status`);

--
-- Indexes for table `tb_delivery`
--
ALTER TABLE `tb_delivery`
  ADD PRIMARY KEY (`id_delivery`),
  ADD KEY `fk_delivery_sale_idx` (`id_sale`),
  ADD KEY `fk_delivery_status_idx` (`status`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_product_type_idx` (`id_type`),
  ADD KEY `fk_product_provider_idx` (`id_provider`),
  ADD KEY `fk_product_brand_idx` (`id_brand`),
  ADD KEY `ky_product_status_idx` (`status`),
  ADD KEY `fk_product_id_product_sample_idx` (`id_product_sample`);

--
-- Indexes for table `tb_product_photos`
--
ALTER TABLE `tb_product_photos`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_product_photos_status_idx` (`status`);

--
-- Indexes for table `tb_product_sample`
--
ALTER TABLE `tb_product_sample`
  ADD PRIMARY KEY (`id_product_sample`),
  ADD KEY `fk_product_sample_status_idx` (`status`),
  ADD KEY `fk_product_sample_id_product_idx` (`id_product`);

--
-- Indexes for table `tb_provider`
--
ALTER TABLE `tb_provider`
  ADD PRIMARY KEY (`id_provider`),
  ADD KEY `fk_provider_status_idx` (`status`);

--
-- Indexes for table `tb_recover_password_user`
--
ALTER TABLE `tb_recover_password_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_recover_password_user_status_idx` (`status`);

--
-- Indexes for table `tb_sale`
--
ALTER TABLE `tb_sale`
  ADD PRIMARY KEY (`id_sale`),
  ADD UNIQUE KEY `session_UNIQUE` (`session`),
  ADD KEY `fk_sale_cart_session_idx` (`session`),
  ADD KEY `fk_sale_status_idx` (`status`);

--
-- Indexes for table `tb_session`
--
ALTER TABLE `tb_session`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_session_status_idx` (`status`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `fk_stack_status_idx` (`status`),
  ADD KEY `fk_stock_id_product_idx` (`id_product`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`id_type`),
  ADD KEY `fk_type_status_idx` (`status`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_status_idx` (`status`);

--
-- Indexes for table `tb_user_profile`
--
ALTER TABLE `tb_user_profile`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_delivery`
--
ALTER TABLE `tb_delivery`
  MODIFY `id_delivery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_product_sample`
--
ALTER TABLE `tb_product_sample`
  MODIFY `id_product_sample` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_provider`
--
ALTER TABLE `tb_provider`
  MODIFY `id_provider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sale`
--
ALTER TABLE `tb_sale`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_address`
--
ALTER TABLE `tb_address`
  ADD CONSTRAINT `fk_address_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_address_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD CONSTRAINT `fk_brand_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `fk_cart_id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cart_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cart_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_delivery`
--
ALTER TABLE `tb_delivery`
  ADD CONSTRAINT `fk_delivery_id_sale` FOREIGN KEY (`id_sale`) REFERENCES `tb_sale` (`id_sale`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_delivery_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `fk_product_id_brand` FOREIGN KEY (`id_brand`) REFERENCES `tb_brand` (`id_brand`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_id_product_sample` FOREIGN KEY (`id_product_sample`) REFERENCES `tb_product_sample` (`id_product_sample`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_id_provider` FOREIGN KEY (`id_provider`) REFERENCES `tb_provider` (`id_provider`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_id_type` FOREIGN KEY (`id_type`) REFERENCES `tb_type` (`id_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_product_photos`
--
ALTER TABLE `tb_product_photos`
  ADD CONSTRAINT `fk_product_photos_id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_photos_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_product_sample`
--
ALTER TABLE `tb_product_sample`
  ADD CONSTRAINT `fk_product_sample_id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_sample_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_provider`
--
ALTER TABLE `tb_provider`
  ADD CONSTRAINT `fk_provider_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_recover_password_user`
--
ALTER TABLE `tb_recover_password_user`
  ADD CONSTRAINT `fk_recover_password_user_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recover_password_user_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_sale`
--
ALTER TABLE `tb_sale`
  ADD CONSTRAINT `fk_sale_cart_session` FOREIGN KEY (`session`) REFERENCES `tb_cart` (`session`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sale_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_session`
--
ALTER TABLE `tb_session`
  ADD CONSTRAINT `fk_session_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_session_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD CONSTRAINT `fk_stock_id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_type`
--
ALTER TABLE `tb_type`
  ADD CONSTRAINT `fk_type_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_user_status` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_user_profile`
--
ALTER TABLE `tb_user_profile`
  ADD CONSTRAINT `fk_tb_user_profile_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
