-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 jan. 2025 à 15:05
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `library`
--

DROP TABLE IF EXISTS `library`;
CREATE TABLE IF NOT EXISTS `library` (
  `id_book` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int NOT NULL,
  `insert_at` datetime NOT NULL,
  PRIMARY KEY (`id_book`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `library`
--

INSERT INTO `library` (`id_book`, `title`, `author`, `picture`, `description`, `status`, `user_id`, `insert_at`) VALUES
(1, 'Manuel du cuisinier amateur', 'Whoogy\'s', 'manuel_du_cuisinier_amateur.jpg', 'Le livre que vous tenez entre vos mains sera, je l\'espère, celui que vous salirez en cuisinant, celui que vous bouquinerez dans votre canapé, celui que vous partagerez avec vos enfants, celui que vous choisirez pour vos prochains dîners, mais aussi, et surtout, celui qui vous donnera envie de passer plus de temps en cuisine. À manger avec les doigts et avec le coeur.\r\n150 recettes et techniques :\r\n- B.A.-BA et notions élémentaires\r\n- Ustensiles, cuissons et découpes\r\n- Epicerie parfaite et sauces maison\r\n- Pains, pâtes et comfort food\r\n- Recettes à partager (ou pas)\r\n- Plats à saucer, bonnes braises et cocktails', 1, 12, '2024-09-26 16:48:57'),
(2, 'Mon imagier de tous les animaux', 'Agence Colibri', 'mon_imagier_de_tous_les_animaux.jpg', 'Après Mon imagier de tous les jours, cette nouvelle collection photos s\'attaque à un incontournable de l\'imagerie pour les tout-petits : les animaux. Avec plus de 400 photos, ce titre ne se contente pas de les montrer et de les classer. Il multiplie les a', 1, 13, '2024-09-26 16:49:06'),
(3, 'Asterix les 40 banquets', 'René Goscinny', 'Asterix_les_40_banquets.jpg', 'Dans le village des irréductibles Gaulois, on aime beaucoup les banquets. A la fin de chacune de leurs 40 aventures, Astérix et Obélix retrouvent toujours leurs amis autour d’une grande table, et tous sont réunis pour partager le diner de la victoire !\r\n\r', 0, 12, '2024-09-26 16:51:01'),
(4, 'Mes petites douceurs cosy des quatre saisons', 'Caro From Woodland', 'mes_petites_douceurs.jpg', '\" J\'aime vivre au rythme des saisons ! Chacune apporte son lot de douceurs sucrées et de moments réconfortants.\r\n\r\nEn bonne gourmande, j\'adore retrouver au printemps le délicieux cake au citron et la tarte aux fraises de mes mamies. L\'été, sous le soleil,', 1, 12, '2024-09-26 14:53:10'),
(5, 'La Ferme des animaux', 'Lazzi mia', 'la_ferme_des_animaux_en_bande_dessinee.jpg', 'Scénario de Maxe L\'Hermenier, adaptation de Thomas Labourot d\'après l\'oeuvre de George Orwell, illustrations de Diego L. Parada. Dossier pédagogique de Mia Lazzi.  « Tous les animaux sont égaux mais certains le sont plus que d\'autres ! ».Telle est la nouv', 1, 13, '2024-09-26 16:54:17'),
(6, 'Harry Potter à l\'école des sorciers', 'J.K. Rowling', 'harry_potter.jpg', 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattr', 1, 12, '2024-09-26 16:55:14'),
(7, 'Powerless', 'Lauren Roberts ', 'powerless.jpg', 'Seuls les êtres extraordinaires ont leur place au royaume d\'Ilya. Seuls ceux qui disposent d\'un pouvoir ont le droit de vivre. Paedyn fait partie des Ordinaires, chassés et tués pour préserver cette société d\'Élites. Son existence même est un crime. Pour survivre, Paedyn se prétend Médium et mène une vie de voleuse dans les bas-fonds. Elle parvient à faire profil bas, jusqu\'au jour où elle sauve sans le savoir l\'un des princes d\'Ilya. Elle est alors choisie pour les Épreuves de la Purge : une compétition brutale pour mettre en valeur les pouvoirs des Élites, dont elle est entièrement dépourvue... Si les Épreuves ne la tuent pas, le prince Kai le fera lui-même lorsqu\'il découvrira ce qu\'elle est. Il est le futur Exécuteur, le bourreau des innocents, le chasseur d\'Ordinaires. Elle est la menace qu\'il est chargé d\'anéantir. Tomber amoureux est peut-être ce qui pourrait leur arriver de pire.', 1, 14, '2024-10-25 11:56:23'),
(8, 'MajorMouvement 8 piliers pour rester jeune le plus longtemps possible: Mes routines pour bien vieillir', 'Major Mouvement', 'MajorMouvement.jpg', 'Mes routines et mes meilleurs conseils pour rester jeune !\r\n\r\nVous avez 30, 40, 50, 60 ou même 70 ans et vous sentez les effets du temps sur votre corps et votre mental ? Vous avez envie de vous prendre en main mais ne savez pas par où commencer ? Ou bien vous pensez que tout est foutu, à cause de votre mode de vie pas très sain, de vieilles et mauvaises habitudes, ou encore de fausses croyances qui vous empêchent de changer ? Sachez qu’il n’est JAMAIS trop tard !\r\nVoici la méthode en 8 piliers de Major Mouvement pour vous sentir plus jeune et vivre plus longtemps, en super forme.\r\n\r\nAvec 12 routines et de nombreux exercices pour :\r\n• Bouger en fonction de vos besoins et de votre niveau\r\n• Développer votre masse musculaire (poids du corps, élastique, haltères, etc.)\r\n• Prendre soin de vos articulations (souplesse, mobilité, force, équilibre)\r\n• Dépasser vos douleurs et adopter le bon état d’esprit\r\n• Booster votre cerveau, gérer votre stress et votre alimentation\r\nEt plein d’autres conseils !\r\n\r\nLe guide ultime pour bien vieillir...et faire 10 ans de moins !', 1, 15, '2024-11-07 20:14:22'),
(9, 'Il était temps, de me sauver moi.', 'Victoire Charlie ', 'Victoire_charlie.jpg', 'Dans ce livre, tu trouveras des conseils pour t\'aider à guérir après une rupture amoureuse difficile.\r\n\r\nGrâce à des citations, des exercices, et des textes sur le thème de l\'amour, tu apprendras à décoder tes émotions et tes besoins dans une relation. Avec des questions auxquelles tu répondras directement par écrit et des exemples concrets, tu retrouveras confiance en toi et tu pourras exprimer tes émotions pour te détacher de ce sentiment de mal-être.\r\n\r\nQue tu sois en pleine rupture ou simplement en quête de conseils pour améliorer ta relation, ce livre est un guide pour soigner tes blessures et retrouver le bonheur que tu mérites.\r\n\r\nAlors, es-tu prête à passer à autre chose ?', 1, 15, '2024-11-07 20:14:22'),
(10, 'Toujours faim !', 'Laurent Dagenais ', 'Toujours_faim.jpg', 'Le Chef cuisinier qui a conquis plus de deux millions d\'internautes sur Tiktok !\r\nLe chef Laurent Dagenais était loin de se douter qu\'un jour il quitterait son emploi dans la restauration pour se consacrer exclusivement à ses réseaux sociaux. Avec ses vidéos culinaires sans paroles, aussi ludiques qu\'appétissantes, il a réussi à charmer plus de 2 millions d\'internautes sur TikTok et près de 2 millions abonnés sur Instagram. Fort de ce succès international, Laurent se lance maintenant à la conquête du marché québécois. Dans son premier livre, l\'auteur propose ses 20 recettes les plus populaires sur les réseaux sociaux (dont son fameux lapin à la moutarde, sa pieuvre grillée et son tartare de bœuf devenu viral), auxquelles s\'ajoutent 50 recettes inédites. Avec humour et professionnalisme, le chef vous invite dans son univers déjanté et savoureux, à l\'image de ce que ses abonnés connaissent et apprécient!', 1, 15, '2024-11-07 20:20:29'),
(11, 'La mort en face: Dr. Philippe Boxho, le médecin légiste qui fait parler les morts.', 'Philippe Boxho ', 'Philippe_Boxho.jpg', '« Ce qui a motivé mon choix de la médecine légale ?\r\nLe hasard. J’avais 18 ans, l’âge où tout est possible, et la prêtrise me tentait beaucoup, j’adorais étudier les évangiles, rencontrer les gens, aider ceux qui en avaient besoin, et je me sentais prêt à m’y engager.\r\nMais j’ai choisi de faire des études de médecine et au terme de ma première année, j’ai croisé l’évêque de Liège, que je connaissais, et lui ai confié que j’avais abandonné l’idée de la prêtrise. Il n’était guère surpris, car, selon lui, ce n’était pas la foi qui m’animait, mais une grande soif intellectuelle. »\r\n\r\nMédecin légiste et professeur en criminologie depuis plus de trente ans, Philippe Boxho est l’auteur de livres qui ont permis à un très large public de découvrir le monde fascinant de la médecine légale dans sa réalité la plus crue, bien loin de l’image véhiculée par la fiction.\r\nIl nous revient avec un troisième ouvrage dans lequel il n’hésite plus à se livrer tout en nous contant des histoires vécues, des histoires émouvantes, étonnantes,interpellantes. Son regard acéré sur notre société nous ouvre les yeux sur certains de ses travers et nous invite à la réflexion. Par le biais de ces histoires sur la mort, c’est la vie qui nous apparaît dans toute sa beauté, mais aussi l’humain dans ce qu’il a de plus inquiétant. Du mystère entourant la mort de Napoléon à la fermière noyée par son mari dans une cuve à lait en passant par les dangers du haschich et de l’alcool, il nous immerge plus profondément que jamais dans les coulisses des enquêtes sur les morts accidentelles, les suicides et les meurtres, des plus célèbres aux plus confidentielles.\r\n\r\n\r\n\r\nMédecin légiste et professeur en criminologie depuis plus de trente ans, le Dr. Philippe Boxho, est l’auteur de deux livres qui ont permis à un très large public de découvrir la réalité du monde fascinant de la médecine légale. C’est aussi un regard acéré sur notre société qui incite à la réflexion.\r\n\r\nIl nous revient avec un troisième ouvrage, dans lequel il n’hésite plus à se livrer, tout en nous contant des histoires vécues plus incroyables que jamais.\r\nDu mystère entourant la mort de Napoléon, à cette fermière noyée par son mari dans une cuve à lait en passant par les dangers du haschich assassin ou de l’alcool, il nous plonge plus profondément que jamais dans les coulisses des enquêtes sur les morts accidentelles, des suicides et meurtres, des plus célèbres aux plus confidentielles.', 1, 15, '2024-11-07 20:20:29'),
(12, 'Blake & Mortimer', 'Sente Yves', 'Blake_Mortimer.jpg', 'Un nouveau groupe indépendantiste des Cornouailles, le Free Cornwall Group sévit dans la petite ville de Sainte Corineus. Tout en manifestant contre l\'afflux de nouveaux migrants économiques, le groupe est à la recherche du trésor légendaire du roi Arthur et de sa fameuse épée, Excalibur. Blake est alors envoyé sur place pour démanteler l\'organisation et empêcher le triste dessein de leur chef, un certain « Grand Druide ». Au même moment, au Center of Scientific and Industrial Research de Londres, le professeur Mortimer présente l\'une de ses nouvelles inventions révolutionnaires : une excavatrice de poche, « La Taupe ». Pour tester la résistance de cette prouesse technologique, la presse britannique annonce que « la Taupe » va être envoyée dans les Cornouailles. Dans ce nouvel album, Blake et Mortimer doivent déjouer les attentats d\'un groupuscule indépendantiste avec l\'aide d\'un allié incontournable et pour le moins inattendu... Le colonel Olrik en personne ! Mais peut-on jamais se fier à un « ami » de cet acabit ? Ce dernier album signe le grand retour d\'un duo d\'auteurs emblématiques de la série Blake et Mortimer, à nouveau réuni pour leur 7e aventure commune. Un récit palpitant d\'Yves Sente accompagné de la ligne claire et élégante d\'André Juillard.', 1, 15, '2024-11-07 20:24:47'),
(13, 'Mortelle Adèle sur les traces du Croquepote - Les Grandes Aventures - Tome 5', 'Mr Tan', 'Mortelle_Adele.jpg', 'La nouvelle Grande Aventure de Mortelle Adèle !\r\nMagnus a DISPARU !\r\nD\'ailleurs, il n\'est pas le seul, car depuis quelque temps déjà, les imaginamis des enfants du village disparaissent mystérieusement les uns après les autres.\r\nMais qui donc oserait s\'attaquer à l\'imagination des enfants ? Mortelle Adèle est bien décidée à le découvrir !\r\nLancée sur les traces de cette créature à qui elle a donné le nom de Croquepote, Mortelle Adèle part retrouver Magnus et tous les amis imaginaires des enfants de la vallée des Bizarres avant qu\'il ne soit trop tard !\r\nEt pour mener à bien la mission la plus périlleuse de sa carrière de chasseuse de monstres, Mortelle Adèle a un plan : faire équipe avec celles et ceux qu\'elle a chassés autrefois afin d\'allier tous leurs super-pouvoirs !\r\nLe mystère du Croquepote est loin d\'être le seul qui sera révélé au grand jour dans cette nouvelle aventure où, entre Bizarres, l\'union fait TOUJOURS la force...et les rires !\r\n\r\nAprès avoir exploré le centre de la Terre, des temples maudits ou encore l\'espace, le duo magique d\'auteurs, Mr Tan et Diane Le Feyer, invite cette fois les lecteurs dans un nouveau voyage fantastique aux confins de l\'imaginaire.\r\nPartez aux côtés de Mortelle Adèle pour une nouvelle Grande Aventure sur les traces du Croquepote, et découvrez la force du plus grand des super-pouvoirs : l\'imagination !', 1, 15, '2024-11-07 20:24:47'),
(14, 'Calendrier de l’Avent Escape Game: Livre Jeux pour adultes avec 24 énigmes interactives à résoudre en attendant Noël', 'SOLV', 'SOLV.jpg', 'Un calendrier de l’avent escape game 2.0\r\n24 énigmes immersives à résoudre avec ton smartphone\r\nLe cadeau parfait pour les amateurs d’énigmes et d’escape room.\r\nIdéal pour attendre Noël de façon ludique et créer des moments de partage en famille.\r\nDestiné à tous les niveaux grâce à un système d’indices sur demande.\r\nPlus de 10 heures de jeu !\r\n', 1, 15, '2024-11-07 20:29:58'),
(15, 'Jade, une Lumière dans l\'Ombre', 'Coralie KRIER', 'Coralie_KRIER', 'Je suis Coralie, et ce livre est l\'histoire de ma lutte incessante pour sauver ma fille Jade, atteinte d\'une maladie rare et déchirante.\r\n\r\nDans Jade, une lumière dans l\'ombre, je vous emmène à travers notre parcours semé d\'embûches, où chaque jour est un combat contre la douleur et l\'incertitude. Des sa naissance, Jade a été confrontée à des symptômes que personne ne pouvait expliquer.\r\n\r\nLes traitements conventionnels échouaient, les nuits étaient interminables, et chaque visite médicale semblait nous éloigner de la vérité. J\'ai plongé dans des recherches désespérées pour trouver des réponses, tout en essayant de garder espoir.\r\n\r\nÀ travers ce récit sincère, je partage l\'impact émotionnel de notre quête pour un diagnostic et un traitement adapté, les moments déchirants et les petites victoires qui nous ont permis de continuer.\r\n\r\nSoutenue par ma famille et ma meilleure amie, j\'ai traversé les ténèbres avec Jade, en espérant trouver une lumière au bout du tunnel.\r\n\r\nCe livre est une fenêtre sur notre résilience, notre détermination et notre amour. C\'est aussi un témoignage que, même dans les moments les plus sombres, l\'espoir et la lumière peuvent émerger.\r\n\r\nÀ bientôt, Coralie.', 1, 15, '2024-11-07 20:29:58'),
(16, 'Moi, Fadi, le frère volé - Tome 01 (1986-1994)', 'Riad Sattouf', 'Riad_Sattouf', 'Le nouveau roman graphique de Riad Sattouf arrive en librairie le mardi 8 octobre 2024 !\r\nRiad Sattouf revient avec une nouvelle série de bandes dessinées, qui replonge le lecteur dans l\'univers de sa série à succès L\'Arabe du futur.\r\n\r\nCe nouveau projet repose sur les histoires que Riad Sattouf a recueillies en 2011 et 2012 auprès de son frère Fadi Sattouf.\r\nDans ce récit, c\'est Fadi le narrateur : il retrace son parcours, de son enfance heureuse en Bretagne auprès de sa mère adorée et de ses grands frères, Riad et Yahya, jusqu\'à la Syrie de son père, rude et inconnue pour lui.', 1, 15, '2024-11-07 20:33:22');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `recipient_id` int NOT NULL,
  `message_text` varchar(255) NOT NULL,
  `sent_at` datetime NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_message`),
  KEY `sender_id` (`sender_id`),
  KEY `recipient_id` (`recipient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `sender_id`, `recipient_id`, `message_text`, `sent_at`, `is_read`) VALUES
(1, 12, 13, 'Bonjour', '2024-10-11 13:00:23', 0),
(2, 14, 13, 'Tu as de bon gout', '2024-10-24 19:24:56', 0),
(3, 15, 13, 'Bonjour !', '2024-10-24 19:24:56', 0),
(4, 13, 12, 'Bonjour, comment allez-vous ?', '2024-10-24 22:38:46', 0),
(5, 12, 13, 'Je vais bien, merci, vous avez une très belle bibliothèque!', '2024-10-24 22:40:14', 0),
(6, 13, 12, 'Merci', '2024-10-25 12:33:59', 0),
(9, 13, 15, 'Bonjour !', '2024-10-25 13:06:17', 0),
(12, 15, 12, 'Bonjour', '2024-11-07 22:58:30', 0),
(13, 12, 14, 'Bonjour', '2024-11-07 22:59:45', 0),
(14, 12, 15, 'Bonjour!', '2024-11-08 10:03:45', 0),
(21, 12, 13, 'Bonjour', '2024-12-13 13:33:27', 0),
(22, 12, 15, 'Comment allez vous ?', '2024-12-13 13:33:43', 0),
(25, 15, 13, 'Comment allez vous ?', '2025-01-10 14:46:25', 0),
(28, 13, 15, 'Bien et vous ?', '2025-01-10 15:47:40', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_logo` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `user_logo`, `create_at`) VALUES
(12, 'Benjamin', '$2y$10$HJqjik15H.I1U.GPL2MypewDCERdvFTqxAIW3fcaEI6DowzOmDSqu', 'benjamin@gmail.com', 'pic_halloween', '2024-09-26 11:57:12'),
(13, 'Lia', '$2y$10$bBywJFf0KcBtVD4k56XPbu4ycUS939bK.cXQY70wKguCOiGtSROTS', 'Lia@gmail.com', 'pic_witch', '2024-10-11 12:14:37'),
(14, 'Patou', '$2y$10$TZnoV6a0Kf1E0G75R9FEM.5zJngTKyWEhBP4LYr5ETDGQRm4kqR4S', 'Patou@geokd.com', 'livres.png', '2024-10-24 21:23:58'),
(15, 'Laura', '$2y$10$ypSbCXFd96/i3xH.EvHIPOncFifCoM9I/dWwWrQsB9oPcX8MExEGe', 'laura@kjzsif.com', 'foret.png', '2024-10-24 21:24:23');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `recipient_id` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sender_id` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
