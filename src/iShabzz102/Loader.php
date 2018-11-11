<?php
namespace iShabzz102;
//PluginBase
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerDeathEvent

class Loader extends PluginBase{

    public function onEnable() : void{
        $this->getLogger()->info("Drops Disabled!");
    }
        public function onDeath(PlayerDeathEvent $event){
     $player = $event->getPlayer();
     $event->setDrops([]);
        }
}
