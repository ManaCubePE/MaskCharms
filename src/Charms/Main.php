<?php
declare(strict_types = 1);
namespace iRain;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\nbt\tag\ListTag;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {
	public const PREFIX = TextFormat::YELLOW . "Welcome!" . TextFormat::DARK_GRAY. " ";

	public function onLoad()  : void {
		$int = rand(1, 3);
		switch ($int) {
			case 1:
				$str = "FUN";
				break;
			case 2:
				$str = "EASY";
				break;
			case 3:
				$str = "SIMPLE";
		}
		$this->getLogger()->info(Main::PREFIX . "CODING IS " . $str);
	}

	public function onEnable() : void {
		$this->getLogger()->info(Main::PREFIX . "IDK");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
	}

	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) : bool
	{
		if ($sender instanceof Player) {
			switch ($cmd->getName()) {
				case "charms":
					$sender->sendMessage(Main::PREFIX . TextFormat::RED . TextFormat::BOLD . "ENJOY YOUR MASK CHARM!");
					$sender->addTitle(TextFormat::RED . TextFormat::BOLD . "TAP WITH THE ENCHANTED BOOK IN YOUR HAND FOR A RANDOM MASK!");
					$item = Item::get(403,0,1);
					$inv = $sender->getInventory();
					$item->setCustomName(TextFormat::RED . TextFormat::BOLD . "MASK CHARM");
					$inv->addItem($item);
					return true;
	}
}
