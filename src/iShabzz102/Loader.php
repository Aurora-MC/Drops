<?php
namespace iShabzz102;
//PluginBase
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
class Loader extends PluginBase implements Listener {
        public $prefix = TF::GOLD."[".TF::GREEN."(!)".TF::AQUA."drops".TF::GOLD."] ".TF::RESET;

 public function onEnable(): void {
     $this->getServer()->getPluginManager()->registerEvents($this, $this);
  if($this->getConfig()->get("drops") !== true){
      $statut = "disabled";
  }else{
      $statut = "enabled";
  }
  $this->getServer()->getLogger()->notice($this->prefix.TF::RED."You can edit it in config.yml");
  $this->getServer()->getLogger()->notice($this->prefix.TF::GREEN."Drops $statut");
 }
   public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
       //Adding Commands Soon.
   }
}
 public function PlayerDeath(PlayerDeathEvent $ev){
  if($this->getConfig()->get("drops") == false) {
      $ev->setDrops([]);
  }else{
return;
        }
  }
 }
