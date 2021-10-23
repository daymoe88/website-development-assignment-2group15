USE Assignment02;

DELETE FROM CartProduct;
/*DELETE FROM Product;
DELETE FROM UserAccount;*/


/*  UserAccount inserts */
INSERT INTO UserAccount (firstName, lastName, email, password) VALUES ("A", "B", "ab@cdefg.com", "password");


/*  Product inserts */
INSERT INTO Product VALUES ("001NS", "Nintendo Switch", "Minecraft", "Imagine it, and you can build it! The critically acclaimed Minecraft comes to the Nintendo Switch system. Minecraft is a game about placing blocks and going on adventures. Create your very own game world to explore, build and conquer. When night falls the monsters appear, so ensure you've made yourself a shelter before they arrive. Make it through the night and the world is only limited by your imagination you choose what you want to make or what to do.", 39.95, "product-images/001NS.png", 50);

INSERT INTO Product VALUES ("001P4", "PlayStation 4", "Minecraft PlayStation 4 Edition", "In Minecraft, your adventure starts with your imagination. Build anything you can imagine with unlimited resources in Creative mode, or go on grand expeditions in Survival, journeying across mysterious lands and into the depths of your own infinite worlds. 
<br><br>
Will you hide from monsters or craft tools, armour and weapons to fight back? No need to go alone!
<br><br>
Create, explore and survive alone or with up to seven PlayStation Network friends.", 24.95, "product-images/001P4.png", 100);

INSERT INTO Product VALUES ("001XO", "Xbox One", "Minecraft Xbox One Edition", "Minecraft is a game about placing blocks and going on adventures. Build anything you can imagine with unlimited resources in Creative mode, or go on grand expeditions in Survival, journeying across mysterious lands and into the depths of your own infinite worlds. Will you hide from monsters or craft tools, armour and weapons to fight back? No need to go alone! Share the adventure with friends in split-screen multiplayer and online.", 35.95, "product-images/001XO.png", 300);

INSERT INTO Product VALUES ("002NS", "Nintendo Switch", "The Legend of Zelda: Breath of the Wild", "The Legend of Zelda: Breath of the Wild represents the next great boundary-breaking adventure from Nintendo. The game marks a new pinnacle for the franchise, featuring challenges and surprises for players at every turn while giving them incredible freedom to explore the massive world found in this open-air adventure.
<br><br>
The Legend of Zelda: Breath of the Wild takes the franchise to new heights. As players investigate Hyrule, they can explore the game any way they want because the world is so vast and players are not required to take a pre-determined path.
<br><br>
Link needs to be resourceful as he explores his environment. It’s important for players to become familiar with their surroundings so they can find weapons or collect them from defeated enemies. Food helps Link sustain his hearts and can give him a temporary boost or ability that will sustain him.
<br><br>
The game breaks with some conventions from the series. For example, many of the minor enemies are no longer scattered randomly around the world, as many now live together in colonies. Link can climb towers and massive structures to get a bearing on his surroundings. He can even reach the top of mountains – any mountain he can see, he can climb. He can paraglide to lower areas or even use his shield to slide down a mountain. Link will travel across fields, through forests and to mountain peaks.
<br><br>
More than 100 Shrines of Trials dot the landscape, waiting for players to discover and explore them in any order they want. As players work their way through the traps and puzzles inside, they’ll earn special items and other rewards that will help them on their adventure. Puzzles in the game often have multiple answers, and secrets can be found everywhere. Exploration and discovery are a huge part of the fun.", 89.95, "product-images/002NS.png", 100);

INSERT INTO Product VALUES ("003XO", "Xbox One", "Grand Theft Auto V: Premium Edition", "The Grand Theft Auto V: Premium Edition includes the complete Grand Theft Auto V story experience, free access to the ever evolving Grand Theft Auto Online and all existing gameplay upgrades and content including The Doomsday Heist, Gunrunning, Smuggler’s Run, Bikers and much more. You’ll also get the Criminal Enterprise Starter Pack, the fastest way to jumpstart your criminal empire in Grand Theft Auto Online.
<br><br>
When a young street hustler, a retired bank robber and a terrifying psychopath land themselves in trouble, they must pull off a series of dangerous heists to survive in a city in which they can trust nobody, least of all each other.", 49.95, "product-images/003XO.jpg", 40);

INSERT INTO Product VALUES ("003P4", "PlayStation 4", "Grand Theft Auto V: Premium Edition", "The Grand Theft Auto V: Premium Edition includes the complete Grand Theft Auto V story experience, free access to the ever evolving Grand Theft Auto Online and all existing gameplay upgrades and content including The Doomsday Heist, Gunrunning, Smuggler’s Run, Bikers and much more. You’ll also get the Criminal Enterprise Starter Pack, the fastest way to jumpstart your criminal empire in Grand Theft Auto Online.", 54.95, "product-images/003P4.jpg", 80);

INSERT INTO Product VALUES ("004P4", "PlayStation 4", "Legendary Fishing", "Do you have what it takes to become a legendary angler? Welcome to “LEGENDARY FISHING”, the arcade style casual fishing game. Choose your tackle and hone your skills in 3 different modes. Whether you take up increasingly demanding challenges, you compete with your friends or you just want to relax and find your zen, there is always something to do and plenty of fish waiting for you.
<br><br>
Fishing is fun!
<br><br>
Cast, Hook, reel them in! Legendary Fishing will challenge your angler skills. Don't break your line!
Use motion controls with the PlayStation Move to cast (classic controls also available)", 49.00, "product-images/004P4.png", 10000);

INSERT INTO Product VALUES ("004NS", "Nintendo Switch", "Legendary Fishing", "Do you have what it takes to become a legendary angler? Welcome to “LEGENDARY FISHING”, the arcade style casual fishing game. Choose your tackle and hone your skills in 3 different modes. Whether you take up increasingly demanding challenges, you compete with your friends or you just want to relax and find your zen, there is always something to do and plenty of fish waiting for you.
<br><br>
Fishing is fun!
<br><br>
Cast, Hook, reel them in! Legendary Fishing will challenge your angler skills. Don't break your line!
Use motion controls with the Nintendo Switch Joy-Con to cast (classic controls also available)", 69.95, "product-images/004NS.jpg", 3);

INSERT INTO Product VALUES ("005P4", "PlayStation 4", "Gran Turismo Sport", "From the first dizzying rush of acceleration to the last split-second finish the real driving simulator is back. Experience the thrill of racing motorsport’s fastest cars in intense online competitions and classic single-player game modes – geared for new drivers and seasoned pros alike. Get behind the wheel of over 170 of the world’s most sought-after vehicles, with true-to-life visuals and stunningly realistic handling. Race on masterfully recreated tracks in iconic locations, including the legendary Nürburgring and Tokyo Expressway. Compete against the world in official, FIA-endorsed online championships, and in GT League – a single-player campaign mode featuring classic cups and endurance races. An Internet connection is required for most functionality.", 24.95, "product-images/005P4.jpg", 30);

INSERT INTO Product VALUES ("006P4", "PlayStation 4", "Resident Evil Village", "The next generation of survival horror rises in the form of Resident Evil Village, the eighth major entry in the Resident Evil series. With ultra-realistic graphics powered by the RE Engine, fight for survival as danger lurks around every corner.
<br><br>
Resident Evil Village continues the story of Ethan Winters, first set in motion in Resident Evil™ 7 biohazard. The latest entry combines pulse-pounding action with signature survival horror gameplay synonymous with the Resident Evil series. In today’s first extensive look at gameplay, the development team revealed several new details including some features which harken back to fan-favorite elements from previous Resident Evil games. Protagonist Ethan will now be able to purchase and sell items, buy recipes for crafting, and customize weapons with a merchant dubbed “The Duke.” Using materials found throughout the game, he will be able to craft invaluable consumables needed to survive the terrors of the village. Utilising these provisions will also involve more strategic planning, with a revised inventory system based on space management that may be familiar to series fans.
<br><br>
The diverse cast of enemies appearing in today’s digital program are just a few revealed from Resident Evil Village so far. Ethan will face off against many threats such as fast-moving creatures that relentlessly stalk him and Lady Dimitrescu’s mysterious daughters who can transform into swarms of insects. The game’s disparate lineup of adversaries will have their own distinctive ways of attacking, so players will need to adapt their strategies with quick decisions on when to attack, guard or flee in order to survive. Ethan has a new kick move in his arsenal to create distance from enemies and buy precious time to decide his next move.", 109.95, "product-images/006P4.jpg", 60);

INSERT INTO Product VALUES ("006P5", "PlayStation 5", "Resident Evil Village", "Experience survival horror like never before in the eighth major instalment in the storied Resident Evil franchise - Resident Evil Village.
Set a few years after the horrifying events in the critically acclaimed Resident Evil 7 biohazard, the all-new storyline begins with Ethan Winters and his wife Mia living peacefully in a new location, free from their past nightmares. Just as they are building their new life together, tragedy befalls them once again.", 109.95, "product-images/006P5.jpg", 30);

INSERT INTO Product VALUES ("006XS", "Xbox Series X", "Resident Evil Village", "Experience survival horror like never before in the eighth major installment in the storied Resident Evil franchise - Resident Evil Village.
<br><br>
Set a few years after the horrifying events in the critically acclaimed Resident Evil 7 biohazard, the all-new storyline begins with Ethan Winters and his wife Mia living peacefully in a new location, free from their past nightmares. Just as they are building their new life together, tragedy befalls them once again.
<br><br>
This pack includes the following content:
<br>
• Resident Evil Village
<br>
• Resident Evil Re:Verse", 109.95, "product-images/006XS.jpg", 80);

INSERT INTO Product VALUES ("007NS", "Nintendo Switch", "Animal Crossing: New Horizons", "Escape to Your Personal Island Paradise!
<br><br>
Escape to a deserted island and create your own paradise as you explore, create, and customize in Animal Crossing: New Horizons. Your island getaway has a wealth of natural resources that can be used to craft everything from tools to creature comforts. You can hunt down insects at the crack of dawn, decorate your paradise throughout the day, or enjoy the sunset on the beach while fishing in the ocean. The time of day and season match real life, so each day on your island is a chance to check in and find new surprises all year round.
<br><br>
Show off your island utopia to family and friends - or pack your bags and visit theirs. Whether playing online* or with others beside you**, island living is even better when you can share it. Even without hopping on a flight, you'll meet a cast of charming animal residents bursting with personality. Friendly faces like Tom Nook and Isabelle will lend their services and happily help you grow your budding community. Escape to your island getaway - however, whenever, and wherever you want.
<br><br>
*Nintendo Switch Online membership (sold separately) and Nintendo Account required for online features. Not available in all countries. Internet access required for online features. Terms apply. nintendo.com/switch-online
**Additional games, systems and/or accessories may be required for multiplayer mode. Games, systems and some accessories sold separately. © 2020 Nintendo. Animal Crossing and Nintendo Switch are trademarks of Nintendo.", 79.95, "product-images/007NS.jpg", 120);

INSERT INTO Product VALUES ("008XS", "Xbox Series X", "Microsoft Flight Simulator", "From light planes to wide-body jets, fly highly detailed and accurate aircraft in the next generation of Microsoft Flight Simulator. Test your piloting skills against the challenges of night flying, real-time atmospheric simulation, and live weather in a dynamic and living world. Create your flight plan to anywhere on the planet.
<br><br>
The world is at your fingertips. This version plays on Xbox Series X and is optimized for Xbox Series X. Games optimized for Xbox Series X will showcase unparalleled load times, heightened visuals, and steadier frame rates.", 99.95, "product-images/008XS.jpg", 300);

INSERT INTO Product VALUES ("009NS", "Nintendo Switch", "Ori and the Blind Forest", "The forest of Nibel is dying. After a powerful storm sets a series of devastating events in motion, Ori must journey to find courage and confront a dark nemesis to save the forest of Nibel. Ori and the Blind Forest tells the tale of a young orphan destined for heroics, through a visually stunning Action Platformer crafted by Moon Studios. Featuring hand painted artwork, meticulously animated character performance, a fully orchestrated score, Ori and the Blind Forest explores a deeply emotional story about love and sacrifice, and the hope that exists in us all.", 69.95, "product-images/009NS.jpg", 20);

INSERT INTO Product VALUES ("009XO", "Xbox One", "Ori and the Blind Forest", "Get the original Ori and the Blind Forest for free with the purchase of Ori and the Blind Forest: Definitive Edition! 
<br><br>
The forest of Nibel is dying. After a powerful storm sets a series of devastating events in motion, an unlikely hero must journey to find his courage and confront a dark nemesis to save his home. “Ori and the Blind Forest” tells the tale of a young orphan destined for heroics, through a visually stunning action-platformer crafted by Moon Studios for the Xbox One. Featuring hand-painted artwork, meticulously animated character performance, and a fully orchestrated score, “Ori and the Blind Forest” explores a deeply emotional story about love and sacrifice, and the hope that exists in us all.", 64.95, "product-images/009XO.jpg", 65);

INSERT INTO Product VALUES ("010NS", "Nintendo Switch", "Little Nightmares 2", "Will you dare to face this collection of new, little nightmares?
<br><br>
Little Nightmares II is a suspense-adventure game in which you play as Mono, a young boy trapped in a world that has been distorted by the humming transmission of a distant tower. With Six, the girl in a yellow raincoat, as his guide, Mono sets out to discover the dark secrets of The Signal Tower and save Six from her terrible fate; but their journey will not be straightforward as Mono and Six will face a gallery of new threats from the terrible residents of this world.", 69.95, "product-images/010NS.jpg", 55);

INSERT INTO Product VALUES ("010P4", "PlayStation 4", "Little Nightmares 2", "Discover the sinister secrets of The Signal Tower in this horror-themed platform adventure where you control Mono, a young boy trapped in a distorted and broken world.
<br><br>
Joined by Six, the raincoat wearing hero from the original Little Nightmares, only you can help her from fading away into nothingness. As the relationship between Mono and Six grows, the duo must work together using a combination of stealth and an array of items to overcome tricky puzzles and horrifying enemies.
<br><br>
Muster your courage and begin your journey in the face of terrible threats in a mission to stop the source of evil that’s spreading throughout the land.", 59.95, "product-images/010P4.jpg", 25);

INSERT INTO Product VALUES ("010XS", "Xbox Series X", "Little Nightmares 2", "Will you dare to face this collection of new, little nightmares?
<br><br>
Little Nightmares II is a suspense-adventure game in which you play as Mono, a young boy trapped in a world that has been distorted by the humming transmission of a distant tower. With Six, the girl in a yellow raincoat, as his guide, Mono sets out to discover the dark secrets of The Signal Tower and save Six from her terrible fate; but their journey will not be straightforward as Mono and Six will face a gallery of new threats from the terrible residents of this world.", 59.95, "product-images/010XS.jpg", 130);