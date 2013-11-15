SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE  TABLE IF NOT EXISTS `oneday_blog`.`tags` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'サロゲートキー' ,
  `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'タグ名' ,
  `created` DATETIME NULL DEFAULT NULL COMMENT '作成日時' ,
  `modified` DATETIME NULL DEFAULT NULL COMMENT '更新日時' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `oneday_blog`.`tag_posts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'サロゲートキー' ,
  `tag_id` INT(11) NOT NULL DEFAULT '0' COMMENT 'タグID' ,
  `post_id` INT(11) NOT NULL DEFAULT '0' COMMENT '記事ID' ,
  `created` DATETIME NULL DEFAULT NULL COMMENT '作成日時' ,
  `modified` DATETIME NULL DEFAULT NULL COMMENT '更新日時' ,
  PRIMARY KEY (`id`) ,
  INDEX `FK_tag_posts_tag_id_idx` (`tag_id` ASC) ,
  INDEX `FK_tag_posts_post_id_idx` (`post_id` ASC) ,
  CONSTRAINT `FK_tag_posts_tag_id`
    FOREIGN KEY (`tag_id` )
    REFERENCES `oneday_blog`.`tags` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_tag_posts_post_id`
    FOREIGN KEY (`post_id` )
    REFERENCES `oneday_blog`.`posts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `oneday_blog`.`categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'サロゲートキー' ,
  `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'カテゴリ名' ,
  `created` DATETIME NULL DEFAULT NULL COMMENT '作成日時' ,
  `modified` DATETIME NULL DEFAULT NULL COMMENT '更新日時' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `oneday_blog`.`posts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'サロゲートキー' ,
  `category_id` INT(11) NULL DEFAULT NULL COMMENT 'カテゴリID' ,
  `title` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '記事タイトル' ,
  `body` TEXT NULL DEFAULT NULL COMMENT '記事内容' ,
  `user_id` INT(11) NOT NULL DEFAULT '0' COMMENT '記事投稿ユーザーID' ,
  `created` DATETIME NULL DEFAULT NULL COMMENT '作成日時' ,
  `modified` DATETIME NULL DEFAULT NULL COMMENT '更新日時' ,
  PRIMARY KEY (`id`) ,
  INDEX `FK_posts_user_id_idx` (`user_id` ASC) ,
  INDEX `FK_posts_category_id_idx` (`category_id` ASC) ,
  CONSTRAINT `FK_posts_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `oneday_blog`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_posts_category_id`
    FOREIGN KEY (`category_id` )
    REFERENCES `oneday_blog`.`categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `oneday_blog`.`comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'サロゲートキー' ,
  `post_id` INT(11) NOT NULL DEFAULT '0' COMMENT 'ポストID' ,
  `body` TEXT NULL DEFAULT NULL COMMENT 'コメント内容' ,
  `user_id` INT(11) NOT NULL DEFAULT '0' COMMENT 'コメント記述ユーザーID' ,
  `created` DATETIME NULL DEFAULT NULL COMMENT '作成日時' ,
  `modified` DATETIME NULL DEFAULT NULL COMMENT '更新日時' ,
  PRIMARY KEY (`id`) ,
  INDEX `FK_comments_post_id_idx` (`post_id` ASC) ,
  INDEX `FK_comments_user_id_idx` (`user_id` ASC) ,
  CONSTRAINT `FK_comments_post_id`
    FOREIGN KEY (`post_id` )
    REFERENCES `oneday_blog`.`posts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_comments_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `oneday_blog`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `oneday_blog`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'サロゲートキー' ,
  `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'ユーザー名' ,
  `created` DATETIME NULL DEFAULT NULL COMMENT '作成日時' ,
  `modified` DATETIME NULL DEFAULT NULL COMMENT '更新日時' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
