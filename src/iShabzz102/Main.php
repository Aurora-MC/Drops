<?php

namespace iShabzz102;

//PluginBase
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    public function onEnable() : void{
        $this->getLogger()->info("Drops Disabled!");
    }
        public function onDeath(PlayerDeathEvent $event){
     $player = $event->getPlayer();
     $event->setDrops([]);
        }
}