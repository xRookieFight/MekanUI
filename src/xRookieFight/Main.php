<?php

namespace xRookieFight;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\Listener;
use pocketmine\{Player, Server};
use pocketmine\utils\TextFormat;
use jojoe77777\FormAPI;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getLogger()->info("
		§bPlugin Aktif - By xRookieFight");
		
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		$player = $sender->getPlayer();
		switch($command->getName()){
			case "mekan":
			$this->menuForm($player);
		}
		return true;
	}
	
	public function menuForm($player){
		if($player instanceof Player){
			$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
			$form = $api->createSimpleForm(function (Player $sender, array $data){
				if(isset($data[0])){
					switch($data[0]){
						case 0:
						$this->getServer()->getCommandMap()->dispatch($sender, "multiworld tp lobi");
						break;
						case 1:
						$this->getServer()->getCommandMap()->dispatch($sender, "multiworld tp hammadde");
						break;
						case 2:
						$this->getServer()->getCommandMap()->dispatch($sender, "multiworld tp lapis");
						break;
						case 3:
						$this->getServer()->getCommandMap()->dispatch($sender, "multiworld tp rutbehammadde");
						break;
					case 4:
						$this->getServer()->getCommandMap()->dispatch($sender, "multiworld tp arena");
						break;
						case 5:
						$this->getServer()->getCommandMap()->dispatch($sender, "multiworld tp arsa");
						break;
						case 6:
						$this->getServer()->getCommandMap()->dispatch($sender, "");
						break;
						case 7:
						$this->getServer()->getCommandMap()->dispatch($sender, "");
						break;
						case 8:
						$this->getServer()->getCommandMap()->dispatch($sender, "");
					}
					
				}
			});
			$form->setTitle("§9Mekan§fUI");
			$form->setContent("§7»§fIşınlanma Yerine Geldin \nMekanlar aşağıdadır.");
			$form->addButton("§bLobiye Işınlan");
			$form->addButton("§bHammaddeye Işınlan");
			$form->addButton("§bLapise Işınlan");
			$form->addButton("§bRütbe Hammaddeye Işınlan");
			$form->addButton("§bArenaya Işınlan");
			$form->addButton("§bArsaya Işınlan");
			$form->sendToPlayer($player);			
		}else{
			$sender->sendMessage("§cBu Komutu Lütfen Oyundayken Kullanınız!");
			return true;
		}
	}
}
