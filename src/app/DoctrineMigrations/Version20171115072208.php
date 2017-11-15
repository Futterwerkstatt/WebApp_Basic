<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171115072208 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('CREATE TABLE `fos_group` (
  `id` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT \'(DC2Type:array)\'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `holiday_from` datetime NOT NULL,
  `holiday_to` datetime NOT NULL,
  `days` int(11) NOT NULL,
  `accept` int(11) NOT NULL,
  `closed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');


        $this->addSql('CREATE TABLE `taxonomy` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `taxonomy_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `user_basic` (
  `id` int(11) NOT NULL,
  `user_options_id` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT \'(DC2Type:array)\',
  `vacation` int(11) DEFAULT NULL,
  `biography` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `user_options` (
  `id` int(11) NOT NULL,
  `notifications` tinyint(1) DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('CREATE TABLE `web_config` (
  `id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `website_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bootstrap_enable` tinyint(1) NOT NULL,
  `bootstrap_theme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fa_enable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

        $this->addSql('ALTER TABLE `fos_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4B019DDB5E237E06` (`name`)');

        $this->addSql('ALTER TABLE `fos_user_user_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `IDX_B3C77447A76ED395` (`user_id`),
  ADD KEY `IDX_B3C77447FE54D947` (`group_id`)');

        $this->addSql('ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DC9AB234F132696E` (`userid`)');

        $this->addSql('ALTER TABLE `taxonomy`
  ADD PRIMARY KEY (`id`)');

        $this->addSql('ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_88A23F71727ACA70` (`parent_id`),
  ADD KEY `IDX_88A23F719557E6F6` (`taxonomy_id`)');

        $this->addSql('ALTER TABLE `user_basic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_72BB8E0B92FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_72BB8E0BA0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_72BB8E0BC05FB297` (`confirmation_token`),
  ADD UNIQUE KEY `UNIQ_72BB8E0B9DBCC31D` (`user_options_id`)');

        $this->addSql('ALTER TABLE `user_options`
  ADD PRIMARY KEY (`id`)');

        $this->addSql('ALTER TABLE `web_config`
  ADD PRIMARY KEY (`id`)');

        $this->addSql('ALTER TABLE `fos_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT');

        $this->addSql('ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5');

        $this->addSql('ALTER TABLE `taxonomy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT');

        $this->addSql('ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT');

        $this->addSql('ALTER TABLE `user_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9');

        $this->addSql('ALTER TABLE `user_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT');

        $this->addSql('ALTER TABLE `web_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2');

        $this->addSql('ALTER TABLE `fos_user_user_group`
  ADD CONSTRAINT `FK_B3C77447A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`id`),
  ADD CONSTRAINT `FK_B3C77447FE54D947` FOREIGN KEY (`group_id`) REFERENCES `fos_group` (`id`)');

        $this->addSql('ALTER TABLE `holiday`
  ADD CONSTRAINT `FK_DC9AB234F132696E` FOREIGN KEY (`userid`) REFERENCES `user_basic` (`id`)');

        $this->addSql('ALTER TABLE `terms`
  ADD CONSTRAINT `FK_88A23F71727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_88A23F719557E6F6` FOREIGN KEY (`taxonomy_id`) REFERENCES `taxonomy` (`id`)');

        $this->addSql('ALTER TABLE `user_basic`
  ADD CONSTRAINT `FK_72BB8E0B9DBCC31D` FOREIGN KEY (`user_options_id`) REFERENCES `user_options` (`id`)');


        $this->addSql('INSERT INTO `web_config` (`id`, `updated_at`, `website_name`, `website_description`, `bootstrap_enable`, `bootstrap_theme`, `fa_enable`) VALUES
(1, \'2017-11-14 08:13:51\', \'Holiday\', NULL, 1, \'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css\', 1)');

        $this->addSql('INSERT INTO `user_basic` (`id`, `user_options_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `biography`, `vacation`) VALUES
(3, NULL, \'admin\', \'admin\', \'admin@urlaub.dev\', \'admin@urlaub.dev\', 1, \'BGE.VD5Z/ehbxQZYksI4pM18YJeseUIlp5nQvM813iY\', \'LB5s+c6CcIumoc1Itn0NfXLeiyW5+L/rTmXnifwwze9Dlemjm02ep+APsqOHfS7ZmHh5ZrsjSiIGIMDuyZNQ6A==\', \'2017-11-15 10:05:26\', NULL, NULL, \'a:1:{i:0;s:10:\"ROLE_ADMIN\";}\', NULL, 0),
(4, NULL, \'boss\', \'boss\', \'chef@urlaub.dev\', \'chef@urlaub.dev\', 1, \'fsKhq4js3SSyeMN0kwIZ4rP7TRc0EcZCfW8EpRVFmdM\', \'ZQM7iJ17VkEEQD7brdZ5jq3RrVBylJeMEYg39x0EBhOfMu15x4jJaWFL6kq5FFxzCXksZOQ867WHqcHcUQqybQ==\', \'2017-11-15 10:29:53\', NULL, NULL, \'a:1:{i:0;s:9:\"ROLE_BOSS\";}\', NULL, 30),
(5, NULL, \'team\', \'team\', \'team@urlaub.dev\', \'team@urlaub.dev\', 1, \'jd2f3sI5n/K9fzguqrG4ZdOiY/XHruRwQEmckc5MNNM\', \'bsMXy/1qyQpEqNvsRLOHDOC7DQhanbo7yfax0TFwOLc2gCAf3Z8ypjsDGe8EX2BVV8MxJwISHtuc9s6WddC6eg==\', \'2017-11-15 10:29:21\', NULL, NULL, \'a:1:{i:0;s:9:\"ROLE_TEAM\";}\', NULL, 25),
(6, NULL, \'worker\', \'worker\', \'worker@urlaub.dev\', \'worker@urlaub.dev\', 1, \'tKR9x8//NuIYpvKGZ6OCmwvxBCHEqvbW3KeQSq0uS.E\', \'Tmoev8ksMPQBw539xtG+wdMvPCsAqsfjzhSw4IfPRLpTrgUFTqpC+X8q+85Hsh0L3T2/I6H2KyLHwuMa42fp7g==\', NULL, NULL, NULL, \'a:1:{i:0;s:11:\"ROLE_WORKER\";}\', NULL, 25),
(7, NULL, \'worker_klaus\', \'worker_klaus\', \'klaus@urlaub.dev\', \'klaus@urlaub.dev\', 1, \'il2DJjwUlgTT0k7CbFIyeMJi1PUuqmmnnnhSr8rjgTM\', \'imv8UMnd5Ge+wT88XUFmP/gDXf0Eenw2j+Vb+GdYh4YooYfadH9oDB03HSSSP38DbXw71xb0SEHLaUDt5oAHwg==\', \'2017-11-15 10:14:01\', NULL, NULL, \'a:1:{i:0;s:11:\"ROLE_WORKER\";}\', NULL, 25),
(8, NULL, \'trainee\', \'trainee\', \'trainee@urlaub.dev\', \'trainee@urlaub.dev\', 1, \'mx.aBf62MB01oOFYM7R.9Y1vZony3b4j/3.SLeT0K8U\', \'lOLdLtrREi/rOHvWCfUDqdihWdpAxvc848unXhyl3dkpt63TGf7WfKeUNK33//yrfIIyeRAjGm0Cq1We/iWbgQ==\', \'2017-11-15 10:28:44\', NULL, NULL, \'a:1:{i:0;s:12:\"ROLE_TRAINEE\";}\', NULL, NULL)');


        $this->addSql('INSERT INTO `holiday` (`id`, `userid`, `holiday_from`, `holiday_to`, `accept`, `days`, `closed`) VALUES
(1, 4, \'2017-11-20 00:00:00\', \'2017-11-24 00:00:00\', 1, 4, 0),
(2, 5, \'2017-11-01 00:00:00\', \'2017-11-03 00:00:00\', 0, 3, 0),
(3, 6, \'2017-11-27 00:00:00\', \'2017-11-30 00:00:00\', 1, 3, 1),
(4, 7, \'2017-12-25 00:00:00\', \'2017-12-29 00:00:00\', 0, 4, 1)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DROP TABLE `fos_group`, `fos_user_user_group`, `holiday`, `migration_versions`, `taxonomy`, `terms`, `user_basic`, `user_options`, `web_config`;');

    }
}
