<?php

namespace roi611\fixchest;

use pocketmine\plugin\PluginBase;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;

use pocketmine\block\Chest;
use pocketmine\block\tile\Chest as TileChest;

class Main extends PluginBase implements Listener {

    public function onEnable():void{ $this->getServer()->getPluginManager()->registerEvents($this, $this); }


    /**
    * @priority LOWEST
    */
    public function onTap(PlayerInteractEvent $event){

        $block = $event->getBlock();
        $p = $block->getPosition();
        $tile = $p->getWorld()->getTile($p);

        if($block instanceof Chest){
            if(!$tile instanceof TileChest){
                $tile = new TileChest($p->getWorld(), $p);
                $p->getWorld()->addTile($tile);
            }
        }

    }

    /**
    * @priority LOWEST
    */
    public function onBreak(BlockBreakEvent $event){

        $block = $event->getBlock();
        $p = $block->getPosition();
        $tile = $p->getWorld()->getTile($p);

        if($block instanceof Chest){
            if(!$tile instanceof TileChest){
                $tile = new TileChest($p->getWorld(), $p);
                $p->getWorld()->addTile($tile);
            }
        }

    }

}