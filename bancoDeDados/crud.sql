CREATE DATABASE IF NOT EXISTS crud DEFAULT CHARSET = utf8 DEFAULT COLLATE = utf8_general_ci;

SHOW CREATE DATABASE crud;
CREATE TABLE `crud`.`usuario` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `crud`.`usuario` (`nome`, `email`)
VALUES (
        'Luciano Faustino',
        'lucianofaustino.dev@gmail.com'
    );
INSERT INTO `crud`.`usuario` (`nome`, `email`)
VALUES ('teste', 'teste@gmail.com');