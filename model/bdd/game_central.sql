-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 29 Novembre 2015 à 11:32
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `game_central`
--

-- --------------------------------------------------------

--
-- Structure de la table `gc_cards`
--

CREATE TABLE `gc_cards` (
  `id_card` int(11) NOT NULL,
  `firstname_customer` varchar(255) NOT NULL,
  `lastname_customer` varchar(255) NOT NULL,
  `card_type` varchar(255) NOT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `cryptogram` varchar(3) DEFAULT NULL,
  `expiring_date` date NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gc_cards`
--

INSERT INTO `gc_cards` (`id_card`, `firstname_customer`, `lastname_customer`, `card_type`, `card_number`, `cryptogram`, `expiring_date`, `id_customer`) VALUES
(1, 'Morgane', 'Heng', 'mastercard', '1234567', '123', '2015-12-30', 8);

-- --------------------------------------------------------

--
-- Structure de la table `gc_cart`
--

CREATE TABLE `gc_cart` (
  `id_cart` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gc_category`
--

CREATE TABLE `gc_category` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gc_category`
--

INSERT INTO `gc_category` (`id_cat`, `name_cat`) VALUES
(1, 'Action'),
(4, 'Aventure'),
(14, 'Beat''em All'),
(6, 'Combat'),
(9, 'Course'),
(10, 'Création'),
(2, 'FPS'),
(15, 'Gestion'),
(8, 'MMO'),
(11, 'Open World'),
(5, 'RPG'),
(12, 'Sandbox'),
(7, 'Sport'),
(16, 'Stratégie'),
(13, 'Survival-Horror'),
(17, 'Tir'),
(3, 'TPS');

-- --------------------------------------------------------

--
-- Structure de la table `gc_customers`
--

CREATE TABLE `gc_customers` (
  `id_customer` int(11) NOT NULL,
  `firstname_customer` varchar(255) NOT NULL,
  `lastname_customer` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `postal_code` varchar(5) NOT NULL,
  `city` text NOT NULL,
  `delivery_postal_code` int(11) NOT NULL,
  `delivery_city` varchar(50) NOT NULL,
  `shipping_postal_code` int(11) NOT NULL,
  `shipping_city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gc_customers`
--

INSERT INTO `gc_customers` (`id_customer`, `firstname_customer`, `lastname_customer`, `birthday`, `mail`, `phone`, `pwd`, `address`, `delivery_address`, `shipping_address`, `postal_code`, `city`, `delivery_postal_code`, `delivery_city`, `shipping_postal_code`, `shipping_city`) VALUES
(8, 'Morgane', 'Heng', '1995-11-07', 'etna@gmail.com', '0123456789', 'ee5e5205eb5a6c0602cc10b7483445e0', '123 rue test', '123 rue test', '123 rue test', '23456', 'Paris', 23456, 'Paris', 23456, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `gc_editor`
--

CREATE TABLE `gc_editor` (
  `id_editor` int(11) NOT NULL,
  `name_editor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gc_editor`
--

INSERT INTO `gc_editor` (`id_editor`, `name_editor`) VALUES
(29, '11 bit studios'),
(42, '2K Games'),
(27, '2K Sports'),
(17, '343 Industries'),
(26, '4J Studios'),
(9, 'Activision'),
(15, 'Activision Blizzard'),
(20, 'Asobo Studio '),
(33, 'Bandai Namco'),
(23, 'Bethesda Softworks'),
(6, 'BioWare'),
(16, 'Blizzard Entertainment'),
(12, 'Bungie'),
(38, 'Dice'),
(34, 'Dimps'),
(14, 'EA Sports'),
(7, 'Electronic Arts'),
(21, 'Hidden Path'),
(19, 'Ivory Tower'),
(13, 'Konami'),
(28, 'Microsoft'),
(18, 'Microsoft Game Studios'),
(25, 'Mojang'),
(40, 'Naughty Dog'),
(8, 'Nintendo'),
(31, 'OMEGA Force'),
(3, 'Rockstar Games'),
(37, 'Rocksteady'),
(10, 'Sledgehammer Games'),
(41, 'Sony'),
(11, 'Sora Ltd.'),
(4, 'Take 2 Interactive'),
(30, 'Tecmo Koei'),
(43, 'Turtle Rock Studios'),
(5, 'Ubisoft'),
(22, 'Valve'),
(32, 'Visual Concepts'),
(24, 'Vivendi Universal Games'),
(39, 'Wargaming.net'),
(36, 'Warner Bros Games'),
(35, 'Warner Interactive');

-- --------------------------------------------------------

--
-- Structure de la table `gc_games`
--

CREATE TABLE `gc_games` (
  `id_game` int(11) NOT NULL,
  `name_game` varchar(255) NOT NULL,
  `description_game` text NOT NULL,
  `price` double NOT NULL,
  `image` text NOT NULL,
  `game_console` varchar(255) NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gc_games`
--

INSERT INTO `gc_games` (`id_game`, `name_game`, `description_game`, `price`, `image`, `game_console`, `release_date`) VALUES
(2, 'Grand Theft Auto V', 'Jeu d''action-aventure en monde ouvert, Grand Theft Auto (GTA) V vous place dans la peau de trois personnages inédits : Michael, Trevor et Franklin qui ont élu domicile à Los Santos, ville de la région de San Andreas. Braquages et missions font partie du quotidien du joueur qui pourra également cohabiter avec 16 utilisateurs dans cet univers persistant.', 39.9, 'http://ecx.images-amazon.com/images/I/915vV-zIhmL._SL1500_.jpg', 'PS4', '2013-09-17'),
(3, 'Assassin''s Creed Unity', 'Jeu d''action-aventure en monde ouvert, Assassin''s Creed Unity vous place dans la peau d''Arno Victor Dorian à l''époque de la Révolution française. Jeune Assassin évoluant dans le Paris de 1789, le joueur doit faire face à la corruption qui s''est répandue en France. Cet opus innove sur plusieurs points à commencer par l''absence de temps de chargement lorsque vous entrez dans certains bâtiments, ainsi que la modélisation à l''échelle réelle de plusieurs monuments emblématiques de la capitale.', 27.9, 'http://image.jeuxvideo.com/images/jaquettes/00048288/jaquette-assassin-s-creed-unity-xbox-one-cover-avant-g-1407851417.jpg', 'XBOX ONE', '2014-11-03'),
(4, 'Pokémon Rubis Omega', 'Pokémon Rubis Omega est un jeu de rôle disponible sur 3DS. Remake de la version Rubis sortie sur Game Boy Advance, cet épisode reprend les Méga-Evolutions et une partie de l''interface de Pokémon X et Y pour vous offrir une version revue de la région de Hoenn. Vous pourrez également parcourir librement les cieux à dos de Pokémon et explorer les bases secrètes de vos amis.', 33, 'http://cdn-static.gamekult.com/gamekult-com/images/photos/30/50/25/87/pokemon-rubis-omega-jaquette-ME3050258795_2.jpg', '3DS', '2014-11-28'),
(5, 'Dragon Age Inquisition', 'Jeu de rôle, Dragon Age Inquisition prend place dans un monde heroic-fantasy qui répond au doux nom de Thédas. Frappé par une forme de malédiction, le personnage jouable partira en quête de réponse. Le territoire explorable est bien plus grand que dans les opus précédents et comprend notamment deux pays : Ferelden et Orlaïs. Le joueur peut y incarner une des quatre classes disponibles : Humain, Nain, Elfe et Qunari.', 14.99, 'http://image.jeuxvideo.com/images/jaquettes/00040573/jaquette-dragon-age-inquisition-pc-cover-avant-g-1415026930.jpg', 'PC', '2014-11-20'),
(6, 'Pokémon Saphir Alpha', 'Pokémon Saphir Alpha est un jeu de rôle disponible sur 3DS. Remake de la version Saphir sortie sur Game Boy Advance, cet épisode reprend les Méga-Evolutions et une partie de l''interface de Pokémon X et Y pour vous offrir une version revue de la région de Hoenn. Vous pourrez également parcourir librement les cieux à dos de Pokémon et explorer les bases secrètes de vos amis.', 33, 'https://cdn02.nintendo-europe.com/media/images/05_packshots/games_13/nintendo_3ds_6/PS_3DS_PokemonAlphaSapphire_frFR.png', '3DS', '2014-11-28'),
(7, 'Call of Duty : Advanced Warfare', 'Call of Duty : Advanced Warfare est un FPS dans lequel le joueur incarne le soldat Mitchell. Se déroulant dans un futur proche au cours d''un conflit entre la PMC Atlas et le groupe terroriste KVA, cet opus propose un large éventail d''armes et de missions jouables en solo. Le titre comporte aussi un mode compétitif jouable à 12.', 24.91, 'http://images.redbox.com/Images/EPC/Kiosk/7780.jpg', 'PS3', '2014-11-04'),
(8, 'Super Smash Bros', 'Super Smash Bros est un jeu de combat en arènes dans lesquelles s’affrontent un grand nombre de personnages issus de l’univers de Nintendo, tels que Pikachu, Link, Mario, Samus, ou encore Donkey Kong. De nouveaux combattants arrivent également tels que Mégaman, la coach de Wii Fit, et même le villageois de Animal Crossing. De nombreux modes sont disponibles, et le mode multijoueur est bien évidemment toujours de la partie.', 44.9, 'http://media.ldlc.com/ld/products/00/02/05/96/LD0002059654_2.jpg', 'Wii U', '2014-11-28'),
(9, 'Destiny', ' Réalisé par les créateurs de la série Halo, Destiny est un FPS dans lequel le joueur se bat dans un contexte futuriste. Celui-ci doit lutter contre des hordes d''aliens, seul mais surtout en coopération ou en multijoueur, modes pour lesquels le jeu est spécialement prévu. Celui-ci peut améliorer ses armes en récoltant des matériaux dans les zones du jeu, puis participer à des combats où la stratégie prime.', 21.69, 'http://image.jeuxvideo.com/images/jaquettes/00047257/jaquette-destiny-xbox-360-cover-avant-g-1380557192.jpg', 'XBOX 360', '2014-09-09'),
(10, 'Pro Evolution Soccer 2015', 'Jeu de simulation sportive, Pro Evolution Soccer 2015 est toujours axé sur le football et débarque pour la première fois sur la 8ème génération de consoles. Au rang des nouveautés, on peut notamment citer le mode My Club et l''aspect Carrière en ligne, inspiré de FIFA Ultimate Team. De toutes nouvelles licences sont également de la partie, à commencer par la Ligue 2 et les championnats brésilien et argentin.', 19, 'http://media.moddb.com/images/games/1/37/36484/boxart.jpg', 'PS4', '2014-11-13'),
(11, 'FIFA 15', 'FIFA 15 est un jeu de simulation footballistique introduisant la notion d''émotions contextuelles influençant les joueurs. On y retrouve aussi les célèbres modes des épisodes précédents (Carrière, Ultimate Team, Online...); ainsi que le mode compétition.', 18.52, 'http://planete-play.fr/images/2014/08/FIFA-15-Jaquette-PS-Vita.jpg', 'PS Vita', '2014-09-26'),
(12, 'World of Warcraft : Warlords of Draenor', 'Cinquième extension du MMORPG World of Warcraft, Warlords of Draenor permet aux joueurs de visiter une version alternative de l''Outreterre pour stopper la terrible Horde de Fer menée par Garrosh. Placé à la tête des forces de l''Alliance ou de la Horde, le joueur aura pour la première fois accès à un domaine personnel nommé le Fief.', 2.09, 'http://image.jeuxvideo.com/images/jaquettes/00042192/jaquette-world-of-warcraft-warlords-of-draenor-pc-cover-avant-g-1415962660.jpg', 'PC', '2014-11-13'),
(13, 'Halo : The Master Chief Collection', 'Halo : The Master Chief Collection sur Xbox One regroupe plusieurs jeux de la série Halo : Halo Combat Evolved Anniversaire, Halo 2 Anniversaire, Halo 3 et Halo 4. Halo 2 Anniversaire est exclusif à cette compilation et bénéficie d''une refonte graphique totale. Le jeu propose en outre un mode online mêlant pêle-mêle les 4 jeux (ainsi que leurs cartes); en respectant leurs gameplays originaux.', 29.9, 'http://www.followingthenerd.com/site/wp-content/uploads/rzuByAX.jpg', 'XBOX ONE', '2014-11-14'),
(14, 'The Crew', ' Jeu de course, The Crew vous permet de faire chauffer le moteur de vos bolides sur les routes d''une immense carte qui reproduit l''ensemble des Etats-Unis. Les joueurs, connectés en ligne, peuvent se défier mais également prendre part à des missions scénarisées. Le jeu comprend aussi quelques aspects MMORPG avec entre autres un système de leveling pour vos voitures, ainsi qu''un atelier de tuning bien achalandé.', 29.89, 'http://ecx.images-amazon.com/images/I/91dOeY47ndL._SX385_.jpg', 'PS4', '2014-12-02'),
(15, 'Counter-Strike : Global Offensive', 'Ancien mod de Half-Life destiné au multijoueur, Counter-Strike : Global offensive est un jeu de tir à la première personne. Les joueurs y choisissent le camp des terroristes ou des anti-terroristes avant de s''affronter dans des batailles sans merci. Plusieurs modes de jeux sont disponibles (dont un d''entraînement); et les combattants ont accès à plus de trente armes différentes.', 14, 'http://cdn-static.gamekult.com/gamekult-com/images/photos/30/50/06/05/counter-strike-global-offensive-jaquette-ME3050060535_2.jpg', 'PC', '2012-08-21'),
(16, 'The Elder Scrolls V : Skyrim - Dragonborn', 'Dragonborn sur Xbox 360 est une extension du RPG Skyrim qui permet d''explorer l''île de Solstheim afin d''en percer les secrets. En plus d''une quête principale qui l''oppose au premier Enfant de dragon, le joueur peut accomplir plusieurs quêtes secondaires et profiter de nouvelles possibilités magiques, d''artisanat et autres.', 12.87, 'http://pmcdn.priceminister.com/photo/947013491.jpg', 'PS3', '2012-12-04'),
(17, 'World of Warcraft', 'Jeu de rôle en ligne massivement multijoueur, World of Warcraft vous transporte dans le monde heroic-fantasy d''Azeroth où la guerre fait rage entre la Horde et l''Alliance. Incarnez les nombreuses races du jeu (Humains, Pandaren et bien d''autres);, et faites votre choix parmi les nombreuses classes disponibles afin d''aller vous frotter au contenu astronomique du jeu et de ses extensions. Fabriquer armes et armures, affronter des hordes de monstres et de démons seul ou en groupe, constituer des guildes, et tellement plus encore, voilà ce qui vous attend dans WoW.', 2.09, 'http://image.jeuxvideo.com/images/pc/w/o/wowapc0f.jpg', 'PC', '2005-02-11'),
(18, 'Minecraft', 'Jeu bac à sable indépendant et pixelisé dont le monde infini est généré aléatoirement, Minecraft permet au joueur de récolter divers matériaux, d''élever des animaux et de modifier le terrain selon ses choix, en solo ou en multi (via des serveurs);. Il doit également survivre en se procurant de la nourriture et en se protégeant des monstres qui apparaissent la nuit et dans des donjons. Il peut également monter de niveau afin d''acheter des enchantements.', 19.99, 'http://3.bp.blogspot.com/-lkqHXylY_ak/VAhov22j3aI/AAAAAAAAGNA/thS4wQV1yVw/s1600/81X4s76omFL._SL1500_.jpg', 'PS4', '2011-11-18'),
(19, 'WWE 2K15', ' WWE 2K15 est le deuxième opus de la série WWE 2K et le premier à arriver sur la 8ème génération de consoles. Dans ce jeu de catch, vous pouvez incarner votre catcheur favori dans de nombreux types de combat.', 23.29, 'http://image.jeuxvideo.com/images/jaquettes/00052812/jaquette-wwe-2k15-xbox-one-cover-avant-g-1404314123.jpg', 'XBOX ONE', '2014-11-21'),
(20, 'Halo 5 : Guardians', 'Halo 5: Guardians sur Xbox One est un FPS mettant en scène les aventures du Master Chief et d''un nouveau personnage, le Spartan Jameson Locke. Le jeu dispose également d''une importante partie multijoueur et reprend les modes de jeu connus de la série, mais compte également deux nouveautés, la Warzone et le mode Elimination. Pour gagner, les joueurs pourront compter sur les nombreuses nouveautés de gameplay qui rendent les Spartans plus dynamiques qu''auparavant.', 48.89, 'http://compass.xbox.com/assets/fd/27/fd27fe56-fb0d-48af-aadf-b06c9a9786db.jpg?n=Halo-guardians_digital-boxshot-standard-ed_307x421.jpg', 'XBOX ONE', '2015-10-27'),
(23, 'Super Smash Bros 3DS', 'Super Smash Bros. for 3DS est un jeu de combat en arènes dans lesquelles s’affrontent un grand nombre de personnages issus de l’univers de Nintendo, tels que Pikachu, Link, Mario, Samus, ou encore Donkey Kong. De nouveaux combattants arrivent également tels que Mégaman, la coach de Wii Fit, et même le villageois de Animal Crossing. De nombreux modes sont disponibles, et le mode multijoueur est bien évidemment toujours de la partie.', 33.49, 'http://i.jeuxactus.com/datas/jeux/s/u/super-smash-bros-for-nintendo-3ds/xl/super-smash-bros-for-nin-5429844b04457.jpg', '3DS', '2014-10-03'),
(24, 'This War Of Mine', ' Jeu de survie, This War of Mine vous permet d''incarner un groupe de civils qui doivent survivre le plus longtemps possible. Suivant un cycle, le principe du jeu repose sur deux grandes phases : le jour, où vous devez vous protéger de l''attaque des snipers, et le soir, où la recherche de nourriture devient votre objectif principal.', 11.39, 'http://cdn.supersoluce.com/file/docs/docid_548e9ffe8f152fe523000002/elemid_4ee9d6ec0a2fe93f0e00000c/this-war-of-mine-pc.jpg', 'PC', '2014-11-14'),
(25, 'Hyrule Warriors', 'Hyrule Warriors est un beat''em all sur Wii U. Le jeu transpose l''univers de la série Zelda dans un jeu de combat de masse à la Dynasty Warriors qui multiplie les références aux différents jeux de la saga. En marge du mode Légende scénarisé, un mode Aventure s''inspire de la map du premier Zelda pour proposer une multitude de défis teintés d''exploration. Le coop à deux joueurs est autorisé et les personnages voient leurs capacités évoluer au fil du jeu.', 43.21, 'http://image.jeuxvideo.com/images/jaquettes/00051197/jaquette-hyrule-warriors-wii-u-wiiu-cover-avant-g-1410766276.jpg', 'Wii U', '2014-09-19'),
(26, 'Animal Crossing : New Leaf', 'Animal Crossing : New Leaf est un jeu de gestion sur 3DS. Dans cet épisode, votre personnage sera amené à devenir le maire d''un petit village virtuel. Accompagné de votre secrétaire, vous allez devoir superviser le développement de votre charmante petite bourgade !', 33, 'https://cdn03.nintendo-europe.com/media/images/05_packshots/games_13/nintendo_3ds_6/PS_3DS_AnimalCrossingNewLeaf_enGB.png', '3DS', '2014-06-14'),
(27, 'NBA 2K15', 'NBA 2K15 est un jeu de sport permettant de pratiquer le basket-ball. Les animations des joueurs sont créées de façon à donner un rendu visuel et technique le plus réaliste possible. Le joueur peut créer un joueur personnalisé, gérer une équipe complète ou encore profiter du mode online.', 16.99, 'http://gamedealdaily.com/wp-content/uploads/2014/12/nba2k15ps4.jpg', 'PS4', '2014-10-10'),
(28, 'Dragon Ball Xenoverse', 'Dragon Ball Xenoverse est un jeu de combat se déroulant dans l''univers de Dragon Ball. Une grande menace liée à l''espace-temps menace ce monde, et le joueur doit utiliser ses pouvoir pour changer l''histoire et le sauver.', 29.62, 'http://www.futureshop.ca/multimedia/Products/500x500/103/10341/10341741.jpg', 'XBOX 360', '2015-02-27'),
(29, 'Batman Arkham Knight', 'Se déroulant un an après les événements de Batman Arkham City, Batman Arkham Knight est un jeu d''action dans lequel l’Épouvantail menace d''utiliser des armes chimiques sur la ville. Batman est donc au rendez-vous, accompagnée de sa Batmobile qui prend une importance capitale.', 30, 'http://image.jeuxvideo.com/images/jaquettes/00051935/jaquette-batman-arkham-knight-xbox-one-cover-avant-g-1393949995.jpg', 'XBOX ONE', '2015-06-23'),
(30, 'Mario Kart 8', 'Mario Kart 8 est un jeu de course disponible sur Wii U. Mario et ses amis s''y affrontent au volant de karts ou au guidon de motos sur 32 circuits comprenant aussi bien des passages sous l''eau ou dans les airs que des loopings. Douze joueurs peuvent s''affronter en ligne ou 4 en local.', 44.99, 'https://cdn03.nintendo-europe.com/media/images/05_packshots/games_13/wiiu_6/PS_WiiU_MarioKart8_PEGI3.png', 'Wii U', '2014-05-30'),
(31, 'Battlefield 4', 'Jeu de tir à la première personne (FPS);, Battlefield 4 est surtout taillé pour le multijoueur, malgré une campagne solo qui vous permet d''intégrer une escouade et de prendre part à des affrontements de grande envergure. De très nombreuses maps sont désormais disponibles grâce à la pléthore de DLC et forment le cœur du jeu. Votre avatar peut évoluer au fur et à mesure des parties ce qui vous donne la possibilité d''améliorer vos armes, de déverrouiller des pièces d''équipement ainsi que des améliorations notamment pour vos véhicules et compétences.', 10.98, 'http://image.jeuxvideo.com/images/jaquettes/00045933/jaquette-battlefield-4-xbox-360-cover-avant-g-1383145544.jpg', 'XBOX 360', '2013-10-31'),
(32, 'Starcraft II : Legacy of the Void', 'Starcraft II - Protoss : Legacy of the Void est un jeu de stratégie en temps réel sur PC au sein d''une galaxie où trois factions s''affrontent sans merci. D''un côté, les Terrans, descendants de colons humains. De l''autre, les Protoss, une race très avancée technologiquement et dotée de pouvoirs psioniques. Enfin, les Zergs, hordes de créatures diverses issues de mutations biologiques et regroupées en essaim. Cet opus comprend la campagne solo Protoss et tout le nécessaire pour jouer en multi.', 14.93, 'http://ecx.images-amazon.com/images/I/91SACWlwQ4L._SY606_.jpg', 'PC', '2015-11-10'),
(33, 'World of Tanks', 'Jeu de stratégie et de combat, World of Tanks vous place dans la carlingue d''un tank. Aux commandes de votre char, vous affrontez des joueurs dans des parties en 15 contre 15 quelque peu mouvementées. Plus de 60 véhicules sont disponibles, allant du char léger aux chasseurs de chars et calqués sur des modèles soviétiques, étatsuniens et même allemands. Vous pouvez améliorer votre tank grâce à des crédits remportés au fur et à mesure des parties, et également via la boutique.', 9.19, 'http://image.jeuxvideo.com/medias/142849/1428487848-9144-jaquette-avant.jpg', '360', '2011-04-13'),
(34, 'The Last of Us Remastered', 'The Last of Us Remastered est un survival action sur PS4 qui raconte l''histoire de Joel et d''Ellie qui vont devoir s''entraider pour survivre face à une mystérieuse peste qui a décimé les Etats-Unis. La nature commence à s''approprier les villes abandonnées et les quelques survivants s''entre-tuent pour récupérer le peu de nourriture et d''armes encore présentes. Cette version améliorée du jeu propose l''aventure de base et le DLC Left Behind.', 30.7, 'http://www.gamalive.com/images/fiches/9030-last-of-us-ps4.jpg', 'PS4', '2014-07-30'),
(35, 'Evolve', 'Evolve est un FPS jouable en multi. Cinq joueurs dont 4 incarnent des chasseurs et le dernier un monstre s''affrontent dans une grande zone. Le monstre évolue en se nourrissant des créatures qui l''entourent, et les différentes classes comprennent chacune plusieurs personnages. Un mode solo est également disponible.', 6, 'http://medias.micromania.fr/catalog/product/cache/1/image/370x/9df78eab33525d08d6e5fb8d27136e95/2/k/2kgmkt_evolve_xbox_one_fob_noamarayedges_pegi.jpg', 'XBOX ONE', '2015-02-10');

-- --------------------------------------------------------

--
-- Structure de la table `gc_rel_game_cat`
--

CREATE TABLE `gc_rel_game_cat` (
  `id_game` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gc_rel_game_cat`
--

INSERT INTO `gc_rel_game_cat` (`id_game`, `id_cat`) VALUES
(2, 1),
(3, 1),
(5, 1),
(15, 1),
(24, 1),
(29, 1),
(33, 1),
(34, 1),
(35, 1),
(2, 2),
(7, 2),
(9, 2),
(13, 2),
(15, 2),
(20, 2),
(31, 2),
(35, 2),
(2, 3),
(3, 4),
(5, 4),
(24, 4),
(29, 4),
(4, 5),
(5, 5),
(6, 5),
(12, 5),
(16, 5),
(17, 5),
(8, 6),
(19, 6),
(23, 6),
(28, 6),
(10, 7),
(11, 7),
(19, 7),
(27, 7),
(12, 8),
(17, 8),
(33, 8),
(14, 9),
(30, 9),
(18, 10),
(18, 11),
(18, 12),
(24, 13),
(34, 13),
(25, 14),
(26, 15),
(32, 16),
(35, 17);

-- --------------------------------------------------------

--
-- Structure de la table `gc_rel_game_editor`
--

CREATE TABLE `gc_rel_game_editor` (
  `id_game` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gc_rel_game_editor`
--

INSERT INTO `gc_rel_game_editor` (`id_game`, `id_editor`) VALUES
(2, 3),
(2, 4),
(3, 5),
(14, 5),
(5, 6),
(5, 7),
(11, 7),
(31, 7),
(4, 8),
(6, 8),
(8, 8),
(23, 8),
(26, 8),
(30, 8),
(7, 9),
(9, 9),
(7, 10),
(8, 11),
(23, 11),
(9, 12),
(10, 13),
(11, 14),
(12, 15),
(17, 15),
(12, 16),
(17, 16),
(32, 16),
(13, 17),
(20, 17),
(13, 18),
(14, 19),
(14, 20),
(15, 21),
(15, 22),
(16, 23),
(17, 24),
(18, 25),
(18, 26),
(19, 27),
(27, 27),
(20, 28),
(24, 29),
(25, 30),
(25, 31),
(27, 32),
(28, 33),
(28, 34),
(29, 35),
(29, 36),
(29, 37),
(31, 38),
(33, 39),
(34, 40),
(34, 41),
(35, 42),
(35, 43);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `gc_cards`
--
ALTER TABLE `gc_cards`
  ADD PRIMARY KEY (`id_card`),
  ADD UNIQUE KEY `cryptogram` (`cryptogram`),
  ADD UNIQUE KEY `card_number` (`card_number`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Index pour la table `gc_cart`
--
ALTER TABLE `gc_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_game` (`id_game`);

--
-- Index pour la table `gc_category`
--
ALTER TABLE `gc_category`
  ADD PRIMARY KEY (`id_cat`),
  ADD UNIQUE KEY `name_cat` (`name_cat`);

--
-- Index pour la table `gc_customers`
--
ALTER TABLE `gc_customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index pour la table `gc_editor`
--
ALTER TABLE `gc_editor`
  ADD PRIMARY KEY (`id_editor`),
  ADD UNIQUE KEY `name_editor` (`name_editor`);

--
-- Index pour la table `gc_games`
--
ALTER TABLE `gc_games`
  ADD PRIMARY KEY (`id_game`),
  ADD UNIQUE KEY `name_game` (`name_game`);

--
-- Index pour la table `gc_rel_game_cat`
--
ALTER TABLE `gc_rel_game_cat`
  ADD PRIMARY KEY (`id_game`,`id_cat`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `gc_rel_game_editor`
--
ALTER TABLE `gc_rel_game_editor`
  ADD PRIMARY KEY (`id_game`,`id_editor`),
  ADD KEY `id_editor` (`id_editor`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `gc_cards`
--
ALTER TABLE `gc_cards`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `gc_cart`
--
ALTER TABLE `gc_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `gc_category`
--
ALTER TABLE `gc_category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `gc_customers`
--
ALTER TABLE `gc_customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `gc_editor`
--
ALTER TABLE `gc_editor`
  MODIFY `id_editor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `gc_games`
--
ALTER TABLE `gc_games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `gc_cards`
--
ALTER TABLE `gc_cards`
  ADD CONSTRAINT `gc_cards_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `gc_customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `gc_cart`
--
ALTER TABLE `gc_cart`
  ADD CONSTRAINT `gc_cart_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `gc_customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_cart_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `gc_games` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `gc_rel_game_cat`
--
ALTER TABLE `gc_rel_game_cat`
  ADD CONSTRAINT `gc_rel_game_cat_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `gc_games` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_rel_game_cat_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `gc_category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `gc_rel_game_editor`
--
ALTER TABLE `gc_rel_game_editor`
  ADD CONSTRAINT `gc_rel_game_editor_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `gc_games` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gc_rel_game_editor_ibfk_2` FOREIGN KEY (`id_editor`) REFERENCES `gc_editor` (`id_editor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
