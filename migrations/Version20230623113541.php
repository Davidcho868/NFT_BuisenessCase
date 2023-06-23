<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230623113541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acheter (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_achat DATE NOT NULL, prix_achat INT NOT NULL, INDEX IDX_6E0E9118A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, nom_adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, compose_id INT NOT NULL, nom_commune VARCHAR(255) NOT NULL, code_postal VARCHAR(20) NOT NULL, INDEX IDX_E2E2D1EE4DE7DC5C (adresse_id), UNIQUE INDEX UNIQ_E2E2D1EE2F2EC0B2 (compose_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, dpt_nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eth (id INT AUTO_INCREMENT NOT NULL, cours_eth INT NOT NULL, jour_eth DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, lien_image VARCHAR(255) NOT NULL, nom_image VARCHAR(255) NOT NULL, description_image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nft (id INT AUTO_INCREMENT NOT NULL, achats_id INT NOT NULL, correspond_id INT NOT NULL, appartiens_id INT NOT NULL, vaux_id INT NOT NULL, valeur_nft INT NOT NULL, prix_nft INT NOT NULL, en_vente TINYINT(1) NOT NULL, INDEX IDX_D9C7463C645CAD33 (achats_id), UNIQUE INDEX UNIQ_D9C7463C98DE379A (correspond_id), INDEX IDX_D9C7463C4E8CC08A (appartiens_id), INDEX IDX_D9C7463CD7C51D7E (vaux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, habite_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(20) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, proprietaire_nft TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649B78BC975 (habite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acheter ADD CONSTRAINT FK_6E0E9118A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EE4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EE2F2EC0B2 FOREIGN KEY (compose_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C645CAD33 FOREIGN KEY (achats_id) REFERENCES acheter (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C98DE379A FOREIGN KEY (correspond_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463C4E8CC08A FOREIGN KEY (appartiens_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE nft ADD CONSTRAINT FK_D9C7463CD7C51D7E FOREIGN KEY (vaux_id) REFERENCES eth (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B78BC975 FOREIGN KEY (habite_id) REFERENCES adresse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acheter DROP FOREIGN KEY FK_6E0E9118A76ED395');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EE4DE7DC5C');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EE2F2EC0B2');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C645CAD33');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C98DE379A');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463C4E8CC08A');
        $this->addSql('ALTER TABLE nft DROP FOREIGN KEY FK_D9C7463CD7C51D7E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B78BC975');
        $this->addSql('DROP TABLE acheter');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE eth');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE nft');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
