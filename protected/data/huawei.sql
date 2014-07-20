SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `huawei` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `huawei` ;

-- -----------------------------------------------------
-- Table `huawei`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `huawei`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(20) NOT NULL,
  `user_password` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `huawei`.`volume`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `huawei`.`volume` (
  `volume_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `volume_used` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`volume_id`),
  INDEX `index_user` (`user_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `huawei`.`file`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `huawei`.`file` (
  `file_id` INT NOT NULL AUTO_INCREMENT,
  `file_name` VARCHAR(45) NOT NULL,
  `file_path` VARCHAR(45) NOT NULL,
  `create_time` DATETIME NULL,
  PRIMARY KEY (`file_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `huawei`.`file_relation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `huawei`.`file_relation` (
  `file_relation_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `file_id` INT NOT NULL COMMENT 'file_id 或 folder_i' /* comment truncated */ /*

根据type控制*/,
  `type` TINYINT NOT NULL COMMENT '0 file' /* comment truncated */ /*1 folder*/,
  `locate` TINYINT NOT NULL DEFAULT 0 COMMENT '0     根' /* comment truncated */ /*��录
！0  folder_id*/,
  PRIMARY KEY (`file_relation_id`),
  INDEX `index_user` (`user_id` ASC),
  INDEX `index_folder` (`locate` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `huawei`.`folder`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `huawei`.`folder` (
  `folder_id` INT NOT NULL AUTO_INCREMENT,
  `folder_name` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`folder_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `huawei`.`file_sort`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `huawei`.`file_sort` (
  `file_sort_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `file_id` INT NOT NULL,
  `file_type` TINYINT NOT NULL COMMENT '1 文档\n2 图片\n3' /* comment truncated */ /*音乐
4 视频
5 其他*/,
  PRIMARY KEY (`file_sort_id`),
  INDEX `index_user` (`user_id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
