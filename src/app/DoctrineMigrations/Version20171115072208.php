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
        $this->addSql('INSERT INTO `holiday` (`id`, `userid`, `holiday_from`, `holiday_to`, `accept`, `days`, `closed`) VALUES
(1, 4, \'2017-11-20 00:00:00\', \'2017-11-24 00:00:00\', 1, 4, 0),
(2, 5, \'2017-11-01 00:00:00\', \'2017-11-03 00:00:00\', 0, 3, 0),
(3, 6, \'2017-11-27 00:00:00\', \'2017-11-30 00:00:00\', 1, 3, 1),
(4, 7, \'2017-12-25 00:00:00\', \'2017-12-29 00:00:00\', 0, 4, 1)');

        $this->addSql('INSERT INTO `user_basic` (`id`, `user_options_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `biography`, `vacation`) VALUES
(3, NULL, \'admin\', \'admin\', \'admin@urlaub.dev\', \'admin@urlaub.dev\', 1, \'BGE.VD5Z/ehbxQZYksI4pM18YJeseUIlp5nQvM813iY\', \'LB5s+c6CcIumoc1Itn0NfXLeiyW5+L/rTmXnifwwze9Dlemjm02ep+APsqOHfS7ZmHh5ZrsjSiIGIMDuyZNQ6A==\', \'2017-11-15 10:05:26\', NULL, NULL, \'a:1:{i:0;s:10:\"ROLE_ADMIN\";}\', NULL, 0),
(4, NULL, \'boss\', \'boss\', \'chef@urlaub.dev\', \'chef@urlaub.dev\', 1, \'fsKhq4js3SSyeMN0kwIZ4rP7TRc0EcZCfW8EpRVFmdM\', \'ZQM7iJ17VkEEQD7brdZ5jq3RrVBylJeMEYg39x0EBhOfMu15x4jJaWFL6kq5FFxzCXksZOQ867WHqcHcUQqybQ==\', \'2017-11-15 10:29:53\', NULL, NULL, \'a:1:{i:0;s:9:\"ROLE_BOSS\";}\', NULL, 30),
(5, NULL, \'team\', \'team\', \'team@urlaub.dev\', \'team@urlaub.dev\', 1, \'jd2f3sI5n/K9fzguqrG4ZdOiY/XHruRwQEmckc5MNNM\', \'bsMXy/1qyQpEqNvsRLOHDOC7DQhanbo7yfax0TFwOLc2gCAf3Z8ypjsDGe8EX2BVV8MxJwISHtuc9s6WddC6eg==\', \'2017-11-15 10:29:21\', NULL, NULL, \'a:1:{i:0;s:9:\"ROLE_TEAM\";}\', NULL, 25),
(6, NULL, \'worker\', \'worker\', \'worker@urlaub.dev\', \'worker@urlaub.dev\', 1, \'tKR9x8//NuIYpvKGZ6OCmwvxBCHEqvbW3KeQSq0uS.E\', \'Tmoev8ksMPQBw539xtG+wdMvPCsAqsfjzhSw4IfPRLpTrgUFTqpC+X8q+85Hsh0L3T2/I6H2KyLHwuMa42fp7g==\', NULL, NULL, NULL, \'a:1:{i:0;s:11:\"ROLE_WORKER\";}\', NULL, 25),
(7, NULL, \'worker_klaus\', \'worker_klaus\', \'klaus@urlaub.dev\', \'klaus@urlaub.dev\', 1, \'il2DJjwUlgTT0k7CbFIyeMJi1PUuqmmnnnhSr8rjgTM\', \'imv8UMnd5Ge+wT88XUFmP/gDXf0Eenw2j+Vb+GdYh4YooYfadH9oDB03HSSSP38DbXw71xb0SEHLaUDt5oAHwg==\', \'2017-11-15 10:14:01\', NULL, NULL, \'a:1:{i:0;s:11:\"ROLE_WORKER\";}\', NULL, 25),
(8, NULL, \'trainee\', \'trainee\', \'trainee@urlaub.dev\', \'trainee@urlaub.dev\', 1, \'mx.aBf62MB01oOFYM7R.9Y1vZony3b4j/3.SLeT0K8U\', \'lOLdLtrREi/rOHvWCfUDqdihWdpAxvc848unXhyl3dkpt63TGf7WfKeUNK33//yrfIIyeRAjGm0Cq1We/iWbgQ==\', \'2017-11-15 10:28:44\', NULL, NULL, \'a:1:{i:0;s:12:\"ROLE_TRAINEE\";}\', NULL, NULL)');

        $this->addSql('INSERT INTO `web_config` (`id`, `updated_at`, `website_name`, `website_description`, `bootstrap_enable`, `bootstrap_theme`, `fa_enable`) VALUES
(1, \'2017-11-14 08:13:51\', \'Holiday\', NULL, 1, \'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css\', 1)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
