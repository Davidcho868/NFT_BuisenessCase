<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627090937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nft_acheter (nft_id INT NOT NULL, acheter_id INT NOT NULL, INDEX IDX_67F74530E813668D (nft_id), INDEX IDX_67F74530FB96A1CA (acheter_id), PRIMARY KEY(nft_id, acheter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_acheter (user_id INT NOT NULL, acheter_id INT NOT NULL, INDEX IDX_36038F12A76ED395 (user_id), INDEX IDX_36038F12FB96A1CA (acheter_id), PRIMARY KEY(user_id, acheter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nft_acheter ADD CONSTRAINT FK_67F74530E813668D FOREIGN KEY (nft_id) REFERENCES nft (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nft_acheter ADD CONSTRAINT FK_67F74530FB96A1CA FOREIGN KEY (acheter_id) REFERENCES acheter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_acheter ADD CONSTRAINT FK_36038F12A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_acheter ADD CONSTRAINT FK_36038F12FB96A1CA FOREIGN KEY (acheter_id) REFERENCES acheter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EE2F2EC0B2');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EE4DE7DC5C');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE departement');
        $this->addSql('ALTER TABLE acheter DROP FOREIGN KEY FK_6E0E9118A76ED395');
        $this->addSql('DROP INDEX IDX_6E0E9118A76ED395 ON acheter');
        $this->addSql('ALTER TABLE acheter DROP user_id');
        $this->addSql('ALTER TABLE adresse ADD rue VARCHAR(255) NOT NULL, ADD code_postal VARCHAR(20) NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD departement VARCHAR(255) NOT NULL, CHANGE nom_adresse numero VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE categorie ADD n_ft_id INT NOT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634D012FBE0 FOREIGN KEY (n_ft_id) REFERENCES nft (id)');
        $this->addSql('CREATE INDEX IDX_497DD634D012FBE0 ON categorie (n_ft_id)');
        $this->addSql('ALTER TABLE eth ADD n_ft_id INT NOT NULL, CHANGE jour_eth date_ajout_eth DATE NOT NULL');
        $this->addSql('ALTER TABLE eth ADD CONSTRAINT FK_B9678541D012FBE0 FOREIGN KEY (n_ft_id) REFERENCES nft (id)');
        $this->addSql('CREATE INDEX IDX_B9678541D012FBE0 ON eth (n_ft_id)');
        $this->addSql('ALTER TABLE image ADD liens VARCHAR(255) NOT NULL, ADD nom_img VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL, DROP lien_image, DROP nom_image, DROP description_image');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C4E8CC08A');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C645CAD33');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C98DE379A');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CD7C51D7E');
        $this->addSql('DROP INDEX IDX_D9C7463C4E8CC08A ON nft');
        $this->addSql('DROP INDEX IDX_D9C7463C645CAD33 ON nft');
        $this->addSql('DROP INDEX IDX_D9C7463CD7C51D7E ON nft');
        $this->addSql('DROP INDEX UNIQ_D9C7463C98DE379A ON nft');
        $this->addSql('ALTER TABLE nft ADD images_id INT NOT NULL, ADD valeur INT NOT NULL, ADD prix INT NOT NULL, DROP achats_id, DROP correspond_id, DROP appartiens_id, DROP vaux_id, DROP valeur_nft, DROP prix_nft, CHANGE en_vente is_vente TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CD44F05E5 FOREIGN KEY (images_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D9C7463CD44F05E5 ON nft (images_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B78BC975');
        $this->addSql('DROP INDEX UNIQ_8D93D649B78BC975 ON user');
        $this->addSql('ALTER TABLE user CHANGE pseudo pseudo VARCHAR(255) NOT NULL, CHANGE habite_id adresses_id INT NOT NULL, CHANGE proprietaire_nft is_proprietaire TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64985E14726 FOREIGN KEY (adresses_id) REFERENCES adresse (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64985E14726 ON user (adresses_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, compose_id INT NOT NULL, nom_commune VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, code_postal VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_E2E2D1EE4DE7DC5C (adresse_id), UNIQUE INDEX UNIQ_E2E2D1EE2F2EC0B2 (compose_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, dpt_nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EE2F2EC0B2 FOREIGN KEY (compose_id) REFERENCES departement (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EE4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nft_acheter DROP FOREIGN KEY FK_67F74530E813668D');
        $this->addSql('ALTER TABLE nft_acheter DROP FOREIGN KEY FK_67F74530FB96A1CA');
        $this->addSql('ALTER TABLE user_acheter DROP FOREIGN KEY FK_36038F12A76ED395');
        $this->addSql('ALTER TABLE user_acheter DROP FOREIGN KEY FK_36038F12FB96A1CA');
        $this->addSql('DROP TABLE nft_acheter');
        $this->addSql('DROP TABLE user_acheter');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634D012FBE0');
        $this->addSql('DROP INDEX IDX_497DD634D012FBE0 ON categorie');
        $this->addSql('ALTER TABLE categorie DROP n_ft_id');
        $this->addSql('ALTER TABLE acheter ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE acheter ADD CONSTRAINT FK_6E0E9118A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6E0E9118A76ED395 ON acheter (user_id)');
        $this->addSql('ALTER TABLE image ADD lien_image VARCHAR(255) NOT NULL, ADD nom_image VARCHAR(255) NOT NULL, ADD description_image VARCHAR(255) NOT NULL, DROP liens, DROP nom_img, DROP description');
        $this->addSql('ALTER TABLE adresse ADD nom_adresse VARCHAR(255) NOT NULL, DROP numero, DROP rue, DROP code_postal, DROP ville, DROP departement');
        $this->addSql('ALTER TABLE eth DROP FOREIGN KEY FK_B9678541D012FBE0');
        $this->addSql('DROP INDEX IDX_B9678541D012FBE0 ON eth');
        $this->addSql('ALTER TABLE eth DROP n_ft_id, CHANGE date_ajout_eth jour_eth DATE NOT NULL');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CD44F05E5');
        $this->addSql('DROP INDEX UNIQ_D9C7463CD44F05E5 ON nft');
        $this->addSql('ALTER TABLE nft ADD achats_id INT NOT NULL, ADD correspond_id INT NOT NULL, ADD appartiens_id INT NOT NULL, ADD vaux_id INT NOT NULL, ADD valeur_nft INT NOT NULL, ADD prix_nft INT NOT NULL, DROP images_id, DROP valeur, DROP prix, CHANGE is_vente en_vente TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C4E8CC08A FOREIGN KEY (appartiens_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C645CAD33 FOREIGN KEY (achats_id) REFERENCES acheter (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C98DE379A FOREIGN KEY (correspond_id) REFERENCES image (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CD7C51D7E FOREIGN KEY (vaux_id) REFERENCES eth (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D9C7463C4E8CC08A ON nft (appartiens_id)');
        $this->addSql('CREATE INDEX IDX_D9C7463C645CAD33 ON nft (achats_id)');
        $this->addSql('CREATE INDEX IDX_D9C7463CD7C51D7E ON nft (vaux_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D9C7463C98DE379A ON nft (correspond_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64985E14726');
        $this->addSql('DROP INDEX UNIQ_8D93D64985E14726 ON user');
        $this->addSql('ALTER TABLE user CHANGE pseudo pseudo VARCHAR(20) NOT NULL, CHANGE adresses_id habite_id INT NOT NULL, CHANGE is_proprietaire proprietaire_nft TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B78BC975 FOREIGN KEY (habite_id) REFERENCES adresse (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649B78BC975 ON user (habite_id)');
    }
}
