<?php

declare(strict_types=1);

namespace iShabzz102;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

/**
 * Class Loader
 * @package iShabzz102
 */
class Loader extends PluginBase implements Listener {
    
    /** @var string $prefix */
    private $prefix = "§6[§a(!)§bdrops§6]§r";

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if ($this->getConfig()->get("drops") !== true) {
            $statut = "disabled";
        } else {
            $statut = "enabled";
        }
        $this->getServer()->getLogger()->notice($this->prefix . "§c You can edit it in config.yml");
        $this->getServer()->getLogger()->notice($this->prefix . "§a Drops $statut");
    }

    /**
     * @param CommandSender $sender
     * @param Command $command
     * @param string $label
     * @param array $args
     * 
     * @return bool
     */
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (isset($args)) {
            switch ($args[0]) {
                case 'on':
                    $this->getConfig()->set("drops", true);
                    $this->getConfig()->save();
                    $sender->sendMessage($this->prefix . "§a Drops have been enabled");
                    break;

                case 'off':
                    $this->getConfig()->set("drops", false);
                    $this->getConfig()->save();
                    $sender->sendMessage($this->prefix . "§a Drops have been disabled");
                    break;
                default:
                    $sender->sendMessage($this->prefix . "§c Usage:§7 /drops <on:off>");
                    break;
            }
        } else {
            $sender->sendMessage($this->prefix . "§c Usage:§7 /drops <on:off>");
        }
        return true;
    }

    /**
     * @param PlayerDeathEvent $ev
     */
    public function PlayerDeath(PlayerDeathEvent $ev) {
        if ($this->getConfig()->get("drops") == false) $ev->setDrops([]);
    }
}
