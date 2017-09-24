<?php

namespace popkechupki;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;

class VoidSpawn extends PluginBase implements Listener {
  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
  }
  public function onEntityDamage(EntityDamageEvent $event) {
    if($event->getEntity() instanceof Player) {
      switch($event->getCause()) {
        case VOID:
          $event->setCancelled();
          $event->getEntity()->teleport($event->getEntity()->getLevel()->getSafeSpawn());
      }
    }
  }
}
